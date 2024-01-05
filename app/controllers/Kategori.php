<?php

class Kategori extends Controller
{
    public function index()
    {
        $data['judul'] = 'Data Kategori';
        $data['data_kategori'] = $this->model('Kategori_model')->getAllKategori();
        $this->view('templates/header', $data);
        $this->view('kategori/index', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/footer', $data);
    }

    public function tambah()
    {
        if ($this->model('Kategori_model')->tambahKategori($_POST) > 0) {
            echo "<script> 
                alert('Data Berhasil di Tambah');
                window.location.href='" . BASEURL . "/kategori';
            </script>";
            exit;
        } else {
            echo "<script> 
                alert('Data Gagal di Tambah');
                window.location.href='" . BASEURL . "/kategori';
            </script>";
        }
    }

    public function getubah()
    {
        echo json_encode($this->model('Kategori_model')->getKategoriById($_POST['id']));
    }

    public function ubah()
    {
        if ($this->model('Kategori_model')->ubahDataKategori($_POST) > 0) {
            echo "<script> 
                alert('Data Berhasil di Ubah');
                window.location.href='" . BASEURL . "/kategori';
            </script>";
            exit;
        } else {
            echo "<script> 
                alert('Data Gagal di Ubah');
                window.location.href='" . BASEURL . "/kategori';
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
