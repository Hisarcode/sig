<?php
defined('BASEPATH') or exit('No direct script access allowed');

class user_login
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->model('User_m', 'user');
    }

    public function login($username, $password)
    {
        $cek = $this->ci->user->login($username, $password);
        if ($cek) {
            $username = $cek->username;
            $nama_user = $cek->nama_user;

            $this->ci->session->set_userdata("username", $username);
            $this->ci->session->set_userdata("nama_user", $nama_user);
            redirect('home');
        } else {
            $this->ci->session->set_flashdata("pesan", "Username atau Password Salah");
            redirect('auth');
        }
    }


    public function cek_login()
    {
        if ($this->ci->session->userdata('username') == "") {
            $this->ci->session->set_flashdata("pesan", "Anda Belum Login");
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->ci->session->unset_userdata('username');
        $this->ci->session->unset_userdata('password');
        $this->ci->session->set_flashdata("pesan", "Anda Logout");
        redirect('auth');
    }
}
