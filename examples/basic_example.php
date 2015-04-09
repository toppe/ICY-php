<?php
	include('thermostat.inc.php');
	$Thermostat = new Thermostat('username', 'password');
	
	echo'Current temperature is '.$Thermostat->getTemp('temperature1').', the temperature is set to: '.$Thermostat->getTemp().' The last handshake was on: '.$Thermostat->lastSeen();
?>