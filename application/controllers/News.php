<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class News extends MY_Controller {
        public function __construct(){
			parent::__construct();
			$this->load->model('NewsModel');
        }

        public function index(){
			$data['news'] = $this->NewsModel->get_news();
			$data['title'] = 'News archive';

			$this->load->view('TemplateViews/header', $data);
			$this->load->view('NewsViews/index', $data);
			$this->load->view('TemplateViews/footer');
        }

        public function view($slug = NULL){
			$data['news_item'] = $this->NewsModel->get_news($slug);

			if (empty($data['news_item'])){
			        show_404();
			}

			$data['title'] = $data['news_item']['title'];

			$this->load->view('TemplateViews/header', $data);
			$this->load->view('NewsViews/view', $data);
			$this->load->view('TemplateViews/footer');
        }

		public function create(){
			$this->load->helper('form');
			$this->load->library('form_validation');

			$data['title'] = 'Create a news item';

			$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('text', 'Text', 'required');

			if ($this->form_validation->run() === FALSE){
			    $this->load->view('TemplateViews/header', $data);
			    $this->load->view('NewsViews/create');
			    $this->load->view('TemplateViews/footer');

			}
			else{
			    $this->NewsModel->set_news();
			    $this->load->view('NewsViews/success');
			}
		}
}
