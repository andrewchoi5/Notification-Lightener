<?php
$sql = "SELECT TOP 1 * FROM [locutus].[dbo].[thisMonth] WHERE ([year]) IS NOT NULL ORDER BY ([pk]) DESC";
$query = mssql_query($sql);
while ($row = mssql_fetch_array($query)){
	$yearIndex = $row["year"];
}

$allMonths = array("januaryapproval", "februaryapproval", "marchapproval", "aprilapproval", "mayapproval", "juneapproval", "julyapproval", "augustapproval", "septemberapproval",
	"octoberapproval","novemberapproval", "decemberapproval");
$bigTitle = array("January","February","March","April","May","June","July","August","September","October","November","December");
$arrlength = count($allMonths);
$sql = "SELECT TOP 1 * FROM [locutus].[dbo].[thisMonth] WHERE ([thisMonth]) IS NOT NULL ORDER BY ([pk]) DESC";
$query = mssql_query($sql);
while ($row = mssql_fetch_array($query)){
	$thisMonth = $row["thisMonth"];
}
for($x = 0; $x < $arrlength; ++$x){
	if($allMonths[$x] == $thisMonth){
		$n = $x;
	}
}
$yearIndexPlus = $yearIndex+1;
$yearIndexMinus = $yearIndex-1;
if(!($n == 0 && $yearIndex == 2015)){
	if($n == 0 && $yearIndex >= 2016){
		$previousMonth = $allMonths[11];
		$previousMonthTitle = $bigTitle[11]." ".$yearIndexMinus;
	}else{
		$previousMonth = $allMonths[$n-1];
		$previousMonthTitle = $bigTitle[$n-1]." ".$yearIndex;
	}
}else{
	$previousMonthTitle = "Beginning of Monthly Database";
}
if(!($n+2 == $dm && $yearIndex == $dy)){//$n >= 0
	if($n == 11){
		$nextMonth = $allMonths[0];
		$nextMonthTitle = $bigTitle[0]." ".$yearIndexPlus;

	}else{
		$nextMonth = $allMonths[$n+1];
		$nextMonthTitle = $bigTitle[$n+1]." ".$yearIndex;
	}
}else{
	$nextMonthTitle = "End of Monthly Database";
}


?>