<?php

class User extends Controller
{
    public function index()
    {
        $data['judul'] = 'User';
        $data['data_user'] = $this->model('User_model')->getAllUser();
        $data['data_role'] = $this->model('User_model')->getAllRole();
        $this->view('templates/header', $data);
        $this->view('user/index', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/footer', $data);
    }

    public function tambah()
    {
        if ($this->model('User_model')->tambahUser($_POST) > 0) {
            echo "<script> 
                alert('Data Berhasil di Tambah');
                window.location.href='" . BASEURL . "/user';
            </script>";
            exit;
        } else {
            echo "<script> 
                alert('Data Gagal di Tambah');
                window.location.href='" . BASEURL . "/user';
            </script>";
        }
    }

    public function getubah()
    {
        echo json_encode($this->model('User_model')->getUserById($_POST['id']));
    }

    public function ubah()
    {
        if ($this->model('User_model')->ubahDataUser($_POST) > 0) {
            echo "<script> 
                alert('Data Berhasil di Ubah');
                window.location.href='" . BASEURL . "/user';
            </script>";
            exit;
        } else {
            echo "<script> 
                alert('Data Gagal di Ubah');
                window.location.href='" . BASEURL . "/user';
            </script>";
        }
    }

    public function hapus($id)
    {
        if ($this->model('User_model')->hapusDataUser($id) > 0) {
            echo "<script> 
                alert('Data Berhasil di Hapus');
                window.location.href='" . BASEURL . "/user';
            </script>";
            exit;
        } else {
            echo "<script> 
                alert('Data Gagal di Hapus');
                window.location.href='" . BASEURL . "/user';
            </script>";
        }
    }
}
