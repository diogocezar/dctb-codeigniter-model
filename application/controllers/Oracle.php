<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Oracle extends CI_Controller {
        public function __construct(){
			parent::__construct();
			$this->load->model('NewsModel');
        }

        public function news($slug = FALSE){
			$data['news'] = $this->NewsModel->get_news($slug);
        	if($slug === FALSE){
        		$data['title'] = "News View";
        		$load = "NewsViews/index";
        	}
        	else{
        		$data['title'] = $data['news']['title'];
        		$load = "NewsViews/view";
        	}
			if (empty($data['news']))
				show_404();
			$this->load->view('TemplateViews/header', $data);
			$this->load->view($load, $data);
			$this->load->view('TemplateViews/footer');
        }
}
