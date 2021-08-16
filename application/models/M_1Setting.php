<?php
class M_1Setting extends CI_Model {

	public function getAll ($table)
	{
		$this->db->select('*');
		$this->db->from($table);
		if($table=='anak'){
			$this->db->join('pengguna p','p.id_pengguna=anak.id_pengguna');
			$this->db->join('vaksin v','v.id_vaksin=anak.id_vaksin');
		}
		$this->db->order_by('id_'.$table, 'DESC');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getWhereAnak ($table,$where)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->join('pengguna p','p.id_pengguna=anak.id_pengguna');
		$this->db->join('vaksin v','v.id_vaksin=anak.id_vaksin');
		$this->db->where('p.id_pengguna',$where['id_pengguna']);
		// $this->db->where($where);
		$this->db->order_by('id_'.$table, 'DESC');
		$query = $this->db->get();
		$hasil=$query->result_array();
		if(count($hasil)>1){
			return $hasil;
		}else{
			return $query->row();
		}
	}
	public function login ($where)
	{
		$this->db->select('*');
		$this->db->from('pengguna');
		$this->db->where($where);
		$query = $this->db->get();
		$hasil=$query->result_array();
		return $query->row();
	}
	public function getID($table,$id)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where('id_'.$table, $id);

		$query = $this->db->get();
		return $query->row();
	}
	public function insert($table,$data){
		$id = $this->db->insert($table, $data);
		
		return $id;
	}
	
	public function update($table,$data){
		$this->db->where('id_'.$table, $data['id_'.$table]);
		$id = $this->db->update($table, $data);
		return $id;
	}
	public function delete($table,$id){
		$id = $this->db->where('id_'.$table,$id)->delete($table);
		return $id;
	}

	public function getLogo()
	{
		$logo= base_url('assets/').'images/logo.png';
		return $logo;
	}
	public function getGambar($gambar)
	{
		$logo= base_url('assets/').'images/mpasi/'.$gambar;
		return $logo;
	}
	public function Cetak()
	{
		$script =
		'<script type="text/javascript">
		  function printData()
		    {
		       var printContents = document.getElementById("printTable").innerHTML;
		       var originalContents = document.body.innerHTML;

		       document.body.innerHTML = printContents;

		       window.print();

		       document.body.innerHTML = originalContents;
		    }
		   function printData2()
		    {
		       var divToPrint=document.getElementById("printTable");
		       newWin= window.open("");
		       newWin.document.write(divToPrint.outerHTML);
		       newWin.print();
		       newWin.close();
		    }
		 </script>';
			return $script;
	}
	
}