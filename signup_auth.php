<?php include 'conn.php'; ?>
<!-- Registration Process -->
<?php

if (isset($_REQUEST["signup"])) {

  $role = $_REQUEST["role"];
  $email = $_REQUEST["email"];
  $psw = password_hash( $_REQUEST["psw"],PASSWORD_BCRYPT);

  $sql = "INSERT INTO user (Email, Password, Role, Status, Restricted) values ('$email', '$psw', '$role','active', '0')";
  $result = mysqli_query($conn, $sql);

  if ($result) {
    echo "<script> alert ('Account Created Sucessfully. Please Login');
                       window.location.href = 'login.php';
              </script>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
?>