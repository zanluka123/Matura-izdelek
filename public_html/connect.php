<?php
$host="mysql";
$user="zan_luka";
$pass="skrivnost";
$db="izdelek_matura";
$conn=new mysqli($host,$user,$pass,$db);
if($conn->connect_error){
    echo "Failed to connect DB".$conn->connect_error;
}
?>