<?php 
    session_start();
    if(!isset($_SESSION['uid']))
    {
        header('Location:'.BASE_URL);
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo BASE_URL ?> public/styles/cards.css">
    <title>Home</title>
</head>

<body>
<?php include 'views/includes/navbar_log.php'; ?>

    <div class="main" id="main">

        <h2>Sponsor Notices</h2>
        <section class="container">
            
        </section>
    </div>



</body>

</html>