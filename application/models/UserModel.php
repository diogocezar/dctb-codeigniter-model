<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends MY_Model {

    public function __construct(){
        $this->load->database();
    }

	public function save($id = FALSE){
		$id = $id === FALSE ? $this->input->post('id') : $id;
		$data = array(
			'name'         => $this->input->post('name'),
			'email'        => $this->input->post('email'),
			'password'     => sha1($this->input->post('password')),
			'id_user_type' => $this->input->post('user_type')
		);
		return parent::save_item('user', $data, $id);
	}

	public function delete($id){
		return parent::delete_item('user', $id);
	}

	public function get_by_id($id){
		return parent::read('user', $id);
	}

	public function get_all(){
		return parent::read('user');
	}

	public function get_user_type(){
		$data = array();
        $query = $this->db->get('user_type');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row){
                $data[] = $row;
            }
        }
        $query->free_result();
        return $data;
	}

	public function check_login($email, $pass){
		$this->db->where(array('email' => $email, 'password' => sha1($pass)));
		$num_rows = $this->db->count_all_results('user');
		if($num_rows > 0)
			return true;
		else
			return false;
	}
}