<?php
namespace App\Core;

use PDO;
use PDOException;

class Model {
    protected $db;
    protected $table;
    
    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    // Ambil semua data dari tabel (dengan penyesuaian untuk kolom huruf besar)
    public function all() {
        try {
            // ambil kolom spesifik agar aman di Railway (Email huruf besar)
            $stmt = $this->db->query("SELECT id, Email, name, created_at FROM {$this->table}");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error fetching all data: " . $e->getMessage());
            return [];
        }
    }

    // Ambil data berdasarkan ID
    public function find($id) {
        try {
            $stmt = $this->db->prepare("SELECT id, Email, name, created_at FROM {$this->table} WHERE id = :id");
            $stmt->execute(['id' => $id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error fetching data by ID: " . $e->getMessage());
            return null;
        }
    }

    // Tambah data baru
    public function create($data) {
        $columns = implode(', ', array_keys($data));
        $placeholders = ':' . implode(', :', array_keys($data));
        
        $sql = "INSERT INTO {$this->table} ({$columns}) VALUES ({$placeholders})";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($data);
    }

    // Update data berdasarkan ID
    public function update($id, $data) {
        $set = [];
        foreach ($data as $key => $value) {
            $set[] = "{$key} = :{$key}";
        }
        $set = implode(', ', $set);
        
        $sql = "UPDATE {$this->table} SET {$set} WHERE id = :id";
        $data['id'] = $id;
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($data);
    }

    // Hapus data berdasarkan ID
    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM {$this->table} WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}