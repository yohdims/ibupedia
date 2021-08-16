<?php
class M_Anak extends CI_Model {
	// var $session_expire	= 7200;
	var $table='anak';
	var $pk='id_anak';

	public function getAll ()
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('pengguna p','p.id_pengguna=anak.id_pengguna');
			$this->db->join('vaksin v','v.id_vaksin=anak.id_vaksin');
		$this->db->order_by($this->pk, 'DESC');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getID($id)
	{
		$this->db->select('*');
		$this->db->from($this->table.' a');
		$this->db->join('pengguna p','p.id_pengguna=a.id_pengguna');
			$this->db->join('vaksin v','v.id_vaksin=a.id_vaksin');
		$this->db->where($this->pk, $id);

		$query = $this->db->get();
			return $query->row();
	}
	public function insert($data){
		$id = $this->db->insert($this->table, $data);
		//$this->db->insert_id();
		return $id;
	}
	
	public function update($data){
		$this->db->where($this->pk, $data[$this->pk]);
		$id = $this->db->update($this->table, $data);
		return $id;
	}

	public function delete($id){
		$id = $this->db->where($this->pk,$id)->delete($this->table);
		return $id;
	}
}