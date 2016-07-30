<?php
class MY_Model extends CI_Model {
 	public function __construct(){
        parent::__construct();
    }
    public function save_item($table, $data, $id){
    	if($id == 0)
    		$this->create($table, $data);
    	else
    		$this->update($table, $data, $id);
    }
    public function create($table, $data){
    	if(empty($table) || empty($data))
    		return;
    	return $this->db->insert($table, $data);
    }
    public function update($table, $data, $id){
    	if(empty($table) || empty($data) || empty($id))
    		return;
		$this->db->where('id', $id);
   		return $this->db->update($table, $data);
    }
    public function read($table, $id = FALSE){
    	if(empty($table))
    		return;
    	if($id === FALSE){
			$query = $this->db->get_where($table, array('removed' => 0));
			return $query->result_array();
    	}
    	else{
			$query = $this->db->get_where($table, array('removed' => 0, 'id' => $id));
			return $query->row_array();
    	}
    }
    public function delete_item($table, $id){
    	if(empty($table) || empty($id))
    		return;
    	return $this->update($table, array('removed' => 1), $id);
    }
}
