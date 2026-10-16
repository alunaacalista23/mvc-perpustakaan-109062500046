<?php
$title       = 'Tambah Buku';
$action      = 'index.php?page=buku&action=store';
$submitLabel = 'Simpan';
require __DIR__ . '/../layout/header.php';
?>
<h2>Tambah Buku</h2>
<?php require __DIR__ . '/_form.php'; ?>
<?php require __DIR__ . '/../layout/footer.php'; ?>