<?php
include_once('user.php');
$modifierID = getusername();
$monthIndex = $n+1;
if($monthIndex < 10){
	$reviewMonthIndex = "0".$monthIndex;
}else{
	$reviewMonthIndex = $monthIndex;
}
$a_date = $yearIndex."-".$reviewMonthIndex."-"."15";
$reviewDayindex = date("Y-m-t", strtotime($a_date));
for($mngrindex = 1; $mngrindex <= 2; $mngrindex++){
	for($srv = 1; $srv <= 5; $srv++){
		$sql = "IF NOT EXISTS (SELECT*FROM [locutus].[dbo].[approval] WHERE [year]='$yearIndex' AND [month]='$monthIndex' AND [srvid]='$srv' AND [mngr]='$mngrindex')
			BEGIN
				INSERT INTO [locutus].[dbo].[approval]([ap],[eu],[na],[month],[year],[mngr],[srvid],[modifierID],[dateAdded])
				VALUES('0','0','0','$monthIndex','$yearIndex','$mngrindex','$srv','$modifierID',GETDATE());
			END";
			mssql_query($sql);
	}
}
$sql = "SELECT TOP 1*FROM [locutus].[dbo].[approval] WHERE([srvid])='1'AND([mngr])='1'AND([month])='$monthIndex' AND ([year])='$yearIndex' AND ([ap]) IS NOT NULL ORDER BY([ID])DESC";
$sql2 = "SELECT TOP 1*FROM[locutus].[dbo].[approval]WHERE([srvid])='1'AND([mngr])='1'AND([month])='$monthIndex' AND ([year])='$yearIndex' AND ([eu])IS NOT NULL ORDER BY([ID])DESC";
$sql3 = "SELECT TOP 1*FROM[locutus].[dbo].[approval]WHERE([srvid])='1'AND([mngr])='1'AND([month])='$monthIndex' AND ([year])='$yearIndex' AND ([na])IS NOT NULL ORDER BY([ID])DESC";
$sql4 = "SELECT TOP 1*FROM[locutus].[dbo].[approval]WHERE([srvid])='2'AND([mngr])='1'AND([month])='$monthIndex' AND ([year])='$yearIndex' AND ([ap])IS NOT NULL ORDER BY([ID])DESC";
$sql5 = "SELECT TOP 1*FROM[locutus].[dbo].[approval]WHERE([srvid])='2'AND([mngr])='1'AND([month])=$monthIndex AND ([year])=$yearIndex AND ([eu])IS NOT NULL ORDER BY([ID])DESC";
$sql6 = "SELECT TOP 1*FROM[locutus].[dbo].[approval]WHERE([srvid])='2'AND([mngr])='1'AND([month])=$monthIndex AND ([year])=$yearIndex AND ([na])IS NOT NULL ORDER BY([ID])DESC";
$sql7 = "SELECT TOP 1*FROM[locutus].[dbo].[approval]WHERE([srvid])='3'AND([mngr])='1'AND([month])=$monthIndex AND ([year])=$yearIndex AND ([ap])IS NOT NULL ORDER BY([ID])DESC";
$sql8 = "SELECT TOP 1*FROM[locutus].[dbo].[approval]WHERE([srvid])='3'AND([mngr])='1'AND([month])=$monthIndex AND ([year])=$yearIndex AND ([eu])IS NOT NULL ORDER BY([ID])DESC";
$sql9 = "SELECT TOP 1*FROM[locutus].[dbo].[approval]WHERE([srvid])='3'AND([mngr])='1'AND([month])=$monthIndex AND ([year])=$yearIndex AND ([na])IS NOT NULL ORDER BY([ID])DESC";
$sql10 = "SELECT TOP 1*FROM[locutus].[dbo].[approval]WHERE([srvid])='4'AND([mngr])='1'AND([month])=$monthIndex AND ([year])=$yearIndex AND ([ap])IS NOT NULL ORDER BY([ID])DESC";
$sql11 = "SELECT TOP 1*FROM[locutus].[dbo].[approval]WHERE([srvid])='4'AND([mngr])='1'AND([month])=$monthIndex AND ([year])=$yearIndex AND ([eu])IS NOT NULL ORDER BY([ID])DESC";
$sql12 = "SELECT TOP 1*FROM[locutus].[dbo].[approval]WHERE([srvid])='4'AND([mngr])='1'AND([month])=$monthIndex AND ([year])=$yearIndex AND ([na])IS NOT NULL ORDER BY([ID])DESC";
$sql13 = "SELECT TOP 1*FROM[locutus].[dbo].[approval]WHERE([srvid])='5'AND([mngr])='1'AND([month])=$monthIndex AND ([year])=$yearIndex AND ([ap])IS NOT NULL ORDER BY([ID])DESC";
$sql14 = "SELECT TOP 1*FROM[locutus].[dbo].[approval]WHERE([srvid])='5'AND([mngr])='1'AND([month])=$monthIndex AND ([year])=$yearIndex AND ([eu])IS NOT NULL ORDER BY([ID])DESC";
$sql15 = "SELECT TOP 1*FROM[locutus].[dbo].[approval]WHERE([srvid])='5'AND([mngr])='1'AND([month])=$monthIndex AND ([year])=$yearIndex AND ([na])IS NOT NULL ORDER BY([ID])DESC";
$smsql = "SELECT TOP 1*FROM[locutus].[dbo].[approval]WHERE([srvid])='1'AND([mngr])='2'AND([month])=$monthIndex AND ([year])=$yearIndex AND ([ap])IS NOT NULL ORDER BY([ID])DESC";
$smsql2= "SELECT TOP 1*FROM[locutus].[dbo].[approval]WHERE([srvid])='1'AND([mngr])='2'AND([month])=$monthIndex AND ([year])=$yearIndex AND ([eu])IS NOT NULL ORDER BY([ID])DESC";
$smsql3= "SELECT TOP 1*FROM[locutus].[dbo].[approval]WHERE([srvid])='1'AND([mngr])='2'AND([month])=$monthIndex AND ([year])=$yearIndex AND ([na])IS NOT NULL ORDER BY([ID])DESC";
$smsql4= "SELECT TOP 1*FROM[locutus].[dbo].[approval]WHERE([srvid])='2'AND([mngr])='2'AND([month])=$monthIndex AND ([year])=$yearIndex AND ([ap])IS NOT NULL ORDER BY([ID])DESC";
$smsql5= "SELECT TOP 1*FROM[locutus].[dbo].[approval]WHERE([srvid])='2'AND([mngr])='2'AND([month])=$monthIndex AND ([year])=$yearIndex AND ([eu])IS NOT NULL ORDER BY([ID])DESC";
$smsql6= "SELECT TOP 1*FROM[locutus].[dbo].[approval]WHERE([srvid])='2'AND([mngr])='2'AND([month])=$monthIndex AND ([year])=$yearIndex AND ([na])IS NOT NULL ORDER BY([ID])DESC";
$smsql7= "SELECT TOP 1*FROM[locutus].[dbo].[approval]WHERE([srvid])='3'AND([mngr])='2'AND([month])=$monthIndex AND ([year])=$yearIndex AND ([ap])IS NOT NULL ORDER BY([ID])DESC";
$smsql8= "SELECT TOP 1*FROM[locutus].[dbo].[approval]WHERE([srvid])='3'AND([mngr])='2'AND([month])=$monthIndex AND ([year])=$yearIndex AND ([eu])IS NOT NULL ORDER BY([ID])DESC";
$smsql9= "SELECT TOP 1*FROM[locutus].[dbo].[approval]WHERE([srvid])='3'AND([mngr])='2'AND([month])=$monthIndex AND ([year])=$yearIndex AND ([na])IS NOT NULL ORDER BY([ID])DESC";
$smsql10="SELECT TOP 1*FROM[locutus].[dbo].[approval]WHERE([srvid])='4'AND([mngr])='2'AND([month])=$monthIndex AND ([year])=$yearIndex AND ([ap])IS NOT NULL ORDER BY([ID])DESC";
$smsql11="SELECT TOP 1*FROM[locutus].[dbo].[approval]WHERE([srvid])='4'AND([mngr])='2'AND([month])=$monthIndex AND ([year])=$yearIndex AND ([eu])IS NOT NULL ORDER BY([ID])DESC";
$smsql12="SELECT TOP 1*FROM[locutus].[dbo].[approval]WHERE([srvid])='4'AND([mngr])='2'AND([month])=$monthIndex AND ([year])=$yearIndex AND ([na])IS NOT NULL ORDER BY([ID])DESC";
$smsql13="SELECT TOP 1*FROM[locutus].[dbo].[approval]WHERE([srvid])='5'AND([mngr])='2'AND([month])=$monthIndex AND ([year])=$yearIndex AND ([ap])IS NOT NULL ORDER BY([ID])DESC";
$smsql14="SELECT TOP 1*FROM[locutus].[dbo].[approval]WHERE([srvid])='5'AND([mngr])='2'AND([month])=$monthIndex AND ([year])=$yearIndex AND ([eu])IS NOT NULL ORDER BY([ID])DESC";
$smsql15="SELECT TOP 1*FROM[locutus].[dbo].[approval]WHERE([srvid])='5'AND([mngr])='2'AND([month])=$monthIndex AND ([year])=$yearIndex AND ([na])IS NOT NULL ORDER BY([ID])DESC";

