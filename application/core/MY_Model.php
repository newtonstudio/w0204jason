<?php
class MY_Model extends CI_Model {

	protected $table_name = "contact";

	public function __construct(){
		$this->load->database();
	}

	public function record_count($where=array()) {

		$this->db->where($where);
		$this->db->select("COUNT(*) as total");
		$query = $this->db->get($this->table_name);
		$row = $query->row_array();
		return $row['total'];

		//SELECT COUNT(*) as total FROM table WHRE .....


	}

	public function fetch($limit, $start, $where=array()) {

		$this->db->limit($limit, $start);
		$this->db->where($where);
		$query = $this->db->get($this->table_name);
		return $query->result_array();

	}

	public function get_where($where=array()){
		$this->db->where($where);
		$query = $this->db->get($this->table_name);
		return $query->result_array();
	}

	public function getOne($where=array()) {
		$this->db->where($where);
		$query = $this->db->get($this->table_name);
		return $query->row_array();
	}

	public function insert($insert_array=array()) {
		$this->db->insert($this->table_name, $insert_array);
		return $this->db->insert_id();
	}

	public function update($where=array(), $update_array=array()) {
		$this->db->update($this->table_name, $update_array, $where);
	}

	public function delete($where=array()) {
		$this->db->delete($this->table_name, $where);
	}

	
}
?>