<?php

class Sign_in_model extends CI_Model{
	function validate(){
		$this->db->where('Email',$this->input->post('email'));
		$this->db->where('Password',$this->input->post('password'));

		$querry = $this->db->get('user');

		if ($querry->num_rows == 1)
		{
			$row = $querry->row();
			$data = array(
					'UserID' => $row->UserID,
					'FirstName' => $row->First_Name,
					'LastName' => $row->Last_Name,
					'Email' => $row->Email,
					'validated' => true
					);
			$this->session->set_userdata($data);
			return true;
		}
		return false;
	}

	function create_account(){
		$this->db->where('Email',$this->input->post('email'));
		$querry = $this->db->get('user');

		if ($querry->num_rows == 1)
		{
			return false;
		}
		else
		{
			$data = array(
				'First_Name' => $this->input->post('first_name'),
				'Last_Name' => $this->input->post('last_name'),
				'Email' => $this->input->post('email'),
				'Password' => $this->input->post('password'),
			);
			$this->db->insert('user' , $data);

			$this->db->where('Email', $data['Email']);
			$querry = $this->db->get('user');
			$row = $querry->row();
			$new_session = array(
				'UserID' => $row->UserID,
				'FirstName' => $row->First_Name,
				'LastName' => $row->Last_Name,
				'Email' => $row->Email,
				'validated' => true
			);
			$this->session->set_userdata($new_session);
			
			return true;
		}
	}

	function create_profile(){
		$data = array(
				'UserID' => $this->session->userdata('UserID'),
				'Country' => $this->input->post('country'),
				'Postal_Code' => $this->input->post('postal_code'),
				'User_Type' => $this->input->post('user_type'),
				'Job_Title' => '',
				'Self_Employed' => '',
				'Company' => '',
				'Industry' => '',
				'School/University' => '',
				'Date_From' => '',
				'Date_To' => ''
		);

		if( $this->input->post('user_type') == 'Employed' || $this->input->post('user_type') == 'Job Seeker' )
		{
			$data['Job_Title'] = $this->input->post('job');
			$data['Self_Employed'] = (isset($_POST['self_employed']))?true:false;
			$data['Company'] = $this->input->post('company');
			$data['Industry'] = $this->input->post('industryChooser');
		}

		if( $this->input->post('user_type') =='Student' )
		{
			$data['School/University'] = $this->input->post('job');
		}

		if ($this->input->post('user_type') == 'Student' || $this->input->post('user_type') == 'Job Seeker' )
		{
			$data['Date_From'] = $this->input->post('timefrom');
			$data['Date_To'] = $this->input->post('timeto');
		}

		$this->db->insert('profile' , $data);
	}

	function check_email() {
		$this->db->where('Email',$this->input->post('email'));
		$querry = $this->db->get('user');

		if ($querry->num_rows == 1)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function get_id() {
		$this->db->select('UserID');
		$this->db->where('Email',$this->input->post('email'));
		$query = $this->db->get('user');

		if ($query->num_rows() > 0)
		{
		   foreach ($query->result() as $row)
		   {
		   		return $row->UserID;
		   }
		}
	}

	function get_name()
	{
		$this->db->select(array('First_Name')); 
		$this->db->where('Email',$this->input->post('email'));
		$query = $this->db->get('user');

		if ($query->num_rows() > 0)
		{
		   foreach ($query->result() as $row)
		   {
		      return $row->First_Name;
		   }
		}
	}

	function change_password() {
		$id = $this->session->userdata('UserID');

		$data = array(
               'Password' => $this->input->post('password1')
            );

		$this->db->where('UserID', $id);
		$this->db->update('user', $data); 

		$this->session->sess_destroy();
	}
}