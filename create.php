
<?php
session_start();

require_once "db.php";

if (isset($_POST["save"])) {

    $student_code = $_POST["student_code"];
    $fname = $_POST["firstname"];
    $lname = $_POST["lastname"];

    $sql = "INSERT INTO students
            (student_code, firstname, lastname)
            VALUES
            ('$student_code', '$fname', '$lname')";

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
    <title>เพิ่มนักเรียน</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <h2>เพิ่มข้อมูลนักเรียน</h2>

    <form method="post">

        <p>
            รหัสนักเรียน
            <br>
            <input type="text" name="student_code" required>
        </p>

        <p>
            ชื่อ
            <br>
            <input type="text" name="firstname" required>
        </p>

        <p>
            นามสกุล
            <br>
            <input type="text" name="lastname" required>
        </p>

        <button type="submit" name="save">
            บันทึก
        </button>

        <a href="index.php">
            ยกเลิก
        </a>

    </form>

</body>

</html>
