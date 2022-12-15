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
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/styles/form.css">
    <title>Create a new Project</title>
</head>

<body>

    <?php include 'views/includes/navbar_log.php'; ?>

    <div class="main" id="main">
        <div class="wrapper">
            <h2 class="title">Create a new project</h2>
            <form class="form" action="<?php echo BASE_URL; ?>organizer/create_project/" method="post">
                <div class="row">
                    <label for="">Project Name</label>
                    <input type="text" name="project-name" required class="input">
                </div>
                <div class="row">
                    <label for="">Date</label>
                    <input type="date" name="date" required class="input">
                </div>
                <div class="row">
                    <label for="">Time</label>
                    <input type="time" name="time" required class="input">
                </div>
                <div class="row">
                    <label for="">Venue</label>
                    <input type="text" name="venue" required class="input">
                </div>
                <div class="row">
                    <label for="">Description</label>
                    <textarea name="description" required class="input textarea"></textarea>
                </div>
                <div class="row">
                    <label for="">Number of Volunteers</label>
                    <input type="number" name="no-of-members" min="1" required class="input">
                </div>
                <div class="row">
                    <label for="">Select partnership</label>

                    <input type="radio" name="partnership" value="single" class="input">
                    <label for="single" id="radio-label">Single</label>

                    <input type="radio" name="partnership" value="collaborate" class="input">
                    <label for="collaborate" id="radio-label">Collaborate</label>
                </div>
                <div class="row">
                    <label for="">Select sponsorship</label>

                    <input type="radio" name="sponsorship" value="no-sponsor" required class="input">Sponsorship
                    <!-- <label for="no-sponsor" id="radio-label">No Sponsorship</label> -->

                    <input type="radio" name="sponsorship" value="publish-sn" required class="input">Publish Sponsor Notice
                    <!-- <label for="publish-sn" id="radio-label">Publish Sponsor Notice</label> -->
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