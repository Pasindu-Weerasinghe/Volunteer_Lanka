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
        <?php foreach($this->complaints as $complaint){ ?>
        <div id="com-box">
            <div id="com-box-item">
                <h3 id="com-box-item-uname"><?php echo $this->complain_about[$complaint['C_ID']]  ?></h3>
                <h4>Complain :</h4>
                <p><?php echo $this->complain[$complaint['C_ID']] ?></p>
                <button onclick="window.location.href='<?php echo BASE_URL . 'admin/view_complaints/' . $complaint['C_ID']; ?>'">View</button>
            </div>
        </div>
        <?php
        }
        ?>
       
        <br>
        <button onclick="history.back()" id="back-btn">Back</button>
        <br><br>
    </div>
</body>

</html>