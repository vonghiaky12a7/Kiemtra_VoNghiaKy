<?php
require_once "../controllers/EmployeeController.php";

$nhanvien = $controller->show($_GET['Ma_NV']);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controller->update($_POST);
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Nhân Viên</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white p-6 rounded-lg shadow-md w-96">
        <h2 class="text-2xl font-bold mb-4 text-center">Sửa Nhân Viên</h2>
        <form action="" method="POST" class="space-y-4">
            <input type="hidden" name="Ma_NV" value="<?= $nhanvien['Ma_NV'] ?>">
            <input type="text" name="Ten_NV" value="<?= $nhanvien['Ten_NV'] ?>" required
                class="w-full px-3 py-2 border rounded">
            <select name="Phai" class="w-full px-3 py-2 border rounded">
                <option value="NU" <?= $nhanvien['Phai'] == 'NU' ? 'selected' : '' ?>>Nữ</option>
                <option value="NAM" <?= $nhanvien['Phai'] == 'NAM' ? 'selected' : '' ?>>Nam</option>
            </select>
            <input type="text" name="Noi_Sinh" value="<?= $nhanvien['Noi_Sinh'] ?>" required
                class="w-full px-3 py-2 border rounded">
            <input type="text" name="Ma_Phong" value="<?= $nhanvien['Ma_Phong'] ?>" required
                class="w-full px-3 py-2 border rounded">
            <input type="number" name="Luong" value="<?= $nhanvien['Luong'] ?>" required
                class="w-full px-3 py-2 border rounded">
            <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded w-full">Cập Nhật</button>
        </form>
    </div>

</body>

</html>