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
		$kategori = (int) $_GET['cekdata'];
		if ($kategori > 5) {
			$kecamatan = $kategori - 5;
			$query = "SELECT `bangunan`.*, `bangunan_kategori`.*
					FROM `bangunan` JOIN `bangunan_kategori`
					ON `bangunan`.`bangunan_kategori_id` = `bangunan_kategori`.`kategori_id` WHERE `bangunan`.`kecamatan_id`=" . $kecamatan;
		} else {
			$query = "SELECT `bangunan`.*, `bangunan_kategori`.*
					FROM `bangunan` JOIN `bangunan_kategori`
					ON `bangunan`.`bangunan_kategori_id` = `bangunan_kategori`.`kategori_id` WHERE `bangunan`.`bangunan_kategori_id`=" . $kategori;
		}
		$data = $this->db->query($query)->result_array();
		echo json_encode($data);
	}

	public function cari_json()
	{
		$keyword = $_GET['keyword'];

		// $this->db->like('title', $keyword);
		// $this->db->or_like('body', $keyword);
		$this->db->select('*');
		$this->db->from('bangunan');
		$this->db->join('bangunan_kategori', ' bangunan.bangunan_kategori_id = bangunan_kategori.kategori_id ');
		$this->db->like('bangunan_nama', $keyword);
		$this->db->or_like('bangunan_alamat', $keyword);
		$data = $this->db->get()->result_array();

		echo json_encode($data);
	}

	public function detail_bangunan_json()
	{
		$id = $_POST['id'];
		$query = "SELECT `bangunan`.*, `kecamatan`.*
					FROM `bangunan` JOIN `kecamatan`
					ON `bangunan`.`kecamatan_id` = `kecamatan`.`id` WHERE `bangunan`.`bangunan_id`=" . $id;
		$data = $this->db->query($query)->row_array();

		$detail = "<!-- Profile Image -->
		<div class=\"card card-primary card-outline\">
			<div class=\"card-body box-profile\">
				<div class=\"text-center\">
				<img class=\"profile-user-img img-fluid img-circle\"
                       src=\"" . base_url('upload/bangunan/') . $data['bangunan_gambar'] . "\"
                       alt=\"Gambar Bangunan\">
				</div>

				<h3 class=\"profile-username text-center\">" . $data['bangunan_nama'] . "</h3>

				<p class=\"text-muted text-center\">" . $data['nama_kecamatan'] . "</p>

				<ul class=\"list-group list-group-unbordered mb-3\">
					<li class=\"list-group-item\">
						<b>Latitude</b> <a class=\"float-right\">" . $data['bangunan_lat'] . "</a>
					</li>
					<li class=\"list-group-item\">
						<b>Longitude</b> <a class=\"float-right\">" . $data['bangunan_long'] . "</a>
					</li>
				
				</ul>

				<a href=\"" . base_url('bangunan/detail/') . $data['bangunan_id'] . "\" class=\"btn btn-primary btn-block\"><b>Lihat Data</b></a>
			</div>
			<!-- /.card-body -->
		</div>";
		echo $detail;
	}
}