$query = mssql_query($sql);
while($row = mssql_fetch_array($query)){
$ap = $row["ap"];
$modifierID = $row["modifierID"]; 
$dateAdded = $row["dateAdded"];
}

$query = mssql_query($sql2);
while($row = mssql_fetch_array($query)){
$eu = $row["eu"];
$modifierIDeu = $row["modifierID"]; 
$dateAddedeu = $row["dateAdded"];
}

$query = mssql_query($sql3);
while($row = mssql_fetch_array($query)){
$na = $row["na"];
$modifierIDna = $row["modifierID"]; 
$dateAddedna = $row["dateAdded"];
}

$query = mssql_query($sql4);
while($row = mssql_fetch_array($query)){
$ap2 = $row["ap"];
$modifierIDap2 = $row["modifierID"]; 
$dateAddedap2 = $row["dateAdded"];
}

$query = mssql_query($sql5);
while($row = mssql_fetch_array($query)){
$eu2 = $row["eu"];
$modifierIDeu2 = $row["modifierID"]; 
$dateAddedeu2 = $row["dateAdded"];
}
$query = mssql_query($sql6);
while($row = mssql_fetch_array($query)){
$na2 = $row["na"];
$modifierIDna2 = $row["modifierID"]; 
$dateAddedna2 = $row["dateAdded"];
}
$query = mssql_query($sql7);
while($row = mssql_fetch_array($query)){
$ap3 = $row["ap"];
$modifierIDap3 = $row["modifierID"]; 
$dateAddedap3 = $row["dateAdded"];
}
$query = mssql_query($sql8);
while($row = mssql_fetch_array($query)){
$eu3 = $row["eu"];
$modifierIDeu3 = $row["modifierID"]; 
$dateAddedeu3 = $row["dateAdded"];
}
$query = mssql_query($sql9);
while($row = mssql_fetch_array($query)){
$na3 = $row["na"];
$modifierIDna3 = $row["modifierID"]; 
$dateAddedna3 = $row["dateAdded"];
}

