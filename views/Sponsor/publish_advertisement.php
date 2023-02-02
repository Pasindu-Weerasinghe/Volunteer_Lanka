<?php
session_start();
if (!isset($_SESSION['uid'])) {
    header('Location:' . BASE_URL);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo BASE_URL ?> public/styles/view.css">
    <title>Published Advertiesment</title>
</head>

<body>
<?php include 'views/includes/navbar_log.php'; ?>
    <div class="main" id="main">
        <h1>Published Advertisement</h1><br />
        <p class="p1">You can publish your company's adverisement from here. It will be sent to our admins and get published after they accept</p> <br />


        <p><strong>
                <h2>Upload Advertiesment</h2>
            </strong> </p2><br />

        <div class="container-image">
            <form action="upload_image.php" method="post" enctype="multipart/form-data">

                <label for="photo"><b>Add Photos: </b></label>
                <input type="file" name="file[]" multiple="multiple"><br /><br />
                <img class="image2" src="cards/img1.jpg"> <br><br>
                <label for="des"><b>Description: </b></label>
                <input class="des1" type="text" name="des" required>
                <!-- <p><strong>Description</strong><textarea rows="10" cols="70" name="comment" placeholder="Enter here!"></textarea> </p2><br /> -->
                <br><br><br><br><br>
                <button class="btn4"><a href="publish_advertisement.php">Cancel</a></button>
                <button class="btn4" name="request">Send Request</button>
            </form>
        </div>
     </div>
</body>

</html>