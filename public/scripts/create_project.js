const cp1 = document.querySelector("#create-project");
const cp4 = document.querySelector("#form-for-volunteers");

const form1 = document.querySelector("#create-project-form");
const form4 = document.querySelector("#form-for-volunteers-form");


const button1 = document.getElementById("next");
const button4 = document.querySelector("#create");
const imgs = document.querySelector("#images");
const gal = document.querySelector("#gal");
const resetImgs = document.querySelector("#resetImgs");
const form2back = document.querySelector("#form2-back");
// for (const [key, value] of formData) {
	// 	output.textContent += `${key}: ${value}\n`;
	// }
let imageReaders = [];
const formDataSubmission = new FormData();

// setting minimum date and time
const now = new Date();
document.getElementById("date").min = now
	.toISOString()
	.split("T")[0];

// const hours = now.getHours().toString().padStart(2, "0");
// const minutes = now.getMinutes().toString().padStart(2, "0");
// document.getElementById("time").min = `${hours}:${minutes}`;

button1.addEventListener("click", (e) => {
	cp1.style.display = "none";
	cp4.style.display = "block";
	const formData = new FormData(form1);
	for (const [key, value] of formData) {
		formDataSubmission.append(key, value);
	}
});

button4.addEventListener("click", (e) => {
	// cp1.style.display = "none";
	// cp4.style.display = "block";
	const formData = new FormData(form4);
	for (const [key, value] of formData) {
		formDataSubmission.append(key, value);
	}
	formDataSubmission.append("images", imageReaders);
	formDataSubmission.append("create", true);
	// for (const [key, value] of formDataSubmission) {
	//     console.log(key, value);
	// }

	fetch("http://localhost/Volunteer_Lanka/organizer/create_project2", {
		method: "post",
		body: formDataSubmission,
	})
		.then((response) => response.text())
		.then((data) => {
			console.log(data);
		})
		.catch((error) => console.log(error));

	imageReaders.forEach((image) => {
		let imageForm = new FormData();
		imageForm.append("image", image);
		fetch("http://localhost/Volunteer_Lanka/organizer/set_proj_images", {
			method: "post",
			body: imageForm,
		})
			.then((response) => response.text())
			.then((data) => {
				console.log(data);
				finishedMessage();
			})
			.catch((error) => console.log(error));
	});
});

const finishedMessage = () => {
	fetch("http://localhost/Volunteer_Lanka/organizer/finished");
};

form2back.addEventListener("click", () => {
	cp4.style.display = "none";
	cp1.style.display = "block";
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
