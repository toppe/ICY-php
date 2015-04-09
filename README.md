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
> Please note: temperature1 is the current temperature and temperature2 is the temperature you can set.
>
> By default we use temperature2.

`echo $Thermostat->getTemp();`


