<?php

include "connection.php";



$funame = $_POST["funame"];
$marks = $_POST["marks"];
$date = $_POST["date"];
$intime = $_POST["intime"];
$outtime = $_POST["outtime"];
$br = $_POST["br"];
$users = $_POST["users"];

if (empty($funame)) {
    echo ("Enter Student Id");
} else if (empty($marks)) {
    echo ("Enter Student Marks");
}else if($marks<0 || $marks>101){
    echo ("invalid marks");



}else if (empty($date)) {
    echo ("Enter Date");
} else if (empty($intime)) {
    echo ("Enter Intime");
} else if (empty($outtime)) {
    echo ("Enter OutTime");
} else {





    $rs = Database::serch("SELECT * FROM `students` WHERE `stu_id` = '" . $funame . "'");
    $num = $rs->num_rows;

    if ($num == 1) {

        $stdata = $rs->fetch_assoc();
        $datet = new DateTime();
        $tz = new DateTimeZone("Asia/Colombo");
        $datet->setTimezone($tz);
        $datenow = $datet->format('Y-m-d H:i:s');

        Database::iud("INSERT INTO `atends`(`date`,`in_time`,`out_time`,`marks`,`submited_date`,`branches_branch_id`,`students_id`) VALUES('" . $date . "','" . $intime . "','" . $outtime . "','" . $marks . "','" . $datenow . "','" . $br . "','" . $stdata["id"] . "')");
        echo ("success");
    } else {
        echo ("Invalis Stundent Id");
    }
}
