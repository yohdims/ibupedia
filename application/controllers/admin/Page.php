<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {
	var $hak_akses='admin';
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		if(empty($this->session->userdata('username'))){
			redirect('auth');
		}
	}
	public function index()
	{
		// $data['barang']= $this->Model_Barang->getAllBarang();
		$this->data['judul_tab']='Sistem Informasi';
		$this->data['title']='Dashboard';
		$this->data['isi'] = $this->load->view('template/dashboard',$this->data,TRUE);

		$this->load->view('template/v_layout_utama',$this->data);
	}

	public function profile()
	{
		
			$this->data['judul_tab']='Profile';
			$this->data['title']='Profile User';

			$this->data['user']=$this->M_User->getID($this->session->userdata('id_user'));
			$this->data['isi'] = $this->load->view('user/form_profile',$this->data,TRUE);

		$this->load->view('template/v_layout_utama',$this->data);
	}
	public function input()
	{

		$id_user	= $this->input->post('id_user');
		$nama		= $this->input->post('nama');
		$jabatan	= $this->input->post('jabatan');
		$username	= $this->input->post('username');
		$password	= $this->input->post('password');

			$data = array(
				'nama'=>$nama,
				'jabatan'=>$jabatan,
				'username'=>$username,
				'password'=>$password);

		if($id_user==0){	
			if ($this->M_User->insert($data)) {// success
					$this->session->set_flashdata('message', 'Berhasil tambah data');
				}
		}else{
			$data += array(
				'id_user'=>$id_user);
			if ($this->M_User->update($data)) {// success
					$this->session->set_flashdata('message', 'Berhasil Edit data');
				}
		}
					redirect($this->hak_akses.'/page/profile');
			
	}

	
}