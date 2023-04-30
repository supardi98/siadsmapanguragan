<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Siswa_model');
        $this->load->model('Kelas_model');
        $this->load->model('Bukti_model');
        $this->load->model('M_global_model');
        $this->load->model('Transaksi_model');
    }

    public function index()
    {
        $data['title']  = 'SIAD SMA Pangurugan';
        // $queryAllKel = $this->M_global->ambildatakelas();
        // $DATA = array('queryKel' => $queryAllKel);
        $queryPemb = $this->Transaksi_model->ambil_data_pembayaran();
        $DATA = array('queryPembayar' => $queryPemb);
        $queryAllSis = $this->Siswa_model->ambildatasiswa();
        $DATA2 = array('querySis' => $queryAllSis);
        $judul['judul'] = 'Transaksi';
        $tamp = $judul + $DATA2+ $DATA;
		$this->load->view('template/header',$data);
		$this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('admin/transaksi',$tamp);
        $this->load->view('template/footer');  
    }


    public function pembayaran($id)
    {
        $data['title']  = 'SIAD SMA Pangurugan';
        $queryPemb = $this->Transaksi_model->ambil_data_pembayaran($id);
        $DATA = array('queryPembayar' => $queryPemb);
        $queryUserDetail = $this->Transaksi_model->getDataUserDetail($id);
        $DATA2 = array('queryUserEdit' => $queryUserDetail);
        $judul['judul'] = 'Pembayaran';
        $tamp = $judul + $DATA2;
		$this->load->view('template/header',$data);
		$this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('admin/pembayaran',$tamp,$DATA);
        $this->load->view('template/footer');  
    }

    public function bukti($id)
    {
        $data['title']  = 'SIAD SMA Pangurugan';
        $detail = $this->Bukti_model->Detaildata();
        $DATA = array('Detail' => $detail);
        $judul['judul'] = 'Pembayaran';
        $tamp = $judul + $DATA;
		$this->load->view('template/header',$data);
		$this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('admin/bukti',$tamp);
        $this->load->view('template/footer');  
    }

    public function transaksi(){
       $nisn = $this->input->post('nisn');
       $nama = $this->input->post('nama');
       $kelas = $this->input->post('kelas');
       $tanggal = $this->input->post('tanggal');
       $setoran = $this->input->post('setoran');


       $data = array(
        'nisn' =>  $nisn,
        'nama' => $nama,
        'kelas' => $kelas,
        'tanggal' => $tanggal,
        'setoran' => $setoran
       );

       $biaya = $this->db->select('biaya')->order_by('id', 'asc')->get_where('tb_siswa', array('nisn' => $nisn))->row();
    //    var_dump($biaya); die;
     $data['biaya'] = $biaya->biaya - $setoran;
     $query = $this->Transaksi_model->input_setoran($data);
     
    //  var_dump($query);
	// 	die;

     if($query)
     {
         $this->M_global_model->ntf_swal('Informasi', 'Berhasil simpan data', 'success'); 
     }else{
         $this->M_global_model->ntf_swal('Informasi', 'Gagal simpan data', 'error');
     }
     redirect(base_url('transaksi'));
    }
}

/* End of file Transaksi.php and path \application\controllers\Transaksi.php */