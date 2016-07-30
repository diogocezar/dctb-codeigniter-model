<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends MY_Controller {

    public function __construct(){
    	$this->loginNeeded = true;
		parent::__construct();
		$this->load->model('NewsModel');
		$this->load->helper('form');
		$this->load->library('form_validation');
    }

    public function add(){
		parent::exec_form_replaces('Add news', '', Layout::get_news_layout());
		parent::load_view_template('news/form');
    }

    public function edit($id){
		$data['item'] = $this->NewsModel->get_by_id($id);
		parent::exec_form_replaces('Edit news', '', Layout::get_news_layout($data['item']));
		parent::load_view_template('news/form', $data);
    }

	public function save($id = FALSE){
		$data              = array();
		$validation_errors = FALSE;

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('text', 'Text', 'required');

		if($this->form_validation->run() === FALSE){
			$validation_errors = validation_errors();
			if($id != FALSE){
				$data['item'] = $this->NewsModel->get_by_id($id);
				parent::exec_form_replaces('Edit news', $validation_errors, Layout::get_news_layout(($data['item'])));
			}
			else{
				parent::exec_form_replaces('Save news', $validation_errors, Layout::get_news_layout());
			}
			parent::load_view_template('news/form', $data);
		}
		else{
		    $this->NewsModel->save($id);
		    parent::exec_form_replaces('Saved with success', $validation_errors, Layout::get_news_layout());
		    parent::load_view_template('news/success');
		}
	}

    public function delete($id){
    	 $this->NewsModel->delete($id);
    	 parent::append_replace(array('title' => 'Deleted with success'));
    	 parent::load_view_template('news/success');
    }
}
