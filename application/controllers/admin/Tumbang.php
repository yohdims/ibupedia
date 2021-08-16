<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tumbang extends CI_Controller {
	var $hak_akses='admin';
	var $link='tumbang';
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
		$this->data['judul_tab']='Data Tumbuh Kembang';
		$this->data['title']='Data Tumbuh Kembang';
		$this->data['tumbang']=$this->M_Tumbang->getAll();
		$this->data['isi'] = $this->load->view($this->link.'/index',$this->data,TRUE);

		$this->load->view('template/v_layout_utama',$this->data);
	}
	public function form($id)
	{

		$this->data['judul_tab']='Form Resep Obat';
		$this->data['title']='Resep Obat';
		

		$this->data['tumbang']=$this->M_Tumbang->getID($id);

		$this->data['isi'] = $this->load->view($this->link.'/form',$this->data,TRUE);

		$this->load->view('template/v_layout_utama',$this->data);
	}
	public function input()
	{

		$id_tumbang	= $this->input->post('id_tumbang');
		$usia	= $this->input->post('usia');
		$pertumbuhan	= $this->input->post('pertumbuhan');
		$perkembangan	= $this->input->post('perkembangan');
		$stimulasi	= $this->input->post('stimulasi');
			
		$data = array(
				'usia'=>$usia,
				'pertumbuhan'=>$pertumbuhan,
				'perkembangan'=>$perkembangan,
				'stimulasi'=>$stimulasi
				);

		if($id_tumbang==0){	
			if ($this->M_Tumbang->insert($data)) {// success
					$this->session->set_flashdata('message', 'Berhasil tambah data');
					redirect($this->hak_akses.'/'.$this->link);
				}
		}else{
			$data += array(
				'id_tumbang'=>$id_tumbang);
			if ($this->M_Tumbang->update($data)) {// success
					$this->session->set_flashdata('message', 'Berhasil Edit data');
					redirect($this->hak_akses.'/'.$this->link);
				}
		}
			
	}
	public function hapus($id)
	{
		// $this->M_Barang->hapus_gambar($id);
		$this->M_Tumbang->delete($id);
		$this->session->set_flashdata('message', 'Berhasil Hapus Data');
		redirect($this->hak_akses.'/'.$this->link);
	}
	
	
	

}