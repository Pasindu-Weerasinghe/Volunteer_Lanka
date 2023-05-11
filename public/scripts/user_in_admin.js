const BASE_URL = 'http://localhost/Volunteer_Lanka/';
const searchBar = document.querySelector(".main .search-container input");
const usersList = document.querySelector(".users-list");

searchBar.onkeyup = () => {
    let searchTerm = searchBar.value;
    let xhr = new XMLHttpRequest(); //creating XML object
    xhr.open("POST", `${BASE_URL}admin/searchUser` , true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                usersList.innerHTML = data;
            }
        }
    }
    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xhr.send("searchTerm=" + searchTerm);
}