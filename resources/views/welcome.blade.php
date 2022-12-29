<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        @vite(['resources/css/app.css',
                'resources/css/style.css',
                'resources/css/spinner.css',
                'resources/js/app.js',
                'resources/js/main.js'])
        <title>OpenAI Image Generator</title>
    </head>
    <body>
    <header>
        <div class="navbar">
            <div class="logo">
                <h2>OpenAI Image Generator</h2>
            </div>
            <div class="nav-links">
                <ul>
                    <li>
                        <a href="https://beta.openai.com/docs" target="_blank"
                        >OpenAI API Docs</a
                        >
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <main>
        <section class="showcase">
            <form id="image-form">
                <h1>Describe An Image</h1>
                <div class="form-control">
                    <input type="text" id="prompt" placeholder="Enter Text" />
                </div>
                <!-- size -->
                <div class="form-control">
                    <select name="size" id="size">
                        <option value="small">Small</option>
                        <option value="medium" selected>Medium</option>
                        <option value="large">Large</option>
                    </select>
                </div>
                <button type="submit" class="btn">Generate</button>
            </form>
        </section>

        <section class="image">
            <div class="image-container">
                <h2 class="msg"></h2>
                <img src="" alt="" id="image" />
            </div>
        </section>
    </main>

    <div class="spinner"></div>
    </body>
</html>
