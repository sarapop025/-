<?php
$con= new mysqli(
    $hosr="localhost",
    $user="root",
    $pass="",
    $db= "student_system"
);
//ตรวจสอบ
if($con->connect_error){
    die ("เชื่อมต่อฐาข้อมูลไม่สำเร็จ:". $con->connect_error);
}
//กำหนดภาษา
$con->set_charset("utf8mb4");
?>