<?php
include_once('db.php');
include('thisMonth.php');
include_once('user.php');
include_once('sqls.php');
$modifierID = getusername();
if(isset($_POST['passedID'])){
  $passedID = $_POST['passedID'];
}

if($passedID == "olderRef"){
	if(!($n == 0 && $yearIndex == 2015)){
		if($n == 0 && $yearIndex >= 2016){	
			$myValue = $previousMonth;
			$yearIndex = $yearIndex-1;
		}else{
			$myValue = $previousMonth;
		}		
	}else{
		$myValue = $allMonths[0];
	}
}else if($passedID == "newerRef"){
	if(!($n+2 == $dm && $yearIndex == $dy)){//  $n>=0	
		if($n == 11){
			$myValue = $nextMonth;
			$yearIndex = $yearIndex+1;
		}else{
			$myValue = $nextMonth;
		}		
	}else{
		$myValue = $allMonths[$n];
	}







}
$sql = "INSERT INTO [locutus].[dbo].[thisMonth] ([thisMonth],[year],[modifierID],[dateChanged]) VALUES ('$myValue','$yearIndex','$modifierID',GETDATE())";
if(!mssql_query($sql)){
  die('error inserting new record');
}else{
  echo '<br>';
  echo "1 sample record has been added to the database.";
}

?>