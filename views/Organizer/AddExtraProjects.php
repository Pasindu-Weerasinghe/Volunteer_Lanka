<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <?php include 'views/includes/head-includes-log.php'; ?>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/styles/form.css">
    <title>Add Extra Projects</title>
</head>

<body>
<!-- navigation bar -->
<?php include 'views/includes/navbar_log.php'; ?>

<div class="main" id="main">
    <div class="wrapper">
        <h2 class="title">Add extra project creation</h2>
        <?php if ($this->hash == null) { ?>
            <p>Your project creation limit reached.</p>
            <form class="form" id="payment-form" action="<?php echo BASE_URL ?>organizer/add_extra_projects/next"
                  method="post">
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
                    <label for="">Quantity</label>
                    <input type="number" name="quantity" class="input">
                </div>
                <div class=" row" style="margin-bottom: 20px">
                    <label for="amount">Amount</label>
                    <div class="currency">
                        <input type="number" name="amount" id="amount" class="input" readonly>
                    </div>
                </div>

                <div class="btn-area">
                    <button onclick="history.back()" class="btn">Cancel</button>
                    <button type="submit" name="next" class="btn">Next</button>
                </div>
            </form>
        <?php } else { ?>
            <p>Go to payment gateway to get <?php echo $this->quantity ?> project creations</p>
            <div class="form">
                    <div class="row">
                        <label for="amount">Amount</label>
                        <input type="text" class="input" value="<?php echo "LKR ".$this->amount ?>" readonly
                            style="font-size: 20px; text-align: center">
                    </div>

                    <div class="btn-area">
                        <button onclick="window.location.href = '<?php echo BASE_URL . 'organizer' ?>'"
                                class="btn">
                            Cancel
                        </button>
                        <button type="submit" id="payhere-payment" name="pay" class="btn">Next</button>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
</body>
<?php if ($this->hash != null) { ?>
    <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
    <script type="module">
        import {BASE_URL, LOCALHOST} from "../../configs/config.js";

        console.log(LOCALHOST);

        const uid = "<?php echo $_SESSION['uid']; ?>";
        const order_id = "<?php echo $this->order_id ?>";
        const amount = "<?php echo $this->amount; ?>";
        const currency = "<?php echo $this->currency; ?>";
        const hash = "<?php echo $this->hash; ?>";
        const merchant_id = "<?php echo $_ENV['MERCHANT_ID']; ?>";

        const quantity = "<?php echo $this->quantity ?>";

        const first_name = "<?php echo $this->payment_details['First_name'] ?>";
        const last_name = "<?php echo $this->payment_details['Last_name'] ?>";
        const contact = "<?php echo $this->payment_details['Contact'] ?>";
        const email = "<?php echo $this->payment_details['Email'] ?>";
        const address = "<?php echo $this->payment_details['Address'] ?>";
        const city = "<?php echo $this->payment_details['City'] ?>";

        // notify url
        const notify_url = LOCALHOST + "/Volunteer_Lanka/organizer/payment_successful/project-fee/" + uid + "/" + amount + "/" + quantity;


        // Put the payment variables here
        let payment = {
            sandbox: true,
            merchant_id: merchant_id, // Replace your Merchant ID
            return_url: undefined, // Important
            cancel_url: undefined, // Important
            notify_url: notify_url,
            order_id: order_id,
            items: "Extra Projects",
            amount: amount,
            currency: currency,
            hash: hash, // *Replace with generated hash retrieved from backend
            first_name: first_name,
            last_name: last_name,
            email: email,
            phone: contact,
            address: address,
            city: city,
            country: "Sri Lanka",
            custom_1: "",
            custom_2: "",
        };

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
            window.location.href = '<?php echo BASE_URL ?>' + 'organizer/create_project';
            // Note: validate the payment and show success or failure page to the customer
        };

        // Show the payhere.js popup, when "PayHere Pay" is clicked
        document.getElementById('payhere-payment').onclick = function (e) {
            payhere.startPayment(payment);
        };
    </script>
<?php } else { ?>
    <script>
        document.querySelector('input[name="quantity"]').addEventListener('input', (e) => {
            const quantity = e.target.value;
            console.log(quantity);
            const amount = quantity * <?php echo EXTRA_PR_FEE; ?>;
            document.getElementById('amount').value = amount;
        });
    </script>
<?php }?>

</html>