$query = mssql_query($sql10);
while($row = mssql_fetch_array($query)){
$ap4 = $row["ap"];
$modifierIDap4 = $row["modifierID"]; 
$dateAddedap4 = $row["dateAdded"];
}

$query = mssql_query($sql11);
while($row = mssql_fetch_array($query)){
$eu4 = $row["eu"];
$modifierIDeu4 = $row["modifierID"]; 
$dateAddedeu4 = $row["dateAdded"];
}
$query = mssql_query($sql12);
while($row = mssql_fetch_array($query)){
$na4 = $row["na"];
$modifierIDna4 = $row["modifierID"]; 
$dateAddedna4 = $row["dateAdded"];
}
$query = mssql_query($sql13);
while($row = mssql_fetch_array($query)){
$ap5 = $row["ap"];
$modifierIDap5 = $row["modifierID"]; 
$dateAddedap5 = $row["dateAdded"];
}
$query = mssql_query($sql14);
while($row = mssql_fetch_array($query)){
$eu5 = $row["eu"];
$modifierIDeu5 = $row["modifierID"]; 
$dateAddedeu5 = $row["dateAdded"];
}
$query = mssql_query($sql15);
while($row = mssql_fetch_array($query)){
$na5 = $row["na"];
$modifierIDna5 = $row["modifierID"]; 
$dateAddedna5 = $row["dateAdded"];
}
$query = mssql_query($smsql);
while($row = mssql_fetch_array($query)){
$smap = $row["ap"];
$modifierIDsmap = $row["modifierID"]; 
$dateAddedsmap = $row["dateAdded"];
}
$query = mssql_query($smsql2);
while($row = mssql_fetch_array($query)){
$smeu = $row["eu"];
$modifierIDsmeu = $row["modifierID"]; 
$dateAddedsmeu = $row["dateAdded"];
}
$query = mssql_query($smsql3);
while($row = mssql_fetch_array($query)){
$smna = $row["na"];
$modifierIDsmna = $row["modifierID"]; 
$dateAddedsmna = $row["dateAdded"];
}
$query = mssql_query($smsql4);
while($row = mssql_fetch_array($query)){
$smap2 = $row["ap"];
$modifierIDsmap2 = $row["modifierID"]; 
$dateAddedsmap2 = $row["dateAdded"];
}
$query = mssql_query($smsql5);
while($row = mssql_fetch_array($query)){
$smeu2 = $row["eu"];
$modifierIDsmeu2 = $row["modifierID"]; 
$dateAddedsmeu2 = $row["dateAdded"];
}
$query = mssql_query($smsql6);
while($row = mssql_fetch_array($query)){
$smna2 = $row["na"];
$modifierIDsmna2 = $row["modifierID"]; 
$dateAddedsmna2 = $row["dateAdded"];
}
$query = mssql_query($smsql7);
while($row = mssql_fetch_array($query)){
$smap3 = $row["ap"];
$modifierIDsmap3 = $row["modifierID"]; 
$dateAddedsmap3 = $row["dateAdded"];
}
$query = mssql_query($smsql8);
while($row = mssql_fetch_array($query)){
$smeu3 = $row["eu"];
$modifierIDsmeu3 = $row["modifierID"]; 
$dateAddedsmeu3 = $row["dateAdded"];
}
$query = mssql_query($smsql9);
while($row = mssql_fetch_array($query)){
$smna3 = $row["na"];
$modifierIDsmna3 = $row["modifierID"]; 
$dateAddedsmna3 = $row["dateAdded"];
}
$query = mssql_query($smsql10);
while($row = mssql_fetch_array($query)){
$smap4 = $row["ap"];
$modifierIDsmap4 = $row["modifierID"]; 
$dateAddedsmap4 = $row["dateAdded"];
}
$query = mssql_query($smsql11);
while($row = mssql_fetch_array($query)){
$smeu4 = $row["eu"];
$modifierIDsmeu4 = $row["modifierID"]; 
$dateAddedsmeu4 = $row["dateAdded"];
}
$query = mssql_query($smsql12);
while($row = mssql_fetch_array($query)){
$smna4 = $row["na"];
$modifierIDsmna4 = $row["modifierID"]; 
$dateAddedsmna4 = $row["dateAdded"];
}
$query = mssql_query($smsql13);
while($row = mssql_fetch_array($query)){
$smap5 = $row["ap"];
$modifierIDsmap5 = $row["modifierID"]; 
$dateAddedsmap5 = $row["dateAdded"];
}
$query = mssql_query($smsql14);
while($row = mssql_fetch_array($query)){
$smeu5 = $row["eu"];
$modifierIDsmeu5 = $row["modifierID"]; 
$dateAddedsmeu5 = $row["dateAdded"];
}
$query = mssql_query($smsql15);
while($row = mssql_fetch_array($query)){
$smna5 = $row["na"];
$modifierIDsmna5 = $row["modifierID"]; 
$dateAddedsmna5 = $row["dateAdded"];
}

