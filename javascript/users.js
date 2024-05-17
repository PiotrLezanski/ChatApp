const searchInput = document.querySelector(".users .search input");
const searchButton = document.querySelector(".users .search button");
const userList = document.querySelector(".users .users-list");

searchButton.onclick = () => {
    searchInput.classList.toggle("active");
    searchInput.focus();
    searchButton.classList.toggle("active");
    searchInput.value = "";
}

searchInput.onkeyup = () => {
    let searchTerm = searchInput.value;

    // adding "active" when user start searching, to stop setInterval
    if(searchTerm != "")
    {
        searchInput.classList.add("active");
    }
    else
    {
        searchInput.classList.remove("active");
    }

    // Ajax
    let xhr = new XMLHttpRequest(); // creating XML object
    xhr.open("POST", "php/search.php", true); // receive data
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE)
        {
            if(xhr.status === 200)
            {
                let data = xhr.response;
                userList.innerHTML = data;
            }
        }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("searchTerm=" + searchTerm); // sending user search term to php with AJAX
}

setInterval(() => {
    // Ajax
    let xhr = new XMLHttpRequest(); // creating XML object
    xhr.open("GET", "php/users.php", true); // receive data
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE)
        {
            if(xhr.status === 200)
            {
                let data = xhr.response;
                if(!searchInput.classList.contains("active"))
                {
                    userList.innerHTML = data;
                }
            }
        }
    }
    xhr.send();
}, 500); // thigger this function every 500ms
