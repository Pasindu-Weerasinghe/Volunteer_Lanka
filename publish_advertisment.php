<?php include 'Navbar/navbar.php';
include 'conn.php';
if (isset($_FILES['upload_file'])) {
    move_uploaded_file($_FILES["upload_file"]["tmp_name"], $_FILES["upload_file"]["name"]);
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/view.css">
    <title>Published Advertiesment</title>
</head>

<body>
    <br />
    <h2>Published Advertiesment</h2><br />
    <p>You can publish your company’s adverisement from here. It will be sent to our admins and get published after they accept</p> <br />


    <p><strong>Upload Advertiesment</strong> </p2><br />

    <div class="container-image">
        <div class="vertically-center">

            <form name="from_file_upload" action="upload.php" method="post" enctype="multipart/form-data">
                <div class="input-row">
                    <input type="file" name="upload_file">
                </div>
                <input type="submit" name="upload" value="Upload File">
            </form>

        </div>

        <img src="cards/img1.jpg">
    </div>


    <br>
    <p><strong>Description</strong><textarea rows="10" cols="70" name="comment" placeholder="Enter here!"></textarea> </p2><br />
    <div class="silver">

    </div>
    <div>
        <br><br><br><br><br>
        <button class="btn1"><a href="publish_advertisment.php">Cancel</a></button>
        <button class="btn2"><a href="publish_advertisment.php">Send Request</a></button>
    </div>





</body>

</html>