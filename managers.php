<?php 
include_once('user.php');
$currentUser = getusername();


$contents = file_get_contents('managersJSON.json');
$m = json_decode($contents, true);

$CSMarrayLength = count($m[0]); //or sizeof();
for($i = 0; $i<$CSMarrayLength; ++$i){
	if(isset($m[0][$i]) && $m[0][$i] == $currentUser){
		$isCSM = TRUE; break; //important!! make sure to break;
	}else
		$isCSM = FALSE;
}
$SMarrayLength = count($m[1]); //or sizeof();
for($i = 0; $i < $SMarrayLength; ++$i){
	if(isset($m[1][$i]) && $m[1][$i] == $currentUser){
		$isSM = TRUE; break; //important!! make sure to break;
	}else
		$isSM = FALSE;
}

$altarrayLength = count($m[2]); //or sizeof();
for($i = 1; $i<=$altarrayLength; ++$i){
	if(isset($m[2][$i]) && $m[2][$i] == $currentUser){
		$isAlt = TRUE; break; //important!! make sure to break;
	}else
		$isAlt = FALSE;
}

if(isset($isCSM)){
	if($isCSM == TRUE && $dd <= 10 && $n + 2 == $dm){
		$authoritycsm = TRUE;
	}else{
		$authoritycsm = FALSE;
	}
}else{
	$authoritycsm = FALSE;
}

if(isset($isSM)){
	if($isSM == TRUE && $dd <= 10 && $n + 2 == $dm){
		$authoritysm = TRUE;
	}else{
		$authoritysm = FALSE;
	}
}else{
	$authoritysm = FALSE;
}

if(isset($isAlt)){
	if($isAlt == TRUE && $dd <= 31 && $n + 2 == $dm){ 
		$authority = TRUE;
	}else{
		$authority = FALSE;
	}
}else{
	$isAlt = FALSE;
}

?>