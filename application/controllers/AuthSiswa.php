<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AuthSiswa extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Auth_model');
		$this->load->model('M_global_model');

		$this->load->library('session');
	}
	public function index()
	{
		$data['title']  = 'SIAD SMA Pangurugan';
		$this->load->view('user/auth', $data);
	}

	public function proses_login()
	{
		$nisn = $this->input->post('nisn');
		$password = $this->input->post('password');

		$cek_login = $this->Auth_model->loginSiswa($nisn, $password);

		if (empty($cek_login)) {
			$this->M_global_model->ntf_swal('Informasi', 'Maap! NISN atau Password yang ada masukan salah', 'error');
			redirect('AuthSiswa');
		} elseif ($password == $cek_login->password) {
			$data_session = array(
				'akses' => 'siswa',
				'nisn' => $cek_login->nisn,
				'password' => $cek_login->password
			);
			$this->session->set_flashdata($data_session);
			redirect('User');
		}
	}

	function logout()
	{
		$this->M_global_model->ntf_swal('Informasi', 'Selamat Anda Berhasil Logout', 'info');
		redirect('AuthSiswa');
	}
}

/* End of file Auth.php and path \application\controllers\Auth.php */
