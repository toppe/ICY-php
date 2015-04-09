<?php
class Thermostat {

	function __construct($username, $password){
	
		if(empty($username) OR empty($password)){
			die('Vul AUB een gebruikersnaam en een wachtwoord in!');
		}
	
		$this->username = $username;
		$this->password = $password;
		
		try {
		
			$this->getData();
			
		} catch(Exception $e){
		
			echo $e->getMessage();
			
		}
		
	}

	function getData($return='token'){
		$url = "https://portal.icy.nl/login";
	 	$postData = "username=".$this->username."&password=".$this->password;
	 
	 
	    $ch = curl_init();  
	 
	    curl_setopt($ch,CURLOPT_URL,$url);
	    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	    curl_setopt($ch,CURLOPT_HEADER, false); 
	    curl_setopt($ch, CURLOPT_POST, count($postData));
	    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);    
	 
		$err     = curl_errno($ch);
		$errmsg  = curl_error($ch);
				
	    $output	 = curl_exec($ch);
	    
	    $json 	 = json_decode($output);
	 
	    curl_close($ch);
	   
		if($json->{'status'}->{'code'} != "200"){
			throw new Exception($json->{'body'});
		}
	    
	    return $json->{''.$return.''};
	}
	
	function getTemp($temp="temperature2"){
		$token = $this->getData();
		  $url = "https://portal.icy.nl/data?username=".$this->username."&password=".$this->password;
    
		  $ch = curl_init();
		  
		   curl_setopt($ch,CURLOPT_URL,$url);
		   curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		   curl_setopt($ch,CURLOPT_HTTPHEADER, array("Session-token:".$token)); 

		  $output = curl_exec($ch);
		  curl_close($ch);
		  
		  $json = json_decode($output);

		  return $json->{''.$temp.''};

	}
	
	function lastSeen(){
		$token = $this->getData();
		  $url = "https://portal.icy.nl/data?username=".$this->username."&password=".$this->password;
    
		  $ch = curl_init();
		  
		   curl_setopt($ch,CURLOPT_URL,$url);
		   curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		   curl_setopt($ch,CURLOPT_HTTPHEADER, array("Session-token:".$token)); 

		  $output = curl_exec($ch);
		  curl_close($ch);
		  
		  $json = json_decode($output);

		  return $json->{'last-seen'};

	}
	
	function setTemp($temp){
		$token = $this->getData();
		$uid = $this->getData('serialthermostat1');
		$url = "https://portal.icy.nl/data";
	 	$postData = "uid=".$uid."&temperature1=".$temp;
	 
	 
	    $ch = curl_init();  
	 
	    curl_setopt($ch,CURLOPT_URL,$url);
	    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	    curl_setopt($ch,CURLOPT_HEADER, false); 
	    curl_setopt($ch,CURLOPT_HTTPHEADER, array("Session-token:".$token)); 
	    curl_setopt($ch, CURLOPT_POST, count($postData));
	    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);    
	 
	    $output=curl_exec($ch);
	 
	    curl_close($ch);
	    
	    $json = json_decode($output);
	    	if($json->{'status'}->{'code'} == "200"){
		    	return true;
	    	}
	}
}
?>