<?php
require_once "../controllers/EmployeeController.php";

if (isset($_GET['Ma_NV'])) {
    $controller->delete($_GET['Ma_NV']);
    header("Location: index.php");
    exit();
}