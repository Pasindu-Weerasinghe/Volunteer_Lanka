<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                <th>User</th>
                <th>Address</th>
                <th>Contact Number</th>
            </tr>
            <tr>
                <td>Binula Rasanjith</td>
                <td>Kirillawala</td>
                <td>0765432123</td>
            </tr>
            <tr>
                <td>Nethmie Imanya</td>
                <td>Gampaha</td>
                <td>0711503122</td>
            </tr>
            <tr>
                <td>Pasindu Weerasinghe</td>
                <td>Alawwa</td>
                <td>0776545328</td>
            </tr>
            <tr>
                <td>Hasindu Sudeepana</td>
                <td>Malabe</td>
                <td>0773088079</td>
            </tr>
        </table>
    </div>
</body>

</html>