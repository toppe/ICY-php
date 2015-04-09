<?php
	include('thermostat.inc.php');
	$Thermostat = new Thermostat('username', 'password');
		
		if(isset($_POST['submit'])){
			$Thermostat->setTemp($_POST['new_temp']);
			echo'Temperature was changed!';
		} else {
			echo'<form method="post" action="">
					<h1>Now: '.$Thermostat->getTemp('temperature1').'</h1>
					New temp: <input type="text" name="new_temp">
					<input type="submit" name="submit">';
		}
?>