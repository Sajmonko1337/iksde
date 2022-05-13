<?php
function uvitanie(){
    echo "Ahoj :)";
}

function familyName($fname){
    echo "<br>$fname<br>";
}

function jenedela($den){
    return (date('w', strtotime($den)) == 0);
}

function pridaj_otaznik(&$retazec){
    $retazec .= '?';
}
?>