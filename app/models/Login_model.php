<?php

class Login_model{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function cekLogin($data){
        $query = ("SELECT * FROM hardian_user WHERE username= :username AND password = :password");
        $this->db->query($query);
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', md5($data['password']));
        $this->db->execute();

        return $this->db->single();
    }
}