<?php
session_start();

if(isset($_SESSION["ser2"])){
    unset($_SESSION["ser2"]);
    echo "success";
}else{
    echo "error";
}











?>