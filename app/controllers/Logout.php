<?php

class Logout extends Controller
{
    public function index()
    {
        // Hapus semua variabel sesi
        session_unset();

        // Hapus sesi dari server
        session_destroy();

        //Mulai Start
        session_start();

        Flasher::setFlash('Anda Telah Logout', '', 'secondary');
        header('Location: ' . BASEURL . '/login');
    }
}
