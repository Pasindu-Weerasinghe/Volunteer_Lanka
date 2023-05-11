<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/styles/form.css">
    <title>Form for Volunteers</title>
</head>

<body>
<!-- navigation bar -->
<?php include 'views/includes/navbar_log.php'; ?>

<div class="main" id="main">
    <div class="wrapper">
        <h2 class="title">Create a Form for Volunteers</h2>
        <form class="form" action="<?php echo BASE_URL; ?>organizer/create_project/create" method="post">

            <p>The form you create here will be displayed to volunteers when joining
                select necessary fields you would like to have in your form.</p>
            <div class="row">
                <input type="checkbox" name="email" class="input-chkbox">
                <label>E-mail address</label>
            </div>
            <div class="row">
                <input type="checkbox" name="contact-no" class="input-chkbox">
                <label>Contact number</label>
            </div>
            <div class="row">
                <input type="checkbox" name="meal-pref" class="input-chkbox">
                <label>Meal preference</label>
            </div>
            <div class="row">
                <input type="checkbox" name="prior-participations" class="input-chkbox">
                <label>Prior partcipation in volunteer projects</label>
            </div>

            <div class="btn-area">
                <button onclick="history.back()" class="btn">Back</button>
                <button type="submit" name="create" class="btn">Create</button>
            </div>
        </form>
    </div>
</div>

</body>

</html>