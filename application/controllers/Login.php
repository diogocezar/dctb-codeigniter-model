<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

    public function __construct(){
    	$this->loginNeeded = false;
    	parent::__construct();
    	$this->load->model('UserModel');
    	$this->replaces = Layout::get_login_layout();
    }

    public function index(){
    	parent::append_replace(array('title' => 'Login'));
		parent::load_view_template('login/login');
    }

    public function go(){
		$user = $this->input->post("user");
		$pass = $this->input->post("pass");
		if($this->UserModel->check_login($user, $pass)){
			$this->session->set_userdata("logged", 1);
			redirect(base_url());
		}
		else{
			parent::append_replace(array('title' => 'Login', 'error' => 'Sorry, user and password not found.'));
			parent::load_view_template('login/login');
		}
    }
	public function logout(){
		$this->session->unset_userdata("logged");
		redirect(base_url());
	}
}
