<?php
session_start();

include "connection.php";

$email = $_POST["e"];
$pw = $_POST["p"];


if(empty($email)){
    echo("Plese enter user name");
}else if(empty($pw)){
    echo("Plese emter your password");
}else{

    $re = Database::serch("SELECT * FROM `admins` WHERE `email` ='".$email."' AND `password`='".$pw."'");
    $num = $re->num_rows;

    if($num==1){
        $data = $re->fetch_assoc();
        $_SESSION['admin'] = $data;
        echo("success");
        
    }else{
        echo("Email or Password incorrect Please try again!");
    }





}























?>