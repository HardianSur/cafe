<?php

class Login extends Controller{
    public function index(){
        $data['judul']= 'Login User';
        $this->view('login/index',$data);
    }

    public function cekLogin(){
        $cek = $this->model('Login_model')->cekLogin($_POST);
        if($cek){
            $_SESSION['username'] = $cek['username'];
            $_SESSION['id_role'] = $cek['id_role'];
            $_SESSION['nama_user'] = $cek['username'];
            $data['user'] = $cek;
            header('Location: '. BASEURL . '/home');
            exit;
        }else{
            Flasher::setFlash('Login Gagal.','Username atau Password salah','danger');
            header('Location: '. BASEURL . '/login');
            exit;
        }
    }
    
}