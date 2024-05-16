const searchInput = document.querySelector(".users .search input");
const searchButton = document.querySelector(".users .search button")

searchButton.onclick = () => {
    searchInput.classList.toggle("active");
    searchInput.focus();
    searchButton.classList.toggle("active");
}