<?php

class Role_model
{

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllRole()
    {
        $query = ("SELECT * FROM tb_role");

        $this->db->query($query);
        $this->db->execute();
        return $this->db->resultSet();
    }

    public function tambahRole($data)
    {
        $query = ("INSERT INTO tb_role VALUES (NULL, :role)");
        $this->db->query($query);

        $this->db->bind('role', $data['role']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getRoleById($id)
    {
        $this->db->query('SELECT * FROM tb_role WHERE id_role=:id');
        $this->db->bind('id', $id);

        $this->db->execute();
        return $this->db->single();
    }

    public function ubahDataRole($data)
    {
        $query = "UPDATE tb_role SET 
                    nama_role = :role 
                WHERE tb_role.id_role = :id";
        $this->db->query($query);
        $this->db->bind('role', $data['role']);
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
