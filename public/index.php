<?php
session_start();
 
require __DIR__ . '/../config/database.php';
require __DIR__ . '/../app/models/Buku.php';
require __DIR__ . '/../app/controllers/BukuController.php';
 
try {
    $db = (new Database())->connect();
} catch (PDOException $e) {
    http_response_code(500);
    exit('Tidak dapat terhubung ke database.');
}
 
$controller = new BukuController(new Buku($db));
 
$page   = $_GET['page'] ?? 'buku';
$action = $_GET['action'] ?? 'index';
 
if ($page !== 'buku') {
    http_response_code(404);
    exit('Halaman tidak ditemukan.');
}
 
match ($action) {
    'create' => $controller->create(),
    'store'  => $controller->store(),
    'index' => $controller->index(),
    default => (function () {
        http_response_code(404);
        exit('Action tidak ditemukan.');
    })(),
};