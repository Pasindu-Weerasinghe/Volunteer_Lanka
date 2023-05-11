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
        <?php
        foreach ($this->complaints as $complaint){
        ?>
            <div id="c-box">
                <div id="c-box-item" >
                    <h3 id="uname"><?php echo  $this->complain_userName[$complaint['C_ID']] ?></h3>
                    <button onclick="window.location.href='<?php echo BASE_URL . 'admin/view_complaints/' . $complaint['C_ID']; ?>'" id="c-view-btn">View</button>
                </div>
                <h4 id="c-box-des"><?php echo $this->complain_about[$complaint['C_ID']]  ?></h4>
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