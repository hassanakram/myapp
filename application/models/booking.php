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
				'rating'		=> $this->input->post('rating'),
				'feedback' => 1
			));
	}	


	function getAverageRating($id=-1)
	{

		$this->db->where('tutor_id', $id);

		$query = $this->db->get('bookings');

		$count=0;
		$total=0;

		foreach ($query->result() as $row)
		{
		   if($row->feedback==1)
		   {	
		   		$count++;
		   		$total=$total+$row->rating;
		   }
		}

		if($count>0)
			$result=$total/$count;
		else
			$result=0;

		return $result;

	}

	function getStatusPoints($id)
	{
		$this->db->where('tutor_id', $id);

		$query = $this->db->get('bookings');

		
		$total=0;

		foreach ($query->result() as $row)
		{
		   if($row->feedback==1)
		   {	
		   		$total=$total+$row->rating;
		   }
		}

		return $total;
	}


	function getLastTenRating($id=-1)
	{
		$this->db->where('tutor_id', $id);
		$this->db->order_by("id", "desc");
		$this->db->limit(10);

		$query = $this->db->get('bookings');

		
		$count=0;
		$total=0;

		foreach ($query->result() as $row)
		{
		   if($row->feedback==1)
		   {	
		   		$count++;
		   		$total=$total+$row->rating;
		   }
		}

		if($count>0)
			$result=$total/$count;
		else
			$result=0;

		

		return $result;

	}

	function dispute($booking_id)
	{
			$this->db->where('id', $booking_id);
			$this->db->update($this->table_name, array(
				'dispute'		=> $this->input->post('dispute'),
				'is_disputed'		=> 1
			));
	}	


	function accept_booking($booking_id)
	{
			$this->db->where('id', $booking_id);
			
			$this->db->update($this->table_name, array('status'		=> 1,'changed' => 0 ));
	}



	function reject_booking($booking_id)
	{
			$this->db->where('id', $booking_id);
			$this->db->update($this->table_name, array (
				'status'		=> 0,'changed' => 0
			));
	}

	

	function upcoming($user_id)
	{
		if( $this->tank_auth->isTutor($user_id))
		{
			$this->db->where('tutor_id', $user_id);
		}
		else
		{
			$this->db->where('user_id', $user_id);
		}
		$date=date("Y-m-d");
		$this->db->where('from_date >',$date);
		$this->db->order_by("from_date", "desc");
		$this->db->limit(10);

		$query = $this->db->get('bookings');

		return $query->result();
	}


	function bookings($user_id)
	{
		
		$this->db->where('user_id', $user_id);
		$this->db->or_where('tutor_id', $user_id); 

		$query = $this->db->get('bookings');

		return $query->result();
	}


	function past($user_id)
	{
		//$query=$this->db->query("SELECT * FROM 'bookings' WHERE  'user_id'='$user_id'   ");
		if( $this->tank_auth->isTutor($user_id))
		{
			$this->db->where('tutor_id', $user_id);
		}
		else
		{
			$this->db->where('user_id', $user_id);
		}
			
		$date=date("Y-m-d");
		$this->db->where('from_date <',$date);
		$this->db->order_by("from_date", "desc");
		$this->db->limit(10); 
		$query = $this->db->get('bookings');
		return $query->result();
	}

	function getLastWeekBookings($id=0)
	{
		$this->db->where('tutor_id',$id);
		$date=date("Y-m-d");
		$date = new DateTime($date);
		$this->db->where('from_date >=',date_format($date, 'Y-m-d'));

		date_add($date, date_interval_create_from_date_string('7 days'));
		
		$this->db->where('from_date <=',date_format($date, 'Y-m-d'));

		$this->db->order_by("from_date", "asc"); 

		$query = $this->db->get('bookings');

		return $query->result();

	}


	function existing($user_id)
	{
		
		$this->db->where('user_id', $user_id);
		$date=date("Y-m-d");
		$this->db->where('from_date >=',$date); 
		$this->db->order_by("from_date", "desc"); 
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