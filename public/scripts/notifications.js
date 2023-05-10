import {BASE_URL} from "../../configs/config.js";

const uid = document.querySelector('input[name="uid"]').value;
const role = document.querySelector('input[name="role"]').value;

const wrapper = document.querySelector('.wrapper');
const clearAllBtn = document.querySelector('#delete-all-notifications');

getNotifications();
// setInterval(() => {
//     getNotifications();
// }, 10000);

function getNotifications() {
    wrapper.innerHTML = '';

    fetch(`${BASE_URL}${role}/notifications/get-all`)
        .then(response => response.json())
        .then(notifications => {
            console.log(notifications);
            notifications.forEach(notification => {
                let content = '';
                content += `<section class="notification">
                                        <p>${notification.Message}</p>`;
                if (notification.Type === 'collab-req') {
                    content += `<div class="btn-area">
                                                <button class="accept" onclick="acceptCollabReq(${notification.Event_ID})">Accept</button>
                                                <button class="reject" onclick="rejectCollabReq(${notification.Event_ID})">Reject</button>
                                          
                                          </div> </section>`;
                }
                if (notification.Type === null) {
                    content += `<div class="btn-area">
                                                   <button class="delete" onclick="deleteNotification(${notification.Notify_ID})">
                                                        <i class="fa-solid fa-trash"></i>
                                                   </button>
                                          </div> </section>`;
                }
                wrapper.innerHTML += content;
            });

        })
        .catch(error => console.log(error));
}

function acceptCollabReq(eventID) {
    fetch(`${BASE_URL}${role}/notifications/collab_req/accept/${eventID}`)
        .then(response => response.json())
        .then(result => {
            if (result) {
                getNotifications();
            }
        })
        .catch(error => console.log(error));
}

function rejectCollabReq(eventID) {
    fetch(`${BASE_URL}${role}/notifications/collab_req/reject/${eventID}`)
        .then(response => response.json())
        .then(result => {
            if (result) {
                getNotifications();
            }
        })
        .catch(error => console.log(error));
}

function deleteNotification(notificationID) {
    fetch(`${BASE_URL}${role}/notifications/delete/${notificationID}`)
        .then(response => response.json())
        .then(result => {
            if (result) {
                getNotifications();
            }
        })
        .catch(error => console.log(error));
}

clearAllBtn.addEventListener('click', () => {
   fetch(`${BASE_URL}${role}/notifications/delete-all`))
});

window.acceptCollabReq = acceptCollabReq;
window.rejectCollabReq = rejectCollabReq;
window.deleteNotification = deleteNotification;