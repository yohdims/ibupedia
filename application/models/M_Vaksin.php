<?php
class M_Vaksin extends CI_Model {
	
	var $table='vaksin';
	var $pk='id_vaksin';

	public function getAll ()
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->order_by($this->pk, 'DESC');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getID($id)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where($this->pk, $id);

		$query = $this->db->get();
		return $query->row();
	}

	public function insert($data){
		$id = $this->db->insert($this->table, $data);
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