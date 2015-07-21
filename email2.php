<?php



	$contents = file_get_contents('managersJSON.json');
	$c = json_decode($contents, true);
	
	$c['oldCounter'] = $c['newCounter'];
		
		if($c['oldCounter'] == false){
			$c['oldCounter'] = false;
			$c['newCounter'] = false;
		}else{
			$c['oldCounter'] = true;
			$c['newCounter'] = false;
		}

$json = json_encode($c);
file_put_contents('managersJSON.json', $json);




?>