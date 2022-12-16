<?php

$tipo = "Local";

if($tipo == "Local") {
    
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "";

$cx = mysqli_connect($servername, $username, $password);
$db = mysqli_select_db($cx, $dbname);
mysqli_set_charset($cx, "utf8");


}else{

$servername = "";
$username = "";
$password = "";
$dbname = "";

$cx = mysqli_connect($servername, $username, $password);
$db = mysqli_select_db($cx, $dbname);
mysqli_set_charset($cx, "utf8");

}

?>