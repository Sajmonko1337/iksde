<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../admin-style.css">
    <title>Stranka</title>
</head>
<body>
<div class="navigation">
    <ul>
        <li class="list">
            <b></b>
            <b></b>
            <a href="admin_view.php?stranka=administracia">
                <span class="title">Administracia</span>
            </a>
        </li>
        <li class="list">
            <b></b>
            <b></b>
            <a href="admin_view.php?stranka=editor">
                <span class="title">Editor</span>
            </a>
        </li>
        <li class="list">
            <b></b>
            <b></b>
            <a href="clanky.php">
                <span class="title">Clanky</span>
            </a>
        </li>
        <li class="list">
            <b></b>
            <b></b>
            <a href="administracia.php?odhlasit">
                <span class="title">Odhlasenie</span>
            </a>
        </li>
    </ul>
</div>

<div class="main">
    <?php
        require_once("../funkcie/vklad_layout.php");
    ?>
</div>
</body>
</html>