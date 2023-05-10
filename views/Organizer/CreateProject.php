<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php include 'views/includes/head-includes.php'; ?>
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/styles/create-project.css">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/styles/popup.css">

    <title>Create a new Project</title>
</head>

<body>

    <?php include 'views/includes/navbar_log.php'; ?>

    <div class="main" id="main">
        <!-- //? 1st form -->
        <div class="wrapper" id="create-project" style="display: block">
            <h2 class="title">Create a new project</h2>

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

                <div class="row">
                    <label for="partnership">
                        Select partnership
                    </label>
                    <select name="partnership" id="partnership" required class="input">
                        <option value="single">Single</option>
                        <option value="collaborate">Collaborate</option>
                    </select>
                </div>

                <div class="row">
                    <label for="sponsorship">
                        Select sponsorship
                    </label>
                    <select name="sponsorship" id="sponsorship" required class="input">
                        <option value="no-sponsor">No Sponsorship</option>
                        <option value="publish-sn">Publish Sponsor Notice</option>
                    </select>
                </div>

                <div class="row">
                    <label for="category">Select category</label>
                    <select name="category" id="category" required class="input">
                        <option value="Beach">Beach cleaning</option>
                        <option value="Donation">Providing facilities to rural areas</option>
                        <option value="Environment">Tree planting</option>
                        <option value="Orphan">Helping child/adult orphanages</option>
                        <option value="Animal">Animal rescuing/rehabilitation</option>
                        <option value="Other">Other</option>
                    </select>
                </div>

                <div class="row">
                    <label for="images">Upload images here</label>
                    <input type="file" name="files[]" id="images" multiple="multiple" class="input-file">
                </div>
                <div id="gal" style="display: none"></div>
                <button type="button" id="resetImgs" style="display: none;">Clear</button>

                <div class="btn-area">
                    <button id="form1-back" class="btn">Cancel</button>
                    <button type="submit" name="next" class="btn" id="next1">Next</button>
                </div>
            </form>
        </div>


        <!-- //? Add organizer to collaborate project -->
        <div class="wrapper" id="add-org-to-collab" style="display: none">
            <h2>Add Organizers to Collaborate Project</h2><br /><br />
            <form class="form" method="post" id="add-org-to-collab-form">
                <button id="add-org-srch-btn" class="btn"><i class="fa-solid fa-plus"></i> Add organizer</button>
                <div class="collaborators-container">
                    <!-- <div class="row">
                        <img src="<?php // echo BASE_URL 
                                    ?>public/images/profile.jpg" alt="">
                        <h3>John Doe</h3>
                        <a class="rmv-btn"><i class="fa-solid fa-circle-minus"></i></a>
                    </div> -->
                </div>

                <div class="btn-area">
                    <button class="btn" id="form2-back">Cancel</button>
                    <button type="submit" class="btn" id="next2">Next</button>
                </div>
            </form>
        </div>

        <!-- Organizer adding popup -->
        <div class="popup-bg">
            <div class="popup popup-add-org">
                <div class="popup-close"><i class="fa-solid fa-xmark"></i></div>

                <h2>Add Organizer</h2>

                <div action="" class="search-container">
                    <input type="text" name="search-org" id="search-org" placeholder="Search by name">
                    <button type="submit" class="btn" id="search-org-btn"><i class="fa-solid fa-search"></i> Search</button>
                </div>

                <div class="search-results">
                    <!-- <div class="row">
                        <img src="<?php // echo BASE_URL 
                                    ?>public/images/profile.jpg" alt="">
                        <h3>John Doe</h3>
                        <a class="add-btn"><i class="fa-solid fa-circle-plus"></i></a>
                    </div> -->
                </div>
            </div>
        </div>

        <!-- //? Publish sponsor notice form -->
        <div class="wrapper" id="publish-sponsor-notice" style="display: none">
            <h2>Publish Sponsor Notice</h2><br />
            <form class="form" method="post" id="publish-sn-form">

                <div class="row">
                    <label for="toatl-amount">Total expected amount</label>
                    <div class="currency">
                        <input type="number" name="total-amount" min="0" id="total-amount" required class="input">
                    </div>
                </div>
                <div class="row">
                    <label for="silver-amount">Silver</label>
                    <div class="currency">
                        <input type="number" name="silver-amount" min="0" id="silver-amount" required class="input">
                    </div>
                </div>

                <div class="row">
                    <label for="gold-amount">Gold</label>
                    <div class="currency">
                        <input type="number" name="gold-amount" min="0" id="gold-amount" required class="input">
                    </div>
                </div>

                <div class="row">
                    <label for="platinum-amount">Platinum</label>
                    <div class="currency">
                        <input type="number" name="platinum-amount" min="0" id="platinum-amount" required class="input">
                    </div>
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
                    <input type="checkbox" name="email" value="1" checked disabled class="input-chkbox">
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