<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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


    </div>

</body>

</html>