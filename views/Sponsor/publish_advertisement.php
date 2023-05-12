<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'views/includes/head-includes-log.php'; ?>
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/styles/popup.css">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/styles/form.css">
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
    <title>Published Advertiesment</title>
</head>

<body>
    <?php include 'views/includes/navbar_log.php'; ?>
    <div class="main" id="main">
        <h1>Publish Advertisement</h1><br />
        <p class="p1">You can publish your company's adverisement from here. It will be sent to our admins and get published after they accept</p> <br />
        <div class="container-image">
            <form id="form2">
                <strong>
                    <h2>Upload Advertisement</h2>
                </strong> <br />
                <hr>
                <label for="photo"><b>Add Photos: </b></label>
                <input type="file" name="file[]" multiple="multiple" required><br /><br><br>

                <label for="des"><b>Description: </b></label>
                <input class="des" type="text" name="des" required>
                <!-- <p><strong>Description</strong><textarea rows="10" cols="70" name="comment" placeholder="Enter here!"></textarea> </p2><br /> -->
                <br><br><br>
                <button onclick="history.back()" class="btn">Cancel</button>
                <button class="btn" name="request" id="request">Send Request</button>
            </form>
        </div>
    </div>

    <div class="popup-bg"   >
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

    const sendRequestBtn = document.getElementById('request');
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
        const url = BASE_URL + `Sponsor/uploadAdvertisement/${<?php echo $this->pid ?>}`
        fetch(url, {
                method: "post",
                body: formData
            }).then(res => res.json())
            .then(reply => {
                console.log(reply);
                popupBg.style.display = 'flex';
                popup.style.display = 'flex';
                if (reply.success) {
                    popupMessage.innerHTML = "Published successfully";
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