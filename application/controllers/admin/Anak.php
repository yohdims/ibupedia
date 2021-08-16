<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anak extends CI_Controller {
	var $hak_akses='admin';
	var $link='anak';
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
		$this->data['judul_tab']='Data Anak';
		$this->data['title']='Data Anak';
		$this->data['anak']=$this->M_Anak->getAll();
		$this->data['isi'] = $this->load->view($this->link.'/index',$this->data,TRUE);

		$this->load->view('template/v_layout_utama',$this->data);
	}

	public function form($id)
	{

		if($id==0){	
			$this->data['judul_tab']='Form Tambah Anak';
			$this->data['title']='Tambah Data Anak';
		}else{

			$this->data['judul_tab']='Form Edit Anak';
			$this->data['title']='Edit Anak';

			$this->data['anak']=$this->M_Anak->getID($id);

		}
		$this->data['pengguna']=$this->M_Pengguna->getAll();
		$this->data['vaksin']=$this->M_Vaksin->getAll();
			$this->data['isi'] = $this->load->view($this->link.'/form',$this->data,TRUE);

		$this->load->view('template/v_layout_utama',$this->data);
	}
	public function input()
	{
		
		$id_anak	= $this->input->post('id_anak');
		$id_pengguna		= $this->input->post('id_pengguna');
		$id_vaksin	= $this->input->post('id_vaksin');
		$nama_anak	= $this->input->post('nama_anak');
		$tgl_lahir	= $this->input->post('tgl_lahir');
		$berat_badan	= $this->input->post('berat_badan');
		$tinggi_badan	= $this->input->post('tinggi_badan');
		$jk	= $this->input->post('jk');

			$data = array(
				'id_pengguna'=>$id_pengguna,
				'id_vaksin'=>$id_vaksin,
				'nama_anak'=>$nama_anak,
				'tgl_lahir'=>$tgl_lahir,
				'berat_badan'=>$berat_badan,
				'tinggi_badan'=>$tinggi_badan,
				'jk'=>$jk
			);

		if($id_anak==0){	
			if ($this->M_Anak->insert($data)) {// success
					$this->session->set_flashdata('message', 'Berhasil tambah data');
					redirect($this->hak_akses.'/'.$this->link);
				}
		}else{
			$data += array(
				'id_anak'=>$id_anak);
			if ($this->M_Anak->update($data)) {// success
					$this->session->set_flashdata('message', 'Berhasil Edit data');
					redirect($this->hak_akses.'/'.$this->link);
				}
		}
			
	}

	public function hapus($id)
	{
		$this->M_Anak->delete($id);
		$this->session->set_flashdata('message', 'Berhasil Hapus Data');
		redirect($this->hak_akses.'/'.$this->link.'/index/');
	}

}