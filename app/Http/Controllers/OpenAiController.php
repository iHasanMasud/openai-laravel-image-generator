<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class OpenAiController extends Controller
{
    public function generateImage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'prompt' => 'required|string',
            'size' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $apiURL = 'https://api.openai.com/v1/images/generations';
        $headers = [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
        ];

        $postInput = [
            'prompt' => $request->prompt,
            'n' => 1,
            'size' => $request->size
        ];

        $response = Http::withHeaders($headers)->post($apiURL, $postInput);

        $statusCode = $response->status();
        $responseBody = json_decode($response->getBody(), true);

        if ($statusCode === 200) {
            return response()->json(['message' => 'success', 'data' => $responseBody], 200);
        } else {
            return response()->json(['errors' => $responseBody], $statusCode);
        }
    }
}
