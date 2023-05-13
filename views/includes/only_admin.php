<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/styles/only_admin.css">
</head>

<body>
    <div class="only-admin">
        <div class="btn-area">
            <?php if($status == 'active'){ ?>
            <button onclick="window.location.href='<?php echo BASE_URL . 'admin/restrictUser/' . $u_id; ?>'" class="btn btn1">Restrict</button>
            <?php }?>
            <?php if($status == 'restrict'){ ?>
            <button onclick="window.location.href='<?php echo BASE_URL . 'admin/activeUser/' . $u_id; ?>'" class="btn btn1">Active</button>
            <?php }?>
            <button onclick="window.location.href='<?php echo BASE_URL . 'admin/deleteUser/' . $u_id; ?>'" class="btn btn2">Delete</button>
        </div>
<?php  
?>
    </div>
</body>

</html>