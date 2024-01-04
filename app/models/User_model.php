<?php

class User_model
{

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllUser()
    {
        $query = ("SELECT * FROM hardian_user INNER JOIN tb_role ON hardian_user.id_role = tb_role.id_role");

        $this->db->query($query);
        $this->db->execute();
        return $this->db->resultSet();
    }

    public function getAllRole()
    {
        $query = ("SELECT * FROM tb_role");

        $this->db->query($query);
        $this->db->execute();
        return $this->db->resultSet();
    }

    public function tambahUser($data)
    {
        $query = ("INSERT INTO hardian_user VALUES (NULL, :role, :username, :password, :nama)");
        $this->db->query($query);

        $this->db->bind('role', $data['role']);
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', md5($data['password']));
        $this->db->bind('nama', $data['nama']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getUserById($id)
    {
        $this->db->query('SELECT * FROM hardian_user WHERE id_user=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function ubahDataUser($data)
    {
        $query = "UPDATE hardian_user SET 
                    id_role = :role, 
                    username = :username, 
                    password = :password, 
                    nama_user = :nama 
                WHERE hardian_user.id_user = 9";
        $this->db->query($query);

        $this->db->bind('role', $data['role']);
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', md5($data['password']));
        $this->db->bind('nama', $data['nama']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusDataUser($id)
    {
        $query = 'DELETE FROM hardian_user WHERE id_user = :id';
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }
}
