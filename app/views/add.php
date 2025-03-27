<?php
require_once "../controllers/EmployeeController.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controller->create($_POST);
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Nhân Viên</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white p-6 rounded-lg shadow-md w-96">
        <h2 class="text-2xl font-bold mb-4 text-center">Thêm Nhân Viên</h2>
        <form action="" method="POST" class="space-y-4">
            <input type="text" name="Ma_NV" placeholder="Mã NV" required class="w-full px-3 py-2 border rounded">
            <input type="text" name="Ten_NV" placeholder="Tên Nhân Viên" required
                class="w-full px-3 py-2 border rounded">
            <select name="Phai" class="w-full px-3 py-2 border rounded">
                <option value="NU">Nữ</option>
                <option value="NAM">Nam</option>
            </select>
            <input type="text" name="Noi_Sinh" placeholder="Nơi Sinh" required class="w-full px-3 py-2 border rounded">
            <input type="text" name="Ma_Phong" placeholder="Mã Phòng" required class="w-full px-3 py-2 border rounded">
            <input type="number" name="Luong" placeholder="Lương" required class="w-full px-3 py-2 border rounded">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded w-full">Thêm</button>
        </form>
    </div>

</body>

</html>