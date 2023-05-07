<?php foreach ($this->upcoming_projects as $project) {
    $pid = $project['P_ID'] ?>
    <div class="card">
        <div class="card-image">
            <img id="card-img"
                 src="<?php echo BASE_URL ?>public/images/pr_images/<?php echo $this->prImage[$pid]?:'default.jpg' ?>">
        </div>
        <h2><?php echo($project["Name"]); ?></h2>
        <p><?php echo($project["Date"]); ?></p>
        <a href="<?php echo BASE_URL ?>organizer/view_upcoming_project/<?php echo $project['P_ID'] ?>">
            <button>View</button>
        </a>
    </div>
<?php } ?>