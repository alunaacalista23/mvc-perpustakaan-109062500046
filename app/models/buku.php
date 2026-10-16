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
    public function insert(array $data): bool
    {
        $sql = 'INSERT INTO buku (kode, judul, penulis, penerbit, tahun_terbit, stok)
                VALUES (:kode, :judul, :penulis, :penerbit, :tahun, :stok)';
 
        return $this->db->prepare($sql)->execute([
            ':kode'     => $data['kode'],
            ':judul'    => $data['judul'],
            ':penulis'  => $data['penulis'],
            ':penerbit' => $data['penerbit'],
            ':tahun'    => $data['tahun_terbit'],
            ':stok'     => $data['stok'],
        ]);
    }

}