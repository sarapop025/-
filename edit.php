<?php

require_once "db.php";

// รับ id จาก URL
$id = $_GET["id"];

// ดึงข้อมูลเดิม
$sql = "SELECT * FROM students WHERE student_id = $id";

$result = $con->query($sql);

$row = $result->fetch_assoc();


// เมื่อกดปุ่มแก้ไข
if (isset($_POST["update"])) {

    $student_code = $_POST["student_code"];
    $fname = $_POST["firstname"];
    $lname = $_POST["lastname"];

    // UPDATE ข้อมูล
    $sql = "UPDATE students SET
                student_code = '$student_code',
                firstname = '$fname',
                lastname = '$lname'
            WHERE student_id = $id";

    if ($con->query($sql)) {

        header("Location: index.php");
        exit;

    } else {

        echo "เกิดข้อผิดพลาด: " . $con->error;

    }
}

?>

<!DOCTYPE html>
<html lang="th">

<head>

    <meta charset="UTF-8">
    <title>แก้ไขข้อมูลนักเรียน</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>

    <h2>แก้ไขข้อมูลนักเรียน</h2>

    <form method="post">

        <p>
            รหัสนักเรียน
            <br>
            <input
                type="text"
                name="student_code"
                value="<?php echo $row["student_code"]; ?>"
                required
            >
        </p>

        <p>
            ชื่อ
            <br>
            <input
                type="text"
                name="firstname"
                value="<?php echo $row["firstname"]; ?>"
                required
            >
        </p>

        <p>
            นามสกุล
            <br>
            <input
                type="text"
                name="lastname"
                value="<?php echo $row["lastname"]; ?>"
                required
            >
        </p>

        <button type="submit" name="update">
            บันทึกการแก้ไข
        </button>

        <a href="index.php">
            ยกเลิก
        </a>

    </form>

</body>

</html>
