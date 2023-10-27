<?php 
if (isset($_POST['download'])) {
    $imgUrl = $_POST['imgUrl'];
    $ch = curl_init($imgUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $download = curl_exec($ch);
    if ($download === false) {
        die('Curl error: ' . curl_error($ch));
    }
    curl_close($ch);
    header('Content-type: image/jpg');
    header('Content-Disposition: attachment; filename="thumbnail.jpg" ');
    echo $download;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./public/css/styles.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download Youtube Video Tumbnail | Bedrani </title>
</head>
<body>
    <div class="container">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <header>Download Thumbnail</header>
            <div class="url-input">
                <span class="title">Patse video url :</span>
                <div class="field">
                    <input type="text" placeholder="https://www.youtube.com/watch?v=.." required>
                    <input class="hidden-ino" type="hidden" name="imgUrl">
                    <div class="bottom-line"></div>
                </div>
            </div>
            <div class="preview-area">
                <img class="thumbnail" src="" alt="thumbnail">
                <i class="icon fas fa-cloud-download-alt"></i>
                <span>Paste video url to see preview</span>
            </div>
            <button class="download-btn" type="submit" name="download">Download Thumbnail</button>
        </form>
    </div>
    <script src="./script.js"></script>
</body>
</html>



