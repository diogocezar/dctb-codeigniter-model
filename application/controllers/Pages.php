<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends MY_Controller {

    public function __construct(){
        $this->loginNeeded = true;
		parent::__construct();
    }

	public function view($page = 'home'){
        if (!file_exists(APPPATH.'views/pages/'.$page.'.php'))
            show_404();
        parent::append_replace(array('title' => ucfirst($page)));
        parent::load_view_template('pages/'.$page);
	}
}
