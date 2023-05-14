<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'views/includes/head-includes-log.php'; ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/styles/profile.css" text="text/css">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/styles/popup.css">

    <style>
        .popup {
            min-height: auto;
            height: auto;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 60px 30px 30px 30px;
        }

        .popup #message {
            font-weight: normal;
        }
    </style>

    <title>Edit Profile </title>
</head>

<body>
    <?php include 'views/includes/navbar_log.php' ?>
    <div class="main" id="main">
        <div class="form1">
            <div class="left-container">
                <h2 id="lc"><?php echo $this->user['Name']; ?></h2>
                <img class="image" src="<?php echo BASE_URL ?>public/images/profile_images/<?php echo $this->profile['Photo'] ?>" alt=""><br><br>
                <form class="column1" id="updatePic">

                    <h3><i class="fa-solid fa-pen-to-square fa-lg"></i> Add Image</h3>
                    <div class="btn-area">
                        <input type="file" name="profilepic" class="btn" style="font-size: small">
                        <input type="submit" value="Save" class="btn" name="save">
                    </div>

                </form>
            </div>
            <div class="popup-bg">
                <div class="popup popup-message">
                    <!--close button-->
                    <div class="popup-close"><i class="fa-solid fa-xmark"></i></div>
                    <h2 id="message"></h2>
                </div>
            </div>

            <form id="lc2" class="right-container">

                <input type="hidden" name="uid" value="<?php echo $_SESSION['uid'] ?>">

                <label for="uname"><b>E-Mail</b></label><br>
                <input type="text" name="email" value="<?php echo $this->profile['Email'] ?>" readonly><br>

                <label for="uname"><b>Name</b></label><br>
                <input type="text" name="uname" value="<?php echo $this->user['Name']; ?>" required> <br>

                <label for=" about"><b>Contact Number</b></label><br>
                <input type="text" name="cNumber" value="<?php echo $this->user['Contact']; ?>" required><br>

                <label for="des"><b>Address</b></label><br>
                <input type="text" name="address" value="<?php echo $this->user['Address']; ?>" required><br>

                <div class="btn-area">
                    <button class="btn" id="upbtn" name="update"> Update Profile</a></button>
                </div>
            </form>

        </div>

    </div>
    <div class="popup-bg">
        <div class="popup popup-message">
            <!--close button-->
            <div class="popup-close"><i class="fa-solid fa-xmark"></i></div>
            <h2 id="message"></h2>
        </div>
    </div>

</body>

<script>
    const BASE_URL = "<?php echo BASE_URL ?>";

    const sendRequestBtn1 = document.getElementById('name');
    const requestForm1 = document.getElementById('updatePic');

    const sendRequestBtn = document.getElementById('update');
    const requestForm = document.getElementById('lc2');

    const popupBg = document.querySelector('.popup-bg');
    const popup = document.querySelector('.popup');
    const popupClose = document.querySelector('.popup-close');
    const popupMessage = document.querySelector('#message');


    requestForm1.addEventListener('submit', function(e) {
        e.preventDefault();
        const formData = new FormData(requestForm1);
        const role = "<?php echo $_SESSION['role'] ?>"
        const url = BASE_URL + `${role}/changeProfilePic`
        fetch(url, {
                method: "post",
                body: formData
            }).then(res => res.json())
            .then(reply => {
                console.log(reply);
                popupBg.style.display = 'flex';
                popup.style.display = 'flex';
                if (reply.success) {
                    popupMessage.innerHTML = "Successfully updated your profile picture";
                }
                else {
                    popupMessage.innerHTML = "Uploaded unsuccessfully. Please try again";
                }
            })
    });

    requestForm.addEventListener('submit', function(e) {
        e.preventDefault();
        const formData = new FormData(requestForm);
        const role = "<?php echo $_SESSION['role'] ?>"
        const url = BASE_URL + `${role}/updateProfile`
        fetch(url, {
                method: "post",
                body: formData
            }).then(res => res.json())
            .then(reply => {
                console.log(reply);
                popupBg.style.display = 'flex';
                popup.style.display = 'flex';
                if (reply.success) {
                    popupMessage.innerHTML = "Successfully updated your profile details";
                }
                else {
                    popupMessage.innerHTML = "Error occured";
                }
            })
    });

    popupClose.addEventListener('click', function() {
        popupBg.style.display = 'none';
        popup.style.display = 'none';
        window.location.href = BASE_URL + 'Sponsor/profile';
    });
</script>

</html>