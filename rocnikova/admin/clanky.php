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
<div class="clanky">
    <?php
require("../db.php");

if(isset($_GET['url'])){
$url = $_GET['url'];

if($url){
    
        $sqla = "SELECT * FROM clanky 
                INNER JOIN uzivatelia ON uzivatelia.id_user=clanky.id_user
                WHERE clanky.url_article = $url";
        $result = $conn ->query($sqla);
        if(isset($result)){
            while($row = $result->fetch_row()){
            $id_user = $row[0];
            $title = $row[1];
            $content = $row[2];
            $subscribe = $row[4];
            $user = $row[7];
            }
            echo '<div class="clanek">';
            echo '<h1>'.$title.'</h1>';
            echo '<h2>'.$subscribe.'</h2>';
            echo '<br><p>'.$content.'</p><br>';
            echo '<p> Autor: '.$user.'</p>';
            echo '</div>';
        }
    }

else{
    echo "Neplatný parameter.";
}   

}else{
        $sql = "SELECT * FROM clanky";
        $result = $conn->query($sql);

        if($result->num_rows > 0){
            foreach($result as $row){
                echo '<div class="article"><a href=clanky.php?url="'.$row['url_article'].'" target="_blank">';
                echo '<h1>'.$row['title'].'</h1>';
                echo '<p>'.$row['subscribe'].'</p><br>';
                echo '</a></div>';
            }
        }else{
            echo "V databáze sa nenachádzajú žiadne články";
        }
    }
    ?>
</div>
</div>

</body>
</html>