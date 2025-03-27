<?php
class NhanVienModel
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Lấy tất cả nhân viên
    public function getAllNhanVien()
    {
        $query = "
            SELECT NV.Ma_NV, NV.Ten_NV, NV.Phai, NV.Noi_Sinh, PB.Ten_Phong, NV.Luong
            FROM NHANVIEN NV
            LEFT JOIN PHONGBAN PB ON NV.Ma_Phong = PB.Ma_Phong
        ";
        $result = $this->conn->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
    // Lấy 1 nhân viên theo ID
    public function getNhanVienById($ma_nv)
    {
        $query = "SELECT * FROM NHANVIEN WHERE Ma_NV = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $ma_nv);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    // Thêm nhân viên
    public function addNhanVien($ma_nv, $ten_nv, $phai, $noi_sinh, $ma_phong, $luong)
    {
        $query = "INSERT INTO NHANVIEN (Ma_NV, Ten_NV, Phai, Noi_Sinh, Ma_Phong, Luong) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sssssi", $ma_nv, $ten_nv, $phai, $noi_sinh, $ma_phong, $luong);
        return $stmt->execute();
    }

    // Cập nhật nhân viên
    public function updateNhanVien($ma_nv, $ten_nv, $phai, $noi_sinh, $ma_phong, $luong)
    {
        $query = "UPDATE NHANVIEN SET Ten_NV=?, Phai=?, Noi_Sinh=?, Ma_Phong=?, Luong=? WHERE Ma_NV=?";
        $stmt = $this->conn->prepare($query);

        // Sửa kiểu dữ liệu của Ma_NV và Ma_Phong sang string (s)
        $stmt->bind_param("ssssis", $ten_nv, $phai, $noi_sinh, $ma_phong, $luong, $ma_nv);

        return $stmt->execute();
    }

    // Xóa nhân viên
    public function deleteNhanVien($ma_nv)
    {
        $query = "DELETE FROM NHANVIEN WHERE Ma_NV = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $ma_nv);
        return $stmt->execute();
    }
}