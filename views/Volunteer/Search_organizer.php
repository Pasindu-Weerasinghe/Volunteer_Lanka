<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'views/includes/head-includes-log.php'; ?>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/styles/search.css">
    <title>Search</title>
</head>

<body>
    <?php include 'views/includes/navbar_log.php'; ?>

    <div id="main" class="main">
        <div class="search-container">
            <form action="<?php echo BASE_URL; ?>volunteer/search_organizer" method="post">
                <input type="text" name="key">
                <button name="search"><b>Search<b></button>
            </form>
        </div><br><br>
        <table>
            <tr>
                <th>Organizer</th>
                <th>Branch</th>
                <th>Contact Number</th>
            </tr>
            <?php foreach ($this->organizers as $organizer) { ?>
                <tr>
                    <td><a class="profile" href="<?php echo BASE_URL ?>volunteer/view_organizer/<?php echo $organizer['U_ID'] ?>"><?php echo ($organizer["Name"]); ?></a></td>
                    <td><?php echo ($organizer["Branch"]); ?></td>
                    <td><?php echo ($organizer["Contact"]); ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>

</html>