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

class booking extends CI_Model
{
	private $table_name			= 'bookings';			// user accounts
	

	function __construct()
	{
		parent::__construct();

	}


	function book1($user_id,$data)
	{
		$this->db->set('user_id', $user_id);
		$this->db->set('tutor_id', $data['tutor_id']);
		$this->db->set('from_date',$data['from_date']);
		$this->db->set('till_date', $data['till_date']);
		$this->db->set('from_time', $data['from_time']);

		$this->db->set('duration', $data['duration']);

		$this->db->set('grade', $data['grade']);
		$this->db->set('subject', $data['subject']);		

		$this->db->set('cost', $data['cost']);
		$this->db->set('changed', $data['changed']);

		return $this->db->insert($this->table_name);
	}

	
	function delete_booking($booking_id)
	{
			$this->db->where('id', $booking_id);
			$this->db->delete($this->table_name);
			if ($this->db->affected_rows() > 0) 
			{
				return TRUE;
			}
			return FALSE;
	}

	
	function review($booking_id)
	{
			$this->db->where('id', $booking_id);
			$this->db->update($this->table_name, array(
				'review'		=> $this->input->post('review'),
				'feedback' => 1
			));
	}	


	function accept_booking($booking_id)
	{
			$this->db->where('id', $booking_id);
			
			$this->db->update($this->table_name, array(
				'status'		=> 1,'changed' => 0
			));
	}


	function reject_booking($booking_id)
	{
			$this->db->where('id', $booking_id);
			
			$this->db->update($this->table_name, array(
				'status'		=> 0,'changed' => 0
			));
	}



	function bookings($user_id)
	{
		
		$this->db->where('user_id', $user_id);
		$this->db->or_where('tutor_id', $user_id); 
		$query = $this->db->get('bookings');
		return $query->result();
	}


	function get_booking($id)
	{

		$this->db->where('id', $id);
		
		$query = $this->db->get('bookings');

		return $query->row();
	}


	function edit($id)
	{
		
		$this->db->set('from_date', $this->input->post('from_date'));
		$this->db->set('till_date', $this->input->post('from_date'));
		$this->db->set('from_time', $this->input->post('from_time'));
		
		$this->db->set('changed', 1);

		$this->db->where('id', $id);
		
		$this->db->update($this->table_name);
	}
}