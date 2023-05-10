<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <?php include 'views/includes/head-includes.php'; ?>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/styles/form.css">
    <title>Requests from Volunteers</title>
</head>

<body>
    <!-- navigation bar -->
    <?php include 'views/includes/navbar_log.php'; ?>

    <div class="main" id="main">
        <div class="wrapper">
            <h2 class="title">Pay Subscription Fee</h2>
            <form class="form" action="<?php echo BASE_URL; ?>organizer/create_project/" method="post">
                <div class="row">
                    <label for="">Amount</label>
                    <input type="number" name="amount" required class="input input-number" value="800.00" readonly>
                </div>
                <div class="row">
                    <label for="">Month</label>
                    <input type="text" name="month" required class="input input-number" value="December" readonly>
                </div>
                <div class="notice">
                    <label for="">Days reamining to pay: 4</label>
                </div>


                <div class="btn-area">
                    <button onclick="history.back()" class="btn">Cancel</button>
                    <button type="submit" name="next" class="btn">Next</button>
                </div>
            </form>
        </div>
        <button type="submit" id="payhere-payment">PayHere Pay</button>
        <?php
        print_r($_ENV);

        $order_id = "ItemNo12345";
        $amount = 1000.00;
        $currency = "LKR";
        $merchant_id = $_ENV['MERCHANT_ID'];
        $merchant_secret = $_ENV['MERCHANT_SECRET'];


        $hash = strtoupper(
            md5(
                $merchant_id .
                    $order_id .
                    number_format($amount, 2, '.', '') .
                    $currency .
                    strtoupper(md5($merchant_secret))
            )
        );
        ?>

    </div>
</body>
<script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL ?>/"></script>
<script>
    const order_id = "<?php echo $order_id; ?>";
    const amount = "<?php echo $amount; ?>";
    const currency = "<?php echo $currency; ?>";
    const hash = "<?php echo $hash; ?>";
    const merchant_id = "<?php echo $_ENV['MERCHANT_ID']; ?>";

    // Put the payment variables here
    let payment = {
        sandbox: true,
        merchant_id: merchant_id, // Replace your Merchant ID
        return_url: undefined, // Important
        cancel_url: undefined, // Important
        notify_url: "http://sample.com/notify",
        order_id: "ItemNo12345",
        items: "Door bell wireles",
        amount: amount,
        currency: currency,
        hash: hash, // *Replace with generated hash retrieved from backend
        first_name: "Saman",
        last_name: "Perera",
        email: "samanp@gmail.com",
        phone: "0771234567",
        address: "No.1, Galle Road",
        city: "Colombo",
        country: "Sri Lanka",
        custom_1: "",
        custom_2: "",
    };

    // Payment window closed
    payhere.onDismissed = function onDismissed() {
        // Note: Prompt user to pay again or show an error page
        console.log("Payment dismissed");
    };

    // Error occurred
    payhere.onError = function onError(error) {
        // Note: show an error page
        console.log("Error:" + error);
    };

    // Payment completed. It can be a successful failure.
    payhere.onCompleted = function onCompleted(orderId) {
        console.log("Payment completed. OrderID:" + orderId);
        // Note: validate the payment and show success or failure page to the customer
    };

    // Show the payhere.js popup, when "PayHere Pay" is clicked
    document.getElementById('payhere-payment').onclick = function(e) {

        payhere.startPayment(payment);
    };
</script>

</html>