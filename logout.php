<?php
session_start();

// Đặt trạng thái đăng nhập thành false
$_SESSION["IsLogin"] = false;

// Chuyển hướng về trang đăng nhập
header("Location: login.html");
exit();
?>
