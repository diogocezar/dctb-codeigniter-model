<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

    public function __construct(){
    	$this->loginNeeded = true;
		parent::__construct();
		$this->load->model('UserModel');
		$this->load->helper('form');
		$this->load->library('form_validation');
    }

    public function detail($id){
        $data['user'] = $this->UserModel->get_by_id($id);
        parent::append_replace(Layout::get_user_layout($data['user']));
        parent::load_view_template('user/view', $data);
    }

    public function index(){
        $data['users'] = parent::append_links($this->UserModel->get_all(), 'user');
        parent::exec_form_replaces('Users list', null, Layout::get_user_layout($data['users']));
        parent::load_view_template('user/list', $data);
    }

    public function add(){
    	$data['user_type'] = $this->UserModel->get_user_type();
		parent::exec_form_replaces('Add user', '', Layout::get_user_layout());
		parent::load_view_template('user/form', $data);
    }

    public function edit($id){
		$data['item'] = $this->UserModel->get_by_id($id);
		$data['user_type'] = parent::append_selected($this->UserModel->get_user_type(), $data['item']['id_user_type']);
		parent::exec_form_replaces('Edit user', '', Layout::get_user_layout($data['item']));
		parent::load_view_template('user/form', $data);
    }

	public function save($id = FALSE){
		$data              = array();
		$validation_errors = FALSE;

		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run() === FALSE){
			$validation_errors = validation_errors();
			if($id != FALSE){
				$data['item'] = $this->UserModel->get_by_id($id);
				parent::exec_form_replaces('Edit user', $validation_errors, Layout::get_user_layout(($data['item'])));
			}
			else{
				parent::exec_form_replaces('Save user', $validation_errors, Layout::get_user_layout());
			}
			parent::load_view_template('user/form', $data);
		}
		else{
		    $this->UserModel->save($id);
		    parent::exec_form_replaces('Saved with success', $validation_errors, Layout::get_user_layout());
		    parent::load_view_template('user/success');
		}
	}

    public function delete($id){
    	 $this->UserModel->delete($id);
    	 parent::exec_form_replaces('Deleted with success', null, Layout::get_user_layout());
    	 parent::load_view_template('user/success');
    }
}