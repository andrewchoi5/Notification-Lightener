<?php include('db.php');?>
<?php include('thisMonth.php'); ?>
<?php include('managers.php'); ?>
<?php include('sqls.php');?>
<?php include('getStatus.php');?>
<!DOCTYPE html>
<HTML lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="favicon.ico">
  <title>Carrier SLA Report</title> 
  <link rel="stylesheet" href="bootstrap-3.3.5-dist\css\bootstrap.min.css"> <!-- For the glyphicon buttons. Put this b4 the styles.css -->
  <!-- <link rel="stylesheet" href="font-awesome-4.3.0/css/font-awesome.min.css">   -->
  <link rel="stylesheet" href="includes/styles.css" >
  <link rel="stylesheet" href="code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
</head>
<body>
  <?php include('navbar.php');?>
  <div class="container">		
    <div class="alert alert-dismissable alert-success">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <h4>BBAR Carrier SLA Report: CSM/SM Approval <i></i></h4>
      <p>For a tutorial on this web application, please refer to: <a href="howto.php" target="_blank"><b><i>How-To</i></b></a>. &nbsp;

    </div>  
    <?php
    $d = new DateTime( 'F Y' );
    $d->modify('previous month');
    $dp = $d;
    $d = new DateTime( 'F Y' );
    $d->modify('next month');
    $dn = $d;
    $dc = new DateTime("F Y");
    ?>
    <h3><?php echo $bigTitle[$n]." "."$yearIndex" ?>&nbsp;<span id="monthStatus" class="label label-<?php echo $monthStatus ?>"><?php echo $monthStatusName ?></span></h3>
    <ul class="pager">
      <li class="<?php echo $previous ?>" id="olderButton"><a href="#" id="olderRef" onclick="changeMonth(this.id);">&larr; <?php echo $previousMonthTitle ?> </a></li>
      <li class="<?php echo $next ?>" id="newerButton"><a href="#" id="newerRef" onclick="changeMonth(this.id);"> <?php echo $nextMonthTitle ?>&rarr;</a></li>
    </ul>
     <div class="bs-component">
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th><i class="fa fa-arrow-right"></i>Service</th>
            <th><i class="fa fa-file-text-o"></i>Data</th>
            <th><i class="fa fa-user-plus"></i>CSM Approval</th>
            <th><i class="fa fa-user-times"></i>SM Approval</th>
            <th><i class="fa fa-globe"></i>Status</th>
            <th><i class="fa fa-phone fa-1x"></i>Support*</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Relay</td>
            <td>
              <a target="_blank" href="http://ciokmp001cnc:8080/bbar/public/calculate.py?from=2015-<?php echo $reviewMonthIndex?>-01&to=<?php echo $reviewDayindex?>&services%5B%5D=Relay&reports%5B%5D=tickets&format=html&go=Go%21"
              class="btn btn-xs btn-primary" title="Retrieve above month's Relay data.">Review Data</a>
            </td>
            <td>
              <a href="#" class="btn btn-xs btn-<?php echo $ap ?>" id="relay_ap" onclick="<?php if($authority == TRUE || $authoritycsm == TRUE){ ?> load(this.id); <?php } ?>" title="Last Modified by <?php echo $modifierID?>,&#013;On: <?php echo $dateAdded?>">AP</a>
              <a href="#" class="btn btn-xs btn-<?php echo $eu ?>" id="relay_eu" onclick="<?php if($authority == TRUE || $authoritycsm == TRUE){ ?> load(this.id); <?php } ?>" title="Last Modified by <?php echo $modifierIDeu?>,&#013;On: <?php echo $dateAddedeu?>">EU</a>
              <a href="#" class="btn btn-xs btn-<?php echo $na ?>" id="relay_na" onclick="<?php if($authority == TRUE || $authoritycsm == TRUE){ ?> load(this.id); <?php } ?>" title="Last Modified by <?php echo $modifierIDna?>,&#013;On: <?php echo $dateAddedna?>">NA</a>
            </td>
            <td>
              <a href="#" class="btn btn-xs btn-<?php echo $smap ?>" id="relay_ap2" onclick="<?php if($authority == TRUE || $authoritysm == TRUE){ ?> load(this.id); <?php } ?>" title="Last Modified by <?php echo $modifierIDsmap?>,&#013;On: <?php echo $dateAddedsmap?>">AP</a>
              <a href="#" class="btn btn-xs btn-<?php echo $smeu ?>" id="relay_eu2" onclick="<?php if($authority == TRUE || $authoritysm == TRUE){ ?> load(this.id); <?php } ?>" title="Last Modified by <?php echo $modifierIDsmeu?>,&#013;On: <?php echo $dateAddedsmeu?>">EU</a>
              <a href="#" class="btn btn-xs btn-<?php echo $smna ?>" id="relay_na2" onclick="<?php if($authority == TRUE || $authoritysm == TRUE){ ?> load(this.id); <?php } ?>" title="Last Modified by <?php echo $modifierIDsmna?>,&#013;On: <?php echo $dateAddedsmna?>">NA</a>
              <br>
            </td>
            <td>
              <span class="label label-<?php echo $status ?>" id="relay_status"><?php echo $statusName ?></span>
            </td>
            <td><a href="mailto:bbar_approval_request@blackberry.com?subject=Invalid Relay SLA Data&body=Please provide details here, such as:%0D%0A %0D%0A %0D%0A• Carrier name: %0D%0A%0D%0A• Incident ticket number: %0D%0A%0D%0A• Date/Times: %0D%0A%0D%0A• Comments/Concerns:" class="btn btn-xs btn-info">Contact</a></td>
          </tr>
          <tr>
            <td>BIS-E</td>
            <td>
              <a target="_blank"href="http://ciokmp001cnc:8080/bbar/public/calculate.py?from=2015-<?php echo $reviewMonthIndex?>-01&to=<?php echo $reviewDayindex?>&services%5B%5D=bis&reports%5B%5D=tickets&format=html&go=Go%21"
              class="btn btn-xs btn-primary" title="Retrieve above month's BIS-E data.">Review Data</a>
            </td>
            <td>
              <a href="#" class="btn btn-xs btn-<?php echo $ap2 ?>"  id="bis-e_ap"  onclick="<?php if($authority == TRUE || $authoritycsm == TRUE){ ?> load(this.id); <?php } ?>" title="Last Modified by <?php echo $modifierIDap2?>,&#013;On: <?php echo $dateAddedap2?>">AP</a> 
              <a href="#" class="btn btn-xs btn-<?php echo $eu2 ?>"  id="bis-e_eu"  onclick="<?php if($authority == TRUE || $authoritycsm == TRUE){ ?> load(this.id); <?php } ?>" title="Last Modified by <?php echo $modifierIDeu2?>,&#013;On: <?php echo $dateAddedeu2?>">EU</a> 
              <a href="#" class="btn btn-xs btn-<?php echo $na2 ?>"  id="bis-e_na"  onclick="<?php if($authority == TRUE || $authoritycsm == TRUE){ ?> load(this.id); <?php } ?>" title="Last Modified by <?php echo $modifierIDna2?>,&#013;On: <?php echo $dateAddedna2?>">NA</a>
            </td>
            <td>
              <a href="#" class="btn btn-xs btn-<?php echo $smap2 ?>"  id="bis-e_ap2" onclick="<?php if($authority == TRUE || $authoritysm == TRUE){ ?> load(this.id); <?php } ?>" title="Last Modified by <?php echo $modifierIDsmap2?>,&#013;On: <?php echo $dateAddedsmap2?>">AP</a> 
              <a href="#" class="btn btn-xs btn-<?php echo $smeu2 ?>"  id="bis-e_eu2" onclick="<?php if($authority == TRUE || $authoritysm == TRUE){ ?> load(this.id); <?php } ?>" title="Last Modified by <?php echo $modifierIDsmeu2?>,&#013;On: <?php echo $dateAddedsmeu2?>">EU</a> 
              <a href="#" class="btn btn-xs btn-<?php echo $smna2 ?>"  id="bis-e_na2" onclick="<?php if($authority == TRUE || $authoritysm == TRUE){ ?> load(this.id); <?php } ?>" title="Last Modified by <?php echo $modifierIDsmna2?>,&#013;On: <?php echo $dateAddedsmna2?>">NA</a>
            </td>    
            <td>
              <span class="label label-<?php echo $status2 ?>" id="bis-e_status"><?php echo $statusName2 ?></span>
            </td>
            <td><a href="mailto:bbar_approval_request@blackberry.com?subject=Invalid BIS-E SLA Data&body=Please provide details here, such as:%0D%0A %0D%0A %0D%0A• Carrier name: %0D%0A%0D%0A• Incident ticket number: %0D%0A%0D%0A• Date/Times: %0D%0A%0D%0A• Comments/Concerns:" class="btn btn-xs btn-info">Contact</a></td>
          </tr>					
          <tr>
            <td>PRV</td>
            <td>
              <a target="_blank" href="http://ciokmp001cnc:8080/bbar/public/calculate.py?from=2015-<?php echo $reviewMonthIndex?>-01&to=<?php echo $reviewDayindex?>&services%5B%5D=PRV&reports%5B%5D=tickets&format=html&go=Go%21" class="btn btn-xs btn-primary" title="Retrieve above month's PRV data.">Review Data</a>
            </td>
            <td>
              <a href="#" class="btn btn-xs btn-<?php echo $ap3 ?>"  id="prv_ap" onclick="<?php if($authority == TRUE || $authoritycsm == TRUE){ ?> load(this.id); <?php } ?>" title="Last Modified by <?php echo $modifierIDap3?>,&#013;On: <?php echo $dateAddedap3?>">AP</a>
              <a href="#" class="btn btn-xs btn-<?php echo $eu3 ?>"  id="prv_eu" onclick="<?php if($authority == TRUE || $authoritycsm == TRUE){ ?> load(this.id); <?php } ?>" title="Last Modified by <?php echo $modifierIDeu3?>,&#013;On: <?php echo $dateAddedeu3?>">EU</a> 
              <a href="#" class="btn btn-xs btn-<?php echo $na3 ?>"  id="prv_na" onclick="<?php if($authority == TRUE || $authoritycsm == TRUE){ ?> load(this.id); <?php } ?>" title="Last Modified by <?php echo $modifierIDna3?>,&#013;On: <?php echo $dateAddedna3?>">NA</a>
            </td>
            <td>
              <a href="#" class="btn btn-xs btn-<?php echo $smap3 ?>"  id="prv_ap2" onclick="<?php if($authority == TRUE || $authoritysm == TRUE){ ?> load(this.id); <?php } ?>" title="Last Modified by <?php echo $modifierIDsmap3?>,&#013;On: <?php echo $dateAddedsmap3?>">AP</a>
              <a href="#" class="btn btn-xs btn-<?php echo $smeu3 ?>"  id="prv_eu2" onclick="<?php if($authority == TRUE || $authoritysm == TRUE){ ?> load(this.id); <?php } ?>" title="Last Modified by <?php echo $modifierIDsmeu3?>,&#013;On: <?php echo $dateAddedsmeu3?>">EU</a> 
              <a href="#" class="btn btn-xs btn-<?php echo $smna3 ?>"  id="prv_na2" onclick="<?php if($authority == TRUE || $authoritysm == TRUE){ ?> load(this.id); <?php } ?>" title="Last Modified by <?php echo $modifierIDsmna3?>,&#013;On: <?php echo $dateAddedsmna3?>">NA</a>
            </td>
            <td>
              <span class="label label-<?php echo $status3 ?>" id="prv_status"><?php echo $statusName3 ?></span>
            </td>
            <td><a href="mailto:bbar_approval_request@blackberry.com?subject=Invalid PRV SLA Data&body=Please provide details here, such as:%0D%0A %0D%0A %0D%0A• Carrier name: %0D%0A%0D%0A• Incident ticket number: %0D%0A%0D%0A• Date/Times: %0D%0A%0D%0A• Comments/Concerns:" class="btn btn-xs btn-info">Contact</a></td>
          </tr>
          <tr>
            <td>BBM</td>
            <td><a href="http://ciokmp001cnc:8080/bbar/public/calculate.py?from=2015-<?php echo $reviewMonthIndex?>-01&to=<?php echo $reviewDayindex?>&services%5B%5D=BBM_EXT_MSG&reports%5B%5D=tickets&format=html&go=Go%21" target="_blank" class="btn btn-xs btn-primary" title="Retrieve above month's BBM data.">Review Data</a></td>
            <td>
              <a href="#" class="btn btn-xs btn-<?php echo $ap4 ?>"  id="bbm_ap" onclick="<?php if($authority == TRUE || $authoritycsm == TRUE){ ?> load(this.id); <?php } ?>" title="Last Modified by <?php echo $modifierIDap4?>,&#013;On: <?php echo $dateAddedap4?>">AP</a> 
              <a href="#" class="btn btn-xs btn-<?php echo $eu4 ?>"  id="bbm_eu" onclick="<?php if($authority == TRUE || $authoritycsm == TRUE){ ?> load(this.id); <?php } ?>" title="Last Modified by <?php echo $modifierIDeu4?>,&#013;On: <?php echo $dateAddedeu4?>">EU</a>
              <a href="#" class="btn btn-xs btn-<?php echo $na4 ?>"  id="bbm_na" onclick="<?php if($authority == TRUE || $authoritycsm == TRUE){ ?> load(this.id); <?php } ?>" title="Last Modified by <?php echo $modifierIDna4?>,&#013;On: <?php echo $dateAddedna4?>">NA</a>
            </td>
            <td>
              <a href="#" class="btn btn-xs btn-<?php echo $smap4 ?>"  id="bbm_ap2" onclick="<?php if($authority == TRUE || $authoritysm == TRUE){ ?> load(this.id); <?php } ?>" title="Last Modified by <?php echo $modifierIDsmap4?>,&#013;On: <?php echo $dateAddedsmap4?>">AP</a> 
              <a href="#" class="btn btn-xs btn-<?php echo $smeu4 ?>"  id="bbm_eu2" onclick="<?php if($authority == TRUE || $authoritysm == TRUE){ ?> load(this.id); <?php } ?>" title="Last Modified by <?php echo $modifierIDsmeu4?>,&#013;On: <?php echo $dateAddedsmeu4?>">EU</a>
              <a href="#" class="btn btn-xs btn-<?php echo $smna4 ?>"  id="bbm_na2" onclick="<?php if($authority == TRUE || $authoritysm == TRUE){ ?> load(this.id); <?php } ?>" title="Last Modified by <?php echo $modifierIDsmna4?>,&#013;On: <?php echo $dateAddedsmna4?>">NA</a>
            </td>
            <td><span class="label label-<?php echo $status4 ?>" id="bbm_status"><?php echo $statusName4 ?></span></td>
            <td><a href="mailto:bbar_approval_request@blackberry.com?subject=Invalid BBM SLA Data&body=Please provide details here, such as:%0D%0A %0D%0A %0D%0A• Carrier name: %0D%0A%0D%0A• Incident ticket number: %0D%0A%0D%0A• Date/Times: %0D%0A%0D%0A• Comments/Concerns:" class="btn btn-xs btn-info">Contact</a></td>
          </tr>
          <tr>
            <td>BIS-B</td>
            <td><a href="http://ciokmp001cnc:8080/bbar/public/calculate.py?from=2015-<?php echo $reviewMonthIndex?>-01&to=<?php echo $reviewDayindex?>&services%5B%5D=bisb&reports%5B%5D=tickets&format=html&go=Go%21" target="_blank" class="btn btn-xs btn-primary" title="Retrieve above month's BIS-B data.">Review Data</a></td>
            <td>
              <a href="#" class="btn btn-xs btn-<?php echo $ap5 ?>"  id="bis-b_ap" onclick="<?php if($authority == TRUE || $authoritycsm == TRUE){ ?> load(this.id); <?php } ?>" title="Last Modified by <?php echo $modifierIDap5?>,&#013;On: <?php echo $dateAddedap5?>">AP</a>
              <a href="#" class="btn btn-xs btn-<?php echo $eu5 ?>"  id="bis-b_eu" onclick="<?php if($authority == TRUE || $authoritycsm == TRUE){ ?> load(this.id); <?php } ?>" title="Last Modified by <?php echo $modifierIDeu5?>,&#013;On: <?php echo $dateAddedeu5?>">EU</a>
              <a href="#" class="btn btn-xs btn-<?php echo $na5 ?>"  id="bis-b_na" onclick="<?php if($authority == TRUE || $authoritycsm == TRUE){ ?> load(this.id); <?php } ?>" title="Last Modified by <?php echo $modifierIDna5?>,&#013;On: <?php echo $dateAddedna5?>">NA</a>
            </td>
            <td>
              <a href="#" class="btn btn-xs btn-<?php echo $smap5 ?>"  id="bis-b_ap2" onclick="<?php if($authority == TRUE || $authoritysm == TRUE){ ?> load(this.id); <?php } ?>" title="Last Modified by <?php echo $modifierIDsmap5?>,&#013;On: <?php echo $dateAddedsmap5?>">AP</a>
              <a href="#" class="btn btn-xs btn-<?php echo $smeu5 ?>"  id="bis-b_eu2" onclick="<?php if($authority == TRUE || $authoritysm == TRUE){ ?> load(this.id); <?php } ?>" title="Last Modified by <?php echo $modifierIDsmeu5?>,&#013;On: <?php echo $dateAddedsmeu5?>">EU</a>
              <a href="#" class="btn btn-xs btn-<?php echo $smna5 ?>"  id="bis-b_na2" onclick="<?php if($authority == TRUE || $authoritysm == TRUE){ ?> load(this.id); <?php } ?>" title="Last Modified by <?php echo $modifierIDsmna5?>,&#013;On: <?php echo $dateAddedsmna5?>">NA</a>
            </td>
            <td><span class="label label-<?php echo $status5 ?>" id="bis-b_status"><?php echo $statusName5 ?></span></td>
            <td><a href="mailto:bbar_approval_request@blackberry.com?subject=Invalid BIS-B SLA Data&body=Please provide details here, such as:%0D%0A %0D%0A %0D%0A• Carrier name: %0D%0A%0D%0A• Incident ticket number: %0D%0A%0D%0A• Date/Times: %0D%0A%0D%0A• Comments/Concerns:" class="btn btn-xs btn-info">Contact</a></td>
          </tr>
        </tbody>
      </table> 
    </div> 
    <span style="float:right;"><i>*In case the service data is no longer valid, send an email to this address.</i></span>
    <p1 style="text-align:left;">
    <button type="button" class="btn btn-default btn" onclick="goToday();" title="Click to visit the most current month available.">
    <span class="glyphicon glyphicon-home"></span>
    </button>    
    
