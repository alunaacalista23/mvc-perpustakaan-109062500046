<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= htmlspecialchars($title ?? 'Data Buku') ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header class="topbar">
    <a href="index.php?page=buku">Perpustakaan - Data Buku</a>
</header>
<main class="container">
<?php if (!empty($flash)): ?>
    <div class="alert alert-<?= htmlspecialchars($flash['type']) ?>">
        <?= htmlspecialchars($flash['message']) ?>
    </div>
<?php endif; ?>