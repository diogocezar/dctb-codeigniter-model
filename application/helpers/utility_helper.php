<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Utility {

	public static function asset_url(){
		return base_url().'assets/';
	}

	public static function js_url(){
		return base_url().'js/';
	}

	public static function input_value($data){
		if(!empty($data)){
			echo "value=\"" . $data . "\"";
		}
	}

	public static function textarea_value($data){
		if(!empty($data)){
			echo $data;
		}
	}

	public static function my_form_open($action, $data){
		if(!empty($data) && !empty($data['id'])){
			$action .= "/" . $data['id'];
		}
		return form_open($action);
	}

	public static function is_logged(){
		$CI = &get_instance();
		$logged = $CI->session->get_userdata("logged");
		if(isset($logged['logged']) && $logged['logged'] == 1) return true;
		else return false;
	}

	public static function has_error($error){
		return isset($error);
	}

}