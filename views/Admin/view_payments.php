<?php
session_start();
if (!isset($_SESSION['uid'])) {
    header('Location: ' . BASE_URL);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Payments</title>
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/styles/delete_user_acc.css">
    <script src="<?php echo BASE_URL; ?>public/scripts/payment.js" defer></script>
</head>

<body>
    <?php include 'views/includes/navbar_log.php'; ?>

    <div class="main" id="main">
        <div class="search-container">
            <input type="text" name="search">
            <button name="search"><b>Search<b></button>
        </div><br><br>
        <div id="tb_area">
            <table>
                <thead>
                    <tr>
                        <th>User Name</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Payment Type</th>
                    </tr>
                </thead>
                <tbody class="payment-list">
                    <?php foreach($this->paymentDetails as $paymentDetail){ ?>
                    <tr>
                        <td><?php echo $paymentDetail['Name'] ?></td>
                        <td><?php echo $paymentDetail['Amount'] ?></td>
                        <td><?php echo $paymentDetail['Date'] ?></td>
                        <td><?php echo $paymentDetail['PaymentType'] ?></td>
                    </tr>
                   <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>