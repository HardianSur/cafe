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
        $this->db->query('SELECT * FROM hardian_menu INNER JOIN hardian_kategori WHERE hardian_menu.id_kategori = hardian_kategori.id_kategori 
            WHERE id_menu=:id');
        $this->db->bind('id', $id);

        $this->db->execute();
        return $this->db->single();
    }

    public function ubahDataPelanggan($data)
    {
        $query = "UPDATE hardian_pelanggan SET 
                    nama_pelanggan = :nama, 
                    alamat = :alamat, 
                    no_telepon = :no_telepon, 
                    jenis_kelamin = :jenis_kelamin, 
                    tempat_lahir = :tempat_lahir, 
                    tanggal_lahir = :tanggal_lahir, 
                    jenis_pelanggan = :jenis_pelanggan 
                WHERE hardian_pelanggan.id_pelanggan = :id_pelanggan";
        $this->db->query($query);

        $this->db->bind('nama', $data['nama']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('no_telepon', $data['no_telepon']);
        $this->db->bind('jenis_kelamin', $data['jenis_kelamin']);
        $this->db->bind('tempat_lahir', $data['tempat_lahir']);
        $this->db->bind('tanggal_lahir', $data['tanggal_lahir']);
        $this->db->bind('jenis_pelanggan', $data['jenis_pelanggan']);
        $this->db->bind('id_pelanggan', $data['id']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusDataPelanggan($id)
    {
        $query = 'DELETE FROM hardian_pelanggan WHERE id_pelanggan = :id';
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }
}
