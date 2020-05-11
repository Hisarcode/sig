<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['title'] = "Eduponmaps";
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topnavbar');
		$this->load->view('templates/sidenavbar');
		$this->load->view('v_home');
		$this->load->view('templates/footermap');
	}

	public function bangunan_json()
	{
		$query = "SELECT `bangunan`.*, `bangunan_kategori`.*
                FROM `bangunan` JOIN `bangunan_kategori`
                ON `bangunan`.`bangunan_kategori_id` = `bangunan_kategori`.`kategori_id`
        ";
		$data = $this->db->query($query)->result_array();

		echo json_encode($data);
	}
}
