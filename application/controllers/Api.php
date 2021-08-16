<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {
	
	public function All($table)
	{
		$data=$this->M_1Setting->getAll($table);
		echo json_encode($data);
	}
	public function login()
	{
		$username=$this->input->post('username'); 
		$password=$this->input->post('password'); 
		$pengguna=array('username'=>$username,'password'=>$password);
		$data_pengguna=$this->M_1Setting->login($pengguna);
		if($data_pengguna==true){
			$data=array(
				'username'=>$data_pengguna->username,
				'id_pengguna'=>$data_pengguna->id_pengguna,
				'nama'=>$data_pengguna->nama,
				'message'=>'Berhasil Login'
				);
		}else{
			$data=array('message'=>'Gagal');
		}
		echo json_encode($data);
	}
	public function tabel_anak($id_pengguna)
	{
		$pengguna=array('id_pengguna'=>$id_pengguna);
		$data=$this->M_1Setting->getWhereAnak('anak',$pengguna);
		echo json_encode($data);
	}
	public function insert_anak()
	{
		$id_anak	= $this->input->post('id_anak');
		$id_pengguna		= $this->input->post('id_pengguna');
		$id_vaksin	= $this->input->post('id_vaksin');
		$nama_anak	= $this->input->post('nama_anak');
		$tgl_lahir	= $this->input->post('tgl_lahir');
		$berat_badan	= $this->input->post('berat_badan');
		$tinggi_badan	= $this->input->post('tinggi_badan');
		$jk	= $this->input->post('jk');

			$post = array(
				'id_pengguna'=>$id_pengguna,
				'id_vaksin'=>$id_vaksin,
				'nama_anak'=>$nama_anak,
				'tgl_lahir'=>$tgl_lahir,
				'berat_badan'=>$berat_badan,
				'tinggi_badan'=>$tinggi_badan,
				'jk'=>$jk
			);

		$data=$this->M_1Setting->insert('anak',$post);
		if($data==true){
			$message=array('message'=>'Berhasil Ditambah');
		}else{
			$message=array('message'=>'Gagal');
		}
		echo json_encode($message);
	}
	public function Id($table,$id)
	{
		$data=$this->M_1Setting->getID($table,$id);
		echo json_encode($data);
	}
	public function insert($table)
	{
		$post=$this->input->post(); 
		$data=$this->M_1Setting->insert($table,$post);
		if($data==true){
			$message=array('message'=>'Berhasil Ditambah');
		}else{
			$message=array('message'=>'Gagal');
		}
		echo json_encode($message);
	}
	public function update($table)
	{
		$post=$this->input->post(); 
		$data=$this->M_1Setting->update($table,$post);
		if($data==true){
			$message=array('message'=>'Berhasil Ditambah');
		}else{
			$message=array('message'=>'Gagal');
		}
		echo json_encode($message);
	}
	public function delete($table,$id)
	{
		$data=$this->M_1Setting->delete($table,$id);
		if($data==true){
			$message=array('message'=>'Berhasil Dihapus');
		}else{
			$message=array('message'=>'Gagal');
		}
		echo json_encode($message);
	}
}
