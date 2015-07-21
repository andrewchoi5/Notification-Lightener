<?php
include_once('user.php');
include_once('db.php');

for($i=0; $i<=2; $i++){
	if(isset($_POST['managerID'.$i])){
		$newManagerID = array();
 		$newManagerID[$i] = $_POST['managerID'.$i];
	 	$arrLength = count($m[$i]);
	 	for($n = 0; $n <= $arrLength; ++$n){
	 		if($_POST['managerID'.$i] != NULL){ 			
				$userid = $newManagerID[$i];
 				$type = $i;
				$adder = getusername();
				$sql = "INSERT INTO [locutus].[dbo].[approvalMngrs]([userid],[type],[timestamp],[adder])VALUES('$userid','$type',GETDATE(),'$adder')";
				mssql_query($sql);
				break;
		 	}
	 	}
	}
}


?>