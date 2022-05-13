<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pvp_databaza_web";

$conn = new mysqli($servername, $username, $password, $dbname);
if($conn -> connect_error){
    die("Spojenie sa nepodarilo".connect_error);
}
//echo "spojenie sa podarilo";
?>