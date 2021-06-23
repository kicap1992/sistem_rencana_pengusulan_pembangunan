<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
			if ($data['level'] == "admin") {
				
			}else{
				$this->session->set_flashdata('warning','3');
				redirect('/login');
			}
		}

	}
	
	function index()
	{
		$main['usulan'] = $this->model->tampil_data_keseluruhan('tb_rencana_pembangunan');
		$main['usulan_diterima'] = $this->model->tampil_data_where('tb_rencana_pembangunan',array('status' => 3));

		$main['header'] = "Halaman Utama";
		$this->load->view('admin/index',$main);
	}


	function rencana_pembangunan()
	{
		$main['usulan'] = $this->model->tampil_data_keseluruhan('tb_rencana_pembangunan');
		$main['usulan_diterima'] = $this->model->tampil_data_where('tb_rencana_pembangunan',array('status' => 3));

		$main['header'] = "Halaman Pengusulan Rencana Pembangunan";
		$main['list'] = $this->model->tampil_data_where('tb_rencana_pembangunan',array('status' => 1));
		$main['list_ditolak'] = $this->model->tampil_data_where('tb_rencana_pembangunan',array('status' => 5));

		if ($this->input->post('id') != '' and $this->input->post('id') != null and $this->input->post('info') == "tolak") {
			$no = $this->input->post('id');
			$alasan = $this->input->post('alasan');
			// print_r($alasan);
			$this->model->update('tb_rencana_pembangunan',array('no' => $no),array('status' => 5));
			$this->model->insert('tb_ket_penolakan',array('no' => $no, 'ket_admin' => $alasan));
			$this->session->set_flashdata('success', 'Pengusulan Rencana Pembangunan Ditolak Oleh Admin');
		}elseif ($this->input->post('id') != '' and $this->input->post('id') != null and $this->input->post('info') == "sahkan") {
			$no = $this->input->post('id');
			$this->model->update('tb_rencana_pembangunan',array('no' => $no),array('status' => 2));
			$this->session->set_flashdata('success', 'Pengusulan Rencana Pembangunan Berhasil Disahkan, Menunggu Pengesahan Dari Camat');
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
			}elseif ($value['status'] == 5) {
				$cek_ket = $this->model->tampil_data_where('tb_ket_penolakan',array('no' => $this->input->post('id')));
				foreach ($cek_ket->result() as $key2 => $value2) ;
				$output = array_merge($output,array('ket' => $value2->ket_admin));
			}
			print_r(json_encode($output));
		}else{
			$this->load->view('admin/menu/rencana_pembangunan',$main);
		}
		
	}

	function data_usulan(){
		$main['usulan'] = $this->model->tampil_data_keseluruhan('tb_rencana_pembangunan');
		$main['usulan_diterima'] = $this->model->tampil_data_where('tb_rencana_pembangunan',array('status' => 3));

		$main['header'] = "Halaman Data Usulan Rencana Pembangunan";
		$main['list'] = $this->model->tampil_data_where('tb_rencana_pembangunan',array('status' => 2));
		$main['list_ditolak_camat'] = $this->model->tampil_data_where('tb_rencana_pembangunan',array('status' => 4));

		$this->load->view('admin/menu/data_usulan',$main);
	}

	function usulan_diterima() {
		$main['usulan'] = $this->model->tampil_data_keseluruhan('tb_rencana_pembangunan');
		$main['usulan_diterima'] = $this->model->tampil_data_where('tb_rencana_pembangunan',array('status' => 3));
		
		$main['header'] = "Halaman Data Usulan Diterima";
		$main['list'] = $this->model->tampil_data_where('tb_rencana_pembangunan',array('status' => 3));

		$this->load->view('admin/menu/usulan_diterima',$main);
	}

	function staff() {
		$main['usulan'] = $this->model->tampil_data_keseluruhan('tb_rencana_pembangunan');
		$main['usulan_diterima'] = $this->model->tampil_data_where('tb_rencana_pembangunan',array('status' => 3));
		$main['list_staff'] = $this->model->tampil_data_keseluruhan('tb_staff_kelurahan');


		if ($this->input->post('info') == 'edit' and $this->input->post('id') != '' and $this->input->post('id') != '') {
			$id = $this->input->post('id');
			$data = $this->model->serialize($this->input->post('data'));
			$this->model->update('tb_staff_kelurahan',array('nik' => $id) , $data);
			$this->session->set_flashdata('success', 'Data Staff Berhasil Diupdate');
		}
		
		elseif ($this->input->post('info') == 'lihat' and $this->input->post('id') != '' and $this->input->post('id') != '') {
			$cek_data = $this->model->tampil_data_where('tb_staff_kelurahan',array('nik' =>$this->input->post('id')));


			$output = $cek_data->result_array()[0];

			if ($output['kelurahan'] == 1) {
				$kelurahan = array('select_kelurahan' =>'<select class="form-control" title="Klik Tambah Staff Untuk Menambah Staff Baru"  data-bv-notempty="true" data-bv-notempty-message="Kelurahan Harus Terpilih" name="kelurahan" id="kelurahan"><option value="" disabled="">-Pilih Kelurahan </option><option value="1" selected="">Galong Maloang</option><option value="2">Lemoe</option><option value="3">Lumpue</option><option value="4">Watang Bacukiki</option></select>');
				$output = array_merge($output,$kelurahan);
			}elseif ($output['kelurahan'] == 2) {
				$kelurahan = array('select_kelurahan' =>'<select class="form-control" title="Klik Tambah Staff Untuk Menambah Staff Baru"  data-bv-notempty="true" data-bv-notempty-message="Kelurahan Harus Terpilih" name="kelurahan" id="kelurahan"><option value="" disabled="">-Pilih Kelurahan </option><option value="1" >Galong Maloang</option><option value="2" selected="">Lemoe</option><option value="3">Lumpue</option><option value="4">Watang Bacukiki</option></select>');
				$output = array_merge($output,$kelurahan);
			}elseif ($output['kelurahan'] == 3) {
				$kelurahan = array('select_kelurahan' =>'<select class="form-control" title="Klik Tambah Staff Untuk Menambah Staff Baru"  data-bv-notempty="true" data-bv-notempty-message="Kelurahan Harus Terpilih" name="kelurahan" id="kelurahan"><option value="" disabled="">-Pilih Kelurahan </option><option value="1" >Galong Maloang</option><option value="2">Lemoe</option><option value="3"  selected="">Lumpue</option><option value="4">Watang Bacukiki</option></select>');
				$output = array_merge($output,$kelurahan);
			}elseif ($output['kelurahan'] == 4) {
				$kelurahan = array('select_kelurahan' =>'<select class="form-control" title="Klik Tambah Staff Untuk Menambah Staff Baru"  data-bv-notempty="true" data-bv-notempty-message="Kelurahan Harus Terpilih" name="kelurahan" id="kelurahan"><option value="" disabled="">-Pilih Kelurahan </option><option value="1" >Galong Maloang</option><option value="2">Lemoe</option><option value="3"  >Lumpue</option><option value="4" selected="">Watang Bacukiki</option></select>');
				$output = array_merge($output,$kelurahan);
			}

			$script1 = array('script1' => '<script type="text/javascript">
							    function setInputFilter(textbox, inputFilter) {
							      ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
							        textbox.addEventListener(event, function() {
							          if (inputFilter(this.value)) {
							            this.oldValue = this.value;
							            this.oldSelectionStart = this.selectionStart;
							            this.oldSelectionEnd = this.selectionEnd;
							          } else if (this.hasOwnProperty("oldValue")) {
							            this.value = this.oldValue;
							            this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
							          } else {
							            this.value = "";
							          }
							        });
							      });
							    }


							    // Install input filters.
							    setInputFilter(document.getElementById("nik"), function(value) {
							      return /^-?\d*$/.test(value); });
						      setInputFilter(document.getElementById("no_telpon"), function(value) {
							      return /^-?\d*$/.test(value); });
							  </script>
							  <script type="text/javascript">
						    $(document).ready(function(){

						      $("#sini_form").bootstrapValidator({
						          message: "This value is not valid",
						          feedbackIcons: {
						            // valid: "fa fa-check",
						            invalid: "fa fa-close",
						            validating: "fa fa-circle-o-notch"
						          },
						        excluded: ":disabled"
						      })
						    })
						  </script>');
			$output = array_merge($output,$script1);

			$script3 = array('script2' => "<script>
				$(document).ready(function(){

		      $('#sini_form_edit').bootstrapValidator({
		          message: 'This value is not valid',
		          feedbackIcons: {
		            // valid: 'fa fa-check',
		            invalid: 'fa fa-close',
		            validating: 'fa fa-circle-o-notch'
		          },
		        excluded: ':disabled'
		      })
		    })</script>");

		  $output = array_merge($output,$script3);

			print_r(json_encode($output));
			
		}elseif ($this->input->post('info') == 'tambah' and $this->input->post('data') != null and $this->input->post('data') != '') {
			$data = $this->model->serialize($this->input->post('data'));
			$cek_data = $this->model->tampil_data_where('tb_staff_kelurahan',array('nik' => $data['nik']));
			if (count($cek_data->result()) > 0) {
				print_r('ada');
				$this->session->set_flashdata('error', 'Staff Dengan NIK '. $data['nik'].' Telah Terdaftar Dalam Sistem Sebelumnya');
				// redirect($_SERVER['HTTP_REFERER']);
			}else{
				print_r('tiada');
				$this->model->insert('tb_staff_kelurahan',$data);
				$this->model->insert('tb_user',array('username' => $data['nik'], 'password' => $data['nik'], 'nik_staff' => $data['nik'],  'level' => 3));
				$this->session->set_flashdata('success', 'Staff Dengan NIK '. $data['nik'].' Telah Ditambah Dalam Sistem');
			}
			// print_r($data);
		}else{
			$main['header'] = "Halaman Staff Kelurahan";
			$this->load->view('admin/menu/staff',$main);
		}
		
	}

	function laporan() {
		$main['usulan_diterima'] = $this->model->tampil_data_where('tb_rencana_pembangunan',array('status' => 3));
		$main['header'] = 'Laporan Pembangunan Bacukiki';
		$main['usulan'] = $this->model->tampil_data_keseluruhan('tb_rencana_pembangunan');
		
		if ($this->uri->segment(3) != '' or $this->uri->segment(3) != null) {
			$main['list'] = $this->model->custom_query("SELECT *  FROM `tb_rencana_pembangunan` WHERE `tanggal_upload` LIKE '%".$this->uri->segment(3)."%'");
			$this->load->view('admin/menu/laporan_detail',$main);
		}else{
			$this->load->view('admin/menu/laporan',$main);
		}	
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