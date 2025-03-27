<?php
session_start();
require_once '../config/db.php'; // Giữ nguyên đường dẫn như bạn đã yêu cầu

$error = ''; // Biến lưu thông báo lỗi

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($user = $result->fetch_assoc()) {
        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user;
            $_SESSION['user_role'] = $user['role']; // Assuming the role is stored in the users table
            header("Location: ./index.php");

            exit(); // Đảm bảo không chạy code tiếp theo sau khi chuyển hướng
        } else {
            $error = "Mật khẩu không đúng!";
        }
    } else {
        $error = "Tài khoản không tồn tại!";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded-lg shadow-md w-96">
        <h2 class="text-2xl font-bold mb-6 text-center">Đăng Nhập</h2>

        <!-- Hiển thị thông báo lỗi nếu có -->
        <?php if ($error): ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <?php echo $error; ?>
        </div>
        <?php endif; ?>

        <form method="POST" id="loginForm">
            <div class="mb-4">
                <input type="text" name="username" placeholder="Username" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <input type="password" name="password" placeholder="Password" class="w-full p-2 border rounded"
                    required>
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-600">
                Đăng Nhập
            </button>
        </form>
    </div>
</body>