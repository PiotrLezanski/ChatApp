const form = document.querySelector(".signup form");
const continueButton = form.querySelector(".button input");
const errorDialog = form.querySelector(".error-txt");

form.onsubmit = (e) => {
    e.preventDefault();
}

continueButton.onclick = () => {
    // Ajax
    let xhr = new XMLHttpRequest(); // creating XML object
    xhr.open("POST", "php/signup.php", true);
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE)
        {
            if(xhr.status === 200)
            {
                let data = xhr.response;
                if(data == "success")
                {

                }
                else
                {
                    errorDialog.textContent = data;
                    errorDialog.style.display = "block";
                    console.log(data);
                }
            }
        }
    }

    // send form data through ajax to php
    let formData = new FormData(form);
    xhr.send(formData);
}


