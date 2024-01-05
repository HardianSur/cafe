<?php

class Role extends Controller
{
    public function index()
    {
        $data['judul'] = 'Data Role';
        $data['data_role'] = $this->model('Role_model')->getAllRole();
        $this->view('templates/header', $data);
        $this->view('role/index', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/footer', $data);
    }

    public function tambah()
    {
        if ($this->model('Role_model')->tambahRole($_POST) > 0) {
            echo "<script> 
                alert('Data Berhasil di Tambah');
                window.location.href='" . BASEURL . "/role';
            </script>";
            exit;
        } else {
            echo "<script> 
                alert('Data Gagal di Tambah');
                window.location.href='" . BASEURL . "/role';
            </script>";
        }
    }

    public function getubah()
    {
        echo json_encode($this->model('Role_model')->getRoleById($_POST['id']));
    }

    public function ubah()
    {
        if ($this->model('Role_model')->ubahDataRole($_POST) > 0) {
            echo "<script> 
                alert('Data Berhasil di Ubah');
                window.location.href='" . BASEURL . "/role';
            </script>";
            exit;
        } else {
            echo "<script> 
                alert('Data Gagal di Ubah');
                window.location.href='" . BASEURL . "/role';
            </script>";
        }
    }

    public function hapus($id)
    {
        if ($this->model('Role_model')->hapusDataRole($id) > 0) {
            echo "<script> 
                alert('Data Berhasil di Hapus');
                window.location.href='" . BASEURL . "/role';
            </script>";
            exit;
        } else {
            echo "<script> 
                alert('Data Gagal di Hapus');
                window.location.href='" . BASEURL . "/role';
            </script>";
        }
    }
}
