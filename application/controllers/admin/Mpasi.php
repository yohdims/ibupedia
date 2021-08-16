<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mpasi extends CI_Controller {
	var $hak_akses='admin';
	var $link='mpasi';
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
		$this->data['judul_tab']='Data Mpasi';
		$this->data['title']='Data Mpasi';
		$this->data['mpasi']=$this->M_Mpasi->getAll();
		$this->data['isi'] = $this->load->view($this->link.'/index',$this->data,TRUE);

		$this->load->view('template/v_layout_utama',$this->data);
	}

	public function form($id)
	{
		if($id==0){	
			$this->data['judul_tab']='Form Tambah Mpasi';
			$this->data['title']='Tambah Mpasi';
		}else{

			$this->data['judul_tab']='Form Edit Mpasi';
			$this->data['title']='Edit Mpasi';

			$this->data['mpasi']=$this->M_Mpasi->getID($id);
		}
			$this->data['isi'] = $this->load->view($this->link.'/form',$this->data,TRUE);

		$this->load->view('template/v_layout_utama',$this->data);
	}
	public function input()
	{
		
		$id_mpasi	= $this->input->post('id_mpasi');
		$nama_mpasi	= $this->input->post('nama_mpasi');
		$deskripsi	= $this->input->post('deskripsi');
		$bulan		= $this->input->post('bulan');
			
		$data = array(
				'nama_mpasi'=>$nama_mpasi,
				'deskripsi'=>$deskripsi,
				'bulan'=>$bulan
				);

		$config['upload_path']          = './assets/images/mpasi';
        $config['allowed_types']        = 'jpg|png|jpeg|JPG|PNG';
        $config['max_size']             = '0';
        $config['max_width']            = '0';
        $config['max_height']           = '0';
        $config['file_name']           = $id_mpasi."-".$nama_mpasi;
		$this->load->library('upload',$config); //call library upload 
    	$this->upload->initialize($config);

		if(!empty($this->upload->do_upload('gambar'))){	
			$data_gambar = array('upload' => $this->upload->data());
			$upload_file= $data_gambar['upload']['file_name'];
			if($id_mpasi!=0){
				$this->M_Mpasi->hapus_file($id_mpasi);
			}
				$data += array('gambar'=>$upload_file);
		}

		if($id_mpasi==0){	
			if ($this->M_Mpasi->insert($data)) {// success
					$this->session->set_flashdata('message', 'Berhasil tambah data');
					redirect($this->hak_akses.'/'.$this->link);
				}
		}else{
			$data += array(
				'id_mpasi'=>$id_mpasi
			);
			if ($this->M_Mpasi->update($data)) {// success
					$this->session->set_flashdata('message', 'Berhasil Edit data');
					redirect($this->hak_akses.'/'.$this->link);
				}
		}
			
	}

	public function hapus($id)
	{
		$this->M_Mpasi->delete($id);
		$this->session->set_flashdata('message', 'Berhasil Hapus Data');
		redirect($this->hak_akses.'/'.$this->link);
	}

}