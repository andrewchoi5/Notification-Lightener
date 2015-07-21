<?php
include('db.php');
include('thisMonth.php');
include_once('sqls.php');
include_once('user.php');
include_once('getStatus.php');


if(isset($_POST['passedID'])){
  $myPassedID = $_POST['passedID'];
}
if($myPassedID == "relay_ap"){
  	$srvid=1; $mngr=1; $region='ap';
}
if($myPassedID == "relay_eu"){
  	$srvid=1; $mngr=1; $region='eu';
}
if($myPassedID == "relay_na"){
	$srvid=1; $mngr=1; $region='na';
}
if($myPassedID == "bis-e_ap"){
	$srvid=2; $mngr=1; $region='ap';
}
if($myPassedID == "bis-e_eu"){
	$srvid=2; $mngr=1; $region='eu';
}
if($myPassedID == "bis-e_na"){
	$srvid=2; $mngr=1; $region='na';
}
if($myPassedID == "prv_ap"){
	$srvid=3; $mngr=1; $region='ap';
}
if($myPassedID == "prv_eu"){
	$srvid=3; $mngr=1; $region='eu';
}
if($myPassedID == "prv_na"){
	$srvid=3; $mngr=1; $region='na';
}
if($myPassedID == "bbm_ap"){
	$srvid=4; $mngr=1; $region='ap';
}
if($myPassedID == "bbm_eu"){
	$srvid=4; $mngr=1; $region='eu';
}
if($myPassedID == "bbm_na"){
	$srvid=4; $mngr=1; $region='na';
}
if($myPassedID == "bis-b_ap"){
	$srvid=5; $mngr=1; $region='ap';
}
if($myPassedID == "bis-b_eu"){
	$srvid=5; $mngr=1; $region='eu';
}
if($myPassedID == "bis-b_na"){
	$srvid=5; $mngr=1; $region='na';
}
if($myPassedID == "relay_ap2"){
  	$srvid=1; $mngr=2; $region='ap';
}
if($myPassedID == "relay_eu2"){
  	$srvid=1; $mngr=2; $region='eu';
}
if($myPassedID == "relay_na2"){
	$srvid=1; $mngr=2; $region='na';
}
if($myPassedID == "bis-e_ap2"){
	 $srvid=2; $mngr=2; $region='ap';
}
if($myPassedID == "bis-e_eu2"){
	$srvid=2; $mngr=2; $region='eu';
}
if($myPassedID == "bis-e_na2"){
	$srvid=2; $mngr=2; $region='na';
}
if($myPassedID == "prv_ap2"){
	$srvid=3; $mngr=2; $region='ap';
}
if($myPassedID == "prv_eu2"){
	$srvid=3; $mngr=2; $region='eu';
}
if($myPassedID == "prv_na2"){
	$srvid=3; $mngr=2; $region='na';
}
if($myPassedID == "bbm_ap2"){
	$srvid=4; $mngr=2; $region='ap';
}
if($myPassedID == "bbm_eu2"){
	$srvid=4; $mngr=2; $region='eu';
}
if($myPassedID == "bbm_na2"){
	$srvid=4; $mngr=2; $region='na';
}
if($myPassedID == "bis-b_ap2"){
	$srvid=5; $mngr=2; $region='ap';
}
if($myPassedID == "bis-b_eu2"){
	$srvid=5; $mngr=2; $region='eu';
}
if($myPassedID == "bis-b_na2"){
	$srvid=5; $mngr=2; $region='na';
}
$sql="SELECT TOP 1*FROM[locutus].[dbo].[approval]WHERE([srvid])=$srvid AND([mngr])=$mngr AND([month])=$monthIndex AND ([year])=$yearIndex AND ([$region])IS NOT NULL ORDER BY([ID])DESC";

$query = mssql_query($sql);
while ($row = mssql_fetch_array($query)){
  $lastColor = $row["$region"];
}     
if($lastColor == 0){
  $color = 1;
}else{
  $color = 0;
}
$modifierID = getusername();

$sql = "UPDATE [locutus].[dbo].[approval] SET [$region]='$color',[modifierID]='$modifierID',[dateAdded]=GETDATE()
WHERE [month]='$monthIndex' AND [year]='$yearIndex' AND [mngr]='$mngr' AND [srvid]='$srvid'";

if(!mssql_query($sql)){
  die('error inserting new record');
}else{
  echo '<br>';
  echo "1 sample record has been added to the database.";
}









?>