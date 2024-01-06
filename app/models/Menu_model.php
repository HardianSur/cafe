<?php

class Menu_model
{

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllMenu()
    {
        $query = ("SELECT * FROM hardian_menu INNER JOIN hardian_kategori WHERE hardian_menu.id_kategori = hardian_kategori.id_kategori");

        $this->db->query($query);
        $this->db->execute();
        return $this->db->resultSet();
    }

    public function tambahMenu($data)
    {
        $query = "INSERT INTO `hardian_menu` (`id_menu`, `nama_menu`, `harga_menu`, `id_kategori`, `foto_menu`, `status_menu`) 
        VALUES (NULL, :nama, :harga_menu, :id_kategori, :foto_menu, :status_menu)";
        $this->db->query($query);

        $this->db->bind('nama', $data['nama']);
        $this->db->bind('harga_menu', $data['harga_menu']);
        $this->db->bind('id_kategori', $data['kategori_menu']);
        $this->db->bind('foto_menu', $data['foto_menu']);
        $this->db->bind('status_menu', $data['status_menu']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getMenuById($id)
    {
        $this->db->query('SELECT * FROM hardian_menu INNER JOIN hardian_kategori ON hardian_menu.id_kategori = hardian_kategori.id_kategori 
            WHERE id_menu=:id');
        $this->db->bind('id', $id);

        $this->db->execute();
        return $this->db->single();
    }

    public function ubahDataMenu($data)
    {
        $query = "UPDATE hardian_menu SET 
        nama_menu = :nama, 
        harga_menu = :harga_menu, 
        id_kategori = :kategori_menu, 
        foto_menu = :foto_menu, 
        status_menu = :status_menu 
        WHERE hardian_menu.id_menu = :id_menu";
        $this->db->query($query);

        $this->db->bind('nama', $data['nama']);
        $this->db->bind('harga_menu', $data['harga_menu']);
        $this->db->bind('kategori_menu', $data['kategori_menu']);
        $this->db->bind('foto_menu', $data['foto_menu']);
        $this->db->bind('status_menu', $data['status_menu']);
        $this->db->bind('id_menu', $data['id']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusDataMenu($id)
    {
        $query = 'DELETE FROM hardian_menu WHERE id_menu = :id';
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }
}
