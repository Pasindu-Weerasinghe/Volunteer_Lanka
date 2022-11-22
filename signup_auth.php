<?php include 'conn.php'; ?>
<!-- Registration Process -->
<?php 

if (isset($_REQUEST["signup"])){

    $role = $_REQUEST["role"];
    $email = $_REQUEST["email"];
    $psw = $_REQUEST["psw"];

    $sql = "INSERT INTO user (Email, Password, Role, Status, Restricted) values ('$email', '$psw', '$role','active', '0')";
    if ($conn->query($sql) === TRUE) {
        echo "<script> alert ('Account Created Sucessfully. Please Login');
                       window.location.href = 'login.php';
              </script>";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      } 
}
?>
<!-- Login process -->
<?php 
 ?>