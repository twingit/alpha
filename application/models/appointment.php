<?php

date_default_timezone_set('America/Los_Angeles');

class Appointment extends CI_Model {

	function create_appt($appt_params) {

		$this->form_validation->set_rules('appt_date', 'Date', 'required');
		$this->form_validation->set_rules('time', 'Time', 'required');
		$this->form_validation->set_rules('task', 'Task', 'trim|required');

		if ($this->form_validation->run() === false) {
			
			$this->session->set_flashdata('errors', validation_errors());

			return false;

		} else {
			
			if ($appt_params['appt_date'] < date('Y-m-d')) {

				// var_dump($appt_params['appt_date']); die();
				
				$this->session->set_flashdata('before_error', "Appointment must be today or later!");

				return false;

			} elseif ($appt_params['appt_date'] === date('Y-m-d') && $appt_params['time'] < date('H:i:s')) {
				
				$this->session->set_flashdata('time_error', "The time has passed for this appointment!");

				return false;

			} else {
				
				$query = "INSERT INTO appointments (user_id, appt_date, time, task, status, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?)";
				$values = array($appt_params['user_id'], $appt_params['appt_date'], $appt_params['time'], $appt_params['task'], 'Pending', date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s"));

				return $this->db->query($query, $values);

			}

		}

	}

	function update_appt($appt_id, $appt_params) {

		$this->form_validation->set_rules('appt_date', 'Date', 'required');
		$this->form_validation->set_rules('time', 'Time', 'required');
		$this->form_validation->set_rules('task', 'Task', 'trim|required');

		// var_dump($appt_params['appt_date']); die();

		if ($this->form_validation->run() === false) {

			// var_dump($appt_params['appt_date']); die();

			$this->session->set_flashdata('errors', validation_errors());

			// var_dump(validation_errors()); die();

			return false;

		} else {

			if ($appt_params['appt_date'] < date('Y-m-d')) {

				// var_dump($appt_params['appt_date']); die();

				$this->session->set_flashdata('before_error', "Appointment must be today or later!");

				return false;

			} elseif ($appt_params['appt_date'] === date('Y-m-d') && $appt_params['time'] < date('H:i:s')) {

				$this->session->set_flashdata('time_error', "The time has passed for this appointment!");

				return false;

			} else {

				$query = "UPDATE appointments
						  SET appt_date = ?, time = ?, task = ?, status = ?, updated_at = ?
						  WHERE id = ?";
				$values = array($appt_params['appt_date'], $appt_params['time'], $appt_params['task'], $appt_params['status'], date("Y-m-d, H:i:s"), $appt_id);

				return $this->db->query($query, $values);

			}

		}

	}

	function delete_appt($appt_id) {

		$query = "DELETE FROM appointments
				  WHERE id = ?";
		$value = array($appt_id);

		return $this->db->query($query, $value);

	}

	function get_appt($appt_id) {

		$query = "SELECT *
				  FROM appointments
				  WHERE id = ?";
		$values = array($appt_id);

		return $this->db->query($query, $values)->row_array();

	}

	function get_current_appts($user_id) {

		$query = "SELECT *
				  FROM appointments
				  WHERE user_id = ? AND appt_date = ?
				  ORDER BY time ASC";
		$values = array($user_id, date('Y-m-d'));

		return $this->db->query($query, $values)->result_array();

	}

	function get_future_appts($user_id) {

		$query = "SELECT *
				  FROM appointments
				  WHERE user_id = ? AND appt_date > ?";
		$values = array($user_id, date('Y-m-d'));

		return $this->db->query($query, $values)->result_array();

	}

}

?>