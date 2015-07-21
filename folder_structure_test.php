<?php

$year = date("Y");
$month = date("m");

$structure = './data/'.$year.'/'.$month.'/';

if (file_exists($structure)) {
    echo "The structure '$structure' exists, no need for a new directory!";
} else {
    echo "The structure '$structure' does not exist, let's make one...\n";
	if (!mkdir($structure, 0777, true)) {
		die('...failed to create folders :(');
	}
	else {
		echo '...done! :)';
	}
}


?>