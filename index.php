<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Danh sách sinh viên đăng ký môn học</title>
<style>
table {
border-collapse: collapse;
width: 100%;
}
th, td {
border: 1px solid black;
padding: 8px;
text-align: left;
}
</style>
</head>
<body>
<h2>Danh sách sinh viên đăng ký môn học</h2>
<table>
<tr>
<th>MSSV</th>
<th>Họ và tên</th>
<th>Kỳ</th>
<th>Đăng ký</th>
</tr>
<?php
// Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pka_s";

try {
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Truy vấn dữ liệu
$stmt = $conn->prepare("SELECT SinhVien.MSSV, SinhVien.HoTen, DangKy.Ky, MonHoc.TenMH
FROM SinhVien
INNER JOIN DangKy ON SinhVien.MSSV = DangKy.MSSV
INNER JOIN MonHoc ON DangKy.MaMH = MonHoc.MaMH");
$stmt->execute();

// Hiển thị dữ liệu
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
echo "<tr>";
echo "<td>".$row['MSSV']."</td>";
echo "<td>".$row['HoTen']."</td>";
echo "<td>".$row['Ky']."</td>";
echo "<td>".$row['TenMH']."</td>";
echo "</tr>";
}
} catch(PDOException $e) {
echo "Lỗi: " . $e->getMessage();
}
$conn = null;
?>
</table>
</body>
</html>