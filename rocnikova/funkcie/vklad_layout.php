<?php
        if(isset($_GET['stranka'])){
        $stranka = $_GET['stranka'];

        if(preg_match('/^[a-z0-9]+$/',$stranka)){
            $vlozene = include($stranka.'.php');
            if(!$vlozene)
                header("Location: index.php");
        }
        else
        echo "Neplatný parameter.";       
        
    }else{ ?>
        <h1>Vitajte v admine</h1>
    <?php } ?>