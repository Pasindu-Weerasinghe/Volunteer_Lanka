<?php
session_start();
if (!isset($_SESSION['uid'])) {
    header('Location: ' . BASE_URL . 'index/login');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/styles/view.css">
    <title>Publish Sponsor Notice</title>
</head>

<body>
    <!-- navigation bar -->
    <?php include 'views/includes/navbar_log.php'; ?>

    <div class="main">
        <h2>Publish Sponsor Notice</h2><br />
        <div class="container">
            <table>
                <tr>
                    <td>Total expected amount</td>
                    <td>:</td>
                    <td><input type="number" name="tot-exp-amount" min="0" required></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Amount</td>
                    <td>Quantity</td>
                </tr>
                <tr>
                    <td>Create packages</td>
                    <td>:</td>
                    <td>Silver</td>
                    <td><input type="number" name="silver-amount" min="0" required></td>
                    <td><input type="number" name="silver-quantity" min="0" required></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>Gold</td>
                    <td><input type="number" name="gold-amount" min="0" required></td>
                    <td><input type="number" name="gold-quantity" min="0" required></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>Platinum</td>
                    <td><input type="number" name="platinum-amount" min="0" required></td>
                    <td><input type="number" name="platinum-quantity" min="0" required></td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td>:</td>
                    <td><input type="text" name="description" required></td>
                </tr>
            </table>
        </div>

        <button class="btn1">Back</button>
        <button class="btn2">Publish Notice</button>
    </div>

</body>

</html>