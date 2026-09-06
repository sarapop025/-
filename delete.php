<?php

require_once "db.php";

// รับ id จาก URL
$id = $_GET["id"];

// คำสั่ง DELETE
$sql = "DELETE FROM students WHERE student_id = $id";

// ตรวจสอบการลบ
if ($con->query($sql)) {

    // ลบสำเร็จ กลับหน้า index
    header("Location: index.php");
    exit;

} else {

    echo "เกิดข้อผิดพลาด: " . $con->error;

}

?>
