<?php

class Kategori_model
{

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllKategori()
    {
        $query = ("SELECT * FROM hardian_kategori");

        $this->db->query($query);
        $this->db->execute();
        return $this->db->resultSet();
    }

    public function tambahKategori($data)
    {
        $query = ("INSERT INTO hardian_kategori VALUES (NULL, :kategori)");
        $this->db->query($query);

        $this->db->bind('kategori', $data['kategori']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getKategoriById($id)
    {
        $this->db->query('SELECT * FROM hardian_kategori WHERE id_kategori=:id');
        $this->db->bind('id', $id);

        $this->db->execute();
        return $this->db->single();
    }

    public function ubahDatakategori($data)
    {
        $query = "UPDATE hardian_kategori SET 
                    nama_kategori = :kategori 
                WHERE hardian_kategori.id_kategori = :id";
        $this->db->query($query);
        $this->db->bind('kategori', $data['kategori']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusDataRole($id)
    {
        $query = 'DELETE FROM tb_role WHERE id_role = :id';
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }
}
