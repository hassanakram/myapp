<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Users
 *
 * This model represents user authentication data. It operates the following tables:
 * - user account data,
 * - user profiles
 *
 * @package	Tank_auth
 * @author	Ilya Konyukhov (http://konyukhov.com/soft/)
 */
class Users extends CI_Model
{
	private $table_name			= 'users';			// user accounts
	private $profile_table_name	= 'user_profiles';	// user profiles
	private $calender_table_name	= 'calender_view'; //tutor calender settings

	function __construct()
	{
		parent::__construct();

		$ci =& get_instance();
		$this->table_name			= $ci->config->item('db_table_prefix', 'tank_auth').$this->table_name;
		$this->profile_table_name	= $ci->config->item('db_table_prefix', 'tank_auth').$this->profile_table_name;
	}

	/**
	 * Get user record by Id
	 *
	 * @param	int
	 * @param	bool
	 * @return	object
	 */
	function get_user_by_id($user_id, $activated)
	{
		$this->db->where('id', $user_id);
		$this->db->where('activated', $activated ? 1 : 0);

		$query = $this->db->get($this->table_name);
		if ($query->num_rows() == 1) return $query->row();
		return NULL;
	}


	function get_type($user_id)
	{
		$this->db->where('user_id', $user_id);
		$query = $this->db->get($this->profile_table_name);
		if ($query->num_rows() == 1) return $query->row();
		return NULL;
	}


	
	function get_user_details($user_id)
	{
		$this->db->where('user_id', $user_id);
		$query = $this->db->get($this->profile_table_name);
		//if ($query->num_rows() > 0) 
			return $query->first_row();
		//return NULL;
	}

	function getUserDetails($user_id)
	{
	
		$this->db->where('user_id', $user_id);
		$query = $this->db->get($this->profile_table_name);
		//if ($query->num_rows() > 0) 
			return $query->first_row();
		//return NULL;
	}

	function setUserSubjects($user_id,$subjects)
	{
		$this->db->set('subjects', $subjects);
		$this->db->where('user_id', $user_id);
		$this->db->update($this->profile_table_name);
		return true;
	}


	function get_email($user_id)
	{
		$this->db->where('id', $user_id);
		$query = $this->db->get($this->table_name);
		if ($query->num_rows() == 1) return $query->row();
		return NULL;
	}

	/**
	 * Get user record by login (username or email)
	 *
	 * @param	string
	 * @return	object
	 */


	function get_user_by_login($login)
	{
		$this->db->where('LOWER(username)=', strtolower($login));
		$this->db->or_where('LOWER(email)=', strtolower($login));

		$query = $this->db->get($this->table_name);
		if ($query->num_rows() == 1) return $query->row();
		return NULL;
	}

	/**
	 * Get user record by username
	 *
	 * @param	string
	 * @return	object
	 */
	function get_user_by_username($username)
	{
		$this->db->where('LOWER(username)=', strtolower($username));

		$query = $this->db->get($this->table_name);
		if ($query->num_rows() == 1) return $query->row();
		return NULL;
	}

	/**
	 * Get user record by email
	 *
	 * @param	string
	 * @return	object
	 */
	function get_user_by_email($email)
	{
		$this->db->where('LOWER(email)=', strtolower($email));

		$query = $this->db->get($this->table_name);
		if ($query->num_rows() == 1) return $query->row();
		return NULL;
	}

	/**
	 * Check if username available for registering
	 *
	 * @param	string
	 * @return	bool
	 */
	function is_username_available($username)
	{
		$this->db->select('1', FALSE);
		$this->db->where('LOWER(username)=', strtolower($username));

		$query = $this->db->get($this->table_name);
		return $query->num_rows() == 0;
	}

	/**
	 * Check if email available for registering
	 *
	 * @param	string
	 * @return	bool
	 */
	function is_email_available($email)
	{
		$this->db->select('1', FALSE);
		$this->db->where('LOWER(email)=', strtolower($email));
		$this->db->or_where('LOWER(new_email)=', strtolower($email));

		$query = $this->db->get($this->table_name);
		return $query->num_rows() == 0;
	}

	/**
	 * Create new user record
	 *
	 * @param	array
	 * @param	bool
	 * @return	array
	 */
	function create_user($data, $activated = TRUE)
	{
		$data['created'] = date('Y-m-d H:i:s');
		$data['activated'] = $activated ? 1 : 0;

		if ($this->db->insert($this->table_name, $data)) {
			$user_id = $this->db->insert_id();
			$this->create_profile($user_id);
			return array('user_id' => $user_id);
		}
		return NULL;
	}

	/**
	 * Activate user if activation key is valid.
	 * Can be called for not activated users only.
	 *
	 * @param	int
	 * @param	string
	 * @param	bool
	 * @return	bool
	 */
	function activate_user($user_id, $activation_key, $activate_by_email)
	{
		$this->db->select('1', FALSE);
		$this->db->where('id', $user_id);
		if ($activate_by_email) {
			$this->db->where('new_email_key', $activation_key);
		} else {
			$this->db->where('new_password_key', $activation_key);
		}
		$this->db->where('activated', 0);
		$query = $this->db->get($this->table_name);

		if ($query->num_rows() == 1) {

			$this->db->set('activated', 1);
			$this->db->set('new_email_key', NULL);
			$this->db->where('id', $user_id);
			$this->db->update($this->table_name);

			$this->create_profile($user_id);
			return TRUE;
		}
		return FALSE;
	}

	/**
	 * Purge table of non-activated users
	 *
	 * @param	int
	 * @return	void
	 */
	function purge_na($expire_period = 172800)
	{
		$this->db->where('activated', 0);
		$this->db->where('UNIX_TIMESTAMP(created) <', time() - $expire_period);
		$this->db->delete($this->table_name);
	}

	/**
	 * Delete user record
	 *
	 * @param	int
	 * @return	bool
	 */
	function delete_user($user_id)
	{
		$this->db->where('id', $user_id);
		$this->db->delete($this->table_name);
		if ($this->db->affected_rows() > 0) {
			$this->delete_profile($user_id);
			return TRUE;
		}
		return FALSE;
	}

	/**
	 * Set new password key for user.
	 * This key can be used for authentication when resetting user's password.
	 *
	 * @param	int
	 * @param	string
	 * @return	bool
	 */
	function set_password_key($user_id, $new_pass_key)
	{
		$this->db->set('new_password_key', $new_pass_key);
		$this->db->set('new_password_requested', date('Y-m-d H:i:s'));
		$this->db->where('id', $user_id);

		$this->db->update($this->table_name);
		return $this->db->affected_rows() > 0;
	}


	function rate($user_id)
	{
			$this->db->where('user_id', $user_id);
			$this->db->update($this->profile_table_name, array(
				'rating'		=> $this->input->post('rating')
			));
	}	

	/**
	 * Check if given password key is valid and user is authenticated.
	 *
	 * @param	int
	 * @param	string
	 * @param	int
	 * @return	void
	 */
	function can_reset_password($user_id, $new_pass_key, $expire_period = 900)
	{
		$this->db->select('1', FALSE);
		$this->db->where('id', $user_id);
		$this->db->where('new_password_key', $new_pass_key);
		$this->db->where('UNIX_TIMESTAMP(new_password_requested) >', time() - $expire_period);

		$query = $this->db->get($this->table_name);
		return $query->num_rows() == 1;
	}

	/**
	 * Change user password if password key is valid and user is authenticated.
	 *
	 * @param	int
	 * @param	string
	 * @param	string
	 * @param	int
	 * @return	bool
	 */
	function reset_password($user_id, $new_pass, $new_pass_key, $expire_period = 900)
	{
		$this->db->set('password', $new_pass);
		$this->db->set('new_password_key', NULL);
		$this->db->set('new_password_requested', NULL);
		$this->db->where('id', $user_id);
		$this->db->where('new_password_key', $new_pass_key);

		$this->db->where('UNIX_TIMESTAMP(new_password_requested) >=', time() - $expire_period);

		$this->db->update($this->table_name);
		return $this->db->affected_rows() > 0;
	}

	/**
	 * Change user password
	 *
	 * @param	int
	 * @param	string
	 * @return	bool
	 */
	function change_password($user_id, $new_pass)
	{
		$this->db->set('password', $new_pass);
		$this->db->where('id', $user_id);

		$this->db->update($this->table_name);
		return $this->db->affected_rows() > 0;
	}

	/**
	 * Set new email for user (may be activated or not).
	 * The new email cannot be used for login or notification before it is activated.
	 *
	 * @param	int
	 * @param	string
	 * @param	string
	 * @param	bool
	 * @return	bool
	 */
	function set_new_email($user_id, $new_email, $new_email_key, $activated)
	{
		$this->db->set($activated ? 'new_email' : 'email', $new_email);
		$this->db->set('new_email_key', $new_email_key);
		$this->db->where('id', $user_id);
		$this->db->where('activated', $activated ? 1 : 0);

		$this->db->update($this->table_name);
		return $this->db->affected_rows() > 0;
	}

	/**
	 * Activate new email (replace old email with new one) if activation key is valid.
	 *
	 * @param	int
	 * @param	string
	 * @return	bool
	 */
	function activate_new_email($user_id, $new_email_key)
	{
		$this->db->set('email', 'new_email', FALSE);
		$this->db->set('new_email', NULL);
		$this->db->set('new_email_key', NULL);
		$this->db->where('id', $user_id);
		$this->db->where('new_email_key', $new_email_key);

		$this->db->update($this->table_name);
		return $this->db->affected_rows() > 0;
	}



	/**
	 * Update user login info, such as IP-address or login time, and
	 * clear previously generated (but not activated) passwords.
	 *
	 * @param	int
	 * @param	bool
	 * @param	bool
	 * @return	void
	 */
	function update_login_info($user_id, $record_ip, $record_time)
	{
		$this->db->set('new_password_key', NULL);
		$this->db->set('new_password_requested', NULL);

		if ($record_ip)		$this->db->set('last_ip', $this->input->ip_address());
		if ($record_time)	$this->db->set('last_login', date('Y-m-d H:i:s'));

		$this->db->where('id', $user_id);
		$this->db->update($this->table_name);
	}



	/**
	 * Ban user
	 *
	 * @param	int
	 * @param	string
	 * @return	void
	 */
	function ban_user($user_id, $reason = NULL)
	{
		$this->db->where('id', $user_id);
		$this->db->update($this->table_name, array(
			'banned'		=> 1,
			'ban_reason'	=> $reason,
		));
	}



	/**
	 * Unban user
	 *
	 * @param	int
	 * @return	void
	 */
	function unban_user($user_id)
	{
		$this->db->where('id', $user_id);
		$this->db->update($this->table_name, array(
			'banned'		=> 0,
			'ban_reason'	=> NULL,
		));
	}

	/**
	 * Create an empty profile for a new user
	 *
	 * @param	int
	 * @return	bool
	 */


	private function create_profile($user_id)
	{
		$this->db->set('user_id', $user_id);
		$this->db->set('firstname', $this->input->post('firstname'));
		$this->db->set('lastname', $this->input->post('lastname'));
		$this->db->set('gender', $this->input->post('gender'));
		$this->db->set('user_type', $this->input->post('user_type'));
		$result=$this->db->insert($this->profile_table_name);
		

		if($this->input->post('user_type')=='tutor')
		{
			$this->db->set('tutor_id', $user_id);
			$this->db->insert($this->calender_table_name);
		}

		return $result;
	}

	/**
	 * Delete user profile
	 *
	 * @param	int
	 * @return	void
	 */
	private function delete_profile($user_id)
	{
		$this->db->where('user_id', $user_id);
		$this->db->delete($this->profile_table_name);
	}


	function get_setting($id)
	{
		$this->db->where('tutor_id', $id);
		$query = $this->db->get($this->calender_table_name);
		//if ($query->num_rows() > 0) 
			return $query->first_row();
		//return NULL;
	}


	function set_setting($id,$times,$day)
	{
		$this->db->set($day, $times);
		$this->db->where('tutor_id', $id);
		$this->db->update($this->calender_table_name);
	}


	function update_profile($user_id,$filename, $thumb)
	{
		$this->db->set('firstname', $this->input->post('firstname'));
		$this->db->set('lastname', $this->input->post('lastname'));
		$this->db->set('phone', $this->input->post('phone'));
		$this->db->set('postel_code', $this->input->post('postel_code'));
		$this->db->set('hourly_rate', $this->input->post('hourly_rate'));
		$this->db->set('school', $this->input->post('school'));
		$this->db->set('grade', $this->input->post('grade'));
		$this->db->set('student_name', $this->input->post('student_name'));
		$this->db->set('paypal_id', $this->input->post('paypal_id'));
		$this->db->set('specialities_other', $this->input->post('specialities_other'));
		$this->db->set('profile_url', $this->input->post('profile_url'));
		$this->db->set('biography', $this->input->post('biography'));
		$this->db->set('Eng', $this->input->post('English'));
		$this->db->set('Phy', $this->input->post('Physics'));
		$this->db->set('Math', $this->input->post('Math'));
		$this->db->set('Bio', $this->input->post('Biology'));
		$this->db->set('Chem', $this->input->post('Chemistry'));

		$this->db->set('free_from', $this->input->post('free_from'));
		$this->db->set('free_till', $this->input->post('free_till'));
		$this->db->set('start_time', $this->input->post('start_time'));
		$this->db->set('end_time', $this->input->post('end_time'));
		
		$this->db->set('Science', $this->input->post('Science'));
		$this->db->set('profile_updated', 1);

		$this->db->set('photo', $filename);
		$this->db->set('thumb', $thumb);

		$this->db->where('user_id', $user_id);
		$this->db->update($this->profile_table_name);
	}



	function search_users()
	{
		$this->db->select('firstname,postel_code,postel_code, lastname, hourly_rate, rating,user_id,user_type');
		$this->db->from('user_profiles');

		$postel_code=$this->input->post('postel_code');

		if ( ! empty( $postel_code ))
		{
			$this->db->where('postel_code',$this->input->post('postel_code'));
			$this->db->order_by("postel_code", "asc");
		}

		
		$hourly_rate=$this->input->post('hourly_rate');

		if ( ! empty( $hourly_rate ))
		{
			$this->db->where('hourly_rate',$this->input->post('hourly_rate'));
			$this->db->order_by("hourly_rate", "asc");
		}

		$gender=$this->input->post('gender');

		if ( ! empty( $gender ))
		{
			$this->db->where('gender',$this->input->post('gender'));
			$this->db->order_by("hourly_rate", "asc");
		}

		$rating=$this->input->post('rating');

		if ( ! empty( $rating ))
		{
			$this->db->where('rating >=',$this->input->post('rating'));
			$this->db->order_by("rating", "asc");
		}
		
		$subjects=$this->input->post('subjects');
		if(!empty($subjects))
		{
			error_log("subjects is set");
			$this->db->like('subjects', $subjects); 
		}

		

		$this->db->where('user_type',$this->input->post('tutor'));


		$this->db->distinct();

		$this->db->limit(10);

		$querry = $this->db->get();

		return $querry;	
	}
}

/* End of file users.php */
/* Location: ./application/models/auth/users.php */