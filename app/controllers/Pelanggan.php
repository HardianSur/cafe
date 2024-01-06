<?php

class Pelanggan extends Controller
{
    public function index()
    {
        $data['judul'] = 'Data Pelanggan';
        $data['data_pelanggan'] = $this->model('Pelanggan_model')->getAllPelanggan();
        $this->view('templates/header', $data);
        $this->view('pelanggan/index', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/footer', $data);
    }

    public function tambah()
    {
        if ($this->model('Pelanggan_model')->tambahPelanggan($_POST) > 0) {
            echo "<script> 
                alert('Data Berhasil di Tambah');
                window.location.href='" . BASEURL . "/pelanggan';
            </script>";
            exit;
        } else {
            echo "<script> 
                alert('Data Gagal di Tambah');
                window.location.href='" . BASEURL . "/pelanggan';
            </script>";
        }
    }

    public function getubah()
    {
        echo json_encode($this->model('Pelanggan_model')->getPelangganById($_POST['id']));
    }

    public function ubah()
    {
        if ($this->model('Pelanggan_model')->ubahDataPelanggan($_POST) > 0) {
            echo "<script> 
                alert('Data Berhasil di Ubah');
                window.location.href='" . BASEURL . "/pelanggan';
            </script>";
            exit;
        } else {
            echo "<script> 
                alert('Data Gagal di Ubah');
                window.location.href='" . BASEURL . "/pelanggan';
            </script>";
        }
    }

    public function hapus($id)
    {
        if ($this->model('Pelanggan_model')->hapusDataPelanggan($id) > 0) {
            echo "<script> 
                alert('Data Berhasil di Hapus');
                window.location.href='" . BASEURL . "/pelanggan';
            </script>";
            exit;
        } else {
            echo "<script> 
                alert('Data Gagal di Hapus');
                window.location.href='" . BASEURL . "/pelanggan';
            </script>";
        }
    }
}
