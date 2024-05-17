const form = document.querySelector(".login form");
const continueButton = form.querySelector(".button input");
const errorDialog = form.querySelector(".error-txt");

form.onsubmit = (e) => {
    e.preventDefault();
}

continueButton.onclick = () => {
    // Ajax
    let xhr = new XMLHttpRequest(); // creating XML object
    xhr.open("POST", "php/login.php", true);
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE)
        {
            if(xhr.status === 200)
            {
                let data = xhr.response;
                if(data == "success")
                {
                    location.href = "users.php";
                }
                else
                {
                    errorDialog.textContent = data;
                    errorDialog.style.display = "block";
                }
            }
        }
    }

    // send form data through ajax to php
    let formData = new FormData(form);
    xhr.send(formData);
}


