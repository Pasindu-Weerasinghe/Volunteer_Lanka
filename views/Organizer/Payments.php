<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <?php include 'views/includes/head-includes-log.php'; ?>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/styles/form.css">
    <title>Subscription fee payment</title>
</head>

<body>
<!-- navigation bar -->
<?php include 'views/includes/navbar_log.php'; ?>

<div class="main" id="main">
    <div class="wrapper">
        <h2 class="title">Pay Subscription Fee</h2>
        <form class="form" id="payment-form" method="post">
            <div class="row">
                <label for="">First name</label>
                <input type="text" name="first-name" class="input"
                       value="<?php echo $this->payment_details ? $this->payment_details['First_name'] : ''; ?>">
            </div>
            <div class=" row">
                <label for="">Last name</label>
                <input type="text" name="last-name" class="input"
                       value="<?php echo $this->payment_details ? $this->payment_details['Last_name'] : '';; ?>">
            </div>
            <div class=" row">
                <label for="">Contact</label>
                <input type="text" name="contact" class="input"
                       value="<?php echo $this->payment_details ? $this->payment_details['Contact'] : $this->organizer['Contact'];; ?>">
            </div>
            <div class="row">
                <label for="">Email</label>
                <input type="email" name="email" class="input"
                       value="<?php echo $this->payment_details ? $this->payment_details['Email'] : $_SESSION['uname'];; ?>">
            </div>
            <div class="row">
                <label for="">Address</label>
                <input type="text" name="address" class="input"
                       value="<?php echo $this->payment_details ? $this->payment_details['Address'] : '';; ?>">
            </div>
            <div class=" row">
                <label for="">City</label>
                <input type="text" name="city" class="input"
                       value="<?php echo $this->payment_details ? $this->payment_details['City'] : '';; ?>">
            </div>
            <div class=" row">
                <label for="amount">Amount</label>
                <input type="number" name="amount" class="input input-number" value="<?php echo SUB_FEE; ?>"
                       readonly>
            </div>
            <div class="row">
                <label for="">Month</label>
                <input type="text" name="month" class="input input-number" style="font-size: 20px"
                       value="<?php echo date('Y F'); ?>"
                       readonly>
            </div>
            <div class="notice">
                <label for="">Days remaining to pay: <?php echo $this->days_remaining; ?></label>
            </div>


            <div class="btn-area">
                <button onclick="history.back()" class="btn">Cancel</button>
                <button type="submit" id="payhere-payment" name="pay" class="btn">Next</button>
            </div>
        </form>
        <h2 id="paid-notice" style="display: none">You have paid the subscription for this month</h2>
    </div>
    <?php
    $order_id = "sub-fee_" . $_SESSION['uid'] . "_" . date("Y-m");
    $amount = SUB_FEE;
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
    <input type="hidden" name="paid" id="paid" value="<?php echo json_encode($this->paid) ?>">
</div>
</body>
<script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
<script type="module">
    import {BASE_URL, LOCALHOST} from "../configs/config.js";

    console.log(LOCALHOST);
    const paymentForm = document.getElementById('payment-form');

    const uid = "<?php echo $_SESSION['uid']; ?>";
    const order_id = "<?php echo $order_id ?>";
    const amount = "<?php echo $amount; ?>";
    const currency = "<?php echo $currency; ?>";
    const hash = "<?php echo $hash; ?>";
    const merchant_id = "<?php echo $_ENV['MERCHANT_ID']; ?>";

    // notify url
    const notify_url = LOCALHOST + "/Volunteer_Lanka/organizer/payment_successful/sub-fee/" + uid + "/" + amount;


    // Put the payment variables here
    let payment = {}

    // Payment window closed
    payhere.onDismissed = function onDismissed() {
        // Note: Prompt user to pay again or show an error page
        alert("Payment dismissed");
    };

    // Error occurred
    payhere.onError = function onError(error) {
        // Note: show an error page
        alert("Error:" + error);
    };


    // Payment completed. It can be a successful failure.
    payhere.onCompleted = function onCompleted(orderId) {
        console.log("Payment completed. OrderID:" + orderId);
        window.location.href = '<?php echo BASE_URL ?>' + 'organizer/payments';
        // Note: validate the payment and show success or failure page to the customer
    };

    // Show the payhere.js popup, when "PayHere Pay" is clicked
    document.getElementById('payhere-payment').onclick = function (e) {
        e.preventDefault();
        const formData = new FormData(paymentForm);

        console.log(formData.get('first-name'));

        fetch(BASE_URL + `organizer/set_payment_details/${uid}`, {
            method: 'POST',
            body: formData
        })
            .then(res => res.json())
            .then(data => {
                console.log(data);
            })
            .catch(err => {
                console.log(err);
            })

        let payment = {
            sandbox: true,
            merchant_id: merchant_id, // Replace your Merchant ID
            return_url: undefined, // Important
            cancel_url: undefined, // Important
            notify_url: notify_url,
            order_id: order_id,
            items: "Subscription Fee",
            amount: amount,
            currency: currency,
            hash: hash, // *Replace with generated hash retrieved from backend
            first_name: formData.get('first-name'),
            last_name: formData.get('last-name'),
            email: formData.get('email'),
            phone: formData.get('contact'),
            address: formData.get('address'),
            city: formData.get('city'),
            country: "Sri Lanka",
            custom_1: "",
            custom_2: "",
        };
        payhere.startPayment(payment);
    };

    // check if the user has already paid the subscription fee for this month
    const paid = JSON.parse(document.getElementById('paid').value);
    const paid_notice = document.getElementById('paid-notice');

    if (paid) {
        document.querySelector('.title').style.display = "none";
        paymentForm.style.display = "none";
        paid_notice.style.display = "flex";
    }

</script>

</html>