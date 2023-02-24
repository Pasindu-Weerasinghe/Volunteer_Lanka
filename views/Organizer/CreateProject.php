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
    <!-- //? 1st form -->
    <div class="wrapper" id="create-project">
        <h2 class="title">Create a new project</h2>

        <!-- Dataset One -->
        <form class="form" method="post" id="create-project-form">
            <div class="row">
                <label for="project-name">Project Name</label>
                <input type="text" name="project-name" id="project-name" required class="input">
            </div>

            <div class="row">
                <label for="date">Date</label>
                <input type="date" name="date" id="date" required class="input">
            </div>

            <div class="row">
                <label for="time">Time</label>
                <input type="time" name="time" id="time" required class="input">
            </div>

            <div class="row">
                <label for="venue">Venue</label>
                <input type="text" name="venue" id="venue" required class="input">
            </div>

            <div class="row">
                <label for="description">Description</label>
                <textarea name="description" id="description" required class="input textarea"></textarea>
            </div>

            <div class="row">
                <label for="no-of-members">Number of Volunteers</label>
                <input type="number" name="no-of-members" id="no-of-members" min="1" required class="input">
            </div>

            <table>
                <tr class="row">
                    <td id="row-head">
                        Select partnership
                    </td>
                    <td class="td">
                        <input type="radio" name="partnership" value="single" id="single" class="input">
                        <label for="single" id="radio-label">Single</label>
                    </td>

                    <td class="td">
                        <input type="radio" name="partnership" value="collaborate" id="collaborate" class="input">
                        <label for="collaborate" id="radio-label">Collaborate</label>
                    </td>
                </tr>
                <tr class="row">
                    <td id="row-head">
                        Select sponsorship
                    </td>

                    <td class="td">
                        <input type="radio" name="sponsorship" value="no-sponsor" id="no-sponsor" required
                               class="input">No Sponsorship
                        <!-- <label for="no-sponsor" id="radio-label">No Sponsorship</label> -->
                    </td>

                    <td class="td">
                        <input type="radio" name="sponsorship" value="publish-sn" id="publish-sn" required
                               class="input">Publish Sponsor Notice
                        <!-- <label for="publish-sn" id="radio-label">Publish Sponsor Notice</label> -->
                    </td>
                </tr>
            </table>

            <div class="row">
                <label for="images">Upload images here</label>
                <input type="file" name="files[]" id="images" multiple="multiple" class="input input-file">
            </div>

            <div id="gal">

            </div>
            <button type="button" id="resetImgs" style="display: none;">clear</button>

            <div class="btn-area">
                <button id="form1-back" class="btn">Cancel</button>
                <button type="submit" name="next" class="btn" id="next" onclick="return form1.reportValidity()">Next</button>
            </div>
        </form>
    </div>

    <!-- //? Add organizer to collaborate project -->
    <div class="wrapper" id="add-org-to-collab" style="display: none">
        <h2>Add Organizers to Collaborate Project</h2><br/><br/>
        <form class="form" method="post" id="publish-sn-form">
            <div class="row">

            </div>

            <div class="btn-area">
                <button class="btn" id="form2-back">Cancel</button>
                <button type="submit" class="btn" id="next2">Next</button>
            </div>
        </form>
    </div>

    <!-- //? Publish sponsor notice form -->
    <div class="wrapper" id="publish-sponsor-notice" style="display: none">
        <h2>Publish Sponsor Notice</h2><br/>
        <form class="form" method="post" id="publish-sn-form">
            <div class="row">
                <label for="expected-amount">Total expected amount</label>
                <input type="number" name="tot-exp-amount" id="tot-exp-amount" required>
            </div>

            <div class="row">
                <label for="silver-amount">Silver</label>
                <input type="number" name="silver-amount" min="0" id="silver-amount" required>
                <input type="number" name="silver-quantity" min="0" id="silver-quantity" required>
            </div>

            <div class="row">
                <label for="gold-amount">Gold</label>
                <input type="number" name="gold-amount" min="0" id="gold-amount" required>
                <input type="number" name="gold-quantity" min="0" id="gold-quantity" required>
            </div>

            <div class="row">
                <label for="platinum-amount">Platinum</label>
                <input type="number" name="platinum-amount" min="0" id="platinum-amount" required>
                <input type="number" name="platinum-quantity" min="0" id="platinum-quantity" required>
            </div>

            <div class="row">
                <label for="description">Description</label>
                <textarea name="description" id="description" required class="input textarea"></textarea>
            </div>

            <div class="btn-area">
                <button class="btn" id="form3-back">Cancel</button>
                <button type="submit" class="btn" id="next3">Publish Notice</button>
            </div>
        </form>
    </div>

    <!-- //? Form for Volunteers -->
    <div class="wrapper" id="form-for-volunteers" style="display: none">
        <h2 class="title">Create a Form for Volunteers</h2>

        <form class="form" method="post" id="form-for-volunteers-form">

            <p>The form you create here will be displayed to volunteers when joining
                select necessary fields you would like to have in your form.</p>
            <div class="row">
                <input type="checkbox" name="email" class="input-chkbox">
                <label>E-mail address</label>
            </div>
            <div class="row">
                <input type="checkbox" name="contact-no" class="input-chkbox">
                <label>Contact number</label>
            </div>
            <div class="row">
                <input type="checkbox" name="meal-pref" class="input-chkbox">
                <label>Meal preference</label>
            </div>
            <div class="row">
                <input type="checkbox" name="prior-participations" class="input-chkbox">
                <label>Prior participation in volunteer projects</label>
            </div>

            <div class="btn-area">
                <button id="form4-back" type="button" class="btn">Back</button>
                <button type="submit" name="create" class="btn" id="create">Create</button>
            </div>
        </form>
    </div>


</div>
</body>

<script type="module" src="<?php echo BASE_URL ?>public/scripts/create_project.js"></script>

</html>