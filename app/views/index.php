<?php
require_once "../controllers/EmployeeController.php";
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách nhân viên</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-6">
    <div class="container mx-auto">
        <h2 class="text-2xl font-bold mb-4 text-center">Danh sách nhân viên</h2>

        <a href="add.php" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Thêm nhân viên</a>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow-md rounded-lg">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="py-2 px-4">Mã Nhân Viên</th>
                        <th class="py-2 px-4">Tên Nhân Viên</th>
                        <th class="py-2 px-4">Giới Tính</th>
                        <th class="py-2 px-4">Nơi Sinh</th>
                        <th class="py-2 px-4">Tên Phòng</th>
                        <th class="py-2 px-4">Lương</th>
                        <th class="py-2 px-4">Hành Động</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    <?php foreach ($nhanviens as $nv): ?>
                    <tr class="border-b hover:bg-gray-200">
                        <td class="py-2 px-4"><?php echo htmlspecialchars($nv['Ma_NV']); ?></td>
                        <td class="py-2 px-4"><?php echo htmlspecialchars($nv['Ten_NV']); ?></td>
                        <td class="py-2 px-4 flex justify-center">
                            <img src="../public/<?php echo ($nv['Phai'] === 'NU') ? 'woman.jpg' : 'man.jpg'; ?>"
                                alt="<?php echo ($nv['Phai'] === 'NU') ? 'Nữ' : 'Nam'; ?>" class="w-8 h-8 rounded-full">
                        </td>

                        <td class="py-2 px-4"><?php echo htmlspecialchars($nv['Noi_Sinh']); ?></td>
                        <td class="py-2 px-4"><?php echo htmlspecialchars($nv['Ten_Phong']); ?></td>
                        <td class="py-2 px-4"><?php echo number_format($nv['Luong'], 0, ',', '.'); ?> VND</td>
                        <td class="py-2 px-4 flex gap-2">
                            <a href="edit.php?Ma_NV=<?php echo $nv['Ma_NV']; ?>"
                                class="px-4 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600 transition">
                                Sửa
                            </a>
                            <a href="delete.php?Ma_NV=<?php echo $nv['Ma_NV']; ?>"
                                class="px-4 py-1 bg-red-600 text-white rounded hover:bg-red-700 transition"
                                onclick="return confirm('Bạn có chắc muốn xóa?')">
                                Xóa
                            </a>
                        </td>

                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>