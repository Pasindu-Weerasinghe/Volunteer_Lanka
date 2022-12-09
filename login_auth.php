<?php include 'conn.php'; ?>
<!-- Login process -->
<?php
if (isset($_REQUEST["login"])) {
    $uname = $_POST["uname"];
    $psw = $_POST["psw"];

    $sql = "SELECT * FROM user WHERE Email ='$uname'";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $hash_psw = $row['Password'];
        if (password_verify($psw, $hash_psw)) {
            $uid = $row['U_ID'];
            $email = $row['Email'];
            $role = $row['Role'];
            $status = $row['Status'];
            if ($status != 'restricted') {
                if ($role == 'admin') {
                    $_SESSION['uid'] = $uid;
                    $_SESSION['uname'] = $uname;
                    header('Location: admin_home.php');
                }
            }else {
                echo "<script> alert ('Your account is restricted!'); window.location.href = 'login.php';</script>";
            }
        }
        else{
            echo "<script> alert ('Incorrect username or password!'); window.location.href = 'login.php';</script>";
        } 
    } else {
        echo "<script> alert ('Incorrect username or password!'); window.location.href = 'login.php';</script>";
    }
}
?>