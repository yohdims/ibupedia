<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {
	var $hak_akses='admin';
	var $link='pengguna';
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
		$this->data['judul_tab']='Data Pengguna';
		$this->data['title']='Data Pengguna';
		$this->data['pengguna']=$this->M_Pengguna->getAll();
		$this->data['isi'] = $this->load->view($this->link.'/index',$this->data,TRUE);

		$this->load->view('template/v_layout_utama',$this->data);
	}
	
	public function form($id)
	{
		// $data['barang']= $this->Model_Barang->getAllBarang();
			$this->data['judul_tab']='Form Pengguna';
			$this->data['title']='Pengguna';

			$this->data['pengguna']=$this->M_Pengguna->getID($id);
			$this->data['isi'] = $this->load->view($this->link.'/form',$this->data,TRUE);

		$this->load->view('template/v_layout_utama',$this->data);
	}
	public function input()
	{
		$id_pengguna	= $this->input->post('id_pengguna');
		$username	= $this->input->post('username');
		$password	= $this->input->post('password');
		$nama		= $this->input->post('nama');
		$jk			= $this->input->post('jk');
		$no_hp		= $this->input->post('no_hp');

			$data = array(
				'username'=>$username,
				'password'=>$password,
				'nama'=>$nama,
				'jk'=>$jk,
				'no_hp'=>$no_hp
			);

		if($id_pengguna==0){	
			if ($this->M_Pengguna->insert($data)) {// success
					$this->session->set_flashdata('message', 'Berhasil tambah data');
					redirect($this->hak_akses.'/'.$this->link);
				}
		}else{
			$data += array(
				'id_pengguna'=>$id_pengguna);
			if ($this->M_Pengguna->update($data)) {// success
					$this->session->set_flashdata('message', 'Berhasil Edit data');
					redirect($this->hak_akses.'/'.$this->link);
				}
		}
	}
	
	public function hapus($id)
	{
		// $this->M_Barang->hapus_gambar($id);
		$this->M_Pengguna->delete($id);
		$this->session->set_flashdata('message', 'Berhasil Hapus Data');
		redirect($this->hak_akses.'/'.$this->link);
	}

	

}