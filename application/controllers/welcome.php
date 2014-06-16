<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('tank_auth');
		$this->load->model('booking');
	}

	function index()
	{
		if (!$this->tank_auth->is_logged_in()) 
		{
			redirect('/auth/login/');
		} 
		else 
		{
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
			$data['result'] = 11111;

			$data['average_rating']=$this->booking->getAverageRating($this->tank_auth->get_user_id());
			$data['LastTen_rating']=$this->booking->getLastTenRating($this->tank_auth->get_user_id());
            $data['status_points']=$this->booking->getStatusPoints($this->tank_auth->get_user_id());
            $data['status_points_remaining']=100-$this->booking->getStatusPoints($this->tank_auth->get_user_id());

            $data['lastWeekBookings']=$this->booking->getLastWeekBookings($this->tank_auth->get_user_id());


			$this->load->view('header', $data);
			$this->load->view('welcome', $data);
		}
	}
}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */