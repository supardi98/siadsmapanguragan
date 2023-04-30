<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Siswa_model');
        $this->load->model('Bukti_model');
        $this->load->helper(array('form', 'url')); 
		
    }
    public function index()
    {
        $data['title']  = 'SIAD SMA Pangurugan';
		$this->load->view('user/header',$data);
		$this->load->view('user/sidebar');
        $this->load->view('user/topbar');
        $this->load->view('user/pembayaran');
        $this->load->view('user/footer');
    }

    public function bayar()
    {
      $bukti = $_FILES['bukti'];
      if($bukti=''){}else{
        $config['upload_path'] = './assets/foto';
        $config['allowed_types'] = 'jpg|png|gif';
        
        $this->load->library('upload', $config);
        if(!$this->upload->do_upload('bukti')){
            echo "upload gagal"; die();
        }else{
            $bukti=$this->upload->data('file_name');
        }
      }  

      $data = array(
        'bukti' => $bukti
      );

      $this->Bukti_model->input_data($data,'tb_bukti');
      redirect('pembayaran');
      
     } 
         
    }