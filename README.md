# ICY-php
Control the ICY (also know as E-Thermostaat) via PHP

## General information
Because i'm currently developing my own home automation systeem i want to control my thermostat within this app.
Currently (so far i now) this was nog possible, with some hack's als reading tutorials i've created this PHP script.

All the information you need: the username and password to sign in in the iOS app (not sure if android has an app also).
You can try it at: https://www.e-thermostaat.nl/login. The login information are exactly the same.

## Usage
Please create a completly blank php file.
In the new file first let's include the class it's self.

`include('thermostat.inc.php');`

Below the include we'll start the class:

`$Thermostat = new Thermostat('Username', 'password');`

Then we want to read the current temperature:

`echo $Thermostat->getTemp();`

> Please note, ICY is using to variables for the temperature:
>
> temperature1 is returning the current temperature from the room.

> temperature2 is returning the temperature that was set.

For reading the current room temperature we use:

`echo $Thermostat->getTemp('temperature1');`

To change the temperature we use the functon setTemp('temp') as follow:

`echo $Thermostat->setTemp('18');`

> Please note, we've just changed the temperature to 18 degrees, for example 21: setTemp('21');

To view the date and time that the thermostat has "knocked" to the servers:

`echo $Thermostat->lastSeen();`

Please see the "examples" folder for some examples


