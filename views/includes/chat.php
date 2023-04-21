<!DOCTYPE html>
<html lang="en">
<?php
session_start();
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
    <script src="<?php echo BASE_URL; ?>public/scripts/chat.js" async></script>
    <title>Chat</title>
</head>

<body>
    <div class="wrapper">
        <section class="chat-area">
            <header>
                
                <a onclick="history.back()"  class="back-icon"><i class="fa-solid fa-arrow-left"></i></a>
                <img src="http://localhost/Volunteer_Lanka//public/images/profile.jpg" alt="">
                <div class="details">
                    <span><?php echo $this->user['Name'] ?></span>
                    <p></p>
                </div>
            </header>
            <div class="chat-box">
                
               
            </div>
            <form action="#" class="typing-area" autocomplete="off">
                <input type="text" name="outgoing_id" value="<?php echo $_SESSION['uid']; ?>" hidden>
                <input type="text" name="incoming_id" value="<?php echo $this->user_id ?>" hidden>
                <input type="text" name="message" class="input-field" placeholder="Type a message here...">
                <button><i class="fa-solid fa-paper-plane"></i></button>
            </form>
        </section>
    </div>
</body>

</html>