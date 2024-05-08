<?php
session_start();

// Hàm mã hóa mật khẩu bằng SHA1
function hashPassword($password) {
    return sha1($password);
}

// Kiểm tra trạng thái đăng nhập
function isLoggedIn() {
    return isset($_SESSION["IsLogin"]) && $_SESSION["IsLogin"] === true;
}

// Xử lý tải lên tệp
if (isset($_FILES['file'])) {
    $uploadDir = 'upload/';
    $uploadedFiles = [];

    foreach ($_FILES['file']['name'] as $key => $name) {
        $fileTmpName = $_FILES['file']['tmp_name'][$key];
        $fileType = $_FILES['file']['type'][$key];
        $fileSize = $_FILES['file']['size'][$key];
        $uploadPath = $uploadDir . basename($name);

        if (move_uploaded_file($fileTmpName, $uploadPath)) {
            $uploadedFiles[] = [
                'name' => $name,
                'type' => $fileType,
                'size' => $fileSize,
                'date' => date('Y-m-d H:i:s')
            ];
        }
    }
}

// Kiểm tra xem người dùng đã gửi dữ liệu đăng nhập chưa
if (isset($_POST["username"]) && isset($_POST["password"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Mã hóa mật khẩu trước khi lưu vào cơ sở dữ liệu
    $hashedPassword = hashPassword($password);

    // Giả sử bạn có một cơ sở dữ liệu và lưu tên người dùng và mật khẩu đã được mã hóa
    // Trong trường hợp này, bạn cần thay đổi các truy vấn để phù hợp với cấu trúc cơ sở dữ liệu của bạn
    // Ví dụ: INSERT INTO users (username, password) VALUES ('$username', '$hashedPassword')

    // Thực hiện chuyển hướng đến trang chính hoặc trang đã đăng nhập
    $_SESSION["IsLogin"] = true;
    header("Location: index.php");
    exit();
}

?>
