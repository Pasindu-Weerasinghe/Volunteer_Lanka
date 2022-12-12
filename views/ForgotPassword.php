<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>

    <form action="<?php echo BASE_URL; ?>index/forgot_password/send-otp" method="post">
        <div class="container">
            <h1>Enter email</h1>
            <br>
            <label for="uname"><b>Email</b></label>
            <input type="email" name="email" placeholder="Email" required>
            <button type="submit" name="send-otp">Confirm</button>
        </div>
    </form>
</body>

</html>