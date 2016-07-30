<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Layout{

	public static function get_global_layout(){
		return array(
			'asset_url'   => Utility::asset_url(),
			'js_url'      => Utility::js_url(),
			'footer'      => "All Rights Reserved &copy;" . date('Y'),
			'name'        => "Code Igniter Model",
			'home_link'   => site_url('/'),
			'about_link'  => site_url('/about'),
			'news_link'   => site_url('/news'),
			'user_link'   => site_url('/user'),
			'logout_link' => site_url('/login/logout'),
			'login_link'  => site_url('login')
		);
	}

	public static function get_login_layout(){
		return array('action_login' => base_url('login/go'));
	}

	public static function get_news_layout($data = array()){
		$array = array();
		if(function_exists('form_open')){
			$array['form_open'] = Utility::my_form_open('news/save', $data);
		}
		$array['title']       = !empty($data['title']) ? $data['title'] : 'News';
		$array['title_value'] = !empty($data['title']) ? $data['title'] : '';
		$array['text_value']  = !empty($data['text'])  ? $data['text']  : '';
		$array['slug_value']  = !empty($data['slug'])  ? $data['slug']  : '';
		$array['link_back']   = site_url('/news/');
		$array['link_add']    = site_url('/news/add');
		$array['link_edit']   = !empty($data['id'])    ? site_url('/news/edit/'   . $data['id'])   : site_url('/news/');
		$array['link_delete'] = !empty($data['id'])    ? site_url('/news/delete/' . $data['id'])   : site_url('/news/');
		return $array;
	}

	public static function get_user_layout($data = array()){
		$array = array();
		if(function_exists('form_open')){
			$array['form_open'] = Utility::my_form_open('user/save', $data);
		}
		$array['name_value']  = !empty($data['name'])  ? $data['name']  : '';
		$array['email_value'] = !empty($data['email']) ? $data['email'] : '';
		$array['link_back']   = site_url('/user/');
		$array['link_add']    = site_url('/user/add');
		$array['link_edit']   = !empty($data['id'])    ? site_url('/user/edit/'   . $data['id'])   : site_url('/user/');
		$array['link_delete'] = !empty($data['id'])    ? site_url('/user/delete/' . $data['id'])   : site_url('/user/');
		return $array;
	}
}