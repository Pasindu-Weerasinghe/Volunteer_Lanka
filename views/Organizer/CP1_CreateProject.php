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
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/styles/view.css">
    <title>Create a new Project</title>
</head>

<body>

    <?php include 'views/includes/navbar_log.php'; ?>

    <div class="main">
        <h2>Create a new project</h2><br /><br />
        <form action="<?php echo BASE_URL; ?>organizer/create_project/" method="post">
            <div class="container">
                <table>
                    <tr>
                        <td>Project Name</td>
                        <td>:</td>
                        <td><input type="text" name="project-name" required></td>
                    </tr>
                    <tr>
                        <td>Date</td>
                        <td>:</td>
                        <td><input type="date" name="date" required></td>
                    </tr>
                    <tr>
                        <td>Time</td>
                        <td>:</td>
                        <td><input type="time" name="time" required></td>
                    </tr>
                    <tr>
                        <td>Venue</td>
                        <td>:</td>
                        <td><input type="text" name="venue" required></td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td>:</td>
                        <td><input type="text" name="description" required></td>
                    </tr>
                    <tr>
                        <td>Number of Volunteers</td>
                        <td>:</td>
                        <td><input type="number" name="no-of-members" min="1" required></td>
                    </tr>
                    <tr>
                        <td>Select partnership</td>
                        <td>:</td>
                        <td>
                            <input type="radio" name="partnership" value="single">
                            <label for="single">Single</label>
                        </td>
                        <td>
                            <input type="radio" name="partnership" value="collaborate">
                            <label for="collaborate">Collaborate</label>

                        </td>
                    </tr>
                    <tr>
                        <td>Select sponsorship</td>
                        <td>:</td>
                        <td>
                            <input type="radio" name="sponsorship" value="no-sponsor" required>
                            <label for="no-sponsor">No Sponsorship</label>
                        </td>
                        <td>
                            <input type="radio" name="sponsorship" value="publish-sn" required>
                            <label for="publish-sn">Publish Sponsor Notice</label>

                        </td>
                    </tr>
                </table>
            </div>

            <button class="btn1" onclick="history.back()">Cancel</button>
            <button type="submit" name="next"class="btn2">Next</button>
        </form>

    </div>

</body>

</html>