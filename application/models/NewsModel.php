<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NewsModel extends MY_Model {

    public function __construct(){
        $this->load->database();
    }
	public function save($id = FALSE){
		$id = $id === FALSE ? $this->input->post('id') : $id;
		$data = array(
			'title' => $this->input->post('title'),
			'slug'  => url_title($this->input->post('title'), 'dash', TRUE),
			'text'  => $this->input->post('text')
		);
		return parent::save_item('news', $data, $id);
	}

	public function delete($id){
		return parent::delete_item('news', $id);
	}

	public function get_by_id($id){
		return parent::read('news', $id);
	}

	public function get_by_slug($slug){
		$query = $this->db->get_where('news', array('slug' => $slug));
		return $query->row_array();
	}

	public function get_all(){
		return parent::read('news');
	}
}