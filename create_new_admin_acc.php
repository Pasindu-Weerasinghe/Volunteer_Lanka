<?php include ('Navbar/navbar.php');?>
<?php include 'conn.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Admin Accounts</title>
    <link rel="stylesheet" href="styles/create_new_admin_acc.css">
</head>
<body>

    <br><br><br>
    <div class="main">
        <h2>Create New Admin Accounts</h2>
        <div id="com-box">
            <form action="">
                <div id="box-item">
                    <div class="box-item-cus">
                        <label for="">Name :</label>
                        <input type="text"><br>
                    </div>

                    <div class="box-item-cus">
                        <label for="">email :</label>
                        <input type="text"><br>
                    </div>

                    <div class="box-item-cus">
                        <label for="">Password :</label>
                        <input type="password"><br>
                    </div>

                    <div class="box-item-cus">
                        <label for="">Confirm Password :</label>
                        <input type="password"><br>
                    </div>

                    <div class="box-item-cus">
                        <label for="">Role :</label>
                            <select>
                                <option value="organizer">Organizer</option>
                                <option value="volunteer">Volunteer</option>
                                <option value="sponsor">Sponsor</option>
                                <option value="sponsor">Admin</option>
                            </select>
                    </div>
                        
                        
                        
                        
                        
                </div>
            </form>
        </div>
    </div>
</body>
</html>