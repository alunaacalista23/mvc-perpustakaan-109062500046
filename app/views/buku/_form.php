
<form method="post" action="<?= htmlspecialchars($action ?? '', ENT_QUOTES, 'UTF-8') ?>">
    <?php if (isset($buku) && isset($buku['id'])): ?>
        <input
            type="hidden"
            name="id"
            value="<?= (int) $buku['id'] ?>"
        >
    <?php endif; ?>

    <div class="field">
        <label for="kode">Kode Buku</label>
        <input
            type="text"
            id="kode"
            name="kode"
            maxlength="20"
            required
            value="<?= htmlspecialchars($form['kode'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
        >
    </div>

    <div class="field">
        <label for="judul">Judul</label>
        <input
            type="text"
            id="judul"
            name="judul"
            maxlength="150"
            required
            value="<?= htmlspecialchars($form['judul'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
        >
    </div>

    <div class="field">
        <label for="penulis">Penulis</label>
        <input
            type="text"
            id="penulis"
            name="penulis"
            maxlength="100"
            required
            value="<?= htmlspecialchars($form['penulis'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
        >
    </div>

    <div class="field">
        <label for="penerbit">Penerbit</label>
        <input
            type="text"
            id="penerbit"
            name="penerbit"
            maxlength="100"
            required
            value="<?= htmlspecialchars($form['penerbit'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
        >
    </div>

    <div class="field">
        <label for="tahun_terbit">Tahun Terbit</label>
        <input
            type="number"
            id="tahun_terbit"
            name="tahun_terbit"
            min="1000"
            max="<?= (int) date('Y') + 1 ?>"
            required
            value="<?= htmlspecialchars((string) ($form['tahun_terbit'] ?? ''), ENT_QUOTES, 'UTF-8') ?>"
        >
    </div>

    <div class="field">
        <label for="stok">Stok</label>
        <input
            type="number"
            id="stok"
            name="stok"
            min="0"
            required
            value="<?= htmlspecialchars((string) ($form['stok'] ?? ''), ENT_QUOTES, 'UTF-8') ?>"
        >
    </div>

    <button type="submit" class="btn">
        <?= htmlspecialchars($submitLabel ?? 'Simpan', ENT_QUOTES, 'UTF-8') ?>
    </button>

    <a href="index.php?page=buku" class="btn-link">Batal</a>
</form>
