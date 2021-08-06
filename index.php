<?php

if(isset($_GET['u'])){
include "php_files/config.php";
$u=mysqli_real_escape_string($conn,$_GET['u']);
$sql=mysqli_query($conn,"Select originalurl from url where shortenurl='{$_GET['u']}'");
if(mysqli_num_rows($sql)>0){
  $url=mysqli_fetch_assoc($sql);
  header("Location:".$url['originalurl']);
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>URL Shortener in PHPl</title>
  <link rel="stylesheet" href="style.css">
  <!-- Iconsout Link for Icons -->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.6/css/line.css">
</head>
<body>
    <div class="wrapper">
        <form action="POST">
            <i class="url-icon uil uil-link"></i>
            <input type="text" name="full_url" placeholder="Enter or type Long URL" required/>
            <button>Shorten</button>
        </form>
        <div class="count">
            <span>Total Links: <span>10</span>& Total Clicks: <span>100</span></span>
            <a href="">Clear All</a>
        </div>
        <div class="urls-area">
            <div class="title">
                <li>Shorten Url</li>
                <li>Original Url</li>
                <li>Clicks</li>
                <li>Action</li>
            </div>
            <div class="data">
                <li><a href="">kklllasas</a></li>
                <li>Original Url</li>
                <li>16</li>
                <li><a href="">Delete</a></li>
            </div>
        </div>
        <div class="blur-effect"></div>
            <div class="popup-box">
            <div class="info-box">Your short link is ready. You can also edit your short link now but can't edit once you saved it.</div>
            <form action="#" autocomplete="off">
                <label>Edit your shorten url</label>
                <input type="text" class="shorten-url"  value="example" spellcheck="false" required>
                <i class="copy-icon uil uil-copy-alt"></i>
                <button>Save</button>
            </form>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>