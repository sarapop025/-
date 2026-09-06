
<?php

session_start();

require_once "db.php";

$message = "";

// กด Login
if (isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    // ค้นหาข้อมูลผู้ใช้
    $sql = "SELECT * FROM users
            WHERE username = '$username'
            AND password = '$password'";

    $result = $con->query($sql);

    // ตรวจสอบว่าพบผู้ใช้หรือไม่
    if ($result && $result->num_rows == 1) {

        $row = $result->fetch_assoc();

        // เก็บข้อมูลลง Session
        $_SESSION["user_id"] = $row["user_id"];
        $_SESSION["username"] = $row["username"];
        $_SESSION["role"] = $row["role"];

        // ไปหน้า index
        header("Location: index.php");
        exit;

    } else {

        $message = "Username หรือ Password ไม่ถูกต้อง";

    }
}

?>

<!DOCTYPE html>
<html lang="th">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>เข้าสู่ระบบ</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    <h2>เข้าสู่ระบบ</h2>

    <?php if ($message != "") { ?>

        <p>
            <?php echo $message; ?>
        </p>

    <?php } ?>

    <form method="post">

        <p>
            Username
            <br>

            <input
                type="text"
                name="username"
                required
            >
        </p>

        <p>
            Password
            <br>

            <input
                type="password"
                name="password"
                required
            >
        </p>

        <button type="submit" name="login">
            Login
        </button>

    </form>

</div>

</body>

</html>
