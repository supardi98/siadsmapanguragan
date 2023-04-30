<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Tagihan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Siswa_model');
        $this->load->model('Kelas_model');
        $this->load->model('M_global_model');
        $this->load->model('Transaksi_model');
    }
    public function index()
    {
        $data['title']  = 'SIAD SMA Pangurugan';
        $judul['judul'] = 'Tagihan Siswa';
        $queryPemb = $this->Transaksi_model->ambil_data_pembayaran();
        $DATA = array('queryPembayar' => $queryPemb);
        $queryAllSis = $this->Siswa_model->ambildatasiswa();
        $DATA2 = array('querySis' => $queryAllSis);
        $tamp = $judul + $DATA2+ $DATA;
		$this->load->view('user/header',$data);
		$this->load->view('user/sidebar');
        $this->load->view('user/topbar');
        $this->load->view('user/tagihan',$tamp);
        $this->load->view('user/footer');
    }

}