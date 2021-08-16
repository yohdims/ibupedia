<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	var $hak_akses='admin';
	var $link='admin';
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
		$this->data['judul_tab']='Data Admin';
		$this->data['title']='Data Admin';
		$this->data['admin']=$this->M_Admin->getAll();
		$this->data['isi'] = $this->load->view($this->link.'/index',$this->data,TRUE);

		$this->load->view('template/v_layout_utama',$this->data);
	}
	public function form($id)
	{

		$this->data['judul_tab']='Form Diagnosa';
		$this->data['title']='Diagnosa';
		

		$this->data['admin']=$this->M_Admin->getID($id);

		$this->data['isi'] = $this->load->view($this->link.'/form',$this->data,TRUE);

		$this->load->view('template/v_layout_utama',$this->data);
	}
	public function input()
	{

		$id_admin	= $this->input->post('id_admin');
		$username	= $this->input->post('username');
		$password	= $this->input->post('password');
			
		$data = array(
				'username'=>$username
				);

		if($id_admin==0){	
			if($this->M_Admin->cek($data)){
				$this->session->set_flashdata('message2', 'Username sudah dipakai');
				redirect($this->hak_akses.'/'.$this->link);
			}else{

			$data += array(
				'password'=>$password
				);
			if ($this->M_Admin->insert($data)) {// success
					$this->session->set_flashdata('message', 'Berhasil Simpan Data');
					redirect($this->hak_akses.'/'.$this->link);
				}
			}
		}else{
			
			$data += array(
			'id_admin'=>$id_admin
			);
			if ($this->M_Admin->update($data)) {// success
					$this->session->set_flashdata('message', 'Berhasil Edit data');
					redirect($this->hak_akses.'/'.$this->link);
				}
		}

			
	}
	public function hapus($id)
	{
		$this->M_Admin->delete($id);
		$this->session->set_flashdata('message', 'Berhasil Hapus Data');
		redirect($this->hak_akses.'/'.$this->link);
	}

}