</p>
</div>
</body>
</div>
<script src="includes/jquery-2.0.3.min.js"></script>
<script src="includes/bootstrap.min.js"></script>  <!-- Always put jquery.js BEFORE bootstrap.js  -->
<script src="includes/spin.min.js"></script>
<script src="form-master/jquery.form.js"></script> 
 <script>
 $(document).ready(function(){ // bind 'myForm' and provide a simple callback function 
            $('#myForm').ajaxForm(function(){ 
                location.reload(true);
            }); 
        });
</script>
<script>
if(document.getElementById("newerButton").className == "next disabled"){
   document.getElementById("newerButton").className = "hidden";
}
if(document.getElementById("olderButton").className == "previous disabled"){
   document.getElementById("olderButton").className = "hidden";
}
</script>
<script>
function load(passedID){   
 if(document.getElementById(passedID).className === "btn btn-xs btn-success"){
    document.getElementById(passedID).className = "btn btn-xs btn-danger";
    }
 else if(document.getElementById(passedID).className === "btn btn-xs btn-danger"){
    document.getElementById(passedID).className = "btn btn-xs btn-success";
    }

  if(document.getElementById("relay_ap").className=="btn btn-xs btn-success"&&document.getElementById("relay_eu").className=="btn btn-xs btn-success"
  &&document.getElementById("relay_na").className=="btn btn-xs btn-success"&&document.getElementById("relay_ap2").className=="btn btn-xs btn-success"
  &&document.getElementById("relay_eu2").className=="btn btn-xs btn-success"&&document.getElementById("relay_na2").className=="btn btn-xs btn-success"){
    document.getElementById("relay_status").className="label label-success";
    document.getElementById("relay_status").innerHTML="Approved";
  }else{
  document.getElementById("relay_status").className="label label-danger";
  document.getElementById("relay_status").innerHTML="Not Approved";
  }

  if(document.getElementById("bis-e_ap").className=="btn btn-xs btn-success"&&document.getElementById("bis-e_eu").className=="btn btn-xs btn-success"
  &&document.getElementById("bis-e_na").className=="btn btn-xs btn-success"&&document.getElementById("bis-e_ap2").className=="btn btn-xs btn-success"
  &&document.getElementById("bis-e_eu2").className=="btn btn-xs btn-success"&&document.getElementById("bis-e_na2").className=="btn btn-xs btn-success"){
    document.getElementById("bis-e_status").className="label label-success";
    document.getElementById("bis-e_status").innerHTML="Approved";
  }else{
  document.getElementById("bis-e_status").className="label label-danger";
  document.getElementById("bis-e_status").innerHTML="Not Approved";
  }

  if(document.getElementById("prv_ap").className=="btn btn-xs btn-success"&&document.getElementById("prv_eu").className=="btn btn-xs btn-success"
  &&document.getElementById("prv_na").className=="btn btn-xs btn-success"&&document.getElementById("prv_ap2").className=="btn btn-xs btn-success"
  &&document.getElementById("prv_eu2").className=="btn btn-xs btn-success"&&document.getElementById("prv_na2").className=="btn btn-xs btn-success"){
    document.getElementById("prv_status").className="label label-success";
    document.getElementById("prv_status").innerHTML="Approved";
  }else{
  document.getElementById("prv_status").className="label label-danger";
  document.getElementById("prv_status").innerHTML="Not Approved";
  }

  if(document.getElementById("bbm_ap").className=="btn btn-xs btn-success"&&document.getElementById("bbm_eu").className=="btn btn-xs btn-success"
  &&document.getElementById("bbm_na").className=="btn btn-xs btn-success"&&document.getElementById("bbm_ap2").className=="btn btn-xs btn-success"
  &&document.getElementById("bbm_eu2").className=="btn btn-xs btn-success"&&document.getElementById("bbm_na2").className=="btn btn-xs btn-success"){
    document.getElementById("bbm_status").className="label label-success";
    document.getElementById("bbm_status").innerHTML="Approved";
  }else{
  document.getElementById("bbm_status").className="label label-danger";
  document.getElementById("bbm_status").innerHTML="Not Approved";
  }

  if(document.getElementById("bis-b_ap").className=="btn btn-xs btn-success"&&document.getElementById("bis-b_eu").className=="btn btn-xs btn-success"
  &&document.getElementById("bis-b_na").className=="btn btn-xs btn-success"&&document.getElementById("bis-b_ap2").className=="btn btn-xs btn-success"
  &&document.getElementById("bis-b_eu2").className=="btn btn-xs btn-success"&&document.getElementById("bis-b_na2").className=="btn btn-xs btn-success"){
    document.getElementById("bis-b_status").className="label label-success";
    document.getElementById("bis-b_status").innerHTML="Approved";
  }else{
  document.getElementById("bis-b_status").className="label label-danger";
  document.getElementById("bis-b_status").innerHTML="Not Approved";
  }
// big change
  if(document.getElementById("relay_status").className=="label label-success"&&document.getElementById("bis-e_status").className=="label label-success"&&
    document.getElementById("prv_status").className=="label label-success"&&document.getElementById("bbm_status").className=="label label-success"&&
    document.getElementById("bis-b_status").className=="label label-success"){
    document.getElementById("monthStatus").className="label label-success";
    document.getElementById("monthStatus").innerHTML="Month Approved";
    $.ajax({
      type:"POST",
      url: "email.php",
      success: function(msg){
        // location.reload(true);
      }
    });
  }else{
  document.getElementById("monthStatus").className="label label-danger";
  document.getElementById("monthStatus").innerHTML="Month Not Approved";
  $.ajax({
      type:"POST",
      url: "email2.php",
      success: function(msg){
        // location.reload(true);
      }
    });
  }






   $.ajax({
    type:"POST",
    url: "action.php",
    data: {passedID : passedID}
  });
}
function changeMonth(passedID){
  $.ajax({
    type:"POST",
    url:"changeMonth.php",
    data:{passedID : passedID},
    success: function(msg){
      location.reload(true);
    }
  });
}
function goToday(passedID){
  $.ajax({
    type:"POST",
    url: "goToday.php",
    data:{passedID : passedID},
    success: function(msg){
      location.reload(true);
    }
  });
}  

</script>
</html>