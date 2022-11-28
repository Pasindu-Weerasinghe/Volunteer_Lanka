<?php include ('Navbar/navbar.php'); ?>
<?php include 'conn.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Advertiesment Requests</title>
    <link rel="stylesheet" href="styles/view_ad_req.css">
</head>
<body>
    <br><br><br>
    <div class="main">
        <h2>View Advertiesment Requests</h2>
            <div id="ad-req-box">
                <div class="name">
                    <h3 class="name-item">Sponsor Name:</h3>
                    <h3 style="padding-top: 30px;">Virtusa Pvt ltd</h3>
                </div>
                <div class="name"> 
                    <h3 class="name-item">Advertiesment:</h3>
                    <div id="ad-box-item">
                            <img id="ad-box-img" src="images/beach.jpg" alt="">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti, 
                                nam excepturi est placeat molestiae cupiditate, rerum ex tenetur maxime, 
                                dolorum natus itaque. Rerum facere facilis molestias minus similique quasi veritatis.</p>
                    </div>
                </div>
                
            </div>
            <br>
            <div id="btn-area">
                <button class="btn">Reject</button>
                <button class="btn">Accept</button>
            </div>
            <br>
    </div>
</body>
</html>