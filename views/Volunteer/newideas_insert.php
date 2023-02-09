<?php
session_start();
if (!isset($_SESSION['uid'])) {
    header('Location: ' . BASE_URL);
}


if (isset($_REQUEST["request"])){

    $uid = $_SESSION['uid'];
    $location = $_POST['location'];
    $description = $_POST['des'];
 
    $targetDir = "images/";
    $allowTypes = array('jpg','png','jpeg','gif');

    $query = "INSERT INTO pr_ideas (Description, Location, U_ID) VALUES ('$description', '$location', '$uid')";
    $result = mysqli_query($conn, $query);

    $query2 = "SELECT PI_ID FROM pr_ideas WHERE U_ID = '$uid' && Location = '$location'";
    $result2 = mysqli_query($conn, $query2);
    $row = mysqli_fetch_array($result2);
    $idea = $row['PI_ID'];
    print($idea);

    if (!empty($_FILES["file"]["name"])) {

        $total = count($_FILES['file']['name']);
        for ($i = 0; $i < $total; $i++) {
            $fileName = $_FILES['file']['name'][$i];
            $targetFilePath = $targetDir . $fileName;
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

            if(in_array($fileType, $allowTypes)){
                if(move_uploaded_file($_FILES["file"]["tmp_name"][$i], $targetFilePath)){
                    
                    $query3 = "INSERT into idea_image (PI_ID, Image) VALUES ('".$idea."','".$fileName."')";
                    $result3 = mysqli_query($conn, $query3);
                    if($result3){
                        $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
                    }else{
                        $statusMsg = "File upload failed, please try again.";
                    } 
                }
            }else{
                $statusMsg = 'Only JPG, JPEG, PNG & GIF files are allowed to upload.';
            }
        }
    }
    echo $statusMsg;
    if ($result) {
            echo "<script> alert ('Request Sent!');</script>";
            header ("Location: newideas_volunteer.php");
    }
    
}
?>