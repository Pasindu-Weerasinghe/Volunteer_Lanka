const cp1 = document.querySelector("#create-project");
const cp2 = document.querySelector("#add-org-to-collab");
const cp3 = document.querySelector("#publish-sponsor-notice");
const cp4 = document.querySelector("#form-for-volunteers");

const form1 = document.querySelector("#create-project-form");
const form2 = document.querySelector("#create-project-form");
const form3 = document.querySelector("#publish-sn-form");
const form4 = document.querySelector("#form-for-volunteers-form");

const button1 = document.getElementById("next");
const button2 = document.getElementById("next2");
const button3 = document.getElementById("next3");
const button4 = document.querySelector("#create");

const imgs = document.querySelector("#images");
const gal = document.querySelector("#gal");
const resetImgs = document.querySelector("#resetImgs");

// back buttons
const form2back = document.querySelector("#form2-back");
const form3back = document.querySelector("#form3-back");
const form4back = document.querySelector("#form4-back");

let sponsorship = null;
let partnership = null;
let imageReaders = [];
let formDataSubmission = new FormData();

// setting minimum date and time
const now = new Date();
document.getElementById("date").min = now.toISOString().split("T")[0];

// const hours = now.getHours().toString().padStart(2, "0");
// const minutes = now.getMinutes().toString().padStart(2, "0");
// document.getElementById("time").min = `${hours}:${minutes}`;

//? buttons of form 1
button1.addEventListener("click", (e) => {
	const formData = new FormData(form1);
	for (const [key, value] of formData) {
		formDataSubmission.append(key, value);
	}

	for (const [key, value] of formDataSubmission) {
		console.log(key, value);
	}

	sponsorship = formData.get("sponsorship");
	partnership = formData.get("partnership");
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
	// const formData = new FormData(form2);
	// for (const [key, value] of formData) {
	// 	formDataSubmission.append(key, value);
	// }
	if (sponsorship == "publish-sn") {
		console.log('btn2-psn');
		cp2.style.display = "none";
		cp3.style.display = "block";
	} else {
		console.log('btn2-cp');
		cp2.style.display = "none";
		cp4.style.display = "block";
	}
});

form2back.addEventListener("click", () => {
	cp2.style.display = "none";
	cp1.style.display = "block";
});

//? buttons of form 3
button3.addEventListener("click", (e) => {
	const formData = new FormData(form3);
	for (const [key, value] of formData) {
		formDataSubmission.append(key, value);
	}
	cp3.style.display = "none";
	cp4.style.display = "block";
});

form3back.addEventListener("click", () => {
	if (partnership == "collaborate") {
		cp3.style.display = "none";
		cp2.style.display = "block";
	} else {
		cp3.style.display = "none";
		cp1.style.display = "block";
	}
});

//? buttons of form 4
form4back.addEventListener("click", () => {
	console.log("back4");
	if (sponsorship == "publish-sn") {
		cp4.style.display = "none";
		cp3.style.display = "block";
	} else if (partnership == "collaborate") {
		cp4.style.display = "none";
		cp2.style.display = "block";
	} else {
		cp4.style.display = "none";
		cp1.style.display = "block";
	}
});

button4.addEventListener("click", (e) => {
	const formData = new FormData(form4);
	for (const [key, value] of formData) {
		formDataSubmission.append(key, value);
	}
	formDataSubmission.append("create", true);
	// for (const [key, value] of formDataSubmission) {
	//     console.log(key, value);
	// }

	fetch("http://localhost/Volunteer_Lanka/organizer/create_project/create", {
		method: "post",
		body: formDataSubmission,
	})
		.then((response) => response.text())
		.then((data) => {
			console.log(data);
		})
		.catch((error) => console.log(error));
});


imgs.addEventListener("change", () => {
	let images = imgs.files;
	if (images.length != 0) {
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
