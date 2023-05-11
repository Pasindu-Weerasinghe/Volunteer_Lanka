<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="<?php echo BASE_URL ?>public/styles/sidenav.css">
  <script defer src="<?php echo BASE_URL ?>public/scripts/sidenav.js"></script>
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
    <a href="<?php echo BASE_URL ?>admin">Home</a>
    <a href="<?php echo BASE_URL ?>admin/advertiesment_requests">Sponsor Advertisement Requests</a>
    <a href="<?php echo BASE_URL ?>admin/complaints">Complaints</a>
    <a href="<?php echo BASE_URL ?>admin/create_new_admin_acc">Create New Account</a>
    <a href="<?php echo BASE_URL ?>admin/view_payments">Payments</a>
    <a href="<?php echo BASE_URL ?>admin/delete_user_acc">Search Users</a>
  </div>
</body>
</html>
