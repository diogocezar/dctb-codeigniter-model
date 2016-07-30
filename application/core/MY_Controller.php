<?php
class MY_Controller extends CI_Controller {

	protected $loginNeeded;
    protected $replaces;
    protected $logged;

 	public function __construct(){
        parent::__construct();

        $this->replaces = array();
		$this->logged   = $this->session->userdata("logged");

		if ($this->logged != 1 && $this->loginNeeded === TRUE)
			redirect(base_url('/login'));
    }

    private function load_global_replaces($data){
        return array_merge($data, Layout::get_global_layout());
    }

    public function append_links($array, $table, $field = "id"){
        foreach ($array as $key => $value){
            $array[$key]['link_view'] = site_url('/'.$table.'/' . $value[$field]);
        }
        return $array;
    }

    public function append_selected($array, $id){
        foreach ($array as $key => $value){
            $array[$key]['selected'] = "";
            if($id == $array[$key]['id']){
                 $array[$key]['selected'] = "selected=\"selected\"";
            }
        }
        return $array;
    }

    public function load_view_template($view, $data = null){
    	$my_data = array();
    	if(!empty($data)){
    		$my_data = $data;
    	}
    	if(!empty($this->replaces)){
    		$my_data = array_merge($this->replaces, $my_data);
    	}
        $my_data = $this->load_global_replaces($my_data);
		$this->parser->parse('templates/header', $my_data);
		$this->parser->parse($view, $my_data);
		$this->parser->parse('templates/footer', $my_data);
    }

    public function exec_form_replaces($title, $validation_erros, $layout){
        $this->append_replace(array(
            'title'             => $title,
            'validation_errors' => $validation_erros
        ));
        $this->append_replace($layout);
    }

    public function append_replace($data){
        $this->replaces = array_merge($this->replaces, $data);
    }
}
