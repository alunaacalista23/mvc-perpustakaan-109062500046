<?php
$title = 'Daftar Buku';
require __DIR__ . '/../layout/header.php';
?>

<div class="toolbar">
    <h2>Daftar Buku</h2>
    <a class="btn" href="index.php?page=buku&action=create">+ Tambah Buku</a>
</div>

<table>
    <thead>
        <tr>
            <th>Kode</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th>Tahun</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if (empty($buku)): ?>
            <tr>
                <td colspan="7">Belum ada data buku.</td>
            </tr>
        <?php endif; ?>

        <?php foreach (($buku ?? []) as $b): ?>
            <tr>
                <td><?= htmlspecialchars($b['kode']) ?></td>
                <td><?= htmlspecialchars($b['judul']) ?></td>
                <td><?= htmlspecialchars($b['penulis']) ?></td>
                <td><?= htmlspecialchars($b['penerbit']) ?></td>
                <td><?= (int) $b['tahun_terbit'] ?></td>
                <td><?= (int) $b['stok'] ?></td>
                <td class="actions">
                    <a href="index.php?page=buku&action=edit&id=<?= (int) $b['id'] ?>">Edit</a>

                    <form method="post"
                          action="index.php?page=buku&action=delete"
                          onsubmit="return confirm('Hapus buku ini?')">
                        <input type="hidden" name="id" value="<?= (int) $b['id'] ?>">
                        <button type="submit" class="btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require __DIR__ . '/../layout/footer.php'; ?>