<?php
require_once "../config/db.php";
require_once "../models/Employee.php";

class NhanVienController
{
    private $model;

    public function __construct($db)
    {
        $this->model = new NhanVienModel($db);
    }

    public function index()
    {
        return $this->model->getAllNhanVien();
    }
    
    
    public function show($ma_nv)
    {
        return $this->model->getNhanVienById($ma_nv);
    }

    public function create($data)
    {
        return $this->model->addNhanVien(
            $data['Ma_NV'],
            $data['Ten_NV'],
            $data['Phai'],
            $data['Noi_Sinh'],
            $data['Ma_Phong'],
            $data['Luong']
        );
    }

    public function update($data)
    {
        return $this->model->updateNhanVien(
            $data['Ma_NV'],
            $data['Ten_NV'],
            $data['Phai'],
            $data['Noi_Sinh'],
            $data['Ma_Phong'],
            $data['Luong']
        );
    }

    public function delete($ma_nv)
    {
        return $this->model->deleteNhanVien($ma_nv);
    }
}

// Khởi tạo kết nối CSDL
$conn = new mysqli("localhost", "root", "", "ql_nhansu");
$conn->set_charset("utf8");

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Tạo controller và lấy dữ liệu
$controller = new NhanVienController($conn);
$nhanviens = $controller->index();