<!-- MAILING FUNCITONALITY IS ALSO INCLUDED HERE!!!!!!!!!!!!!!!!!! -->
<!-- MAILING FUNCITONALITY IS ALSO INCLUDED HERE!!!!!!!!!!!!!!!!!! -->
<!-- MAILING FUNCITONALITY IS ALSO INCLUDED HERE!!!!!!!!!!!!!!!!!! -->
<!-- MAILING FUNCITONALITY IS ALSO INCLUDED HERE!!!!!!!!!!!!!!!!!! -->

<?php
	if($ap == "success" && $eu == "success" && $na == "success" && $smap == "success" && $smeu == "success" && $smna == "success"){
		$status = "success";
		$statusName = "Approved";
	}else{
		$status = "danger";
		$statusName = "Not Approved";
	}
	if($ap2 == "success" && $eu2 == "success" && $na2 == "success" && $smap2 == "success" && $smeu2 == "success" && $smna2 == "success"){
		$status2 = "success";
		$statusName2 = "Approved";
	}else{
		$status2 = "danger";
		$statusName2 = "Not Approved";
	}
	if($ap3 == "success" && $eu3 == "success" && $na3 == "success" && $smap3 == "success" && $smeu3== "success" && $smna3 == "success"){
		$status3 = "success";
		$statusName3 = "Approved";
	}else{
		$status3 = "danger";
		$statusName3 = "Not Approved";
	}

	if($ap4 == "success" && $eu4 == "success" && $na4 == "success" && $smap4 == "success" && $smeu4 == "success" && $smna4 == "success"){
		$status4 = "success";
		$statusName4 = "Approved";
	}else{
		$status4 = "danger";
		$statusName4 = "Not Approved";
	}
	if($ap5 == "success" && $eu5 == "success" && $na5 == "success" && $smap5 == "success" && $smeu5 == "success" && $smna5 == "success"){
		$status5 = "success";
		$statusName5 = "Approved";
	}else{
		$status5 = "danger";
		$statusName5 = "Not Approved";
	}







	if($status == "success" && $status2 == "success" && $status3 == "success" && $status4 == "success" && $status5 == "success"){

		$monthStatus = "success";
		$monthStatusName = "Month Approved"; 
	}else{
		$monthStatus = "danger";
		$monthStatusName = "Month Not Approved";
	}	












	if(!($n == 0 && $yearIndex == 2015)){
		$previous = "previous";
	}else{
		$previous = "previous disabled";	
	}

	if(!($n+2 == $dm && $yearIndex == $dy)){
		$next = "next";
	}else{
		$next = "next disabled";
	}
?>