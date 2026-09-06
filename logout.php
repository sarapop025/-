
<?php

session_start();

// ล้างข้อมูล Session
session_unset();

// ทำลาย Session
session_destroy();

// กลับไปหน้า Login
header("Location: login.php");
exit;

?>