$ap = ($ap == 1) ? 'success' : 'danger';
$eu = ($eu == 1) ? 'success' : 'danger';
$na = ($na == 1) ? 'success' : 'danger';
$ap2 = ($ap2 == 1) ? 'success' : 'danger';
$eu2 = ($eu2 == 1) ? 'success' : 'danger';
$na2 = ($na2 == 1) ? 'success' : 'danger';
$ap3 = ($ap3 == 1) ? 'success' : 'danger';
$eu3 = ($eu3 == 1) ? 'success' : 'danger';
$na3 = ($na3 == 1) ? 'success' : 'danger';
$ap4 = ($ap4 == 1) ? 'success' : 'danger';
$eu4 = ($eu4 == 1) ? 'success' : 'danger';
$na4 = ($na4 == 1) ? 'success' : 'danger';
$ap5 = ($ap5 == 1) ? 'success' : 'danger';
$eu5 = ($eu5 == 1) ? 'success' : 'danger';
$na5 = ($na5 == 1) ? 'success' : 'danger';
$smap = ($smap == 1) ? 'success' : 'danger';
$smeu = ($smeu == 1) ? 'success' : 'danger';
$smna = ($smna == 1) ? 'success' : 'danger';
$smap2 = ($smap2 == 1) ? 'success' : 'danger';
$smeu2 = ($smeu2 == 1) ? 'success' : 'danger';
$smna2 = ($smna2 == 1) ? 'success' : 'danger';
$smap3 = ($smap3 == 1) ? 'success' : 'danger';
$smeu3 = ($smeu3 == 1) ? 'success' : 'danger';
$smna3 = ($smna3 == 1) ? 'success' : 'danger';
$smap4 = ($smap4 == 1) ? 'success' : 'danger';
$smeu4 = ($smeu4 == 1) ? 'success' : 'danger';
$smna4 = ($smna4 == 1) ? 'success' : 'danger';
$smap5 = ($smap5 == 1) ? 'success' : 'danger';
$smeu5 = ($smeu5 == 1) ? 'success' : 'danger';
$smna5 = ($smna5 == 1) ? 'success' : 'danger';
?>