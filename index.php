<!DOCTYPE html><HTML lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="favicon.ico">
	<title>BBAR REPORT</title>
	<link href="includes/styles.css" rel="stylesheet">
	<link href="includes/iframe.css" rel="stylesheet">
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
</head>
<body>
	<?php include('navbar.php');?>
	<div class="container">
		<div class="alert alert-dismissable alert-success">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<h4>Welcome!</h4>
			<p>You have arrived at the new BBAR client interface.  Make your selection by using the dropdown boxes below.</p>
			<p>Looking for carrier-level detail?  Use the menu above to choose the Advanced client or <a href="http://ciokmp001cnc:8080/bbar/client/"/>click here</a>.</p>
		</div>	
		<div>
			<form action="" onsubmit="return false">
				<div class="col-md-4"><select name='List1' id="List1" onchange="fillSelect(this.value, this.form['List2'])" class="form-control">
					<option selected>Select a Category: </option>
				</select> &nbsp;</div>
				<div class="col-md-4"><select name='List2' id="List2" onchange="fillSelect(this.value, this.form['List3'])" class="form-control">
					<option selected>Select a Service: </option>
				</select> &nbsp;</div>
				<div class="col-md-4"><select name='List3' id="List3" class="form-control">
					<option selected>Select a Report Type: </option>
				</select> &nbsp;</div>
			</form>
		</div>
	</div>
	<div style="text-align: center;">
		<p> Start Date: &nbsp<input type="text" id="FromMonth" value="<?php
		$date = new DateTime();
		if($date->format('d') <= 9){
			$date->modify('-1 month');
			echo $date->format('Y-m-01');
		}else{
			echo $date->format('Y-m-01');
		}
		?>"> &nbsp &nbsp 
		End Date: &nbsp <input type="text" id="ToMonth" value="<?php 
		$date = new DateTime();
		if($date->format('d') <= 9){
			$date->modify('-1 month');
			echo $date->format('Y-m-t');
		}else{
			echo $date->format('Y-m-t');	
		}		
		?>">
		</p>
		</div>
		<div style="text-align: center">
		<button onclick="getValues()" type="button" class="btn btn-info">Generate Report</button>
		</div>
		<br>
		<div style="text-align: center">
		<iframe id="myiFrame" name="myiFrame" src="" style='background: white; display: none;' frameborder="5" width="70%" height="655"></iframe>
		</div>
		<br>
	</body>
	<script type="text/javascript" src="includes/jquery-2.0.3.min.js"></script>
	<script type="text/javascript" src="includes/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.10.2.js"></script>
	<script type="text/javascript" src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script type="text/javascript" src="moment.js"></script>
	<script type="text/javascript">
var categories = [];
<?php include('includes/categories.js');?>
var nLists = 3; // number of lists in the set 

function fillSelect(currCat,currList){
	var step = Number(currList.name.replace(/\D/g,""));
	for (i=step; i<nLists+1; i++){
		document.forms[0]['List'+i].length = 1;
		document.forms[0]['List'+i].selectedIndex = 0;
		// document.getElementById('List'+i).style.display = 'none'; // this will hide the boxes following the previous, filled box.
	}
	var nCat = categories[currCat];
	if (nCat != undefined){
		document.getElementById('List'+step).style.display = 'inline';
		for (each in nCat){
			var nOption = document.createElement('option');
			var nData = document.createTextNode(nCat[each]);
			nOption.setAttribute('value',nCat[each]);
			nOption.appendChild(nData);
			currList.appendChild(nOption);
		}
	} 
}
	$(document).ready(function(){
		$('#FromMonth').datepicker({
			dateFormat: "yy-mm-dd"
		});
		$('#ToMonth').datepicker({
			dateFormat: "yy-mm-dd"
		});
	});
