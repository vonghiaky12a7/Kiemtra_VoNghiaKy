CREATE DATABASE     QL_NhanSu;
USE QL_NhanSu;

CREATE TABLE PHONGBAN (
    Ma_Phong VARCHAR(2) NOT NULL PRIMARY KEY,
    Ten_Phong VARCHAR(30) NOT NULL
);

CREATE TABLE NHANVIEN (
    Ma_NV VARCHAR(3) NOT NULL PRIMARY KEY,
    Ten_NV VARCHAR(100) NOT NULL,
    Phai VARCHAR(3),
    Noi_Sinh VARCHAR(200),
    Ma_Phong VARCHAR(2),
    Luong INT,
    FOREIGN KEY (Ma_Phong) REFERENCES PHONGBAN(Ma_Phong)
);

CREATE TABLE users (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    fullname VARCHAR(100),
    email VARCHAR(100),
    role ENUM('admin', 'user') DEFAULT 'user'
);

-- Insert data
INSERT INTO PHONGBAN VALUES
('QT', 'Quản Trị'),
('TC', 'Tài Chính'),
('KT', 'Kỹ Thuật');

INSERT INTO NHANVIEN VALUES
('A01', 'Nguyễn thị Hải', 'NU', 'Hà Nội', 'TC', 600),
('A02', 'Trần văn Chính', '', 'Bình Định', 'QT', 500),
('A03', 'Lê Trần bạch Yến', 'NU', 'TP HCM', 'TC', 700),
('A04', 'Trần anh Tuấn', '', 'Hà Nội', 'KT', 800),
('B01', 'Trần thanh Mai', 'NU', 'Hải Phòng', 'TC', 800),
('B02', 'Trần thị thu Thủy', 'NU', 'TP HCM', 'KT', 700),
('B03', 'Nguyễn Thị Nở', 'NU', 'Ninh Bình', 'KT', 400);

INSERT INTO users VALUES
(1, 'admin', '$2a$10$esSmtrK0oZWYAPX3SiGdgem8kAIT6MFUzRqpCrjnOLJt1umzic1lK', 'Admin User', 'admin@gmail.com', 'admin');   