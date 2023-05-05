<!DOCTYPE html>
<html lang="en">

<?php
function currencyFormat($number)
{
    return number_format($number, 2, '.', ' ');
}

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php include 'views/includes/head-includes.php'; ?>
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/styles/view_completed_pr_org.css">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/styles/form.css">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/styles/popup.css">
    <title><?php echo $this->project['Name'] ?></title>
</head>

<body>
<?php include 'views/includes/navbar_log.php'; ?>
<div class="main" id="main">
    <h2><?php echo $this->project['Name'] ?></h2><br/><br/>

    <div class="wrapper">
        <h2 class="title">Add Completed project to Blog</h2>

        <form action="<?php echo BASE_URL ?>organizer/add_to_blog/<?php echo $this->project['P_ID'] ?>" class="form">
            <div class="row">
                <label for="description">Description</label>
                <textarea name="description" id="description" required class="input textarea"></textarea>
            </div>
            <div class="row">
                <label for="images">Upload images here</label>
                <input type="file" name="files[]" id="images" multiple="multiple" class="input input-file">
            </div>

            <div id="gal">

            <div class="btn-area">
                <button class="btn">Back</button>
                <button class="btn" type="submit">Add to blog</button>
            </div>
        </form>

    </div>
</div>
</body>
</html>