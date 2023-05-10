import {BASE_URL} from "../../configs/config.js";


const cp1 = document.querySelector("#create-project");
const cp2 = document.querySelector("#add-org-to-collab");
const cp3 = document.querySelector("#publish-sponsor-notice");
const cp4 = document.querySelector("#form-for-volunteers");

const form1 = document.querySelector("#create-project-form");
const form2 = document.querySelector("#add-org-to-collab-form");
const form3 = document.querySelector("#publish-sn-form");
const form4 = document.querySelector("#form-for-volunteers-form");

const button1 = document.querySelector("#next1");
const button2 = document.querySelector("#next2");
const button3 = document.querySelector("#next3");
const button4 = document.querySelector("#create");

// searching for organizers
const searchOrg = document.querySelector("#search-org");
const searchOrgBtn = document.querySelector("#search-org-btn");
const searchOrgResult = document.querySelector(".search-results");
const collabContainer = document.querySelector(".collaborators-container");

const addOrgSearch = document.querySelector("#add-org-srch-btn");
const popUp = document.querySelector(".popup-bg");
const popUpClose = document.querySelector(".popup-close");

let searchData = {};
let collaborators = {};

const imgs = document.querySelector("#images");
const gal = document.querySelector("#gal");
const resetImgs = document.querySelector("#resetImgs");

// back buttons
const form2back = document.querySelector("#form2-back");
const form3back = document.querySelector("#form3-back");
const form4back = document.querySelector("#form4-back");

// form data
let formData1 = null;
let formData2 = null
let formData3 = null;
let formData4 = null;

let sponsorship = null;
let partnership = null;
let imageReaders = [];


// setting minimum date
const now = new Date();
document.getElementById("date").min = now.toISOString().split("T")[0];

//? form 1 actions ************************************************************************************************
button1.addEventListener("click", (e) => {
    return form1.reportValidity();
});

form1.addEventListener("submit", (e) => {
    e.preventDefault();
    formData1 = new FormData(form1);

    for (const [key, value] of formData1) {
        console.log(key, value);
    }

    sponsorship = formData1.get("sponsorship");
    partnership = formData1.get("partnership");
    console.log(sponsorship, partnership);
    if (partnership === "collaborate") {
        //? if organizer wants to create collaborate project
        cp1.style.display = "none";
        cp2.style.display = "block";
    } else if (sponsorship === "publish-sn") {
        //? if organizer wants to publish sponsor notice
        cp1.style.display = "none";
        cp3.style.display = "block";
    } else {
        //? if organizer wants to create a no-sponsor single project
        cp1.style.display = "none";
        cp4.style.display = "block";
    }
});


//? form 2 actions ************************************************************************************************

const removeAddedCollabs = () => {
    for (let key in collaborators) {
        if (key in searchData) {
            delete searchData[key];
        }
    }
}

const convertToJSObject = (data) => {
    searchData = {};
    for (const [key, value] of Object.entries(data)) {
        searchData[value.U_ID] = value;
    }
}

const rmvCollaborator = (uid) => {
    searchData[uid] = collaborators[uid];
    delete collaborators[uid];
    viewCollaborators();
}

const viewCollaborators = () => {
    collabContainer.innerHTML = "";
    for (const [key, value] of Object.entries(collaborators)) {
        collabContainer.innerHTML += `
        <div class="row">
            <img src="${BASE_URL}public/images/profile.jpg" alt="">
            <h3>${value.Name}</h3>
            <a class="rmv-btn" onclick="rmvCollaborator(${value.U_ID})"><i class="fa-solid fa-circle-minus"></i></a>
        </div>
        `;
        // <img src="${BASE_URL}public/images/${value.Photo}" alt="">
    }
}

function addCollaborator(uid) {
    collaborators[uid] = searchData[uid];
    delete searchData[uid];
    viewSearchData();
    viewCollaborators();
}

const viewSearchData = () => {
    searchOrgResult.innerHTML = "";
    for (const [key, value] of Object.entries(searchData)) {
        searchOrgResult.innerHTML += `
        <div class="row">
            <img src="${BASE_URL}public/images/profile.jpg" alt="">
            <h3>${value.Name}</h3>
            <a class="add-btn" onclick="return addCollaborator(${value.U_ID})"><i class="fa-solid fa-circle-plus"></i></a>
        </div>
        `;
        // <img src="${BASE_URL}public/images/${value.Photo}" alt="">
    }
}