function getValues(){	
	document.getElementById('myiFrame').style.display = 'inline'	
	var str = '';
	str += document.getElementById('List1').value + '\n';
	for (var i = 2; i <= nLists; ++i){
		if(document.getElementById('List' + i).selectedIndex != 0){
			str += document.getElementById('List' + i).value + '\n';
		}
	}
	// if(document.getElementById('List4').selectedIndex != 0){
	var fromDate = $('#FromMonth').datepicker({ dateFormat: 'yy-mm-dd' }).val();
	var toDate = $('#ToMonth').datepicker({ dateFormat: 'yy-mm-dd' }).val();
	var boxTwo = document.getElementById('List2').value;
	var boxThree = document.getElementById('List3').value;
	if(document.getElementById('List2').value == 'BIS-B')
		boxTwo = 'bisb';
	if(document.getElementById('List2').value == 'BIS-E')
		boxTwo = 'bis'; 
	if(document.getElementById('List2').value == 'BBM_BBOS_Messaging_Only')
		boxTwo = 'BBM_EXT_MSG'; 
	if(document.getElementById('List2').value == 'TSM-MTSI')
		boxTwo = 'tsm_mtsi'; 
	if(document.getElementById('List2').value == 'TSM-Root')
		boxTwo = 'TSM_Root'; 
	if(document.getElementById('List2').value == 'TSM-SPTD')
		boxTwo = 'tsm_sptd'; 
	if(document.getElementById('List2').value == 'BBM')
		boxTwo = 'BBM_FULL_ALASKA&services%5B%5D=BBM_FULL_BB10&services%5B%5D=BBM_FULL_BBOS'; 
	if(document.getElementById('List2').value == 'Device_Services')
		boxTwo = 'DEVICE_BB10&services%5B%5D=DEVICE_BBOS&services%5B%5D=DEVICE_MULTI'; 
	if(document.getElementById('List2').value == 'Enterprise')
		boxTwo = 'ENTERPRISE_BB10&services%5B%5D=ENTERPRISE_BBOS&services%5B%5D=ENTERPRISE_CONTRAIL';	
	if(document.getElementById('List2').value == 'SES-BB_Signing_Service_Resource')
		boxTwo = 'SES_SIGNING_SVC';
	if(document.getElementById('List2').value == 'SES-BBM_Channels')
		boxTwo = 'RESOURCE-19790';
	if(document.getElementById('List2').value == 'SES-BBM_Core')
		boxTwo = 'RESOURCE-19788';
	if(document.getElementById('List2').value == 'SES-BCP_Resource')
		boxTwo = 'SES_BCP';
	if(document.getElementById('List2').value == 'SES-BES_NG_and_Hosted')
		boxTwo = 'RESOURCE-19808';
	if(document.getElementById('List2').value == 'SES-BES10_Cloud_Resource')
		boxTwo = 'SES_BESNG';
	if(document.getElementById('List2').value == 'SES-BES12 Resource')
		boxTwo = 'SES_BES12';
	if(document.getElementById('List2').value == 'SES-BPDS')
		boxTwo = 'RESOURCE-19801';
	if(document.getElementById('List2').value == 'SES-BlackBerry_ID')
		boxTwo = 'RESOURCE-19786';
	if(document.getElementById('List2').value == 'SES-BlackBerry_Traffic')
		boxTwo = 'RESOURCE-19810';
	if(document.getElementById('List2').value == 'SES-BlackBerry_World')
		boxTwo = 'RESOURCE-19787';
	if(document.getElementById('List2').value == 'SES-BlackBery_Internet_Service_Email')
		boxTwo = 'RESOURCE-19809';
	if(document.getElementById('List2').value == 'SES-Blackberry_Guardian')
		boxTwo = 'RESOURCE-22014';
	if(document.getElementById('List2').value == 'SES-CCL/DAI')
		boxTwo = 'RESOURCE-19805';
	if(document.getElementById('List2').value == 'SES-CCSP_Resource')
		boxTwo = 'SES_CCSP';
	if(document.getElementById('List2').value == 'SES-Cloud_Services_Resource')
		boxTwo = 'SES_BBCS';
	if(document.getElementById('List2').value == 'SES-Discovery_Resource')
		boxTwo = 'SES_DISCOVERY';
	if(document.getElementById('List2').value == 'SES-ELM_Resource')
		boxTwo = 'SES_ELM';
	if(document.getElementById('List2').value == 'SES-Enterprise_BlackBerry_ID-eBBID')
		boxTwo = 'RESOURCE-22816';
	if(document.getElementById('List2').value == 'SES-ION')
		boxTwo = 'RESOURCE-22829';
	if(document.getElementById('List2').value == 'SES-Intersect')
		boxTwo = 'RESOURCE-19784';
	if(document.getElementById('List2').value == 'SES-OTASL')
		boxTwo = 'RESOURCE-19800';
	if(document.getElementById('List2').value == 'SES-Olympia')
		boxTwo = 'RESOURCE-19793';
	if(document.getElementById('List2').value == 'SES-Provisioning')		
		boxTwo = 'RESOURCE-19782';
	if(document.getElementById('List2').value == 'SES-Relay')
		boxTwo = 'RESOURCE-19777';
	if(document.getElementById('List2').value == 'SES-SDAAA')
		boxTwo = 'RESOURCE-19779';
	if(document.getElementById('List2').value == 'SES-SLS')
		boxTwo = 'RESOURCE-19802';
	if(document.getElementById('List2').value == 'SES-Secure Workspace Resource')
		boxTwo = 'SES_UDS';
	if(document.getElementById('List2').value == 'SES-TSM')
		boxTwo = 'RESOURCE-19783';
	if(document.getElementById('List2').value == 'SES-UCI')
		boxTwo = 'RESOURCE-19789';
	if(document.getElementById('List3').value == 'Regional_Availability')
		boxThree = 'by-region';
	if(document.getElementById('List3').value == 'Ticket_List')
		boxThree = 'tickets';
	if(document.getElementById('List3').value == 'Availability')
		boxThree = 'total';
	if(document.getElementById('List3').value == 'GMpS_by_Subservice')
		boxThree = 'combined-total-subscriber-minutes-by-subservice';
	if(document.getElementById('List3').value == 'GMpS_by_Resource')
		boxThree = 'combined-total-subscriber-minutes-by-resource';
	if(document.getElementById('List3').value == 'Subservices_Availability')
		boxThree = 'combined-total-subservices';
	if(document.getElementById('List3').value == 'GMpS')
		boxThree = 'combined-total-subscriber-minutes';
	if(document.getElementById('List3').value == 'SLA_Impacting_Tickets')
		boxThree = 'sla-tickets';
	if(document.getElementById('List3').value == 'Impacted_Carriers')
		boxThree = 'impacts';
	if(document.getElementById('List3').value == 'SLA_Warnings')
		boxThree = 'warnings';
	var result = "http://ciokmp001cnc:8080/bbar/public/calculate.py?from=" + fromDate + "&to=" + toDate
	+ "&services%5B%5D=" + boxTwo
	+ "&reports%5B%5D=" + boxThree + "&format=" + "html" + "&go=Go%21";
	document.getElementById("myiFrame").src = result;
}
function init(){
	fillSelect('startList',document.forms[0]['List1']);
}
navigator.appName == "Microsoft Internet Explorer"
? attachEvent('onload', init, false): addEventListener('load', init, false);
</script>
</html>
<!-- <style type="text/css">
.DDlist { display:none; }
</style> 
 -->