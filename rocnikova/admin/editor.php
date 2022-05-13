<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../editor-style.css">
    <title>Nicolasova stranocka2</title>
</head>
<body>

<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>tinymce.init({selector:'textarea', width: 1200, height: 550});</script>
<?php 
require("../funkcie/url_maker.php");
require("../db.php");
session_start(); 

//ochrana pred vratenim sipkou spat
if(isset($_SESSION['uzivatel_meno']) == ''){
  session_destroy();
  header('Location: prihlasenie.php');
}

echo "<h1>".$_SESSION['uzivatel_meno'].", Vitaj v editore clankov</h1>"; 
require('../db.php');
if($_POST){
    $titless = $_POST['titles'];
    $content = $_POST['obsah'];
    $url = createUrlSlug($titless);
    $url = $url.'-'.time();
    $subscribe = $_POST['popis'];
    $uziv_id = $_SESSION['uzivatel_id'];
    $sqli = "INSERT INTO clanky (title, content, url_article, subscribe, id_user) VALUES ('$titless', '$content', '$url', '$subscribe', '$uziv_id')";
    $conn->query($sqli);
    $posledny = $conn->insert_id;
    $_SESSION['posl_clanok'] = $posledny;
}
?>
<form action="" method="post">
  <div class="value-holder">
    <input type="text" placeholder="Titulok" name="titles"> <br>
  </div>
  <div class="value-holder">
    <input type="text" placeholder="Krátky popis" name="popis"> <br>
  </div>
  <textarea name="obsah" id="texty" cols="30" rows="10"></textarea><br />
  <input type="submit" name="submit" value='Pridat clanok'>
</form>
</body>
</html>