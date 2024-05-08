<?php
session_start();

// Kiểm tra xem người dùng đã đăng nhập hay chưa
if (!isset($_SESSION["IsLogin"]) || $_SESSION["IsLogin"] !== true) {
    // Nếu chưa đăng nhập, chuyển hướng về trang đăng nhập
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chào mừng</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 100px;
        }
        .card {
            max-width: 400px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h2 class="text-center">Chào mừng</h2>
            </div>
            <div class="card-body">
                <h4 class="text-center">Xin chào</h4>
                <p class="text-center">Chào mừng bạn đã đăng nhập thành công.</p>
                <div class="text-center">
                    <form action="logout.php" method="post">
                        <button type="submit" class="btn btn-primary">Đăng xuất</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
