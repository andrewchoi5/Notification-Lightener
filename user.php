<?php 
	function getusername(){
		// echo $_SERVER['LOGON_USER'].'</br>';
		// echo $_SERVER['AUTH_USER'].'</br>';
		// echo $_SERVER['PHP_AUTH_USER'].'</br>';
		// echo $_SERVER['REMOTE_USER'].'</br>';
		// echo $_SERVER['REDIRECT_LOGON_USER'].'</br>';
		// echo $_SERVER['REDIRECT_AUTH_USER'].'</br>';
		// $ip = getenv("REMOTE_ADDR");
		// echo("IP address is $ip<BR>");
		$user_chunks = explode("\\",$_SERVER['LOGON_USER']);
		$user_domain = $user_chunks[0];
		$user_name = $user_chunks[1];
		$currentUser2 = $user_chunks[1];
		return $user_chunks[1];		
		// echo("User domain is $user_domain<BR>");
		// echo("User name is $user_name<BR>");
	}
?>