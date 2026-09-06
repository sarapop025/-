<?php
require_once "db.php";

// ดึงข้อมูลจากตาราง students
$sql = "SELECT * FROM students ORDER BY student_id ASC";

$result = $con->query($sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบ</title> 
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h1>ระบบจัดการนักเรียน</h1> 
    <a href="create.php">+ เพิ่มนักเรียน</a>

    <br><br>

    <table border="1" cellpadding="8">

        <tr>
            <th>รหัส</th>
            <th>ชื่อ</th>
            <th>นามสกุล</th>
            <th>จัดการ</th>
        </tr>

        <?php while ($row = $result->fetch_assoc()) { //เขียน ตาราง php?>

            <tr>

                <td>
                    <?php echo $row["student_code"]; ?>
                </td>



                <td>
                    <?php echo $row["firstname"]; ?>
                </td>

                

                <td>
                    <?php echo $row["lastname"]; ?>
                </td>

               

                <td>
                    <a href="edit.php?id=<?php echo $row["student_id"]; ?>">
                        แก้ไข
                    </a>

                    |

                    <a href="delete.php?id=<?php echo $row["student_id"]; ?>"
                       onclick="return confirm('ต้องการลบข้อมูลหรือไม่?')">
                        ลบ
                    </a>
                </td>

            </tr>

        <?php } ?>

    </table>


</body>
</html>
