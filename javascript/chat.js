const typingArea = document.querySelector(".typing-area");
const inputField = typingArea.querySelector(".input-field");
const sendButton = typingArea.querySelector("button");

const chatBox = document.querySelector(".chat-box");

typingArea.onsubmit = (e) => {
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
                inputField.value = ""; // clear input field after message sent
            }
        }
    }

    // send form data through ajax to php
    let formData = new FormData(typingArea);
    xhr.send(formData);
}

setInterval(() => {
    // Ajax
    let xhr = new XMLHttpRequest(); // creating XML object
    xhr.open("POST", "php/get-chat.php", true); // receive data
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE)
        {
            if(xhr.status === 200)
            {
                let data = xhr.response;
                chatBox.innerHTML = data;
            }
        }
    }
    let formData = new FormData(typingArea);
    xhr.send(formData); // sending form data to php
}, 500); // thigger this function every 500ms


