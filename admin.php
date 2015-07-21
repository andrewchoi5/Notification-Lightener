<?php include_once('user.php');
$currentUser = getusername();
$contents = file_get_contents('managersJSON.json');
$m = json_decode($contents, true);
$haveAccess = FALSE;
      $arrLength= count($m[2]);
      for($n = 0; $n<=$arrLength; ++$n){
          if($m[2][$n] == $currentUser){
            $haveAccess = TRUE;
            break;
          }
      }
if($haveAccess != TRUE){ 
    Header("Location: approve.php" ); 
}
$json = json_encode($m);
file_put_contents('managersJSON.json', $json);
?>
<?php include('db.php');?>
<?php include('thisMonth.php'); ?>
<?php include('managers.php'); ?>
<!DOCTYPE html>
<HTML lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="favicon.ico">
  <title>Approval: Admin</title> 
  <link rel="stylesheet" href="bootstrap-3.3.5-dist\css\bootstrap.min.css">
  <link rel="stylesheet" href="includes/styles.css" >
  <link rel="stylesheet" href="code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <link rel="stylesheet" href="font-awesome-4.3.0/css/font-awesome.min.css">  
</head>
<body>
  <?php include('navbar.php');?>
  <div class="container">	
    <div class="alert alert-dismissable alert-warning">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <h4>BBAR Carrier SLA Report: Admin Page </h4>
      <i>For Adminstrative Managers only! </i>
    </div>
    <div>
<?php
$contents = file_get_contents('managersJSON.json');
$m = json_decode($contents, true);

for($i=0; $i<=2; $i++){ //updating from database to JSON.
$sql="SELECT*FROM[locutus].[dbo].[approvalMngrs] where ([type])=$i ORDER BY ([ID])ASC";
$query = mssql_query($sql); 
$row = mssql_fetch_array($query);
    if($i == $row['type']){      
        $n = 0;
        while ($row = mssql_fetch_array($query)){
          $m[$i][$n] = $row['userid'];
          ++$n;
        }
    }    
}
$json = json_encode($m);
file_put_contents('managersJSON.json', $json);

$contents = file_get_contents('managersJSON.json');
$m = json_decode($contents, true);
  echo "<table class='table table-striped table-bordered table-condensed problems'>";	
	echo "<table width='33.3%' class='table table-striped table-bordered table-condensed problems'>";
	echo "<thead><tr><th width='33.3%'>CSM Managers<sup>1</sup></th><th width='33.3%'>SM Managers<sup>2</sup></th>"
	."<th width='33.34%'>**Administrative Managers<sup>3</sup></th>"
	."</tr></thead>"."<tbody><tr>";	
	for($i=0; $i<=2; $i++){
		  $arrLength= count($m[$i]);
		  echo '<td>';
  	 	for($n = 0; $n<=$arrLength; ++$n){
          if(isset($m[$i][$n]) && $m[$i][$n] != NULL && $m[$i][$n] != ""){
            $myManagerID = $m[$i][$n];
      		  echo $m[$i][$n]." "."<a href='#' id='$myManagerID' title='Click to remove $myManagerID from the list of managers.' style='text-decoration: none;' onclick='deleteManager(this.id);'> &#10006; Remove</a>".'<br>';	
          }
  	  }
      echo '</td>';
	} 
  echo "</tr></tbody></table>";
$json = json_encode($m);
file_put_contents('managersJSON.json', $json);
?>


<sup>1</sup> CSMs have the authority to modify CSM approval buttons.
<span style="float:right;"><sup><b>**</b></sup> WARNING: Be careful <i>not to remove yourself </i> from the list!</span><br>
<sup>2</sup> SMs have the authority to modify SM approval buttons. <br>
<sup>3</sup> Administrators have the ability to modify both CSM and SM approval buttons.
    </div>
    <div id="toggle">
      </br>
       <div class="input-group input-group-sm">
          <form id="myForm" action="managerInput.php" method="post">
            <input title="Space for CSM" name="managerID0" id="managerID0" type="text" size="30" maxlength="18" class="form-control" placeholder="Insert a New CSM Manager ID here:" aria-describedby="sizing-addon"><br>
            <input title="Space for SM" name="managerID1" id="managerID1" type="text" size="30" maxlength="18" class="form-control" placeholder="Insert a New SM Manager ID here:" aria-describedby="sizing-addon"><br>
            <input title="Space for Admin" name="managerID2" id="managerID2" type="text" size="30" maxlength="20" class="form-control" placeholder="Insert a New Manager ID here:" aria-describedby="sizing-addon"><br>
            <input id='submit' type='submit' value="&#10004; Add" title="Add New Manager(s)!" class='btn btn-default'>
        
          </form>
        </div>
    </div>
  </div>
</body>
</div>
<script src="includes/jquery-2.0.3.min.js"></script>
<script src="includes/bootstrap.min.js"></script>  <!-- Always put jquery.js BEFORE bootstrap.js  -->
<script src="includes/spin.min.js"></script>
<script src="form-master/jquery.form.js"></script>
<script>
function deleteManager(passedID){
  // document.getElementById(passedID).className = "hidden";
  $.ajax({
    type: 'POST',
    url: 'deleteManager.php',
    data:{
      'passedID' : passedID
    },
    success: function(msg){
      location.reload(true);
    }
  });
}
</script>
<script>
 $(document).ready(function(){ // bind 'myForm' and provide a simple callback function 
            $('#myForm').ajaxForm(function(){ 
                location.reload(true);
            }); 
        });
</script>
</html>