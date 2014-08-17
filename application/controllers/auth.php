	<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');
		$this->load->model('tank_auth/users');
	}

	function addSubject()
	{
		if($this->tank_auth->is_logged_in())
		{
			$subs=$this->input->post('subject');
			$grds=$this->input->post('grades');
			$userDetails=$this->users->getUserDetails($this->tank_auth->get_user_id());
			
			$this->users->setUserSubjects($this->tank_auth->get_user_id(),$userDetails->subjects.$subs.":".$grds."#");

			return true;
		}
		else
		{
			return false;
		}
	}





	function index()
	{
		if ($message = $this->session->flashdata('message')) 
		{
			$data['is_logged_in']=$this->tank_auth->is_logged_in();
			$this->load->view('header', $data);

			$this->load->view('auth/general_message', array('message' => $message));
		} 
		else 
		{
			redirect('/auth/login/');
		}
	}

	function calender_setting()
	{
		if ($this->tank_auth->get_user_id())
		{
			$data['setting']='unchecked';
			$data['message']="nothing";

			$this->load->view('header', $data);
			$this->load->view('auth/calender_setting', $data);
		}
		else
		{
			redirect('/auth/login/');
		}
	}



	function timing_calender($id=NULL)
	{
		if($id===NULL || $this->tank_auth->get_user_id()!=$id )
		{
			show_404();
		}
		else
		{
			if (!$this->tank_auth->is_logged_in()) 
			{								// not logged in or not activated
				redirect('/auth/login/');
			}
			else
			{
					$data['calender']="set";
					$data['nothing']='nothing';
					$row= $this->users->get_setting($id);
					$data['sunday']=$row->sunday;
					$data['monday']=$row->monday;
					$data['tuesday']=$row->tuesday;
					$data['wednesday']=$row->wednesday;
					$data['thursday']=$row->thursday;
					$data['friday']=$row->friday;
					$data['saturday']=$row->saturday;
					$this->load->view('header', $data);
					$this->load->view('auth/calender', $data);
			}
		}
	}

	

	function setCalendar()
    {
    	if (!empty($_POST)&& $this->tank_auth->isTutor())
    	{
	        $post = array();
	        $mond="";
	        $tuesd="";
	        $wednes="";
			$thurs="";
			$frid="";
			$satur="";
			$sund="";

			
			
			foreach ( array_keys($_POST) as $key )
	        {

	            $post[$key] = $this->input->post($key);

	            $pieces = explode("_", $key);

	            if(sizeof($pieces) ===4)
	            {
	            	$time=$pieces[1].' '.$pieces[2].'.'.$pieces[3];
	            }
	            
	            if($pieces[0]==='monday')
	            {
	            	$mond=$mond.''.$time;
	            }
	            else if($pieces[0]==='tuesday')
	            {
	            	$tuesd=$tuesd.''.$time;
	            }
	            else if($pieces[0]==='wednesday')
	            {
	            	$wednes=$wednes.''.$time;
	            }
	            else if($pieces[0]==='thursday')
	            {
	            	$thurs=$thurs.''.$time;
	            }
	            else if($pieces[0]==='friday')
	            {
	            	$frid=$frid.''.$time;
	            }
	            else if($pieces[0]==='saturday')
	            {
	            	$satur=$satur.''.$time;
	            }
	            else if($pieces[0]==='sunday')
	            {
	            	$sund=$sund.''.$time;
	            }
	        }


	/*      echo 'monday:'.$mond.'</br>';
	        echo 'tuesday:'.$tuesd.'</br>';
	        echo 'wednesday:'.$wednes.'</br>';
	        echo 'thursday:'.$thurs.'</br>';
	        echo 'friday:'.$frid.'</br>';
	        echo 'saturday:'.$satur.'</br>';
	        echo 'sunday:'.$sund.'</br>';
	*/        
	        $this->users->set_setting($this->tank_auth->get_user_id(),$mond,'monday');
	        $this->users->set_setting($this->tank_auth->get_user_id(),$tuesd,'tuesday');
	        $this->users->set_setting($this->tank_auth->get_user_id(),$wednes,'wednesday');
	        $this->users->set_setting($this->tank_auth->get_user_id(),$thurs,'thursday');
	        $this->users->set_setting($this->tank_auth->get_user_id(),$frid,'friday');
	        $this->users->set_setting($this->tank_auth->get_user_id(),$satur,'saturday');
	        $this->users->set_setting($this->tank_auth->get_user_id(),$sund,'sunday');
			
	        //$this->load->view('auth/temp');
		}
		redirect('/auth/timing_calender/'.$this->tank_auth->get_user_id());

    }


	function get_setting()
	{
		if ($this->tank_auth->is_logged_in())
		{
			$row= $this->users->get_setting($this->tank_auth->get_user_id());

			$times="";
			if($this->input->post('day')=='monday')
			{
				$times=$row->monday;	
			}
			else if($this->input->post('day')=='tuesday')
			{
				$times=$row->tuesday;	
			} 
			else if($this->input->post('day')=='wednesday')
			{
				$times=$row->wednesday;	
			}
			else if($this->input->post('day')=='thursday')
			{
				$times=$row->thursday;	
			}
			else if($this->input->post('day')=='friday')
			{
				$times=$row->friday;	
			}
			else if($this->input->post('day')=='saturday')
			{
				$times=$row->saturday;	
			}
			else if($this->input->post('day')=='sunday')
			{
				$times=$row->sunday;
			}


			$findme   = $this->input->post('time');

			$pos = strpos($times, $findme);


			if(isset ($_POST['set_setting']))
			{
				$day=$this->input->post('day');
				$time=$this->input->post('time');
				$checked=$this->input->post('onoffswitch');

				if((int) $checked == 1)
				{
					// Note our use of ===.  Simply == would not work as expected
					// because the position of 'a' was the 0th (first) character.
					if ($pos === false) 
					{
						$times=$times."".$time;
						$this->users->set_setting($this->tank_auth->get_user_id(),$times,$day);
					} 
				}
				else
				{
					
					if ( !($pos === false) )
					{
						$times = str_replace($time,"",$times);
						
						$this->users->set_setting($this->tank_auth->get_user_id(),$times,$day);
					} 
				}
			}


			$row= $this->users->get_setting($this->tank_auth->get_user_id());

			$times="";
			if($this->input->post('day')=='monday')
			{
				$times=$row->monday;	
			}
			else if($this->input->post('day')=='tuesday')
			{
				$times=$row->tuesday;	
			} 
			else if($this->input->post('day')=='wednesday')
			{
				$times=$row->wednesday;	
			}
			else if($this->input->post('day')=='thursday')
			{
				$times=$row->thursday;	
			}
			else if($this->input->post('day')=='friday')
			{
				$times=$row->friday;	
			}
			else if($this->input->post('day')=='saturday')
			{
				$times=$row->saturday;	
			}
			else if($this->input->post('day')=='sunday')
			{
				$times=$row->sunday;
			}

			$findme   = $this->input->post('time');

			$pos = strpos($times, $findme);

			// Note our use of ===.  Simply == would not work as expected
			// because the position of 'a' was the 0th (first) character.
			if ($pos === false) 
			{
				$data['setting']='unchecked';
			   
			} 
			else 
			{
				$data['setting']='checked';
			   
			}

			$this->load->view('header', $data);
			$this->load->view('auth/calender_setting', $data);
		}
		else
		{
			redirect('/auth/login/');
		}
	}


	function profiles($id)
	{
		if($this->uri->segment(3)>0)
		{
			if ($this->tank_auth->is_logged_in())
			{

				$row=$this->users->get_type($this->uri->segment(3));
				if($row && $row->user_type=='tutor')
				{
					$data['id']=$this->uri->segment(3);
					$data['name']=$row->firstname.' '.$row->lastname;
					$data['full_name']= $row->firstname.' '.$row->lastname;
					$data['firstname']=$row->firstname;
					$data['lastname']=$row->lastname;
					$data['email']=$this->tank_auth->getUserEmail($this->uri->segment(3));
					$data['hourly_rate']=$row->hourly_rate;
					

					$data['free_from']=$row->free_from;
					$data['free_till']=$row->free_till;
					$data['start_time']=$row->start_time;
					$data['end_time']=$row->end_time;

					$data['biography']=$row->biography;
					$data['gender']=$row->gender;
					$data['rating']=$row->rating;
					$data['paypal_id']=$row->paypal_id;
					$data['postel_code']=$row->postel_code;
					$username = $this->tank_auth->get_username();
					$data['username']=$username;


					$this->load->view('header', $data);
					$this->load->view('auth/user_profile', $data);

				}
				else
				{
					show_404();
				}
			} 
			else 
			{
				redirect('/auth/login/');
			}	
		}
		else
		{
			show_404();
		}

	}

	/**
	 * Login user on the site
	 *
	 * @return void
	 */
	function login()
	{
		if ($this->tank_auth->is_logged_in()) 
		{									// logged in
			redirect('');

		} 
		elseif ($this->tank_auth->is_logged_in(FALSE)) 
		{						// logged in, not activated
			redirect('/auth/send_again/');
		} 
		else 
		{
			
			$use_username = $this->config->item('use_username', 'tank_auth');
			$captcha_registration	= $this->config->item('captcha_registration', 'tank_auth');
			$use_recaptcha			= $this->config->item('use_recaptcha', 'tank_auth');


			$data['login_by_username'] = ($this->config->item('login_by_username', 'tank_auth') AND
					$this->config->item('use_username', 'tank_auth'));
			$data['login_by_email'] = $this->config->item('login_by_email', 'tank_auth');


			$this->form_validation->set_rules('login', 'Login', 'trim|required|xss_clean');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
			$this->form_validation->set_rules('remember', 'Remember me', 'integer');

			// Get login for counting attempts to login
			if ($this->config->item('login_count_attempts', 'tank_auth') AND
					($login = $this->input->post('login'))) 
			{
				$login = $this->security->xss_clean($login);
			} 
			else 
			{
				$login = '';
			}

			$data['use_recaptcha'] = $this->config->item('use_recaptcha', 'tank_auth');
			if ($this->tank_auth->is_max_login_attempts_exceeded($login)) 
			{
				if ($data['use_recaptcha'])
					$this->form_validation->set_rules('recaptcha_response_field', 'Confirmation Code', 'trim|xss_clean|required|callback__check_recaptcha');
				else
					$this->form_validation->set_rules('captcha', 'Confirmation Code', 'trim|xss_clean|required|callback__check_captcha');
			}
			$data['errors'] = array();

			if ($this->form_validation->run()) 
			{								// validation ok
				if ($this->tank_auth->login(
						$this->form_validation->set_value('login'),
						$this->form_validation->set_value('password'),
						$this->form_validation->set_value('remember'),
						$data['login_by_username'],
						$data['login_by_email'])) {     // success

					if($this->tank_auth->isUpdated())
					{
						if($this->tank_auth->isTutor())
						{
							redirect('/bookings/index');
						}
						else
						{
							redirect('');
						}
					}
					else
					{
						redirect('/auth/edit_view');
					}
				} 
				else 
				{
					$errors = $this->tank_auth->get_error_message();
					if (isset($errors['banned'])) 
					{								// banned user
						$this->_show_message($this->lang->line('auth_message_banned').' '.$errors['banned']);

					} 
					elseif (isset($errors['not_activated'])) 
					{				// not activated user
						redirect('/auth/send_again/');

					} 
					else 
					{													// fail
						foreach ($errors as $k => $v)	$data['errors'][$k] = $this->lang->line($v);
					}
				}
			}
			$data['show_captcha'] = FALSE;
			if ($this->tank_auth->is_max_login_attempts_exceeded($login)) {
				$data['show_captcha'] = TRUE;
				if ($data['use_recaptcha']) 
				{
					$data['recaptcha_html'] = $this->_create_recaptcha();
				} else {
					$data['captcha_html'] = $this->_create_captcha();
				}
			}

			if ($captcha_registration) {
				if ($use_recaptcha) {
					$data['recaptcha_html'] = $this->_create_recaptcha();
				} else {
					$data['captcha_html'] = $this->_create_captcha();
				}
			}

			$data['use_username'] = $use_username;
			$data['captcha_registration'] = $captcha_registration;
			$data['use_recaptcha'] = $use_recaptcha;

			$this->load->view('header', $data);
			$this->load->view('auth/login_form', $data);
		}
	}

	/**
	 * Logout user
	 *
	 * @return void
	 */
	function logout()
	{
		$this->tank_auth->logout();

		$this->_show_message($this->lang->line('auth_message_logged_out'));
	}




	/**
	 * Register user on the site
	 *
	 * @return void
	 */

	function edit_view()
	{
		$id = $this->tank_auth->get_user_id();
		$returnresults = $this->db->get_where('user_profiles', array('user_id' => $id));

		


		if ($returnresults->num_rows() > 0)
		{
			$row = $returnresults->row();
			$data = array (
				'id' => $row->id,
				'firstname' => $row->firstname,
				'lastname' => $row->lastname,
				'gender' => $row->gender,
				'grade' => $row->grade,
				'phone' => $row->phone,
				'postel_code' => $row->postel_code,
				
				

				'free_from' => $row->free_from,
				'free_till' => $row->free_till,
				'start_time' => $row->start_time,
				'end_time' => $row->end_time,
				'school' => $row->school,
				'biography' => $row->biography,
				'student_name' => $row->student_name,
				'hourly_rate' => $row->hourly_rate,
				'paypal_id' => $row->paypal_id,
				'thumb' => $row->thumb,
				'photo' => $row->photo,

				'success' => FALSE
			   );

			
			$subs=$row->subjects;
			$subjects = explode("#", $subs);
			$data['subjects']=$subjects;


			$data['title'] = 'Edit Profile';
			$data['main_content'] = 'users/edit';
			$this->load->view('header', $data);
	  		$this->load->view('auth/edit', $data);  
  		}
	}

	function update_profile()
	{
		if ($this->tank_auth->is_logged_in()) 
		{

			/* Upload Settings */
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '4024';
			//$config['max_width']  = '4024';
			//$config['width'] = '128';
			//$config['max_height']  = '768';
			/* Encrypting helps prevent the file name from being discerned once its saved */
			$config['encrypt_name'] = 'TRUE';
		 
			/* Load the CodeIgniter upload library, feed it the config from above */
			$this->load->library('upload', $config);


				/* Checks if the do_upload function has been successfully executed ...
				... and if not, shows the upload form and any errors (if they exist) */
			if($this->upload->do_upload())
			{
				
				//echo "Yes I am in";
			}
			else
			{
				//echo "No I am not in";
			}

			$id = $this->tank_auth->get_user_id();
			
			$returnresults = $this->db->get_where('user_profiles', array('user_id' => $id));

			$row = $returnresults->row();

			/* Assign the upload's metadata (size, dimensions, destination, etc.) ...
			... to an array with another nice, clean variable */
			if($upload = (array) $this->upload->data())
			{

				$user_id = $this->tank_auth->get_user_id();


				/* Uses two upload library features to assemble the file name (the name, and extension) */
				$filename = $upload['raw_name'].$upload['file_ext'];
			 
				/* Same with the thumbnail we'll generate, but with the suffix '_thumb' */
				$thumb = $upload['raw_name']."_thumb".$upload['file_ext'];


				/* Set the rules for the upload */
				$config['image_library'] = 'gd2';
				$config['source_image']	= "./uploads/".$filename;
				$config['create_thumb'] = TRUE;
				$config['maintain_ratio'] = TRUE;
				$config['width']	 = 80;
				$config['height']	= 80;

				/* Load "image manipulation library", see CodeIgniter user guide */
				$this->load->library('image_lib', $config);

				/* Resize the image! */
				$this->image_lib->resize();
			 
				/* Assign upload_data to $data variable */
				$data['upload_data'] = $this->upload->data();
		 	}
		 	else
		 	{
		 		$filename=$row->photo;
		 		$thumb=$row->thumb;
		 	}
				
			$this->form_validation->set_rules('firstname', 'firstname', 'trim|required|xss_clean');
			$this->form_validation->set_rules('lastname', 'lastname', 'trim|required|xss_clean');
			$this->form_validation->set_rules('gender', 'gender', 'trim|required|xss_clean');
			$this->form_validation->set_rules('school', 'school', 'trim|required|xss_clean');
			$this->form_validation->set_rules('grade', 'grade', 'trim|required|xss_clean');
			$this->form_validation->set_rules('hourly_rate', 'hourly_rate', 'trim|required|xss_clean');
			$this->form_validation->set_rules('biography', 'biography', 'trim|required|xss_clean');
			$this->form_validation->set_rules('specialties', 'specialties', 'trim|required|xss_clean');
			$this->form_validation->set_rules('phone', 'phone', 'trim|required|xss_clean');				
			$this->form_validation->set_rules('postel_code', 'postel_code', 'trim|required|xss_clean');				
			$this->form_validation->set_rules('paypal_id', 'paypal_id', 'trim|required|xss_clean');				
			$this->load->model('users');



			$this->users->update_profile($this->tank_auth->get_user_id(),$filename, $thumb);
			
			$id = $this->tank_auth->get_user_id();
			$returnresults = $this->db->get_where('user_profiles', array('user_id' => $id));

			$row = $returnresults->row();

			$data = array (
				'id' => $row->id,
				'firstname' => $row->firstname,
				'lastname' => $row->lastname,
				'gender' => $row->gender,
				'grade' => $row->grade,
				'phone' => $row->phone,
				'postel_code' => $row->postel_code,
				'specialities_other' => $row->specialities_other,
				'bio'  =>   $row->Bio,
				'eng'  => $row->Eng,
				'phy'  => $row->Phy,
				'math' =>  $row->Math,
				'science' => $row->Science,
				'chem' => $row->Chem,
				'other' => $row->specialities_other,
				'free_from' => $row->free_from,
				'free_till' => $row->free_till,
				'start_time' => $row->start_time,
				'end_time' => $row->end_time,
				'school' => $row->school,
				'biography' => $row->biography,
				'student_name' => $row->student_name,
				'hourly_rate' => $row->hourly_rate,
				'paypal_id' => $row->paypal_id,
				'photo'=> $filename,
				'thumb'=> $thumb,
				'success' => FALSE
			   );

			$data['title'] = 'Edit Profile';
			$data['main_content'] = 'users/edit';
			$this->load->view('header', $data);
	  		$this->load->view('auth/edit', $data);  
		} 
		elseif ($this->tank_auth->is_logged_in(FALSE))
		{						// logged in, not activated
			redirect('/auth/send_again/');

		} 
	}



	function search()
	{
		if ($this->tank_auth->is_logged_in())
		{
			$this->load->model('users');
			$query = $this->users->search_users();

			if ( $query->num_rows > 0)
			{
				$var['result'] = $query->result();
			}
			else
			{
				$var['result'] = false;
			}

			$var['user_id']	= $this->tank_auth->get_user_id();

			$var['username']	= $this->tank_auth->get_username();

			
			
			$this->load->view('header',$var);
		  	$this->load->view('welcome', $var);
		}
		else
		{
			redirect('/auth/login/');
		}
	}


	

	function register()
	{
		if ($this->tank_auth->is_logged_in())
		{									// logged in
			redirect('');

		} elseif ($this->tank_auth->is_logged_in(FALSE))
		{						// logged in, not activated
			redirect('/auth/send_again/');
		} 
		elseif (!$this->config->item('allow_registration', 'tank_auth'))  // registration is off
		{	
			
			$this->_show_message($this->lang->line('auth_message_registration_disabled'));

		} 
		else 
		{
			$use_username = $this->config->item('use_username', 'tank_auth');
			if ($use_username) 
			{
				$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean|min_length['.$this->config->item('username_min_length', 'tank_auth').']|max_length['.$this->config->item('username_max_length', 'tank_auth').']|alpha_dash');
			}
			
			$this->form_validation->set_rules('firstname', 'firstname', 'trim|required|xss_clean');
			$this->form_validation->set_rules('lastname', 'lastname', 'trim|required|xss_clean');
			$this->form_validation->set_rules('gender', 'gender', 'trim|required|xss_clean');
			$this->form_validation->set_rules('user_type', 'user_type', 'trim|required|xss_clean');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|min_length['.$this->config->item('password_min_length', 'tank_auth').']|max_length['.$this->config->item('password_max_length', 'tank_auth').']|alpha_dash');
			$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|xss_clean|matches[password]');


			$captcha_registration	= $this->config->item('captcha_registration', 'tank_auth');
			$use_recaptcha			= $this->config->item('use_recaptcha', 'tank_auth');
			if ($captcha_registration) {
				if ($use_recaptcha) {
					$this->form_validation->set_rules('recaptcha_response_field', 'Confirmation Code', 'trim|xss_clean|required|callback__check_recaptcha');
				} else {
					$this->form_validation->set_rules('captcha', 'Confirmation Code', 'trim|xss_clean|required|callback__check_captcha');
				}
			}
			$data['errors'] = array();

			$email_activation = $this->config->item('email_activation', 'tank_auth');

			if ($this->form_validation->run())  // validation ok
			{								
				if (!is_null($data = $this->tank_auth->create_user(
						$use_username ? $this->form_validation->set_value('username') : '',
						$this->form_validation->set_value('email'),
						$this->form_validation->set_value('password'),
						$email_activation))) {									// success

					$data['site_name'] = $this->config->item('website_name', 'tank_auth');

					$data['login_by_username'] = ($this->config->item('login_by_username', 'tank_auth') AND
				       $this->config->item('use_username', 'tank_auth'));
				     $data['login_by_email'] = $this->config->item('login_by_email', 'tank_auth');
				     if ($email_activation) {         // send "activate" email
				      if ($this->tank_auth->login(
				        $this->form_validation->set_value('username'),
				        $this->form_validation->set_value('password'),
				        '',
				        $data['login_by_username'],
				        $data['login_by_email'])) {        // success
				       redirect('');

				      }

				     } else {
				      if ($this->tank_auth->login(
				        $this->form_validation->set_value('username'),
				        $this->form_validation->set_value('password'),
				        '',
				        $data['login_by_username'],
				        $data['login_by_email'])) {        // success
				       redirect('');

				      }
				     }
				} else {
					$errors = $this->tank_auth->get_error_message();
					foreach ($errors as $k => $v)	$data['errors'][$k] = $this->lang->line($v);
				}
			}
			
			if ($captcha_registration) 
			{
				if ($use_recaptcha) 
				{
					$data['recaptcha_html'] = $this->_create_recaptcha();
				} 
				else 
				{
					$data['captcha_html'] = $this->_create_captcha();
				}
			}
			$data['use_username'] = $use_username;
			$data['captcha_registration'] = $captcha_registration;
			$data['use_recaptcha'] = $use_recaptcha;
			$this->load->view('header', $data);
			$this->load->view('auth/register_form', $data);
		}
	}

	/**
	 * Send activation email again, to the same or new email address
	 *
	 * @return void
	 */
	function send_again()
	{
		if (!$this->tank_auth->is_logged_in(FALSE)) 
		{							// not logged in or activated
			redirect('/auth/login/');

		} 
		else 
		{
			$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');

			$data['errors'] = array();

			if ($this->form_validation->run()) {								// validation ok
				if (!is_null($data = $this->tank_auth->change_email(
						$this->form_validation->set_value('email')))) {			// success

					$data['site_name']	= $this->config->item('website_name', 'tank_auth');
					$data['activation_period'] = $this->config->item('email_activation_expire', 'tank_auth') / 3600;

					$this->_send_email('activate', $data['email'], $data);

					$this->_show_message(sprintf($this->lang->line('auth_message_activation_email_sent'), $data['email']));

				} else {
					$errors = $this->tank_auth->get_error_message();
					foreach ($errors as $k => $v)	$data['errors'][$k] = $this->lang->line($v);
				}
			}

			$this->load->view('header', $data);
			$this->load->view('auth/send_again_form', $data);
		}
	}

	/**
	 * Activate user account.
	 * User is verified by user_id and authentication code in the URL.
	 * Can be called by clicking on link in mail.
	 *
	 * @return void
	 */
	function activate()
	{
		$user_id		= $this->uri->segment(3);
		$new_email_key	= $this->uri->segment(4);

		// Activate user
		if ($this->tank_auth->activate_user($user_id, $new_email_key)) 
		{		// success
			//$this->tank_auth->logout();
			//$this->_show_message($this->lang->line('auth_message_activation_completed').' '.anchor('/auth/login/', 'Login'));
			redirect('');

		} else {																// fail
			$this->_show_message($this->lang->line('auth_message_activation_failed'));
		}
	}

	/**
	 * Generate reset code (to change password) and send it to user
	 *
	 * @return void
	 */
	
	function forgot_password()
	{
		if ($this->tank_auth->is_logged_in()) {									// logged in
			redirect('');

		} elseif ($this->tank_auth->is_logged_in(FALSE)) {						// logged in, not activated
			redirect('/auth/send_again/');

		} else {
			$this->form_validation->set_rules('login', 'Email or login', 'trim|required|xss_clean');

			$data['errors'] = array();

			if ($this->form_validation->run()) {								// validation ok
				if (!is_null($data = $this->tank_auth->forgot_password(
						$this->form_validation->set_value('login')))) {

					$data['site_name'] = $this->config->item('website_name', 'tank_auth');

					// Send email with password activation link
					$this->_send_email('forgot_password', $data['email'], $data);

					$this->_show_message($this->lang->line('auth_message_new_password_sent'));

				} else {
					$errors = $this->tank_auth->get_error_message();
					foreach ($errors as $k => $v)	$data['errors'][$k] = $this->lang->line($v);
				}
			}

			$this->load->view('header', $data);
			$this->load->view('auth/forgot_password_form', $data);
		}
	}

	/**
	 * Replace user password (forgotten) with a new one (set by user).
	 * User is verified by user_id and authentication code in the URL.
	 * Can be called by clicking on link in mail.
	 *
	 * @return void
	 */
	function reset_password()
	{
		$user_id		= $this->uri->segment(3);
		$new_pass_key	= $this->uri->segment(4);

		$this->form_validation->set_rules('new_password', 'New Password', 'trim|required|xss_clean|min_length['.$this->config->item('password_min_length', 'tank_auth').']|max_length['.$this->config->item('password_max_length', 'tank_auth').']|alpha_dash');
		$this->form_validation->set_rules('confirm_new_password', 'Confirm new Password', 'trim|required|xss_clean|matches[new_password]');

		$data['errors'] = array();

		if ($this->form_validation->run()) {								// validation ok
			if (!is_null($data = $this->tank_auth->reset_password(
					$user_id, $new_pass_key,
					$this->form_validation->set_value('new_password')))) {	// success

				$data['site_name'] = $this->config->item('website_name', 'tank_auth');

				// Send email with new password
				$this->_send_email('reset_password', $data['email'], $data);

				$this->_show_message($this->lang->line('auth_message_new_password_activated').' '.anchor('/auth/login/', 'Login'));

			} else {														// fail
				$this->_show_message($this->lang->line('auth_message_new_password_failed'));
			}
		} else {
			// Try to activate user by password key (if not activated yet)
			if ($this->config->item('email_activation', 'tank_auth')) {
				$this->tank_auth->activate_user($user_id, $new_pass_key, FALSE);
			}

			if (!$this->tank_auth->can_reset_password($user_id, $new_pass_key)) {
				$this->_show_message($this->lang->line('auth_message_new_password_failed'));
			}
		}


		$this->load->view('header', $data);
		$this->load->view('auth/reset_password_form', $data);
	}

	/**
	 * Change user password
	 *
	 * @return void
	 */
	function change_password()
	{
		if (!$this->tank_auth->is_logged_in()) {								// not logged in or not activated
			redirect('/auth/login/');

		} else {
			$this->form_validation->set_rules('old_password', 'Old Password', 'trim|required|xss_clean');
			$this->form_validation->set_rules('new_password', 'New Password', 'trim|required|xss_clean|min_length['.$this->config->item('password_min_length', 'tank_auth').']|max_length['.$this->config->item('password_max_length', 'tank_auth').']|alpha_dash');
			$this->form_validation->set_rules('confirm_new_password', 'Confirm new Password', 'trim|required|xss_clean|matches[new_password]');

			$data['errors'] = array();

			if ($this->form_validation->run()) {								// validation ok
				if ($this->tank_auth->change_password(
						$this->form_validation->set_value('old_password'),
						$this->form_validation->set_value('new_password'))) {	// success
					$this->_show_message($this->lang->line('auth_message_password_changed'));

				} else {														// fail
					$errors = $this->tank_auth->get_error_message();
					foreach ($errors as $k => $v)	$data['errors'][$k] = $this->lang->line($v);
				}
			}

			$this->load->view('header', $data);
			$this->load->view('auth/change_password_form', $data);
		}
	}

	/**
	 * Change user email
	 *
	 * @return void
	 */
	function change_email()
	{
		if (!$this->tank_auth->is_logged_in()) {								// not logged in or not activated
			redirect('/auth/login/');

		} else {
			$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');

			$data['errors'] = array();

			if ($this->form_validation->run()) {								// validation ok
				if (!is_null($data = $this->tank_auth->set_new_email(
						$this->form_validation->set_value('email'),
						$this->form_validation->set_value('password')))) {			// success

					$data['site_name'] = $this->config->item('website_name', 'tank_auth');

					// Send email with new email address and its activation link
					$this->_send_email('change_email', $data['new_email'], $data);

					$this->_show_message(sprintf($this->lang->line('auth_message_new_email_sent'), $data['new_email']));

				} else {
					$errors = $this->tank_auth->get_error_message();
					foreach ($errors as $k => $v)	$data['errors'][$k] = $this->lang->line($v);
				}
			}

			$this->load->view('header', $data);
			$this->load->view('auth/change_email_form', $data);
		}
	}

	/**
	 * Replace user email with a new one.
	 * User is verified by user_id and authentication code in the URL.
	 * Can be called by clicking on link in mail.
	 *
	 * @return void
	 */
	function reset_email()
	{
		$user_id		= $this->uri->segment(3);
		$new_email_key	= $this->uri->segment(4);

		// Reset email
		if ($this->tank_auth->activate_new_email($user_id, $new_email_key)) {	// success
			$this->tank_auth->logout();
			$this->_show_message($this->lang->line('auth_message_new_email_activated').' '.anchor('/auth/login/', 'Login'));

		} else {																// fail
			$this->_show_message($this->lang->line('auth_message_new_email_failed'));
		}
	}

	/**
	 * Delete user from the site (only when user is logged in)
	 *
	 * @return void
	 */
	function unregister()
	{
		if (!$this->tank_auth->is_logged_in()) {								// not logged in or not activated
			redirect('/auth/login/');

		} else {
			$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

			$data['errors'] = array();

			if ($this->form_validation->run()) {								// validation ok
				if ($this->tank_auth->delete_user(
						$this->form_validation->set_value('password'))) {		// success
					$this->_show_message($this->lang->line('auth_message_unregistered'));

				} else {														// fail
					$errors = $this->tank_auth->get_error_message();
					foreach ($errors as $k => $v)	$data['errors'][$k] = $this->lang->line($v);
				}
			}

			$this->load->view('header', $data);
			$this->load->view('auth/unregister_form', $data);
		}
	}

	/**
	 * Show info message
	 *
	 * @param	string
	 * @return	void
	 */
	function _show_message($message)
	{

		$this->session->set_flashdata('message', $message);
		echo "string";
		redirect('/auth/');
	}

	

	/**
	 * Send email message of given type (activate, forgot_password, etc.)
	 *
	 * @param	string
	 * @param	string
	 * @param	array
	 * @return	void
	 */
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

	/**
	 * Create CAPTCHA image to verify user as a human
	 *
	 * @return	string
	 */
	function _create_captcha()
	{
		$this->load->helper('captcha');

		$cap = create_captcha(array(
			'img_path'		=> './'.$this->config->item('captcha_path', 'tank_auth'),
			'img_url'		=> base_url().$this->config->item('captcha_path', 'tank_auth'),
			'font_path'		=> './'.$this->config->item('captcha_fonts_path', 'tank_auth'),
			'font_size'		=> $this->config->item('captcha_font_size', 'tank_auth'),
			'img_width'		=> $this->config->item('captcha_width', 'tank_auth'),
			'img_height'	=> $this->config->item('captcha_height', 'tank_auth'),
			'show_grid'		=> $this->config->item('captcha_grid', 'tank_auth'),
			'expiration'	=> $this->config->item('captcha_expire', 'tank_auth'),
		));

		// Save captcha params in session
		$this->session->set_flashdata(array(
				'captcha_word' => $cap['word'],
				'captcha_time' => $cap['time'],
		));

		return $cap['image'];
	}

	/**
	 * Callback function. Check if CAPTCHA test is passed.
	 *
	 * @param	string
	 * @return	bool
	 */
	function _check_captcha($code)
	{
		$time = $this->session->flashdata('captcha_time');
		$word = $this->session->flashdata('captcha_word');

		list($usec, $sec) = explode(" ", microtime());
		$now = ((float)$usec + (float)$sec);

		if ($now - $time > $this->config->item('captcha_expire', 'tank_auth')) {
			$this->form_validation->set_message('_check_captcha', $this->lang->line('auth_captcha_expired'));
			return FALSE;

		} elseif (($this->config->item('captcha_case_sensitive', 'tank_auth') AND
				$code != $word) OR
				strtolower($code) != strtolower($word)) {
			$this->form_validation->set_message('_check_captcha', $this->lang->line('auth_incorrect_captcha'));
			return FALSE;
		}
		return TRUE;
	}

	/**
	 * Create reCAPTCHA JS and non-JS HTML to verify user as a human
	 *
	 * @return	string
	 */
	function _create_recaptcha()
	{
		$this->load->helper('recaptcha');

		// Add custom theme so we can get only image
		$options = "<script>var RecaptchaOptions = {theme: 'custom', custom_theme_widget: 'recaptcha_widget'};</script>\n";

		// Get reCAPTCHA JS and non-JS HTML
		$html = recaptcha_get_html($this->config->item('recaptcha_public_key', 'tank_auth'));

		return $options.$html;
	}


	/**
	 * Callback function. Check if reCAPTCHA test is passed.
	 *
	 * @return	bool
	 */

	function _check_recaptcha()
	{
		$this->load->helper('recaptcha');

		$resp = recaptcha_check_answer($this->config->item('recaptcha_private_key', 'tank_auth'),
				$_SERVER['REMOTE_ADDR'],
				$_POST['recaptcha_challenge_field'],
				$_POST['recaptcha_response_field']);

		if (!$resp->is_valid) {
			$this->form_validation->set_message('_check_recaptcha', $this->lang->line('auth_incorrect_captcha'));
			return FALSE;
		}
		return TRUE;
	}


}

/* End of file auth.php */
/* Location: ./application/controllers/auth.php */