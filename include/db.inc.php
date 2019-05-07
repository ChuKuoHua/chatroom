<?php

//建立連接的資料庫

$servername ="localhost";
$dbusername ="root";
$dbpassword ="";
$dbname ="chatroom";

$conn=mysqli_connect($servername,$dbusername,$dbpassword,$dbname);
mysqli_query($conn,"SET NAMES UTF8");

if(!$conn){
    die("Connection failed:".mysqli_connect_error());
}

?>