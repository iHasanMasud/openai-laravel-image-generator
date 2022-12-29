function onSubmit(e){
    e.preventDefault();

    document.querySelector('.msg').textContent = '';
    document.querySelector('#image').src = '';

    const prompt = document.querySelector('#prompt').value;
    const size = document.querySelector('#size').value;

    if (prompt === ''){
        alert('Please enter a prompt');
        return;
    }

    generateImageRequest(prompt, size);
}

async function generateImageRequest(prompt, size){
    try{
        showSpinner();
        const response = await fetch('/api/generate-image', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ prompt, size })
        });
        if (!response.ok){
            removeSpinner();
            throw new Error('That image could not be generated');
        }
        const data = await response.json();
        //console.log(data);

        const imageUrl = data.data.data.url;
        document.querySelector('#image').src = imageUrl;

        removeSpinner();
    }catch (error){
        removeSpinner();
        document.querySelector('.msg').textContent = error;
        console.error(error);
    }
}

function showSpinner(){
    document.querySelector('.spinner').classList.add('show');
}
function removeSpinner(){
    document.querySelector('.spinner').classList.remove('show');
}

document.querySelector('#image-form').addEventListener('submit', onSubmit)