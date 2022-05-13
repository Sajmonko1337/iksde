<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin-style.css">
    <title>Document</title>
</head>
<body>

<?php
session_start();
if(isset($_GET['odhlasit'])){
    session_destroy();
    header('Location: prihlasenie.php');
}
//if(isset($_SESSION['uzivatel_meno']))
//ochrana pred vratenim sipkou spat
if(isset($_SESSION['uzivatel_meno']) == ''){
    session_destroy();
    header('Location: prihlasenie.php');
}

if(isset($_SESSION)){
    echo"Vitajte v admine, ste prihlaseny ako <strong>".$_SESSION['uzivatel_meno']."</strong>";
    if(!$_SESSION['uzivatel_admin'])
    echo"<p>Nemate pristupove prava, oslovte administratora</p>";

    }else{
        echo"<p>Nie ste prihlaseny</p>";
    }
?>

<div class="main-card">
</div>

</body>
</html>