<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php include 'views/includes/head-includes-log.php'; ?>
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/styles/view_upcoming_pr_org.css">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/styles/slideshow.css">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/styles/popup.css">

    <title><?php echo $this->project['Name'] ?></title>
</head>

<body>
    <?php include 'views/includes/navbar_log.php'; ?>

    <?php
    $uid = $_SESSION['uid'];
    $pid = $this->project['P_ID'];
    $creator_check = $this->project['U_ID'] == $uid;
    function currencyFormat($number): string
    {
        return number_format($number, 2, '.', ' ');
    }

    ?>

    <div class="main" id="main">
        <h1><?php echo $this->project['Name'] ?></h1><br /><br />
        <!---->
        <!--    --><?php
                    //    print_r($this->sn_amount);
                    //    echo "<br/>";
                    //    print_r($this->package_range);
                    //    echo "<br/>";
                    //    
                    ?>


        <div class="container">
            <?php
            if ($creator_check) { ?>
                <button id="edit-btn"><i class="fa-solid fa-pen-to-square"></i> Edit</button>
            <?php }
            ?>
            <div class="wrapper">
                <div class="slideshow-container">
                    <div class="slideshow">
                        <?php foreach ($this->images as $image) { ?>
                            <div class="slide fade">
                                <img src="<?php echo BASE_URL ?>public/images/pr_images/<?php echo $image; ?>" alt="">
                            </div>
                        <?php } ?>
                    </div>
                    <a class="prevBtn" onclick="moveSlide(-1)">&#10094;</a>
                    <a class="nextBtn" onclick="moveSlide(1)">&#10095;</a>
                    <br>
                    <div class="dots">
                        <?php for ($i = 0; $i < count($this->images); $i++) { ?>
                            <span class="dot" onclick="setSlide(<?php echo $i ?>)"></span>
                        <?php } ?>
                    </div>
                </div>

                <div class="details-container">
                    <div class="row">
                        <label for="date">Date</label>
                        <p id="date"><?php echo $this->project['Date'] ?></p>
                    </div>

                    <div class="row">
                        <label for="time">Time</label>
                        <p id="time"><?php echo $this->project['Time'] ?></p>
                    </div>

                    <div class="row">
                        <label for="venue">Venue</label>
                        <p id="venue"><?php echo $this->project['Venue'] ?></p>
                    </div>

                    <div class="row">
                        <label for="volunteers" style="height: fit-content">Volunteers</label>
                        <p id="volunteers"><?php echo count($this->joined_volunteers) ?>
                            / <?php echo $this->project['No_of_volunteers'] ?></p>
                    </div>

                    <div class="row">
                        <label for="description">Description</label>
                        <p id="description"><?php echo $this->project['Description'] ?></p>
                    </div>
                </div>
            </div>

            <!-- joined volunteers popup button -->
            <div class="btn-area">
                <button id="joined-volunteers-btn"><i class="fa-solid fa-user-group"></i> Joined Volunteers</button>
            </div>

            <?php
            // if this project is a collaboration, show the collaborators details
            if ($this->project['Collab'] == 1) {
                foreach ($this->collaborators as $key => $collaborator) {
                    if ($collaborator['U_ID'] == $uid) {
                        unset($this->collaborators[$key]);
                    }
                }

                $accepted_collaborators = array_filter($this->collaborators, function ($collaborator) {
                    return $collaborator['Status'] == 'accepted';
                });

                $pending_collaborators = array_filter($this->collaborators, function ($collaborator) {
                    return $collaborator['Status'] == 'pending';
                });
            ?>
                <div class="collab-area">
                    <h2>Collaborators</h2>
                    <div class="collabs">
                        <?php
                        if (!$creator_check) { ?>
                            <a href="" class="collaborator">
                                <img src="<?php echo BASE_URL ?>public/images/profile_images/<?php echo $this->pr_creator['Photo'] ?: 'user-icon.png' ?>" alt="">
                                <div>
                                    <label><?php echo $this->pr_creator['Name'] ?></label>
                                    <p style="color: cornflowerblue">Creator</p>
                                </div>
                            </a>
                        <?php }
                        ?>
                        <?php
                        foreach ($accepted_collaborators as $collaborator) { ?>
                            <a href="" class="collaborator">
                                <img src="<?php echo BASE_URL ?>public/images/profile_images/<?php echo $collaborator['Photo'] ?: 'user-icon.png' ?>" alt="">
                                <div>
                                    <label><?php echo $collaborator['Name'] ?></label>
                                    <p style="color: limegreen">Accepted</p>
                                </div>
                            </a>
                        <?php }
                        ?>
                        <?php
                        foreach ($pending_collaborators as $collaborator) { ?>
                            <a href="" class="collaborator">
                                <img src="<?php echo BASE_URL ?>public/images/profile_images/<?php echo $collaborator['Photo'] ?: 'user-icon.png' ?>" alt="">
                                <div>
                                    <label><?php echo $collaborator['Name'] ?></label>
                                    <p style="color: grey">Pending</p>
                                </div>
                            </a>
                        <?php }
                        ?>
                    </div>
                </div>
            <?php }
            ?>

            <?php
            // if this project is sponsored show the sponsors details
            if ($this->project['Sponsor'] == 1) {
            ?>
                <div class="spon-area">
                    <h2 class="amounts">
                        <label for="">Total Amount</label>
                        <p>
                            <?php
                            $formatted_amount = currencyFormat($this->sn_amount);
                            ?>
                            LKR <?php echo $formatted_amount ?>
                        </p>
                    </h2>

                    <h2 class="amounts">
                        <label for="">Sponsored Amount</label>
                        <p>
                            <?php
                            $formatted_amount = currencyFormat($this->sponsored_amount);
                            ?>
                            LKR <?php echo $formatted_amount ?>
                        </p>
                    </h2>

                    <div class="sponsors">
                        <h3><span class="silver spon-dot"></span> Silver Sponsors</h3>
                        <?php
                        if (count($this->silver_sponsors) > 0) {
                            foreach ($this->silver_sponsors as $sponsor) { ?>
                                <a href="" class="sponsor">
                                    <img src="<?php echo BASE_URL ?>public/images/profile_images/<?php echo $sponsor['Photo'] ?: 'user-icon.png' ?>" alt="">
                                    <div>
                                        <label><?php echo $sponsor['Name'] ?></label>
                                        <p class="amount">
                                            <?php
                                            $formatted_amount = currencyFormat($sponsor['Amount']);
                                            ?>
                                            LKR <?php echo $formatted_amount ?>
                                        </p>
                                    </div>
                                </a>
                        <?php }
                        } ?>
                    </div>
                    <div class="sponsors">
                        <h3><span class="gold spon-dot"></span> Gold Sponsors</h3>
                        <?php
                        if (count($this->gold_sponsors) > 0) {
                            foreach ($this->gold_sponsors as $sponsor) { ?>
                                <a href="" class="sponsor">
                                    <img src="<?php echo BASE_URL ?>public/images/profile_images/<?php echo $sponsor['Photo'] ?: 'user-icon.png' ?>" alt="">
                                    <div>
                                        <label><?php echo $sponsor['Name'] ?></label>
                                        <p class="amount">
                                            <?php
                                            $formatted_amount = currencyFormat($sponsor['Amount']);
                                            ?>
                                            LKR <?php echo $formatted_amount ?>
                                        </p>
                                    </div>
                                </a>
                        <?php }
                        }
                        ?>
                    </div>
                    <div class="sponsors">
                        <h3><span class="platinum spon-dot"></span> Platinum Sponsors</h3>
                        <?php
                        if (count($this->platinum_sponsors) > 0) {
                            foreach ($this->platinum_sponsors as $sponsor) { ?>
                                <a href="" class="sponsor">
                                    <img src="<?php echo BASE_URL ?>public/images/profile_images/<?php echo $sponsor['Photo'] ?: 'user-icon.png' ?>" alt="">
                                    <div>
                                        <label><?php echo $sponsor['Name'] ?></label>
                                        <p class="amount">
                                            <?php
                                            $formatted_amount = currencyFormat($sponsor['Amount']);
                                            ?>
                                            LKR <?php echo $formatted_amount ?>
                                        </p>
                                    </div>
                                </a>
                        <?php }
                        }
                        ?>
                    </div>
                    <div class="sponsors">
                        <h3><span class="spon-dot"></span> Other Sponsors</h3>
                        <?php
                        if (count($this->other_sponsors) > 0) {
                            foreach ($this->other_sponsors as $sponsor) { ?>
                                <a href="" class="sponsor">
                                    <img src="<?php echo BASE_URL ?>public/images/profile_images/<?php echo $sponsor['Photo'] ?: 'user-icon.png' ?>" alt="">
                                    <div>
                                        <label><?php echo $sponsor['Name'] ?></label>
                                        <p class="amount">
                                            <?php
                                            $formatted_amount = currencyFormat($sponsor['Amount']);
                                            ?>
                                            LKR <?php echo $formatted_amount ?>
                                        </p>
                                    </div>
                                </a>
                        <?php }
                        }
                        ?>
                    </div>
                </div>
            <?php
            }
            ?>

            <?php
            if ($creator_check) {
            ?>
                <div class="btn-area">
                    <button class="btn" id="cancel-btn">Cancel Project</button>
                    <button class="btn" id="postpone-btn">Postpone Project</button>
                </div>
            <?php } else {
            ?>
                <div class="btn-area">
                    <button class="btn" id="leave-btn" style="background-color: darkred">Leave Project</button>
                </div>
            <?php }
            ?>


        </div>


    </div>

    <!-- popups -->
    <div class="popup-bg" style="display: none">
        <!-- edit project -->
        <div class="popup" id="popup-edit" style="display: none">
            <!--close button-->
            <div class="popup-close" data-popup-id="popup-edit"><i class="fa-solid fa-xmark"></i></div>

            <h2>Edit Project</h2>
            <form id="edit-pr-form" method="post" action="<?php echo BASE_URL ?>organizer/edit_project/<?php echo $pid ?>">
                <label for="pr-name">Project Name <b style="color: red">*</b></label>
                <input type="text" name="pr-name" id="pr-name" value="<?php echo $this->project['Name'] ?>" required>
                <label for="pr-venue">Venue <b style="color: red">*</b></label>
                <input type="text" name="pr-venue" id="pr-venue" value="<?php echo $this->project['Venue'] ?>" required>
                <label for="pr-volunteers">No. of Volunteers <b style="color: red">*</b></label>
                <input type="number" name="pr-volunteers" id="pr-volunteers" value="<?php echo $this->project['No_of_volunteers'] ?>" required>
                <label for="pr-description">Description</label>
                <textarea name="pr-description" id="pr-description" required><?php echo $this->project['Description'] ?></textarea>
                <button class="btn" type="submit" name="edit-project" id="edit-project">Edit Project</button>
            </form>
        </div>

        <div class="popup" id="popup-joined-volunteers" style="display: none">
            <!--close button-->
            <div class="popup-close" data-popup-id="popup-joined-volunteers"><i class="fa-solid fa-xmark"></i></div>

            <h2>Joined Volunteers</h2>
            <div class="joined-volunteers">
                <?php
                if (count($this->joined_volunteers) > 0) {
                    foreach ($this->joined_volunteers as $volunteer) { ?>
                        <a class="volunteer">
                            <div>
                                <img src="<?php echo BASE_URL ?>public/images/profile_images/<?php echo $volunteer['Photo'] ?: '' ?>" alt="" class="float-left">
                                <label><?php echo $volunteer['Name'] ?></label>

                            </div>
                            <p>
                                <?php
                                if ($this->volunteer_form['Email']) {
                                    echo "<span>Email: {$volunteer['Email']}</span>";
                                }
                                if ($this->volunteer_form['Contact']) {
                                    echo "<span>Phone: {$volunteer['Contact']}</span>";
                                }
                                if ($this->volunteer_form['Meal_pref']) {
                                    $meal_pref = $volunteer['Meal'] == 'veg' ? 'Vegetarian' : 'Non-vegetarian';
                                    echo "<span>Meal preference: {$meal_pref}</span>";
                                }
                                ?>
                            </p>
                        </a>
                <?php }
                }
                ?>
            </div>
        </div>

        <!-- cancel project -->
        <div class="popup" id="popup-cancel" style="display: none">
            <!--close button-->
            <div class="popup-close" data-popup-id="popup-cancel"><i class="fa-solid fa-xmark"></i></div>

            <h2>Cancel Project</h2>
            <form id="cancel-pr-form">
                <label for="cancel-reason">Reason <b style="color: red">*</b></label>
                <textarea name="cancel-reason" id="cancel-reason" required></textarea>
                <button class="btn" type="submit" name="cancel-project" id="cancel-project">Cancel Project</button>
            </form>
        </div>

        <!-- postpone project -->
        <div class="popup" id="popup-postpone" style="display: none">
            <!--close button-->
            <div class="popup-close" data-popup-id="popup-postpone"><i class="fa-solid fa-xmark"></i></div>

            <h2>Postpone Project</h2>
            <form id="postpone-pr-form">
                <label for="postpone-date">Date <b style="color: red">*</b></label>
                <input type="date" name="postpone-date" id="postpone-date" min="<?php echo date('Y-m-d', strtotime('+1 day')); ?>" required>
                <label for="postpone-time">Time <b style="color: red">*</b></label>
                <input type="time" name="postpone-time" id="postpone-time" required>
                <label for="postpone-reason">Reason <b style="color: red">*</b></label>
                <textarea name="postpone-reason" id="postpone-reason" required></textarea>
                <button class="btn" type="submit" id="postpone-project">Postpone Project</button>
            </form>
        </div>

        <!-- leave project -->
        <div class="popup" id="popup-leave" style="display: none;">
            <!--close button-->
            <div class="popup-close" data-popup-id="popup-leave"><i class="fa-solid fa-xmark"></i></div>
            <h2 id="leave-msg">Do you really want to leave the project?</h2>
            <button class="btn" id="leave-project" style="background-color: darkred">
                Leave Project
            </button>
        </div>

        <?php
        //
        ?>

        <!--    hidden values   -->
        <input type="hidden" name="uid" value="<?php echo $uid ?>">
        <input type="hidden" name="pid" value="<?php echo $pid ?>">
        <input type="hidden" name="imagesArray" value='<?php echo json_encode($this->images); ?>'>
</body>
<script>
    const descriptionElement = document.getElementById('description');
    const descriptionHeight = descriptionElement.offsetHeight;
    const rowElement = descriptionElement.parentElement;
    rowElement.style.height = `${descriptionHeight + 10}px`;
    descriptionElement.style.height = '100%';

    const venueElement = document.getElementById('venue');
    const venueHeight = venueElement.offsetHeight;
    const venueRowElement = venueElement.parentElement;
    venueRowElement.style.height = `${venueHeight + 10}px`;
    venueElement.style.height = '100%';
</script>
<script type="module" src="<?php echo BASE_URL ?>public/scripts/view_upcoming_pr_org.js"></script>
<script type="module" src="<?php echo BASE_URL ?>public/scripts/slideshow.js"></script>

</html>