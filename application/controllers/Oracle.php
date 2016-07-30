<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Oracle extends MY_Controller {

    public function __construct(){
        $this->loginNeeded = false;
    	parent::__construct();
    	$this->load->model('NewsModel');
    }

    public function list_news(){
        $data['news'] = parent::append_links($this->NewsModel->get_all(), 'news', 'slug');
        parent::append_replace(Layout::get_news_layout($data['news']));
        parent::load_view_template('news/list', $data);
    }

    public function detail_news($slug){
        $data['news'] = $this->NewsModel->get_by_slug($slug);
        parent::append_replace(Layout::get_news_layout($data['news']));
        parent::load_view_template('news/view', $data);
    }
}
