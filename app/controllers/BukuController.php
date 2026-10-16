<?php

class BukuController
{
    public function __construct(private Buku $model) {}

    public function index(): void
    {
        $buku = $this->model->getAll();
        $flash = $this->pullFlash();

        require __DIR__ . '/../views/buku/index.php';
    }

    public function create(): void
    {
        $flash = $this->pullFlash();

        $form = $this->pullOld() ?: [
            'kode' => '',
            'judul' => '',
            'penulis' => '',
            'penerbit' => '',
            'tahun_terbit' => '',
            'stok' => '',
        ];

        require __DIR__ . '/../views/buku/create.php';
    }

    public function store(): void
    {
        $this->requirePost();

        [$data, $errors] = $this->validateInput($_POST);
        $back = 'index.php?page=buku&action=create';

        if ($errors) {
            $this->fail(implode(' ', $errors), $_POST, $back);
            return;
        }

        try {
            $this->model->insert($data);
        } catch (PDOException $e) {
            $this->fail($this->dbMessage($e), $_POST, $back);
            return;
        }

        $this->flash('success', 'Buku berhasil ditambahkan.');
        $this->redirect('index.php?page=buku');
    }

    private function pullFlash(): ?array
    {
        $flash = $_SESSION['flash'] ?? null;
        unset($_SESSION['flash']);

        return $flash;
    }

    private function validateInput(array $input): array
    {
        $labels = [
            'kode' => 'Kode buku',
            'judul' => 'Judul',
            'penulis' => 'Penulis',
            'penerbit' => 'Penerbit',
            'tahun_terbit' => 'Tahun terbit',
            'stok' => 'Stok',
        ];

        $data = [];
        $errors = [];

        foreach ($labels as $field => $label) {
            $data[$field] = trim((string) ($input[$field] ?? ''));

            if ($data[$field] === '') {
                $errors[] = "$label wajib diisi.";
            }
        }

        $tahun = $data['tahun_terbit'];

        if ($tahun !== '') {
            $batas = (int) date('Y') + 1;

            if (
                !ctype_digit($tahun) ||
                (int) $tahun < 1000 ||
                (int) $tahun > $batas
            ) {
                $errors[] = 'Tahun terbit tidak valid.';
            }
        }

        if (
            $data['stok'] !== '' &&
            !ctype_digit($data['stok'])
        ) {
            $errors[] = 'Stok harus berupa bilangan bulat 0 atau lebih.';
        }

        if (!$errors) {
            $data['tahun_terbit'] = (int) $data['tahun_terbit'];
            $data['stok'] = (int) $data['stok'];
        }

        return [$data, $errors];
    }

    private function dbMessage(PDOException $e): string
    {
        return $e->getCode() === '23000'
            ? 'Kode buku sudah dipakai. Gunakan kode lain.'
            : 'Terjadi kesalahan pada database. Coba lagi.';
    }

    private function flash(string $type, string $message): void
    {
        $_SESSION['flash'] = [
            'type' => $type,
            'message' => $message,
        ];
    }

    private function pullOld(): array
    {
        $old = $_SESSION['old'] ?? [];
        unset($_SESSION['old']);

        return $old;
    }

    private function fail(
        string $message,
        array $old,
        string $url
    ): void {
        $this->flash('error', $message);
        $_SESSION['old'] = $old;
        $this->redirect($url);
    }

    private function redirect(string $url): void
    {
        header('Location: ' . $url);
        exit;
    }

    private function requirePost(): void
    {
        if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') {
            http_response_code(405);
            exit('Metode tidak diizinkan.');
        }
    }
}
