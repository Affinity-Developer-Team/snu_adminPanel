<?php
include "connection.php";


$id= $_GET["id"];

Database :: iud("UPDATE `onlstudents` SET `comfirm_c_id` = '1' WHERE `id` = '".$id."'");
echo("success");











?>