<?php
class BukuController
{
    public function __construct(private Buku $model) {}

    public function index(): void
    {
        $buku  = $this->model->getAll();
        $flash = $this->pullFlash();
        require __DIR__ . '/../views/buku/index.php';
    }

    private function pullFlash(): ?array
    {
        $flash = $_SESSION['flash'] ?? null;
        unset($_SESSION['flash']);

        return $flash;
    }
}