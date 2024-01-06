<?php

class Menu extends Controller
{
    public function index()
    {
        $data['judul'] = 'Data menu';
        $data['data_menu'] = $this->model('Menu_model')->getAllMenu();
        $data['data_kategori'] = $this->model('Kategori_model')->getAllkategori();
        $this->view('templates/header', $data);
        $this->view('menu/index', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/footer', $data);
    }

    public function tambah()
    {
        if ($this->model('Menu_model')->tambahMenu($_POST) > 0) {
            echo "<script> 
                alert('Data Berhasil di Tambah');
                window.location.href='" . BASEURL . "/menu';
            </script>";
            exit;
        } else {
            echo "<script> 
                alert('Data Gagal di Tambah');
                window.location.href='" . BASEURL . "/menu';
            </script>";
        }
    }

    public function getubah()
    {
        echo json_encode($this->model('Menu_model')->getMenuById($_POST['id']));
    }

    public function ubah()
    {
        if ($this->model('Menu_model')->ubahDataMenu($_POST) > 0) {
            echo "<script> 
                alert('Data Berhasil di Ubah');
                window.location.href='" . BASEURL . "/menu';
            </script>";
            exit;
        } else {
            echo "<script> 
                alert('Data Gagal di Ubah');
                window.location.href='" . BASEURL . "/menu';
            </script>";
        }
    }

    public function hapus($id)
    {
        if ($this->model('Menu_model')->hapusDataMenu($id) > 0) {
            echo "<script> 
                alert('Data Berhasil di Hapus');
                window.location.href='" . BASEURL . "/menu';
            </script>";
            exit;
        } else {
            echo "<script> 
                alert('Data Gagal di Hapus');
                window.location.href='" . BASEURL . "/menu';
            </script>";
        }
    }
}
