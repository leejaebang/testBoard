<?php 
function get_response($URL, $type= "content-type application/text") {

	if(!function_exists('curl_init')) {
		die ("Curl PHP package not installedn");
	}

	/*Initializing CURL*/
	$curlHandle = curl_init();

	/*The URL to be downloaded is set*/
	curl_setopt($curlHandle, CURLOPT_URL, $URL);
	curl_setopt($curlHandle, CURLOPT_HEADER, false);
	curl_setopt($curlHandle, CURLOPT_HTTPHEADER, array($type));
	curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);

	/*Now execute the CURL, download the URL specified*/
	$response = curl_exec($curlHandle);

	/*Return the response as it is, let the application process it accordingly*/
	return $response;
}
?>