<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Infographic extends CI_Controller
{

    public function index()
    {
        $this->load->model('Infographic_m', 'info');

        $data['title'] = "Infographic";

        $data['totalsekolah'] = $this->info->getJumlahBangunan();

        $data['totalsd'] = $this->info->getTotalSekolahByKategori(2);
        $data['totalsmp'] = $this->info->getTotalSekolahByKategori(3);
        $data['totalsma'] = $this->info->getTotalSekolahByKategori(4);
        $data['totalsmk'] = $this->info->getTotalSekolahByKategori(5);

        $data['totalputara'] = $this->info->getTotalSekolahByKecamatan(5);
        $data['totalpselatan'] = $this->info->getTotalSekolahByKecamatan(2);
        $data['totalpbarat'] = $this->info->getTotalSekolahByKecamatan(4);
        $data['totalpkota'] = $this->info->getTotalSekolahByKecamatan(1);
        $data['totalptimur'] = $this->info->getTotalSekolahByKecamatan(3);
        $data['totalptenggara'] = $this->info->getTotalSekolahByKecamatan(6);

        $data['totalputarasd'] = $this->info->getTotalSekolahByKecamatanKategori(5, 2);
        $data['totalputarasmp'] = $this->info->getTotalSekolahByKecamatanKategori(5, 3);
        $data['totalputarasma'] = $this->info->getTotalSekolahByKecamatanKategori(5, 4);
        $data['totalputarasmk'] = $this->info->getTotalSekolahByKecamatanKategori(5, 5);

        $data['totalselatansd'] = $this->info->getTotalSekolahByKecamatanKategori(2, 2);
        $data['totalselatansmp'] = $this->info->getTotalSekolahByKecamatanKategori(2, 3);
        $data['totalselatansma'] = $this->info->getTotalSekolahByKecamatanKategori(2, 4);
        $data['totalselatansmk'] = $this->info->getTotalSekolahByKecamatanKategori(2, 5);


        $data['totalpbaratsd'] = $this->info->getTotalSekolahByKecamatanKategori(4, 2);
        $data['totalpbaratsmp'] = $this->info->getTotalSekolahByKecamatanKategori(4, 3);
        $data['totalpbaratsma'] = $this->info->getTotalSekolahByKecamatanKategori(4, 4);
        $data['totalpbaratsmk'] = $this->info->getTotalSekolahByKecamatanKategori(4, 5);


        $data['totalpkotasd'] = $this->info->getTotalSekolahByKecamatanKategori(1, 2);
        $data['totalpkotasmp'] = $this->info->getTotalSekolahByKecamatanKategori(1, 3);
        $data['totalpkotasma'] = $this->info->getTotalSekolahByKecamatanKategori(1, 4);
        $data['totalpkotasmk'] = $this->info->getTotalSekolahByKecamatanKategori(1, 5);


        $data['totalptimursd'] = $this->info->getTotalSekolahByKecamatanKategori(3, 2);
        $data['totalptimursmp'] = $this->info->getTotalSekolahByKecamatanKategori(3, 3);
        $data['totalptimursma'] = $this->info->getTotalSekolahByKecamatanKategori(3, 4);
        $data['totalptimursmk'] = $this->info->getTotalSekolahByKecamatanKategori(3, 5);


        $data['totalptenggarasd'] = $this->info->getTotalSekolahByKecamatanKategori(6, 2);
        $data['totalptenggarasmp'] = $this->info->getTotalSekolahByKecamatanKategori(6, 3);
        $data['totalptenggarasma'] = $this->info->getTotalSekolahByKecamatanKategori(6, 4);
        $data['totalptenggarasmk'] = $this->info->getTotalSekolahByKecamatanKategori(6, 5);


        $this->load->view('templates/header', $data);
        $this->load->view('templates/topnavbar');
        $this->load->view('templates/sidenavbar');
        $this->load->view('infographic');
    }
}
