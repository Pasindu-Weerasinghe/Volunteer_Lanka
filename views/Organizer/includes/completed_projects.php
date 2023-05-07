<?php foreach ($this->completed_projects as $project) {
    $pid = $project['P_ID'] ?>
    <div class="card">
        <div class="card-image">
            <img id="card-img"
                 src="<?php echo BASE_URL ?>public/images/pr_images/<?php echo $this->prImage[$pid]?:'default.jpg' ?>">
        </div>
        <h2><?php echo($project["Name"]); ?></h2>
        <p><?php echo($project["Date"]); ?></p>
        <a class="btn" href="<?php echo BASE_URL ?>organizer/view_completed_project/<?php echo $project['P_ID'] ?>">Add to Blog</a>
    </div>
<?php } ?>