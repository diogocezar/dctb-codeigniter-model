<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserTypeModel extends MY_Model {

    public function __construct(){
        $this->load->database();
    }

	public function save($id = FALSE){
		$id = $id === FALSE ? $this->input->post('id') : $id;
		$data = array(
			'name'         => $this->input->post('name'),
			'description'  => $this->input->post('description')
		);
		return parent::save_item('user_type', $data, $id);
	}

	public function delete($id){
		return parent::delete_item('user_type', $id);
	}

	public function get_by_id($id){
		return parent::read('user_type', $id);
	}

	public function get_all(){
		return parent::read('user_type');
	}
}