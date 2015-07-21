<?php
include_once('db.php');
include('thisMonth.php');
include_once('user.php');

if(isset($_POST['passedID'])){
  $passedID = $_POST['passedID'];
}
$myValue = $allMonths[$dm-2];
$modifierID = getusername();
$sql = "INSERT INTO [locutus].[dbo].[thisMonth] ([thisMonth],[modifierID],[dateChanged],[year]) VALUES ('$myValue','$modifierID',GETDATE(),'$dy')";
if(!mssql_query($sql)){
  die('error inserting new record');
}else{
  echo '<br>';
  echo "1 sample record has been added to the database.";
}
?>