const searchAndView = () => {
    const searchOrgValue = searchOrg.value;

    fetch(`${BASE_URL}organizer/search_organizers/${searchOrgValue}`, {
        method: "post",
    })
        .then((response) => response.json())
        .then((data) => {
            convertToJSObject(data);
            removeAddedCollabs();
            viewSearchData();
        })
        .catch((error) => console.log(error));
}

// opening popup
addOrgSearch.addEventListener("click", (e) => {
    e.preventDefault();
    popUp.style.display = "flex";
    searchAndView();
});

// closing popup
popUpClose.addEventListener("click", (e) => {
    e.preventDefault();
    popUp.style.display = "none";
});

// TODO: for input, searching for organizers
searchOrg.addEventListener("input", searchAndView);

// TODO: for button, searching for organizers
searchOrgBtn.addEventListener("click", (e) => {
    e.preventDefault();
    searchAndView();
});

button2.addEventListener("click", (e) => {
    e.preventDefault();
    let collabArray = [];
    for (const key in collaborators) {
        collabArray.push(key);
    }
    collabArray = JSON.stringify(collabArray);
    formData2 = new FormData();
    formData2.append("collaborators", collabArray);

    for (const [key, value] of formData2) {
        console.log(key, value);
    }
    if (sponsorship === "publish-sn") {
        console.log('btn2-psn');
        cp2.style.display = "none";
        cp3.style.display = "block";
    } else {
        console.log('btn2-cp');
        cp2.style.display = "none";
        cp4.style.display = "block";
    }
});

form2back.addEventListener("click", (e) => {
    e.preventDefault();
    cp2.style.display = "none";
    cp1.style.display = "block";
});

//? form 3 actions ************************************************************************************************
button3.addEventListener("click", (e) => {
    e.preventDefault();
    formData3 = new FormData(form3);

    for (const [key, value] of formData3) {
        console.log(key, value);
    }

    cp3.style.display = "none";
    cp4.style.display = "block";
});

form3back.addEventListener("click", (e) => {
    e.preventDefault();
    if (partnership === "collaborate") {
        cp3.style.display = "none";
        cp2.style.display = "block";
    } else {
        cp3.style.display = "none";
        cp1.style.display = "block";
    }
});

//? form 4 actions ************************************************************************************************
button4.addEventListener("click", (e) => {
    e.preventDefault();
    formData4 = new FormData(form4);

    const formDataSubmission = new FormData();

    //? appending project data
    for (const [key, value] of formData1) {
        formDataSubmission.append(key, value);
    }

    //? if organizer wants to create collaborate project
    if (partnership === "collaborate") {
        for (const [key, value] of formData2) {
            formDataSubmission.append(key, value);
        }
    }

    //? if organizer wants to publish sponsor notice
    if (sponsorship === "publish-sn") {
        for (const [key, value] of formData3) {
            formDataSubmission.append(key, value);
        }
    }

    //? appending form for volunteers data
    for (const [key, value] of formData4) {
        formDataSubmission.append(key, value);
    }
    formDataSubmission.append("create", 'create');

    for (const [key, value] of formDataSubmission) {
        console.log(key, value);
    }

    fetch(`${BASE_URL}organizer/create_project/create`, {
        method: "post",
        body: formDataSubmission,
    })
        .then((response) => response.json())
        .then((data) => {
            console.log(data);
            window.location.href = BASE_URL;
        })
        .catch((error) => console.log(error));
});

form4back.addEventListener("click", (e) => {
    e.preventDefault();
    if (sponsorship === "publish-sn") {
        cp4.style.display = "none";
        cp3.style.display = "block";
    } else if (partnership === "collaborate") {
        cp4.style.display = "none";
        cp2.style.display = "block";
    } else {
        cp4.style.display = "none";
        cp1.style.display = "block";
    }
});

imgs.addEventListener("change", () => {
    let images = imgs.files;
    if (images.length !== 0) {
        gal.style.display = "block";
        resetImgs.style.display = "inline";
        for (let i = 0; i < images.length; i++) {
            let reader = new FileReader();
            reader.readAsDataURL(images[i]);
            reader.onload = function () {
                imageReaders.push(reader.result);
                gal.innerHTML += `<img src="${reader.result}" alt="image"/>`;
            };
        }
    } else {
        resetImgs.style.display = "none";
    }
});

resetImgs.addEventListener("click", () => {
    imgs.value = "";
    imageReaders = [];
    gal.innerHTML = "";
    resetImgs.style.display = "none";
});

window.addCollaborator = addCollaborator; // for adding collaborator
window.rmvCollaborator = rmvCollaborator; // for removing collaborator