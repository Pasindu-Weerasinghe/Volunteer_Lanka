<!DOCTYPE html>
<html lang="en">

<?php 
   //  session_start();
    if (!isset($_SESSION['uid'])) {
        header('Location: ' . BASE_URL);
    }

?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/styles/chat.css">
    <script defer src="<?php echo BASE_URL; ?>public/scripts/users.js"></script>
    <title>Chat</title>
</head>

<body>
    <?php
    //print_r($this->user);
    ?>
    <div class="wrapper">
        <section class="users">
            <header>
                <div class="content">
                    <img src="images/" alt="">
                    <div class="details">
                        <span><?php echo $this->user['Email'] ?></span>
                        <p></p>
                    </div>
                </div>
            </header>
            <div class="search">
                <span class="text">Select an user to start chat</span>
                <input type="text" class="" placeholder="Enter name to search...">
                <button><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
            <div class="users-list">
                              
            </div>
           
        </section>
    </div>
    <script>
        const role = "<?php echo $_SESSION['role'] ?>"
    </script>
</body>

</html>