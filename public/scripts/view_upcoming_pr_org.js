import { BASE_URL} from "../../configs/config.js";
const uid = document.querySelector('input[name="uid"]').value;
const pid = document.querySelector('input[name="pid"]').value;

//? popups ********************************************************
const editPrBtn = document.querySelector("#edit-btn");
const joinedVolunteersBtn = document.querySelector("#joined-volunteers-btn");
const cancelPrBtn = document.querySelector("#cancel-btn");
const postponePrBtn = document.querySelector("#postpone-btn");

const editPrPopup = document.querySelector("#popup-edit");
const joinedVolunteers = document.querySelector("#popup-joined-volunteers");
const cancelPopup = document.querySelector("#popup-cancel");
const postponePopup = document.querySelector("#popup-postpone");

const cancelPr = document.querySelector("#cancel-project");
const postponePr = document.querySelector("#postpone-project");

const popUpBG = document.querySelector(".popup-bg");
const popUpClose = document.querySelectorAll(".popup-close");

editPrBtn.addEventListener("click", () => {
    popUpBG.style.display = "flex";
    editPrPopup.style.display = "flex";
});

joinedVolunteersBtn.addEventListener("click", () => {
    popUpBG.style.display = "flex";
    joinedVolunteers.style.display = "flex";
});

cancelPrBtn.addEventListener("click", () => {
    popUpBG.style.display = "flex";
    cancelPopup.style.display = "flex";
    if (checkCancelPrLimit()) {
        // if pr limit not reached
    } else {
        // if pr limit reached
        cancelPr.disabled = true;
        cancelPr.style.cursor = "not-allowed";
        cancelPr.style.opacity = "0.5";
    }
});

postponePrBtn.addEventListener("click", () => {
    popUpBG.style.display = "flex";
    postponePopup.style.display = "flex";
});

popUpClose.forEach((close) => {
    close.addEventListener("click", () => {
        const popupId = close.dataset.popupId;
        const popup = document.getElementById(popupId);
        popup.style.display = "none";
        popUpBG.style.display = "none";
    });
});
//? ----------------------------------------------------------------

//? edit project **************************************************
const editPrForm = document.querySelector("#edit-pr-form");

//? ----------------------------------------------------------------

//? joined volunteers **********************************************


//? cancel project ************************************************
const cancelPrForm = document.querySelector("#cancel-pr-form");

// function to check if the project can be cancelled
// if pr limit reached -> return false
// if pr limit not reached -> return true
async function checkCancelPrLimit() {
    const url = `${BASE_URL}organizer/check_cancel_limit/${uid}`;
    try {
        const res = await fetch(url);
        const data = await res.json();
        if (data.limit === 'reached') {
            console.log('limit reached');
            return false;
        } else if (data.limit === 'not-reached') {
            console.log('limit not reached');
            return true;
        }
    } catch (err) {
        console.log(err);
        return false;
    }
}


cancelPr.addEventListener("click", () => {
    return cancelPrForm.reportValidity();
});

cancelPrForm.addEventListener("submit", (e) => {
    e.preventDefault();

    const url = `${BASE_URL}organizer/cancel_project/${pid}`;
    const formData = new FormData(cancelPrForm);
    formData.append("cancel-project", true);

    fetch(url, {
        method: "POST",
        body: formData,
    })
        .then((res) => res.json())
        .then((data) => {
            if (data.status === "success") {
                window.location.href = `${BASE_URL}organizer/`;
            } else {
                console.log(data);
            }
        })
        .catch((err) => console.log(err));
});
//? ----------------------------------------------------------------

//? postpone project ***********************************************
const postponePrForm = document.querySelector("#postpone-pr-form");

postponePr.addEventListener("click", () => {
    return postponePrForm.reportValidity();
});

postponePrForm.addEventListener("submit", (e) => {
    e.preventDefault();

    const url = `${BASE_URL}organizer/postpone_project/${pid}`;
    const formData = new FormData(postponePrForm);
    formData.append("postpone-project", true);

    fetch(url, {
        method: "POST",
        body: formData,
    })
        .then((res) => res.json())
        .then((data) => {
            if (data.status === "success") {
                window.location.href = `${BASE_URL}organizer/`;
            } else {
                console.log(data);
            }
        })
        .catch((err) => console.log(err));
});












