<?php
if (!isset($_SESSION)) {
    session_start();
}
header('Content-Type: text/html; charset=utf-8');
// Kết nối cơ sở dữ liệu
$conn = mysqli_connect('localhost', 'root', '', 'shop') or die('Connection fail!');
mysqli_set_charset($conn, "utf8");
