<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == true) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $this->user_login->login($username, $password);
        }
        $data['title'] = "Login";
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topnavbar');
        $this->load->view('templates/sidenavbar');
        $this->load->view('v_login');
        $this->load->view('templates/footer');
    }

    public function logout()
    {
        $this->user_login->logout();
    }
}
