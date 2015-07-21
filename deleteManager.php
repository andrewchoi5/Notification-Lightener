<?php
include_once('db.php');
$contents = file_get_contents('managersJSON.json');
$m = json_decode($contents, true);



for($i=0; $i<=2; $i++){
		if(isset($_POST['passedID'])){
		$myPassedID = $_POST['passedID'];				
					$arrLength[$i] = count($m[$i]);
					 for($n=0; $n<=$arrLength[$i]; ++$n){
				 		if($m[$i][$n] == $myPassedID){
				 			$useridDelete = $m[$i][$n];
				 			$sql = "DELETE FROM [locutus].[dbo].[approvalMngrs] WHERE userid = '$useridDelete'";
							mssql_query($sql);							
							unset($m[$i][$n]);
				 			$m[$i] = array_values($m[$i]);				 			
				 		}
					}		
		}
}
$json = json_encode($m);
file_put_contents('managersJSON.json', $json);

?>