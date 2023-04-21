const BASE_URL = 'http://localhost/Volunteer_Lanka/';
const ROLE = document.querySelector('input[name="role"]').value;
const searchBar = document.querySelector(".users .search input"),
    searchBtn = document.querySelector(".users .search button"),
    usersList = document.querySelector(".users .users-list");

searchBtn.onclick = () => {
    searchBar.classList.toggle("active");
    searchBar.focus();
    searchBtn.classList.toggle("active");
    searchBar.value="";
}
searchBar.onkeyup = () => {
    let searchTerm = searchBar.value;
    if (searchTerm != "") {
       searchBar.classList.add("active");
    }else{
        searchBar.classList.remove("active");
    }
    let xhr = new XMLHttpRequest(); //creating XML object
    xhr.open("POST", `${BASE_URL}${ROLE}/searchUser` , true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                usersList.innerHTML = data;
                //console.log(data);
            }
        }
    }
    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xhr.send("searchTerm=" + searchTerm);
}

setInterval(() => {
    let xhr = new XMLHttpRequest(); //creating XML object
    xhr.open("GET", `${BASE_URL}${ROLE}/setAlluserstochat`, true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if(!searchBar.classList.contains("active")){
                    usersList.innerHTML = data;
                    //console.log(data);
                }
            }
        }
    }
    xhr.send();
}, 500);