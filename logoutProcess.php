<?php

session_start();

if(isset($_SESSION['admin'])){
    session_destroy();

    echo("success");
}else{
    echo("error");
}













?>