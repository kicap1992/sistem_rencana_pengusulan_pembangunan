<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->load->helper('form');
		// $this->load->library('form_validation');
		ini_set('memory_limit', '-1');
		$this->load->model('model');
		$data = $this->session->userdata('login');
		if ($data == '') {
			$this->session->set_flashdata('warning','3');
			redirect('/login');
		}else{
			if ($data['level'] == "user") {
				$cek_data = $this->model->tampil_data_where('tb_staff_kelurahan',array('nik' => $data['nik']));
				if (count($cek_data->result()) > 0) {
					# code...
				}else{
					$this->session->set_flashdata('warning','3');
					redirect('/login');
				}
			}else{
				$this->session->set_flashdata('warning','3');
				redirect('/login');
			}
		}
	}
	
	function index()
	{
		$main['header'] = "Halaman Utama";
		$main['user'] = $this->model->data_user($this->session->userdata('login')['nik'],"data_diri");
		$main['kelurahan'] = $this->model->data_user($this->session->userdata('login')['nik'],"kelurahan");
		$main['usulan'] = $this->model->tampil_data_where('tb_rencana_pembangunan',array('nik' => $main['user']->nik));
		$main['usulan_diterima'] = $this->model->tampil_data_where('tb_rencana_pembangunan',array('nik' => $main['user']->nik, 'status' => 3));
		$this->load->view('user/index',$main);
	}

	function rencana_pembangunan() {
		$main['header'] = "Rencana Pembangunan";
		$main['user'] = $this->model->data_user($this->session->userdata('login')['nik'],"data_diri");
		$main['kelurahan'] = $this->model->data_user($this->session->userdata('login')['nik'],"kelurahan");
		$main['usulan'] = $this->model->tampil_data_where('tb_rencana_pembangunan',array('nik' => $main['user']->nik));
		$main['usulan_diterima'] = $this->model->tampil_data_where('tb_rencana_pembangunan',array('nik' => $main['user']->nik, 'status' => 3));
		$main['usulan_diterima'] = $this->model->tampil_data_where('tb_rencana_pembangunan',array('nik' => $main['user']->nik, 'status' => 3));
		$cek_kelurahan = $this->model->tampil_data_where('tb_staff_kelurahan',array('nik' => $main['user']->nik));
		$main['rtrw'] = $this->model->tampil_data_where('tb_rtrw',array('kelurahan' => $cek_kelurahan->result()[0]->kelurahan));
		// $main['list'] = $this->model->tampil_data_keseluruhan('tb_rencana_pembangunan');

		if ($this->uri->segment(3) == 'usulkan_edit') {
			// print_r("sini usulkan edit");
			if ($this->input->post('data') != '' and $this->input->post('data') != null and $this->input->post('id') != null) {
				$data = $this->model->serialize(json_decode($this->input->post('data')));
				$no = $this->input->post('id') ;

				if ($data['laporan'] == 'upload_baru') {
					
					$filename = $_FILES['file']['name'];
					$dir = 'laporan/'.$no.'/';

					$files1 = glob($dir.'*');
					foreach($files1 as $file){ // iterate files
					  if(is_file($file))
					    unlink($file); // delete file
					}

					$path = $dir.$filename;
					move_uploaded_file($_FILES['file']['tmp_name'],$path);

					$data = array_merge($data,array('exel_url' => $path));
					// print_r($data);
					// print_r('upload baru');
				}
				$data = array_diff_key($data, ['laporan' => ""]);

				$this->model->update('tb_rencana_pembangunan',array('no' => $no),$data);
				$this->session->set_flashdata('success', 'Pengusulan Rencana Pembangunan Berhasil Diedit');
				$this->session->set_flashdata('klik', $no);
				// print_r($this->input->post('id') );
			}else{
				redirect('/user/rencana_pembangunan');
			}
		}elseif ($this->input->post('id') != '' and $this->input->post('id') != null) {
			$cek_data = $this->model->tampil_data_where('tb_rencana_pembangunan',array('no'  => $this->input->post('id')));
			foreach ($cek_data->result_array() as $key => $value) ;
			$cek_status = $this->model->tampil_data_where('tb_status',array('no'  => $value['status']));
			foreach ($cek_status->result() as $key1 => $value1) ;
			$status = array('ket_status' => $value1->status);
			$script = '<script type="text/javascript">
						    var elem = document.getElementById("biaya1");

						    elem.addEventListener("keydown",function(event){
						        var key = event.which;
						        if((key<48 || key>57) && key != 8) event.preventDefault();
						    });

						    elem.addEventListener("keyup",function(event){
						        var value = this.value.replace(/,/g,"");
						        this.dataset.currentValue=parseInt(value);
						        var caret = value.length-1;
						        while((caret-3)>-1)
						        {
						            caret -= 3;'.
						            "value = value.split('');".
						            'value.splice(caret+1,0,",");'.
						            "value = value.join('');".
						        '}
						        this.value = value;
						    });
						  </script>';
			$script = array('script' => $script);
			$script2 = '<script type="text/javascript">'.
								"$(document).ready(function(){
						      $('#sini_form_edit').bootstrapValidator({
          					message: 'This value is not valid',
							         	 feedbackIcons: {
							            // valid: 'fa fa-check',
							            invalid: 'fa fa-close',
							            validating: 'fa fa-circle-o-notch'
							          },
							        excluded: ':disabled'
							      })
							    })</script>";
			$script2 = array('script2' => $script2);

			$arraynya = array_merge(array_merge(array_merge($value,$status),$script),$script2);
			if ($value['status'] == 4) {
				$cek_ket = $this->model->tampil_data_where('tb_ket_penolakan',array('no' => $this->input->post('id')));
				foreach ($cek_ket->result() as $key2 => $value2) ;
				$arraynya = array_merge($arraynya,array('ket' => $value2->ket_camat));
			}elseif ($value['status'] == 5) {
				$cek_ket = $this->model->tampil_data_where('tb_ket_penolakan',array('no' => $this->input->post('id')));
				foreach ($cek_ket->result() as $key2 => $value2) ;
				$arraynya = array_merge($arraynya,array('ket' => $value2->ket_admin));
			}
			print_r(json_encode($arraynya));
		}elseif ($this->uri->segment(3) == 'usulkan') {
			if ($this->input->post('data') != '' and $this->input->post('data') != null) {
				$data = $this->model->serialize(json_decode($this->input->post('data')));
				$array = array('nik' => $main['user']->nik,'status' => 1);
				$this->model->insert('tb_rencana_pembangunan',array_merge($data,$array));

				$cek_data_last = $this->model->tampil_data_last('tb_rencana_pembangunan','no');
				foreach ($cek_data_last->result() as $key => $value) ;
				$no_last = $value->no;
				// print_r($no_last);

				// print_r($_FILES['file']['tmp_name']);

				$filename = $_FILES['file']['name'];
				$dir = 'laporan/'.$no_last.'/';

				if( is_dir($dir) === false )
				{
			    mkdir($dir);
				}


				$path = $dir.$filename;
				move_uploaded_file($_FILES['file']['tmp_name'],$path);
				$this->model->update('tb_rencana_pembangunan',array('no' => $no_last),array('exel_url' => $dir.$filename));
				$this->session->set_flashdata('success', 'Pengusulan Rencana Pembangunan Berhasil Diusulkan, Menunggu Pengesahan Dari Admin');
			}else{
				redirect('/user/rencana_pembangunan');
			}
		}else{
			// print_r($main['kelurahan']);
			$this->load->view('user/menu/rencana',$main);
		}
		
	}

	function profil() {
		$main['usulan'] = $this->model->tampil_data_keseluruhan('tb_rencana_pembangunan');
		$main['header'] = "Halaman Utama";
		$main['user'] = $this->model->data_user($this->session->userdata('login')['nik'],"data_diri");
		$main['kelurahan'] = $this->model->data_user($this->session->userdata('login')['nik'],"kelurahan");
		$main['usulan'] = $this->model->tampil_data_where('tb_rencana_pembangunan',array('nik' => $main['user']->nik));
		$main['usulan_diterima'] = $this->model->tampil_data_where('tb_rencana_pembangunan',array('nik' => $main['user']->nik, 'status' => 3));

		if ($this->input->post("info") == "user_pass" and $this->input->post("data") != '' and $this->input->post("data") != '') {
			$data = $this->model->serialize($this->input->post('data'));

			$cek_data = $this->model->tampil_data_where('tb_user',array('nik_staff' => $main['user']->nik));
			// print_r($data);
			foreach ($cek_data->result() as $key => $value) ;
			if ($data['username_lama'] !==  $value->username) {
				$array = array('no' => 0, 'ket' => "Username Lama Yang Dimasukkan Tidak Sama Dengan Username Anda Dalam Sistem");
				print_r(json_encode($array));
				exit();
			}else if ($data['password_lama'] !==  $value->password) {
				$array = array('no' => 0, 'ket' => "Password Lama Yang Dimasukkan Tidak Sama Dengan Password Anda Dalam Sistem");
				print_r(json_encode($array));
				exit();
			}else if ($data['password'] !== $data['konfirmasi_password']) {
				$array = array('no' => 0, 'ket' => "Password Baru Dengan Konfirmasi Password Baru Tidak Cocok");
				print_r(json_encode($array));
				exit();
			}

			$data = array_diff_key($data, ['username_lama' => ""]);
			$data = array_diff_key($data, ['password_lama' => ""]);
			$data = array_diff_key($data, ['konfirmasi_password' => ""]);
			$this->model->update('tb_user',array('nik_staff' => $main['user']->nik),$data);
			if ($this->db->affected_rows()>0) {
				$this->session->set_flashdata('success', 'Username Dan Password berhasil Diperbaharui');			
			}else{
				$this->session->set_flashdata('success', 'Tiada Perubahan Yang Dilakukan');
			}
			
			

			$array = array('no' => 1,'ket' => base_url()."user/profil");
			print_r(json_encode($array));
		}elseif ($this->input->post("info") == "detail" and $this->input->post("data") != '' and $this->input->post("data") != '') {
			// print_r($main['user']);
			$data = $this->model->serialize($this->input->post('data'));
			$this->model->update('tb_staff_kelurahan',array('nik' => $main['user']->nik),$data);
			if ($this->db->affected_rows()>0) {
				$this->session->set_flashdata('success', 'Detail Diri Berhasil Diupdate');				
			}else{
				$this->session->set_flashdata('success', 'Tiada Perubahan Pada Detail Diri');
			}
			print_r(base_url()."user/profil");

		}else{
			$this->load->view('user/menu/profil',$main);
		}
	}

	
	function logout()	
	{
		$this->session->unset_userdata('login');
		$this->session->set_flashdata('warning', '2');
		redirect('login');
	}


	

}
?>