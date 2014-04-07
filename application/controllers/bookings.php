<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class bookings extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		
		$this->load->model('booking');
		$this->load->model('tank_auth/users');
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('tank_auth');
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

			$data['result']=$this->booking->bookings($this->tank_auth->get_user_id());

			$this->load->view('header', $data);
			$this->load->view('bookings/index', $data);
		}
	}

	function make_dispute()
	{
		if(!$this->tank_auth->is_logged_in())
		{



			redirect('/auth/login/');
		}
		else
		{

			$data['booking_id']=$this->input->post('booking_id');
			$data['user_id']=$this->input->post('user_id');

			$this->load->view('header', $data);
			$this->load->view('bookings/dispute', $data);

			
		}
	}


	function dispute()
	{
		if(!$this->tank_auth->is_logged_in())
		{
			redirect('/auth/login/');
		}
		else
		{

			$this->booking->dispute($this->input->post('booking_id'));

			$row=$this->booking->get_booking($this->input->post('booking_id'));
			//getting emails of both student and teacher
			$data['student_email']=$this->tank_auth->getUserEmail($row->user_id);
			$data['tutor_email']=$this->tank_auth->getUserEmail($row->tutor_id);

			//getting contact# of both student and teacher
			$data['student_contact']=$this->tank_auth->get_contact($row->user_id);
			$data['tutor_contact']=$this->tank_auth->get_contact($row->tutor_id);

			
			//getting full name of both student and teacher
			$data['username']=$this->tank_auth->get_fullname($row->user_id);
			$data['tutorname']=$this->tank_auth->get_fullname($row->tutor_id);

			
			$data['desc']=$row->dispute;		

			
			$data['email']='hassan.akram3282@gmail.com';

			$data['site_name'] = $this->config->item('website_name', 'tank_auth');

			$this->_send_email('dispute', $data['email'], $data);

			
			redirect('/bookings/index');
		}
	}


	function past()
	{
		if (!$this->tank_auth->is_logged_in())
		{
			redirect('/auth/login/');


		} 
		else 
		{

			$data['user_id']	= $this->tank_auth->get_user_id();

			$data['username']	= $this->tank_auth->get_username();

			$data['result']=$this->booking->past($this->tank_auth->get_user_id());

			$this->load->view('header', $data);
			$this->load->view('bookings/past', $data);
		}
	}


	function existing()
	{
		if (!$this->tank_auth->is_logged_in())
		{
			redirect('/auth/login/');
		} 
		else 
		{
			$data['user_id']	= $this->tank_auth->get_user_id();

			$data['username']	= $this->tank_auth->get_username();

			$data['result']=$this->booking->existing($this->tank_auth->get_user_id());

			$this->load->view('header', $data);
			$this->load->view('bookings/existing', $data);
		}
	}


	function create()
	{
		if (!$this->tank_auth->is_logged_in())
		{
			redirect('/auth/login/');
		} 
		else 
		{
			if ($this->form_validation->run())  // validation ok
			{
				$data['from_date']=$this->form_validation->set_value('from_date');
				$data['till_date']=$this->form_validation->set_value('from_date');
				$data['from_time']=$this->form_validation->set_value('from_time');
				$data['till_time']=$this->form_validation->set_value('from_time')+1;

				$this->book();
			}

			$data['tutor_id']=$this->input->post('tutor_id');
			$data['tutor_name']=$this->input->post('tutor_name');
			$data['std_id']=$this->tank_auth->get_user_id();

			$this->load->view('header',$data);
			$this->load->view('bookings/new',$data);
		}
	}


	function edit()
	{
		if (!$this->tank_auth->is_logged_in())
		{

			redirect('/auth/login/');
		} 
		else 
		{
			if ($this->form_validation->run())  // validation ok
			{
				$data['from_date']=$this->form_validation->set_value('from_date');
				$data['till_date']=$this->form_validation->set_value('till_date');
				$data['from_time']=$this->form_validation->set_value('from_time');
				$data['till_time']=$this->form_validation->set_value('till_time');
				$data['till_time']=$this->form_validation->set_value('till_time');
				$this->booking->edit($this->input->post('booking_id'));
			}

			

			$row=$this->booking->get_booking( $this->input->post('booking_id'));
			
				$data['from_date']=$row->from_date;
				$data['from_time']=$row->from_time;
				$data['till_date']=$row->till_date;
				$data['till_time']=$row->till_time;
				$data['id']=$row->id;

			$this->load->view('header',$data);
			$this->load->view('bookings/edit',$data);
		}
	}


	function update()
	{
		$this->booking->edit($this->input->post('booking_id'));
		redirect('');
	}




	function delete()
	{
		if (!$this->tank_auth->is_logged_in())
		{

			redirect('/auth/login/');
		}
		else 
		{
			$booking_data=$this->booking->get_booking($this->input->post('booking_id'));



			$this->booking->reject_booking($this->input->post('booking_id'));

			$student_data=$this->users->get_user_details($booking_data->user_id);


			$data['message']="You have cancelled a booking from <b>".$student_data->firstname." ".$student_data->lastname."</b>";

			if($this->booking->delete_booking($this->input->post('booking_id')))
			{

				$this->load->view('header', $data);
				$this->load->view('/auth/general_message',$data);
			}
			else
			{
				echo ("error !");
			}
		}
	}


	function reject()
	{
		if (!$this->tank_auth->is_logged_in())
		{

			redirect('/auth/login/');
		}
		else
		{
			$data['email']=$this->tank_auth->getUserEmail($this->input->post('user_id'));

			$data['site_name'] = $this->config->item('website_name', 'tank_auth');

			$this->_send_email('rejectbook', $data['email'], $data);

			$booking_data=$this->booking->get_booking($this->input->post('booking_id'));



			$this->booking->reject_booking($this->input->post('booking_id'));

			$student_data=$this->users->get_user_details($booking_data->user_id);


			$data['message']="You have rejected a booking from <b>".$student_data->firstname." ".$student_data->lastname;

			$this->load->view('header', $data);
			$this->load->view('/auth/general_message',$data);

			//redirect($_SERVER['HTTP_REFERER']);
			

		}
	}


	function feedback()
	{
		if (!$this->tank_auth->is_logged_in())
		{
			redirect('/auth/login/');
		}
		else
		{
			$this->booking->review($this->input->post('booking_id'));  

			$this->users->rate($this->input->post('user_id'));

			redirect('/bookings/index');
		}
	}


	function accept()
	{
		if (!$this->tank_auth->is_logged_in())
		{
			redirect('/auth/login/');
		}
		else 
		{
			
			$this->booking->accept_booking($this->input->post('booking_id'));

			$data['email']=$this->tank_auth->getUserEmail($this->input->post('user_id'));

			$data['site_name'] = $this->config->item('website_name', 'tank_auth');

			$this->_send_email('notifyuser', $data['email'], $data);

			$booking_data=$this->booking->get_booking($this->input->post('booking_id'));

			$this->booking->reject_booking($this->input->post('booking_id'));
			
			$student_data=$this->users->get_user_details($booking_data->user_id);

			$data['message']=" You have accepted a booking from <b>".$student_data->firstname." ".$student_data->lastname."</b>"."</b> at <b> ".$booking_data->from_time." </b> on <b>".$booking_data->from_date."</b>";
			
			$this->load->view('header', $data);
			$this->load->view('/auth/general_message',$data);

			
		}
	}


	function feedbackview()
	{
		if (!$this->tank_auth->is_logged_in())
		{
			redirect('/auth/login/');
		}
		else 
		{
			$data['booking_id']=$this->input->post('booking_id');
			$data['user_id']=$this->input->post('user_id');

			$this->load->view('header',$data);
			$this->load->view('/bookings/feedback',$data);

		}
	}




	function _send_email($type, $email, &$data)
	{
		$this->load->library('email');
		$this->email->from($this->config->item('webmaster_email', 'tank_auth'), $this->config->item('website_name', 'tank_auth'));
		$this->email->reply_to($this->config->item('webmaster_email', 'tank_auth'), $this->config->item('website_name', 'tank_auth'));
		$this->email->to($email);
		$this->email->subject(sprintf($this->lang->line('auth_subject_'.$type), $this->config->item('website_name', 'tank_auth')));
		$this->email->message($this->load->view('email/'.$type.'-html', $data, TRUE));
		$this->email->set_alt_message($this->load->view('email/'.$type.'-txt', $data, TRUE));
		$this->email->send();
	}


	
	function book()
	{
		if (!$this->tank_auth->is_logged_in())
		{
			redirect('/auth/login/');
		}
		else
		{
			$data['user_id']=$this->input->post('user_id');
			$data['tutor_id']=$this->input->post('tutor_id');
			$data['from_date']=$this->input->post('from_date');
			$data['till_date']=$this->input->post('from_date');
			$data['from_time']=$this->input->post('from_time');
			

			$data['grade']=$this->input->post('grade');
			$data['subject']=$this->input->post('subject');

			$date_from = strtotime($data['from_date']);
			$date_to = strtotime($data['till_date']);

			$duration_date=abs($date_from-$date_to);


			$time_from = strtotime($data['from_time']);
			
			
			
			$time_to = strtotime($data['from_time']);
			
			//$time_to->modify("+1 hour");
			
			//$data['till_time']=$time_to;

			//$duration_days=$duration_date/ (3600*24);
			
			//$duration = (abs($time_from - $time_to) / 3600). " minute";
			
			//if($duration_days>0)
			//{
			//	$duration=$duration*$duration_days;
			//}

			$row=$this->users->get_type($this->input->post('tutor_id'));

			$data['cost']= $row->hourly_rate;

			$data['duration']=1;	

			$data['changed']=0;
			
			if($this->booking->book1($this->tank_auth->get_user_id(),$data))
			{
				$data['email']=$this->tank_auth->getUserEmail($this->input->post('tutor_id'));

				$data['site_name'] = $this->config->item('website_name', 'tank_auth');

				$this->_send_email('notify', $data['email'], $data);

				$data['message']="Request has been sent :) to tutor";
				
				$this->load->view('header', $data);
				$this->load->view('/auth/general_message',$data);
			}
			else
			{
				echo 'failed';
			}
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */