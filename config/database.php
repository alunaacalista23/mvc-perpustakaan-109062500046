<?php

class Database
{
    private string $host = 'localhost';
    private int $port = 3307;
    private string $db = 'perpustakaan';
    private string $user = 'root';
    private string $pass = '';

    public function connect(): PDO
    {
        $dsn = "mysql:host={$this->host};port={$this->port};dbname={$this->db};charset=utf8mb4";

        return new PDO($dsn, $this->user, $this->pass, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }
}