<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		// $this->load->library('form_validation');

		$this->load->model('model');
	}
	
	function index()
	{
		// $main['main']='home/main/main';
		// $main['header']='Halaman Utama';

		// $this->load->view('login/index');
		
		$user = $this->input->post('username');
		$pass = $this->input->post('password');
		
		
		$ceklogin = $this->model->tampil_data_where('tb_user',array('username' => $user,'password' => $pass ));
		// $cekuser = $this->mhome->tampil_data_where('tb_user_login',array('username' => $user,'password' => $pass ));
		// $cekresult = $this->mhome->tampil_data_where('tb_user',array('username' => $user,'password' => $pass ,'level' => $level));

		if ($this->input->post('login')) {
			if (count($ceklogin->row())>0) {
				foreach ($ceklogin->result() as $key2 => $value2);
				if ($value2->level == 1 ) 
				{
					$this->session->set_userdata('login', array('level' => 'admin'));
					$this->session->set_flashdata('login_pertama','1');
					redirect('/admin');
				}elseif ($value2->level == 2) 
				{
					$this->session->set_userdata('login', array('level' => 'camat'));
					$this->session->set_flashdata('login_pertama','1');
					redirect('/camat');
				}elseif ($value2->level == 3) 
				{
					$this->session->set_userdata('login', array('nik' => $value2->nik_staff, 'level' => 'user'));
					$this->session->set_flashdata('login_pertama','1');
					redirect('/user');
				}
				
			}else{
				$this->session->set_flashdata('warning','1');
				redirect('/login');
			}
		}else{
			$this->load->view('login/index');
		}

		// if ($user == "admin" and $pass == "admin") {
		// 	// print_r("sini admin");
		// 	redirect('/admin');
		// }elseif ($user == "camat" and $pass == "camat") {
		// 	print_r("sini camat");
		// }elseif ($user == "lemoe" and $pass == "lemoe") {
		// 	// print_r("sini lemeo");
		// 	redirect('/user');
		// }else{
		// 	$this->load->view('login/index');
		// }
	}

	

	

}
?>