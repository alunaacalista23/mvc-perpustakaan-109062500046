<?php
class Buku
{
    public function __construct(private PDO $db) {}
 
    public function getAll(): array
    {
        $sql = 'SELECT id, kode, judul, penulis, penerbit, tahun_terbit, stok
                FROM buku ORDER BY judul';
 
        return $this->db->query($sql)->fetchAll();
    }
}