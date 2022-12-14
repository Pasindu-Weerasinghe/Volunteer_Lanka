<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="sidenav/sidenav.css">
  <script defer src="sidenav/sidenav.js"></script>
</head>
<body>
    <span class="open-slide">
      <a href="#" onclick="openSideMenu()">
        <svg width="30" height="30">
            <path d="M0,5 30,5" stroke="#000" stroke-width="5"/>
            <path d="M0,14 30,14" stroke="#000" stroke-width="5"/>
            <path d="M0,23 30,23" stroke="#000" stroke-width="5"/>
        </svg>
      </a>
    </span>

  <div id="side-menu" class="side-nav">
    <a class="btn-close" onclick="closeSideMenu()">&times;</a>
    <a href="home_admin.php">Home</a>
    <a href="advertiesment_requests.php">Sponsor Advertiesment Requests</a>
    <a href="complaints.php">Complaints</a>
    <a href="create_new_admin_acc.php">Create New Account</a>
    <a href="view_payments.php">Payments</a>
    <a href="delete_user_acc.php">Search Users</a>
  </div>
</body>
</html>
