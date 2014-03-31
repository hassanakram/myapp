<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class search extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

	}

	function index()
	{
		if($this->tank_auth->is_logged_in())
		{
			
			
		}
		else
		{
			redirect('/auth/login/');
		}
	}
}