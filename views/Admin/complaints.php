<?php

session_start();
if (!isset($_SESSION['uid'])) {
    header('Location: ' . BASE_URL);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaints</title>
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/styles/complaints.css">
</head>

<body>
<?php include 'views/includes/navbar_log.php'; ?>
    <br><br><br>
    <div class="main" id="main">
        <h2>Complaints</h2>
        <div id="com-box">
            <div id="com-box-item">
                <h3 id="com-box-item-uname">Leo Club Gampha</h3>
                <h4>Complain :</h4>
                <p>I am writing to report a user on your system who has been behaving inappropriately. The user's username is Rotract Club Galle.
                    I have included evidence of their behavior below and screenshots or other evidence.
                    I believe that this behavior is in violation of your terms of service and I request that you take appropriate action.
                    Thank you for your attention to this matter.</p>
                <button>View</button>
            </div>
        </div>
        <div id="com-box">
            <div id="com-box-item">
                <h3 id="com-box-item-uname">Rotract Club Kurunegala</h3>
                <h4>Complain :</h4>
                <p>I am writing to bring to your attention a user on the forum who has been posting offensive and inappropriate content. The user's username is [Username] and their posts can be found in the following thread:<a>Link</a>.

                    In their posts, the user has made [describe the offensive or inappropriate content]. This kind of content is not acceptable on our forum and I request that you take action to remove the posts and warn the user.
                </p>
                <button>View</button>
            </div>
        </div>
        <br>
        <button onclick="history.back()" id="back-btn">Back</button>
        <br><br>
    </div>
</body>

</html>