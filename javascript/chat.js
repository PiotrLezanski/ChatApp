const typingArea = document.querySelector(".typing_area");
const inputField = typingArea.querySelector(".input-field");
const sendButton = typingArea.querySelector("button");

form.onsubmit = (e) => {
    e.preventDefault();
}

sendButton.onclick = () => {
    // Ajax
    let xhr = new XMLHttpRequest(); // creating XML object
    xhr.open("POST", "php/insert-chat.php", true);
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE)
        {
            if(xhr.status === 200)
            {
                
            }
        }
    }

    // send form data through ajax to php
    let formData = new FormData(form);
    xhr.send(formData);
}


