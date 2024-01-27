<?php
session_start();

$serd = $_POST["ser"];

if(empty($serd)){
    echo "Please Enter Serch KeyWord";

}else{
    $_SESSION["ser2"] = $serd;
    echo "success";

}













?>