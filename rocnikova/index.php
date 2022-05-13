<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index-style.css">
    <title>Školská Web Stránka</title>
</head>
<body>
<div class="navigation">
    <ul>
        <li class="list">
            <b></b>
            <b></b>
            <a href="index.php?stranka=onas">
                <span class="title">O nás</span>
            </a>
        </li>
        <li class="list">
            <b></b>
            <b></b>
            <a href="index.php?stranka=oznamy">
                <span class="title">Oznamy</span>
            </a>
        </li>
        <li class="list">
            <b></b>
            <b></b>
            <a href="index.php?stranka=kontakt">
                <span class="title">Kontakt</span>
            </a>
        </li>
        <li class="list">
            <b></b>
            <b></b>
            <a href="index.php?stranka=vyucovanie">
                <span class="title">Vyučovanie</span>
            </a>
        </li>
        <li class="list">
            <b></b>
            <b></b>
            <a href="index.php?stranka=registracia">
                <span class="title">Prihlásenie</span>
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
    require_once('kniznica/kniznica.php');
    
    //require('podstranky/'.$_GET['stranka'].'.php');
  
?>
</body>
</html>