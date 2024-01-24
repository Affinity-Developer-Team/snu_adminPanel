<?php
session_start();

include "connection.php";


$serch = $_POST["s"];

if(empty($serch)){
    echo "Please Enter Serch keyword";
}else{


   
    $_SESSION['search'] = $serch;
    echo "success";
}











?>