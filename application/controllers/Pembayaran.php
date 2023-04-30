<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Siswa_model');
        $this->load->model('Bukti_model');
        $this->load->model('Transaksi_model');
        $this->load->helper(array('form', 'url'));
    }
    public function index()
    {
        $data['title']  = 'SIAD SMA Pangurugan';

        $this->load->view('user/header', $data);
        $this->load->view('user/sidebar');
        $this->load->view('user/topbar');
        $this->load->view('user/pembayaran');
        $this->load->view('user/footer');
    }

    public function bayar()
    {
        $siswa_id = $this->session->userdata('AuthSiswa')->id;
        $siswa = $this->Siswa_model->getDataDetail($siswa_id);
        $nisn = $siswa->nisn;
        $nama = $siswa->nama;
        $kelas = $siswa->nama_kelas;

        $bukti = $_FILES['bukti'];
        if ($bukti = '') {
        } else {
            $config['upload_path'] = './assets/foto';
            $config['allowed_types'] = 'jpg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('bukti')) {
                echo "upload gagal";
                die();
            } else {
                $bukti = $this->upload->data('file_name');
            }
        }

        $data = array(
            'bukti' => $bukti,
        );

        $bukti_id = $this->Bukti_model->input_data($data, 'tb_bukti');
        $biaya = $this->Transaksi_model->sisaTagihanTerakhir($siswa_id);

        $data = array(
            'siswa_id' => $siswa_id,
            'bukti_id' => $bukti_id,
            'nisn' =>  $nisn,
            'nama' => $nama,
            'kelas' => $kelas,
            'tanggal' => date("Y-m-d"),
            'setoran' => 0,
            'biaya' => $biaya
           );
        $query = $this->Transaksi_model->input_setoran($data);
    
        redirect('pembayaran');
    }
}
