<?php
// Kết nối tới MySQL server (không chọn database cụ thể trước)
$conn = new mysqli("localhost", "root", "");

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Đặt charset
$conn->set_charset("utf8");

// Kiểm tra xem database QL_NhanSu có tồn tại không
$db_name = "ql_nhansu";
$result = $conn->query("SHOW DATABASES LIKE '$db_name'");
if ($result->num_rows == 0) {
    // Nếu database không tồn tại, tạo mới
    $create_db = "CREATE DATABASE $db_name CHARACTER SET utf8 COLLATE utf8_general_ci";
    if ($conn->query($create_db) === TRUE)   {
        echo "Database $db_name created successfully<br>";
    } else {
        die("Error creating database: " . $conn->error);
    }
}

// Chọn database
$conn->select_db($db_name);

// Kiểm tra và tạo bảng PHONGBAN nếu chưa tồn tại
$check_phongban = $conn->query("SHOW TABLES LIKE 'PHONGBAN'");
if ($check_phongban->num_rows == 0) {
    $create_phongban = "
        CREATE TABLE PHONGBAN (
            Ma_Phong VARCHAR(2) NOT NULL PRIMARY KEY,
            Ten_Phong VARCHAR(30) NOT NULL
        )";
    if ($conn->query($create_phongban) === TRUE) {
        echo "Table PHONGBAN created successfully<br>";

        // Chèn dữ liệu mẫu cho PHONGBAN
        $insert_phongban = "
            INSERT INTO PHONGBAN VALUES
            ('QT', 'Quản Trị'),
            ('TC', 'Tài Chính'),
            ('KT', 'Kỹ Thuật')
        ";
        $conn->query($insert_phongban);
    } else {
        die("Error creating table PHONGBAN: " . $conn->error);
    }
}

// Kiểm tra và tạo bảng NHANVIEN nếu chưa tồn tại
$check_nhanvien = $conn->query("SHOW TABLES LIKE 'NHANVIEN'");
if ($check_nhanvien->num_rows == 0) {
    $create_nhanvien = "
        CREATE TABLE NHANVIEN (
            Ma_NV VARCHAR(3) NOT NULL PRIMARY KEY,
            Ten_NV VARCHAR(100) NOT NULL,
            Phai VARCHAR(3),
            Noi_Sinh VARCHAR(200),
            Ma_Phong VARCHAR(2),
            Luong INT,
            FOREIGN KEY (Ma_Phong) REFERENCES PHONGBAN(Ma_Phong)
        )";
    if ($conn->query($create_nhanvien) === TRUE) {
        echo "Table NHANVIEN created successfully<br>";

        // Chèn dữ liệu mẫu cho NHANVIEN
        $insert_nhanvien = "
            INSERT INTO NHANVIEN VALUES
            ('A01', 'Nguyễn thị Hải', 'NU', 'Hà Nội', 'TC', 600),
            ('A02', 'Trần văn Chính', '', 'Bình Định', 'QT', 500),
            ('A03', 'Lê Trần bạch Yến', 'NU', 'TP HCM', 'TC', 700),
            ('A04', 'Trần anh Tuấn', '', 'Hà Nội', 'KT', 800),
            ('B01', 'Trần thanh Mai', 'NU', 'Hải Phòng', 'TC', 800),
            ('B02', 'Trần thị thu Thủy', 'NU', 'TP HCM', 'KT', 700),
            ('B03', 'Nguyễn Thị Nở', 'NU', 'Ninh Bình', 'KT', 400)
        ";
        $conn->query($insert_nhanvien);
    } else {
        die("Error creating table NHANVIEN: " . $conn->error);
    }
}

// Kiểm tra và tạo bảng users nếu chưa tồn tại
$check_users = $conn->query("SHOW TABLES LIKE 'users'");
if ($check_users->num_rows == 0) {
    $create_users = "
        CREATE TABLE users (
            Id INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(50) NOT NULL,
            password VARCHAR(255) NOT NULL,
            fullname VARCHAR(100),
            email VARCHAR(100),
            role ENUM('admin', 'user') DEFAULT 'user'
        )";
    if ($conn->query($create_users) === TRUE) {
        echo "Table users created successfully<br>";

        // Băm mật khẩu "123456" bằng password_hash()
        $hashed_password = password_hash("123456", PASSWORD_DEFAULT);
        // Chèn dữ liệu mẫu cho users
        $insert_users = "
            INSERT INTO users VALUES
            (1, 'admin','$hashed_password', 
             'Admin User', 'admin@gmail.com', 'admin')
        ";
        $conn->query($insert_users);
    } else {
        die("Error creating table users: " . $conn->error);
    }
}