<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'views/includes/head-includes-log.php'; ?>
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/styles/form.css">
    <title>Request</title>
</head>

<body>
    <?php include 'views/includes/navbar_log.php'; ?>
    <div id="main" class="main">
        <h3>Request to Organize Projects</h3><br /><br />
        <p>As a volunteer you are able to inform the organizers about your ideas to arrange new volunteering projects. You can send a request to all the organizers by submitting this form.
            <br /><br />Please provide reliable information.
        </p>

        <form action="<?php echo BASE_URL; ?>volunteer/insert_Ideas" method="post" enctype="multipart/form-data" id="form2">
            <div class="container">
                <p>Let us know of the opportunities</p>
                <hr>
                
                <?php if ($this->statusMsg != NULL) { ?>
                    <p id="error">
                   <?php echo $this->statusMsg; ?>
                </p>
                <?php } ?>
                </p><br>
                <label for="uname"><b>Username</b></label>
                <label id="require"><strong>*</strong></label>
                <input type="text" name="uname" value=<?php echo ($_SESSION['uname']) ?> readonly>

                <label for="location"><b>Location</b></label>
                <label id="require"><strong>*</strong></label>
                <input type="text" name="location" required>

                <label for="des"><b>Description</b></label>
                <label id="require"><strong>*</strong></label>
                <textarea name="des" class="des" required></textarea><br /><br />

                <label for="photo"><b>Add Photos</b></label>
                <label id="require"><strong>*</strong></label>
                <input type="file" name="file[]" multiple="multiple"><br /><br />

                <button class="btn" onclick="history.back()">Back</button>
                <button class="btn" name="request" id="request">Request</button>
            </div>
        </form>
    </div>
</body>

</html>