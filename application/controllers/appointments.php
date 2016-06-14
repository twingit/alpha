<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Appointments extends CI_Controller {

	function __construct() {

		parent::__construct();
		$this->load->model('User');
		$this->load->model('Appointment');

	}

	function index() {

		$current_user_id = $this->session->userdata['user_info']['id'];

		$data['current_user'] = $this->session->userdata('user_info');
		$data['current_appts'] = $this->Appointment->get_current_appts($current_user_id);
		$data['future_appts'] = $this->Appointment->get_future_appts($current_user_id);
		// var_dump($data['appts']); die();

		$this->load->view('appointments/appointments', $data);

	}

	function create() {

		$current_user = $this->session->userdata('user_info');

		$appt_params = array(

			'user_id' => $current_user['id'],
			'appt_date' => $this->input->post('appt_date'),
			'time' => $this->input->post('time'),
			'task' => $this->input->post('task')

		);

		$this->Appointment->create_appt($appt_params);
		redirect('/appointments');

	}

	function edit($id) {

		$data['appt'] = $this->Appointment->get_appt($id);

		$this->load->view('appointments/edit', $data);

	}

	function update($id) {

		$post_params = $this->input->post();

		// var_dump($post_params); die();

		if ($this->Appointment->update_appt($id, $post_params)) {
			
			redirect('/appointments');

		} else {
			
			redirect("appointments/edit/$id");
			//// Can't do this: redirect("appointments/edit"); - because it will go to the edit method and get confused!

		}

	}

	function delete($id) {

		$this->Appointment->delete_appt($id);
		redirect('/appointments');

	}

}

?>