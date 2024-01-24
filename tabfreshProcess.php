<?php
session_start();

if (isset($_SESSION['search'])) {

    unset($_SESSION["search"]);
    echo ("success");
}else{
    echo ("error");
}
