<span class="open-slide">
  <a href="#" onclick="openSideMenu()">
    <i class="fa-solid fa-bars fa-2xl"></i>
  </a>
</span>

<div id="side-menu" class="side-nav">
  <a class="btn-close" onclick="closeSideMenu()">&times;</a>
  <a href="<?php echo BASE_URL ?>admin">Home</a>
  <a href="<?php echo BASE_URL ?>admin/advertiesment_requests">Sponsor Advertisement Requests</a>
  <a href="<?php echo BASE_URL ?>admin/complaints">Complaints</a>
  <?php if ($_SESSION['uid'] == 1) { ?>
    <a href="<?php echo BASE_URL ?>admin/create_new_admin_acc">Create New Account</a>
  <?php } ?>
  <a href="<?php echo BASE_URL ?>admin/view_payments">Payments</a>
  <a href="<?php echo BASE_URL ?>admin/delete_user_acc">Search Users</a>
</div>