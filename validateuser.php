<?php
session_start();

// Kết nối CSDL
$host = "localhost";
$username = "root";
$password = "";
$database = "login";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Kết nối CSDL thất bại: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Kiểm tra thông tin đăng nhập trong CSDL
    $sql = "SELECT * FROM user WHERE name='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Đăng nhập thành công, thiết lập biến session và chuyển hướng
        $_SESSION["IsLogin"] = true;
        header("Location: welcome.php");
        exit();
    } else {
        // Đăng nhập không hợp lệ, chuyển hướng trở lại trang đăng nhập
        header("Location: login.html");
        exit();
    }
}

$conn->close();
?>
