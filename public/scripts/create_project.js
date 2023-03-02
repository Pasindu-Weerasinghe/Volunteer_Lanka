import {BASE_URL} from "../../configs/config.js";


const cp1 = document.querySelector("#create-project");
const cp2 = document.querySelector("#add-org-to-collab");
const cp3 = document.querySelector("#publish-sponsor-notice");
const cp4 = document.querySelector("#form-for-volunteers");

const form1 = document.querySelector("#create-project-form");
const form2 = document.querySelector("#create-project-form");
const form3 = document.querySelector("#publish-sn-form");
const form4 = document.querySelector("#form-for-volunteers-form");

const button1 = document.querySelector("#next");
const button2 = document.querySelector("#next2");
const button3 = document.querySelector("#next3");
const button4 = document.querySelector("#create");

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


// setting minimum date and time
const now = new Date();
document.getElementById("date").min = now.toISOString().split("T")[0];

// const hours = now.getHours().toString().padStart(2, "0");
// const minutes = now.getMinutes().toString().padStart(2, "0");
// document.getElementById("time").min = `${hours}:${minutes}`;

//? form 1 actions
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

//? buttons of form 2
button2.addEventListener("click", (e) => {
    e.preventDefault();
    formData2 = new FormData(form2);
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

//? buttons of form 3
button3.addEventListener("click", (e) => {
    e.preventDefault();
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

//? buttons of form 4
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

    fetch(BASE_URL + "organizer/create_project/create", {
        method: "post",
        body: formDataSubmission,
    })
        .then((response) => response.json())
        .then((data) => {
            console.log(data);
            window.location.href = BASE_URL + "organizer/create_project";
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
        resetImgs.style.display = "inline";
        for (let i = 0; i < images.length; i++) {
            let reader = new FileReader();
            reader.readAsDataURL(images[i]);
            reader.onload = function () {
                imageReaders.push(reader.result);
                gal.innerHTML += `<img src="${reader.result}" alt="image" style="width:100px;"/>`;
            };
        }
    } else {
        resetImgs.style.display = "none";
    }
});

resetImgs.addEventListener("click", () => {
    imageReaders = [];
    gal.innerHTML = "";
});
