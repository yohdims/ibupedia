<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vaksin extends CI_Controller {
	var $hak_akses='admin';
	var $link='vaksin';

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
		$this->data['judul_tab']='Data User';
		$this->data['title']='Data User';
		$this->data['vaksin']=$this->M_Vaksin->getAll();
		$this->data['isi'] = $this->load->view($this->link.'/index',$this->data,TRUE);

		$this->load->view('template/v_layout_utama',$this->data);
	}

	public function form($id)
	{
		// $data['barang']= $this->Model_Barang->getAllBarang();
			$this->data['id']=$id;
		if($id==0){	
			$this->data['judul_tab']='Form Tambah User';
			$this->data['title']='Tambah User';
		}else{

			$this->data['judul_tab']='Form Edit User';
			$this->data['title']='Edit User';

			$this->data['vaksin']=$this->M_Vaksin->getID($id);
		}
			$this->data['isi'] = $this->load->view($this->link.'/form',$this->data,TRUE);

		$this->load->view('template/v_layout_utama',$this->data);
	}
	public function input()
	{

		$id_vaksin	= $this->input->post('id_vaksin');
		$nama_vaksin		= $this->input->post('nama_vaksin');
		$deskripsi	= $this->input->post('deskripsi');
		$bulan	= $this->input->post('bulan');
		$tahun	= $this->input->post('tahun');

			$data = array(
				'nama_vaksin'=>$nama_vaksin,
				'deskripsi'=>$deskripsi,
				'bulan'=>$bulan,
				'tahun'=>$tahun
			);

		if($id_vaksin==0){	
			if ($this->M_Vaksin->insert($data)) {// success
					$this->session->set_flashdata('message', 'Berhasil tambah data');
					redirect($this->hak_akses.'/'.$this->link);
				}
		}else{
			$data += array(
				'id_vaksin'=>$id_vaksin);
			if ($this->M_Vaksin->update($data)) {// success
					$this->session->set_flashdata('message', 'Berhasil Edit data');
					redirect($this->hak_akses.'/'.$this->link);
				}
		}
			
	}

	public function hapus($id)
	{
		$this->M_Vaksin->delete($id);
		$this->session->set_flashdata('message', 'Berhasil Hapus Data');
		redirect($this->hak_akses.'/'.$this->link);
	}

}