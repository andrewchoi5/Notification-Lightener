<?php
	$contents = file_get_contents('managersJSON.json');
	$c = json_decode($contents, true);

	$c['oldCounter'] = $c['newCounter'];
		if($c['oldCounter'] == false){
			$c['oldCounter'] = false;
			$c['newCounter'] = true;
		}else{
			$c['oldCounter'] = true;
			$c['newCounter'] = true;
		}

		if($c['oldCounter'] == false && $c['newCounter'] == true){
			$emailMonth = $bigTitle[$n];
			$body = "Hello, <br><br>Incident data approval necessary for SLA BBAR for <b> $emailMonth $yearIndex </b>has been received for all regions.<br>CSM team, you can now distribute your reports. (go/bbargenerator)
			<br><br><br>Thank You,<br><br>BBAR Team";  
			ini_set("SMTP","smtp.rim.net");  
			$to = 'bjackson@blackberry.com';
			$subject = "$emailMonth $yearIndex: BBAR Data Approved!";
			$headers = "From: bbar-no-reply\r\n";//$headers.="Reply-To: no-reply@blackberry.com\r\n";//$headers .= "CC: susan@example.com\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";  
			mail($to, $subject, $body, $headers);
		} 


		$json = json_encode($c);
		file_put_contents('managersJSON.json', $json);
?>