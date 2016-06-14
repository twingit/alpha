<?php

class User extends CI_Model {

	function create_user($user_params) {

		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|matches[password_confirm]');
		$this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'trim|required');
		$this->form_validation->set_rules('dob', 'Date of Birth', 'trim|required');

		if ($this->form_validation->run() === false) {
			
			$this->session->set_flashdata('errors', validation_errors());

			return false;

		} else {
			
			$query = "INSERT INTO users (name, email, password, password_confirm, dob, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?)";
			$values = array($user_params['name'], $user_params['email'], $user_params['password'], $user_params['password_confirm'], $user_params['dob'], date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s"));
			$this->db->query($query, $values);

			$this->session->set_flashdata('success', 'You have successfully registered!');

		}

	}

	function get_user($user) {

		$query = "SELECT *
				  FROM users
				  WHERE email = ? AND password = ?";
		$values = array($user['email'], $user['password']);

		return $this->db->query($query, $values)->row_array();

	}

}

?>