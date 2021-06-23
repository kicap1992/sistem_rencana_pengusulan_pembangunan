<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Camat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->load->helper('form');
		// $this->load->library('form_validation');

		$this->load->model('model');

		$data = $this->session->userdata('login');
		if ($data == '') {
			$this->session->set_flashdata('warning','3');
			redirect('/login');
		}else{
			if ($data['level'] == "camat") {
				
			}else{
				$this->session->set_flashdata('warning','3');
				redirect('/login');
			}
		}

	}
	
	function index()
	{
		$main['usulan'] = $this->model->tampil_data_where('tb_rencana_pembangunan',array('status' => 2));
		$main['usulan_diterima'] = $this->model->tampil_data_where('tb_rencana_pembangunan',array('status' => 3));
		$main['header'] = "Halaman Utama";
		$this->load->view('camat/index',$main);
	}



	function rencana_pembangunan()
	{
		$main['usulan'] = $this->model->tampil_data_where('tb_rencana_pembangunan',array('status' => 2));
		$main['usulan_diterima'] = $this->model->tampil_data_where('tb_rencana_pembangunan',array('status' => 3));
		$main['header'] = "Halaman Rencana Pembangunan";

		$main['list'] = $this->model->tampil_data_where('tb_rencana_pembangunan',array('status' => 2));
		$main['list_ditolak'] = $this->model->tampil_data_where('tb_rencana_pembangunan',array('status' => 4));
		
		if ($this->input->post('id') != '' and $this->input->post('id') != null and $this->input->post('info') == "tolak") {
			$no = $this->input->post('id');
			$alasan = $this->input->post('alasan');
			// print_r($alasan);
			$this->model->update('tb_rencana_pembangunan',array('no' => $no),array('status' => 4));
			$this->model->insert('tb_ket_penolakan',array('no' => $no, 'ket_camat' => $alasan));
			$this->session->set_flashdata('success', 'Pengusulan Rencana Pembangunan Ditolak Oleh Camat');
		}elseif ($this->input->post('id') != '' and $this->input->post('id') != null and $this->input->post('info') == "sahkan") {
			$no = $this->input->post('id');
			$this->model->update('tb_rencana_pembangunan',array('no' => $no),array('status' => 3));
			$this->session->set_flashdata('success', 'Pengusulan Rencana Pembangunan Berhasil Disahkan Oleh Camat');
		}elseif ($this->input->post('id') != '' and $this->input->post('id') != null and $this->input->post('info') == "lihat") {
			$cek_data = $this->model->tampil_data_where('tb_rencana_pembangunan',array('no'  => $this->input->post('id')));
			foreach ($cek_data->result_array() as $key => $value) ;
			$cek_status = $this->model->tampil_data_where('tb_status',array('no'  => $value['status']));
			foreach ($cek_status->result() as $key1 => $value1) ;
			$cek_staff = $this->model->tampil_data_where('tb_staff_kelurahan',array('nik'  => $value['nik']))->result();
			$cek_kelurahan = $this->model->tampil_data_where('tb_kelurahan',array('no' => $cek_staff[0]->kelurahan))->result();
			$kelurahan = array('kelurahan' => $cek_kelurahan[0]->kelurahan);
			$status = array('ket_status' => $value1->status);
			$output = array_merge($value,$status);
			$output = array_merge($output,$kelurahan);
			if ($value['status'] == 4) {
				$cek_ket = $this->model->tampil_data_where('tb_ket_penolakan',array('no' => $this->input->post('id')));
				foreach ($cek_ket->result() as $key2 => $value2) ;
				$output = array_merge($output,array('ket' => $value2->ket_camat));
			}
			print_r(json_encode($output));
		}else{
			$this->load->view('camat/menu/rencana',$main);
		}
	}
	

	function data_usulan()
	{
		$main['usulan'] = $this->model->tampil_data_where('tb_rencana_pembangunan',array('status' => 2));
		$main['usulan_diterima'] = $this->model->tampil_data_where('tb_rencana_pembangunan',array('status' => 3));
		$main['header'] = "Halaman Rencana Pembangunan";

		$main['list'] = $this->model->tampil_data_where('tb_rencana_pembangunan',array('status' => 3));

		$this->load->view('camat/menu/usulan',$main);
	}

	function try()
	{
		$cek_staff = $this->model->tampil_data_where('tb_staff_kelurahan',array('nik'  => 1111111111111111))->result()[0]->kelurahan;
		print_r($cek_staff);
	}


	function logout()	
	{
		$this->session->unset_userdata('login');
		$this->session->set_flashdata('warning', '2');
		redirect('login');
	}

	

}
?>