<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="prihlasenie-style.css">
    <title>Document</title>
</head>
<body>

<div class="navigation">
    <ul>
        <li class="list">
            <b></b>
            <b></b>
            <a href="../index.php?stranka=domov">
                <span class="title">Domov</span>
            </a>
        </li>
        <li class="list">
            <b></b>
            <b></b>
            <a href="../index.php?stranka=omne">
                <span class="title">O nás</span>
            </a>
        </li>
        <li class="list">
            <b></b>
            <b></b>
            <a href="../index.php?stranka=kontakt">
                <span class="title">Oznamy</span>
            </a>
        </li>
        <li class="list">
            <b></b>
            <b></b>
            <a href="../index.php?stranka=cvicenia">
                <span class="title">Kontakt</span>
            </a>
        </li>
        <li class="list">
            <b></b>
            <b></b>
            <a href="../index.php?stranka=registracia">
                <span class="title">Registracia</span>
            </a>
        </li>
    </ul>
</div>

<?php
    if(isset($_GET['stranka'])){
            $adresa = $_GET['stranka'];
    }
    else{ 
        $adresa = 'domov.php';
    }
    if(preg_match('/^[a-z0-9]+$/',$adresa)){
        $premen = include('podstranky/'.$_GET['stranka'].'.php');
        if(!$premen){
            echo "podstranka nenajdena";
        }
    }
    else{
        echo "";
    }
    require_once('../kniznica/kniznica.php');
    
    //require('podstranky/'.$_GET['stranka'].'.php');
?>

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

<div class="prihlasenie-place">
<div class="prihlasenie">
    <div class="error">
<?php 
session_start();
require_once("../db.php"); 
if(isset($_SESSION['uzivatel_id'])){
    header('Location: admin_view.php?stranka=administracia');
    exit();
}
if($_POST){
    $meno=$_POST['meno'];
    $heslo=$_POST['heslo'];
    if($_POST['meno'] == '' || $_POST['heslo'] == ''){

    }else{
        $sql="SELECT * FROM uzivatelia WHERE name_user = '$meno' OR email_user = '$meno' LIMIT 1";
        $result = $conn->query($sql);
        //var_dump($result);
        while($row = $result->fetch_row()){
            $id_user = $row[0];
            $name = $row[1];
            $email = $row[2];
            $heslo = $row[3];
            $admin = $row[4];
        }
        /*
        echo $id_user;
        echo '<BR>';
        echo $name;
        echo '<BR>';
        echo $heslo;
        */
        if(!password_verify($_POST['heslo'], $heslo)){
            echo '<p> Nespravne meno alebo heslo</p>';
        }else{
            $_SESSION['uzivatel_id'] = $id_user;
            $_SESSION['uzivatel_meno'] = $name;
            $_SESSION['uzivatel_admin'] = $admin;
            $_SESSION['uzivatel_email'] = $email;
            //header('Location: admin_view.php?stranka=administracia.php');
          
            header('Location: admin_view.php?stranka=administracia');
        }
    }
}
?>
</div>
    <form method="post">
        <div class = "prihlasenie-pozadie">
        <div class="name-log">
            <input type="text" placeholder="Meno" name="meno"> <br>
        </div>
        <div class="pass-log">
            <input type="password" placeholder="Heslo" name="heslo"> <br>
        </div>
        <input type="submit" name="submit" value="Prihlásiť sa"> <br>
    </form>

    <div class = "loginText">
        <?php
            echo "Nemáte ešte účet? ";
        ?>
        <a href="../index.php?stranka=registracia">
            <span class="title">Registrovať sa</span>
        </a>
        <?php
            echo ".";
        ?>
    </div>
</div>
</div>
</body>
</html>
