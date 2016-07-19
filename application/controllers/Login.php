<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {
    public function index(){
		$this->load->view('LoginViews/login');
    }
    public function go(){
		$user = $this->input->post("user");
		$pass = sha1($this->input->post("pass"));
		// TODO: Get from database
		if ($user == "123456" && $pass == '7c4a8d09ca3762af61e59520943dc26494f8941b') {
			$this->session->set_userdata("logged", 1);
			redirect(base_url());
		}
		else{
			$data['error'] = "Usuário/Senha incorretos";
			$this->load->view("LoginViews/login", $data);
		}
    }
	public function logout(){
		$this->session->unset_userdata("logged");
		redirect(base_url());
	}
}
