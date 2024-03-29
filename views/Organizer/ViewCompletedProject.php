<!DOCTYPE html>
<html lang="en">

<?php
function currencyFormat($number)
{
    return number_format($number, 2, '.', ' ');
}

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php include 'views/includes/head-includes-log.php'; ?>
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/styles/view_completed_pr_org.css">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/styles/form.css">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/styles/popup.css">
    <title><?php echo $this->project['Name'] ?></title>
</head>

<body>
<?php include 'views/includes/navbar_log.php'; ?>
<div class="main" id="main">
    <h2><?php echo $this->project['Name'] ?></h2><br/><br/>

    <div class="wrapper">
        <h2 class="title">Add Completed project to Blog</h2>

        <form method="post" enctype="multipart/form-data"
              action="<?php echo BASE_URL ?>organizer/add_to_blog/<?php echo $this->project['P_ID'] ?>" class="form">
            <div class="row">
                <label for="description">Description</label>
                <textarea name="description" id="description" required class="input textarea"></textarea>
            </div>
            <div class="row">
                <label for="images">Upload images here</label>
                <input type="file" name="files[]" id="images" multiple="multiple" class="input input-file">
            </div>

            <div id="gal" style="display: none"></div>
            <button type="button" id="resetImgs" class="btn" style="display: none;">Clear</button>

            <div class="btn-area">
                <button class="btn" onclick="history.back()">Back</button>
                <button class="btn" name="add-to-blog" type="submit">Add to blog</button>
            </div>
        </form>

    </div>
</div>

<div class="popup-bg" style="display: none">
    <div class="popup popup-message" style="min-height: auto; height: auto; display: flex;flex-direction: column">
        <h2 class="msg" style="text-align: center; font-weight: normal; margin-bottom: 10px">Please upload only
            images</h2>
        <button class="btn" style="margin: auto">OK</button>
    </div>
</div>

</body>
<script>
    const imgs = document.getElementById('images');
    const gal = document.getElementById('gal');
    const resetImgs = document.getElementById('resetImgs');
    let imageReaders = [];


    imgs.addEventListener("change", () => {
        const files = imgs.files;

        // Loop through each file and check if it's an image
        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            const fileType = file.type.split('/')[0];

            if (fileType !== 'image') {
                document.querySelector('.popup-bg').style.display = "flex";
                document.querySelector('.popup-message').style.display = "flex";
                document.querySelector('.popup .msg').innerHTML = "Please upload only images";
                imgs.value = '';
                return;
            }
        }

        let images = imgs.files;
        if (images.length !== 0) {
            gal.style.display = "block";
            resetImgs.style.display = "inline";
            for (let i = 0; i < images.length; i++) {
                let reader = new FileReader();
                reader.readAsDataURL(images[i]);
                reader.onload = function () {
                    imageReaders.push(reader.result);
                    gal.innerHTML += `<img src="${reader.result}" alt="image"/>`;
                };
            }
        } else {
            resetImgs.style.display = "none";
        }

    });

    // close after clicking ok
    document.querySelector('.popup-message button').addEventListener("click", () => {
        document.querySelector('.popup-bg').style.display = 'none';
        document.querySelector('.popup-message').style.display = 'none';
    });

    resetImgs.addEventListener("click", () => {
        imgs.value = "";
        imageReaders = [];
        gal.innerHTML = "";
        gal.style.display = "none";
        resetImgs.style.display = "none";
    });
</script>

</html>