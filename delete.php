<?php include('db.php');
	if( isset($_GET['del']) )
	{
		$id = $_GET['del'];
		$sql= "DELETE FROM [locutus].[dbo].[testing] WHERE peopleid='$id'";
		mssql_query($sql);
		echo "<meta http-equiv='refresh' content='0; url=updatesla.php'>";
	}
?>