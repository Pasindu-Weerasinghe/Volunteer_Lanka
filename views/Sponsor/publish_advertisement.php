<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'views/includes/head-includes-log.php'; ?>
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/styles/form.css">
    <title>Published Advertiesment</title>
</head>

<body>
    <?php include 'views/includes/navbar_log.php'; ?>
    <div class="main" id="main">
        <h1>Publish Advertisement</h1><br />
        <p class="p1">You can publish your company's adverisement from here. It will be sent to our admins and get published after they accept</p> <br />
        <div class="container-image">
            <form action="<?php echo BASE_URL; ?>Sponsor/uploadAdvertisement" method="post" enctype="multipart/form-data" id="form2">
                <strong>
                    <h2>Upload Advertisement</h2>
                </strong> <br />
                <hr>
                <label for="photo"><b>Add Photos: </b></label>
                <input type="file" name="file[]" multiple="multiple"><br /><br><br>

                <label for="des"><b>Description: </b></label>
                <input class="des" type="text" name="des" required>
                <!-- <p><strong>Description</strong><textarea rows="10" cols="70" name="comment" placeholder="Enter here!"></textarea> </p2><br /> -->
                <br><br><br>
                <button onclick="history.back()" class="btn">Cancel</button>
                <button class="btn" name="request" id="request">Send Request</button>
            </form>
        </div>
    </div>
    <?php include 'views/includes/footer.php'; ?>
</body>

</html>