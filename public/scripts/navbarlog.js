document.addEventListener("DOMContentLoaded", function() {
    var profileImage = document.querySelector(".profile-image");
    var profileDropdown = document.querySelector(".profile-dropdown");

    profileImage.addEventListener("click", function() {
        if (profileDropdown.style.display === "block") {
            profileDropdown.style.display = "none";
        } else {
            profileDropdown.style.display = "block";
        }
    });

    // Hide the dropdown when the user clicks outside of it
    document.addEventListener("click", function(event) {
        if (!profileImage.contains(event.target) && !profileDropdown.contains(event.target)) {
            profileDropdown.style.display = "none";
        }
    });
});
