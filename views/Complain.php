<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'views/includes/head-includes-log.php'; ?>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/styles/form.css">
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
    <title>Complain</title>
</head>

<body>
    <?php include 'views/includes/navbar_log.php'; ?>

    <div id="main" class="main">
        <h2>Complain to Admin</h2><br />
        <h3>Your complaint will be considered by one of our admins. Do not provide false information in the below form.</h3>
        <form id="form2">
            <div class="container">
                <h3>Send us your complaint</h3><br>
                <hr>

                <label for="uname"><b>Username</b></label>
                <input type="text" name="uname" value=<?php echo ($_SESSION['uname']) ?> readonly>

                <label for="about"><b>Complain about</b></label>
                <input type="text" name="about" required>

                <label for="des"><b>Description</b></label>
                <input type="text" class="des" name="des" required><br /><br />

                <button class="btn">Cancel</button>
                <button class="btn" name="complain" id="complain-btn">Complain</button>

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

    <?php include 'views/includes/footer.php'; ?>
</body>
<script>
    const BASE_URL = "<?php echo BASE_URL ?>";

    const sendRequestBtn = document.getElementById('complain-btn');
    const requestForm = document.getElementById('form2');

    // popup elements
    const popupBg = document.querySelector('.popup-bg');
    const popup = document.querySelector('.popup');
    const popupClose = document.querySelector('.popup-close');
    const popupMessage = document.querySelector('#message');

    sendRequestBtn.addEventListener('click', function() {
        return requestForm.reportValidity();
    });

    requestForm.addEventListener('submit', function(e) {
        e.preventDefault();
        const formData = new FormData(requestForm);
        const role = "<?php echo $_SESSION['role'] ?>"
        const url = BASE_URL + `${role}/setComplain`
        fetch(url, {
                method: "post",
                body: formData
            }).then(res => res.json())
            .then(reply => {
                console.log(reply);
                popupBg.style.display = 'flex';
                popup.style.display = 'flex';
                if (reply.success) {
                    popupMessage.innerHTML = "Your complain send to admin";
                } else {
                    popupMessage.innerHTML = "Error occured";
                }
            })
    });

    popupClose.addEventListener('click', function() {
        popupBg.style.display = 'none';
        popup.style.display = 'none';
        window.location.href = BASE_URL + 'Sponsor';
    });
</script>

</html>