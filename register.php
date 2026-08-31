<?php
include("config.php");

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name  = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $pass  = $_POST['password'] ?? '';

    if (!empty($name) && !empty($email) && !empty($pass)) {

        $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

        $stmt = mysqli_prepare($conn, "INSERT INTO users (username, email, password) VALUES (?, ?, ?)");

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "sss", $name, $email, $hashed_password);

            if (mysqli_stmt_execute($stmt)) {
                $message = "<p style='color: green;'>تم التسجيل بنجاح!</p>";
            } else {
                $message = "<p style='color: red;'>حدث خطأ أثناء التسجيل: " . mysqli_error($conn) . "</p>";
            }

            mysqli_stmt_close($stmt);
        }
    } else {
        $message = "<p style='color: red;'>يرجى ملء جميع الحقول المطلوبة.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>تسجيل حساب جديد</title>
</head>

<body>

    <div class="big">
        <h1>New Login Account</h1>

        <?php
        if (!empty($message)) {
            echo $message;
        }
        ?>

        <form action="" method="post">
            <input placeholder="* username" type="text" name="name" required>
            <input placeholder="* email" type="email" name="email" required>
            <input placeholder="* password" type="password" name="password" required>
            <button type="submit">إنشاء حساب</button>
        </form>
    </div>
    <script src="script.js"></script>
</body>

</html>