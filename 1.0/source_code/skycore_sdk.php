<?php

include ("buildurllibrary.inc.php");

class Skycore	{
	
	public function Skycore($key)	{
	
		$this->api_key = $key;
	
	}
	
	//function for the subscribe call
	public function subscribe($number, $campid)	{

		//URL Query Information
		//---------------------
		//Static information
		//$action = "action=subscribe"; 
		//Dynamic information
		//$mobile = "mobile=";
		//$campaignid = "campaignid=";
		//Assemble the URL query
		//$api_query = $action . "&" . $this->api_key . "&" . $mobile . $number . "&" . $campaignid . $campid;
	
		$POSTArray['xml']="<REQUEST>
    <ACTION>subscribe</ACTION>
    <API_KEY>".$this->api_key."</API_KEY>
    <CAMPAIGNID>".$campid."</CAMPAIGNID>
    <MOBILE>".$number."</MOBILE>
</REQUEST>";
		
		//Make the HTTPS request
		//----------------------
		$ch = curl_init();
		/*curl_setopt($ch, CURLOPT_URL, 
			//Builds the final request URL by concatenating the base URL with the URL query
			http_build_url('https://scale-secure.skycore.com/API/wxml/1.3/index.php?',
				array(
					
					"query" => $api_query
				)
		));*/
		//Builds the final request URL by concatenating the base URL with the URL query
		curl_setopt($ch, CURLOPT_URL, 'https://scale-secure.skycore.com/API/wxml/1.3/index.php?');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $POSTArray);
		//Set this to 0 if testing on a dev site
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		$result = curl_exec($ch);

	}

}

?>
