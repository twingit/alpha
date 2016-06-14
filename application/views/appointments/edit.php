<p><a href="/appointments">Dashboard</a> | <a href="/users/logout">Logout</a></p>

<?php

	if ($this->session->flashdata('errors')) {	
		echo $this->session->flashdata('errors');
	}

	if ($this->session->flashdata('before_error')) {	
		echo $this->session->flashdata('before_error');
	}

	if ($this->session->flashdata('time_error')) {	
		echo $this->session->flashdata('time_error');
	}

?>

<form action="/appointments/update/<?= $appt['id'] ?>" method="post">
	<p>Date: <input type="date" value="<?= $appt['appt_date'] ?>" name="appt_date"></p>
	<p>Time: <input type="time" value="<?= $appt['time'] ?>" name="time"></p>
	<p>Task: <input type="text" value="<?= $appt['task'] ?>" name="task"></p>
	<p>
	Status:
	<select name="status">
		<option>Pending</option>
		<option>Done</option>
		<option>Missed</option>
	</select>
	</p>
	<p><input type="submit" value="Update"></p>
</form>