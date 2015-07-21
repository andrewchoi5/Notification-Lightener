<?php

	//build the dates
	
	$toDate = date("Y-m-d", mktime(0, 0, 0, date("m"), 0, date("Y")));
	$fromDate = date("Y-m-d", mktime(0, 0, 0, date("m")-1, 1, date("Y")));
	$todaysDate = date("Y-m-d");
	$year = date("Y");
	$month = date("m");
	$day = date("d");

	//////lets do some folder structure stuff
	$structure = './data/'.$year.'/'.$month.'/'.$day.'/';

	//ensure that we have the right folder structure
	if (file_exists($structure)) {
		echo "The structure '$structure' exists, no need for a new directory!\n";
	} else {
		echo "The structure '$structure' does not exist, let's make one...";
		if (!mkdir($structure, 0777, true)) {
			die('...failed to create folders :(');
		}
		else {
			echo '...done! :)';
		}
	}

	//we need BBM, device, and enterprise versions in json and csv for GMpS, subservices, and regional availability.
	
	//GMpS
	//http://ciokmq001cnc:8080/bbar/public/calculate.py?from=2014-11-01&to=2014-11-30&services=BBM_FULL_ALASKA&services=BBM_FULL_BB10&services=BBM_FULL_BBOS&reports=combined-total-subscriber-minutes&format=HTML&go=Go%21
	//Subservices
	//http://ciokmq001cnc:8080/bbar/public/calculate.py?from=2014-11-01&to=2014-11-30&services=BBM_FULL_ALASKA&services=BBM_FULL_BB10&services=BBM_FULL_BBOS&reports=combined-subservices&format=HTML&go=Go%21
	//Rollup
	//http://ciokmq001cnc:8080/bbar/public/calculate.py?from=2014-11-01&to=2014-11-30&services=BBM_FULL_ALASKA&services=BBM_FULL_BB10&services=BBM_FULL_BBOS&reports=combined&format=HTML&go=Go%21
	
	//beginning of URL to retrieve
	$urlStart = "http://ciokmq001cnc:8080/bbar/public/calculate.py?from=";
	
	//report formats
	$urlGMPS = "&reports=combined-total-subscriber-minutes&format";
	$urlSubServices = "&reports=combined-subservices";
	$urlRollup = "&reports=combined";
	
	//file formats
	$urlCSV = "&format=CSV";
	$urlJSON = "&format=JSON";
	
	$urlGo= "&go=Go%21";
	
	//BBM
	$servicesBBM = "&services=BBM_FULL_ALASKA&services=BBM_FULL_BB10&services=BBM_FULL_BBOS";
	//Enterprise
	$servicesEnt = "&services=ENTERPRISE_BB10&services=ENTERPRISE_BBOS&services=ENTERPRISE_CONTRAIL&services=ENTERPRISE_MULTI";
	//Devices
	$servicesDvc = "&services=DEVICE_BB10&services=DEVICE_BBOS&services=DEVICE_MULTI";
	
	//build URL's
	
	$jsonGMPSBBM = $urlStart.$fromDate.'&to='.$toDate.$servicesBBM.$urlGMPS.$urlJSON;
	$jsonGMPSBBMFile = 'jsonGMPSBBM-'.$fromDate.'-'.$toDate.'-'.$todaysDate.'.json';
	file_put_contents($structure.$jsonGMPSBBMFile, file_get_contents($jsonGMPSBBM));
	echo $jsonGMPSBBMFile.' created!\n';
	
	echo "...Sleeping...";
	sleep(10);
	
	$csvGMPSBBM = $urlStart.$fromDate.'&to='.$toDate.$servicesBBM.$urlGMPS.$urlCSV;	
	$csvGMPSBBMFile = 'csvGMPSBBM-'.$fromDate.'-'.$toDate.'-'.$todaysDate.'.csv';
	file_put_contents($structure.$csvGMPSBBMFile, file_get_contents($csvGMPSBBM));
	echo $csvGMPSBBMFile.' created!\n';
	
	echo "...Sleeping...";
	sleep(10);
	
	$jsonGMPSEnt = $urlStart.$fromDate.'&to='.$toDate.$servicesEnt.$urlGMPS.$urlJSON;	
	$jsonGMPSEntFile = 'jsonGMPSEnt-'.$fromDate.'-'.$toDate.'-'.$todaysDate.'.json';
	file_put_contents($structure.$jsonGMPSEntFile, file_get_contents($jsonGMPSEnt));
	echo $jsonGMPSEntFile.' created!\n';
	
	echo "...Sleeping...";
	sleep(10);
	
	$csvGMPSEnt = $urlStart.$fromDate.'&to='.$toDate.$servicesEnt.$urlGMPS.$urlCSV;	
	$csvGMPSEntFile = 'csvGMPSEnt-'.$fromDate.'-'.$toDate.'-'.$todaysDate.'.csv';
	file_put_contents($structure.$csvGMPSEntFile, file_get_contents($csvGMPSEnt));
	echo $csvGMPSEntFile.' created!\n';
	
	echo "...Sleeping...";	
	sleep(10);
	
	$jsonGMPSDvc = $urlStart.$fromDate.'&to='.$toDate.$servicesDvc.$urlGMPS.$urlJSON;	
	$jsonGMPSDvcFile = 'jsonGMPSDvc-'.$fromDate.'-'.$toDate.'-'.$todaysDate.'.json';
	file_put_contents($structure.$jsonGMPSDvcFile, file_get_contents($jsonGMPSDvc));
	echo $jsonGMPSDvcFile.' created!\n';
	
	echo "...Sleeping...";
	sleep(10);
	
	$csvGMPSDvc = $urlStart.$fromDate.'&to='.$toDate.$servicesDvc.$urlGMPS.$urlCSV;	
	$csvGMPSDvcFile = 'csvGMPSDvc-'.$fromDate.'-'.$toDate.'-'.$todaysDate.'.csv';
	file_put_contents($structure.$csvGMPSDvcFile, file_get_contents($csvGMPSDvc));
	echo $csvGMPSDvcFile.' created!\n';
	
	echo "...Sleeping...";
	sleep(10);
	
	$jsonSSBBM = $urlStart.$fromDate.'&to='.$toDate.$servicesBBM.$urlSubServices.$urlJSON;	
	$jsonSSBBMFile = 'jsonSSBBM-'.$fromDate.'-'.$toDate.'-'.$todaysDate.'.json';
	file_put_contents($structure.$jsonSSBBMFile, file_get_contents($jsonSSBBM));
	echo $jsonSSBBMFile.' created!\n';
	
	echo "...Sleeping...";
	sleep(10);
	
	$csvSSBBM = $urlStart.$fromDate.'&to='.$toDate.$servicesBBM.$urlSubServices.$urlCSV;	
	$csvSSBBMFile = 'csvSSBBM-'.$fromDate.'-'.$toDate.'-'.$todaysDate.'.csv';
	file_put_contents($structure.$csvSSBBMFile, file_get_contents($csvSSBBM));
	echo $csvSSBBMFile.' created!\n';
	
	echo "...Sleeping...";
	sleep(10);
	
	$jsonSSEnt = $urlStart.$fromDate.'&to='.$toDate.$servicesEnt.$urlSubServices.$urlJSON;	
	$jsonSSEntFile = 'jsonSSEnt-'.$fromDate.'-'.$toDate.'-'.$todaysDate.'.json';
	file_put_contents($structure.$jsonSSEntFile, file_get_contents($jsonSSEnt));
	echo $jsonSSEntFile.' created!\n';
	
	echo "...Sleeping...";
	sleep(10);
	
	$csvSSEnt = $urlStart.$fromDate.'&to='.$toDate.$servicesEnt.$urlSubServices.$urlCSV;	
	$csvSSEntFile = 'csvSSEnt-'.$fromDate.'-'.$toDate.'-'.$todaysDate.'.csv';
	file_put_contents($structure.$csvSSEntFile, file_get_contents($csvSSEnt));
	echo $csvSSEntFile.' created!\n';
	
	echo "...Sleeping...";
	sleep(10);
	
	$jsonSSDvc = $urlStart.$fromDate.'&to='.$toDate.$servicesDvc.$urlSubServices.$urlJSON;	
	$csvGMPSBBMFile = 'jsonSSDvc-'.$fromDate.'-'.$toDate.'-'.$todaysDate.'.json';
	file_put_contents($structure.$csvGMPSBBMFile, file_get_contents($jsonSSDvc));
	echo $csvGMPSBBMFile.' created!\n';
	
	echo "...Sleeping...";
	sleep(10);
	
	$csvSSDvc = $urlStart.$fromDate.'&to='.$toDate.$servicesDvc.$urlSubServices.$urlCSV;	
	$jsonSSDvcFile = 'csvGMPSBBM-'.$fromDate.'-'.$toDate.'-'.$todaysDate.'.csv';
	file_put_contents($structure.$jsonSSDvcFile, file_get_contents($csvGMPSBBM));
	echo $jsonSSDvcFile.' created!\n';
	
	echo "...Sleeping...";
	sleep(10);
	
	$jsonRollupBBM = $urlStart.$fromDate.'&to='.$toDate.$servicesBBM.$urlRollup.$urlJSON;	
	$jsonRollupBBMFile = 'jsonRollupBBM-'.$fromDate.'-'.$toDate.'-'.$todaysDate.'.json';
	file_put_contents($structure.$jsonRollupBBMFile, file_get_contents($jsonRollupBBM));
	echo $jsonRollupBBMFile.' created!\n';
	
	echo "...Sleeping...";
	sleep(10);
	
	$csvRollupBBM = $urlStart.$fromDate.'&to='.$toDate.$servicesBBM.$urlRollup.$urlCSV;	
	$csvRollupBBMFile = 'csvRollupBBM-'.$fromDate.'-'.$toDate.'-'.$todaysDate.'.csv';
	file_put_contents($structure.$csvRollupBBMFile, file_get_contents($csvRollupBBM));
	echo $csvRollupBBMFile.' created!\n';
	
	echo "...Sleeping...";
	sleep(10);
	
	$jsonRollupEnt = $urlStart.$fromDate.'&to='.$toDate.$servicesEnt.$urlRollup.$urlJSON;	
	$jsonRollupEntFile = 'jsonRollupEnt-'.$fromDate.'-'.$toDate.'-'.$todaysDate.'.json';
	file_put_contents($structure.$jsonRollupEntFile, file_get_contents($jsonRollupEnt));
	echo $jsonRollupEntFile.' created!\n';
	
	echo "...Sleeping...";
	sleep(10);
	
	$csvRollupEnt = $urlStart.$fromDate.'&to='.$toDate.$servicesEnt.$urlRollup.$urlCSV;	
	$csvRollupEntFile = 'csvRollupEnt-'.$fromDate.'-'.$toDate.'-'.$todaysDate.'.csv';
	file_put_contents($structure.$csvRollupEntFile, file_get_contents($csvRollupEnt));
	echo $csvRollupEntFile.' created!\n';
	
	echo "...Sleeping...";
	sleep(10);
	
	$jsonRollupDvc = $urlStart.$fromDate.'&to='.$toDate.$servicesDvc.$urlRollup.$urlJSON;	
	$jsonRollupDvcFile = 'jsonRollupDvc-'.$fromDate.'-'.$toDate.'-'.$todaysDate.'.json';
	file_put_contents($structure.$jsonRollupDvcFile, file_get_contents($jsonRollupDvc));
	echo $jsonRollupDvcFile.' created!\n';
	
	echo "...Sleeping...";
	sleep(10);
	
	$csvRollupDvc = $urlStart.$fromDate.'&to='.$toDate.$servicesDvc.$urlRollup.$urlCSV;	
	$csvRollupDvcFile = 'csvRollupDvc-'.$fromDate.'-'.$toDate.'-'.$todaysDate.'.csv';
	file_put_contents($structure.$csvRollupDvcFile, file_get_contents($csvRollupDvc));
	echo $csvRollupDvcFile.' created!\n';

?>