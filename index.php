
<?php

session_start();

require_once "db.php";

// ตรวจสอบว่า Login แล้วหรือยัง
if (!isset($_SESSION["user_id"])) {

    header("Location: login.php");
    exit;

}

// ดึงข้อมูลนักเรียน
$sql = "SELECT * FROM students ORDER BY student_id DESC";

$result = $con->query($sql);

?>

<!DOCTYPE html>
<html lang="th">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>ระบบจัดการนักเรียน</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    <h1>ระบบจัดการนักเรียน</h1>

    <!-- ข้อมูลผู้ใช้งาน -->
    <p>

        ผู้ใช้งาน:
        <strong>
            <?php echo $_SESSION["username"]; ?>
        </strong>

        |

        สิทธิ์:
        <strong>
            <?php echo $_SESSION["role"]; ?>
        </strong>

        |

        <a href="logout.php">
            ออกจากระบบ
        </a>

    </p>

    <hr>

    <!-- ปุ่มเพิ่มข้อมูล -->

    <?php if (
        $_SESSION["role"] == "admin" ||
        $_SESSION["role"] == "staff"
    ) { ?>

        <a href="create.php" class="btn">
            + เพิ่มนักเรียน
        </a>

    <?php } ?>

    <br><br>

    <!-- ตารางข้อมูล -->

    <table>

        <tr>

            <th>รหัส</th>
            <th>ชื่อ</th>
            <th>นามสกุล</th>
            <th>จัดการ</th>

        </tr>

        <?php while ($row = $result->fetch_assoc()) { ?>

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

                    <!-- Admin และ Staff แก้ไขได้ -->
                    <?php if (
                        $_SESSION["role"] == "admin" ||
                        $_SESSION["role"] == "staff"
                    ) { ?>

                        <a href="edit.php?id=<?php echo $row["student_id"]; ?>">
                            แก้ไข
                        </a>

                    <?php } ?>


                    <!-- เฉพาะ Admin ลบได้ -->
                    <?php if ($_SESSION["role"] == "admin") { ?>

                        |

                        <a
                            href="delete.php?id=<?php echo $row["student_id"]; ?>"
                            onclick="return confirm('ต้องการลบข้อมูลหรือไม่?')"
                        >
                            ลบ
                        </a>

                    <?php } ?>

                    <!-- User ดูได้อย่างเดียว -->
                    <?php if ($_SESSION["role"] == "user") { ?>

                        <span>
                            ดูข้อมูล

                        </span>

                    <?php } ?>

                </td>

            </tr>

        <?php } ?>

    </table>

</div>

</body>

</html>
