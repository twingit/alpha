Welcome, <?= $current_user['name'] ?>! (<a href="/users/logout">Logout</a>)

<?php
	date_default_timezone_set('America/Los_Angeles');
?>

<!-- <?php var_dump(date('Y-m-d H:i:s')); ?> -->

<h3>Add Appointment</h3>

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

<form action="/appointments/create" method="post">
	<p>Date: <input type="date" name="appt_date"></p>
	<p>Time: <input type="time" name="time"></p>
	<p>Task: <input type="text" name="task"></p>
	<p><input type="submit" value="Add"></p>
</form>

<table>
	<thead>
		<tr>
			<th>Tasks</th>
			<th>Time</th>
			<th>Status</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($current_appts as $appt) { ?>
			<tr>
				<td><?= $appt['task'] ?></td>
				<td><?= $appt['time'] ?></td>
				
				<?php $date_time = $appt['appt_date'] . " " . $appt['time'] ?>
				<!-- <?php var_dump($date_time) ?> -->

				<?php if ($date_time < date('Y-m-d H:i:s')) { ?>

					<td>Missed</td>
					<td><a href="/appointments/delete/<?= $appt['id'] ?>">Delete</a></td>

				<?php } else { ?>

				<?php if ($appt['status'] != 'Done') { ?>

					<td><?= $appt['status'] ?></td>
					<td><a href="/appointments/edit/<?= $appt['id'] ?>">Edit</a> | <a href="/appointments/delete/<?= $appt['id'] ?>">Delete</a></td>

					<?php } else { ?>

					<td><?= $appt['status'] ?></td>

					<?php } ?>

				<?php } ?>
			</tr>
		<?php } ?>
	</tbody>
</table>

<table>
	<thead>
		<tr>
			<th>Tasks</th>
			<th>Date</th>
			<th>Time</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($future_appts as $appt) { ?>
		<tr>
			<td><?= $appt['task'] ?></td>
			<td><?= $appt['appt_date'] ?></td>
			<td><?= $appt['time'] ?></td>
			<td><a href="/appointments/edit/<?= $appt['id'] ?>">Edit</a> | <a href="/appointments/delete/<?= $appt['id'] ?>">Delete</a></td>
		</tr>
		<?php } ?>
	</tbody>
</table>

