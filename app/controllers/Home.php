<?php

class Home extends Controller
{
    public function index()
    {
        if (!isset($_SESSION['username'])) {
            Flasher::setFlash('Login Invalid', 'Harap Login Akun Anda Terlebih Dahulu', 'warning');
            header('Location: ' . BASEURL . '/login');
            exit;
        } else {
            $data['judul'] = 'Home';
            $this->view('templates/header', $data);
            $this->view('home/index', $data);
            $this->view('templates/sidebar', $data);
            $this->view('templates/footer', $data);
        }
    }
}
