<?php
	require_once('includes/cms-library.php');
	
	list($records, $recordsMetaData) = getRecords(array(
		'tableName'   => 'geek_stuff',
		'loadUploads' => true,
		'allowSearch' => false,
		'where'       => 'subject = \'Movies\' AND published = 1',
	));
	
	$display_string = "";
	
	// Insert a new row in the table for each person returned
	foreach($records as $re){
		$display_string .= "<article class=\"front-page\">";
		$display_string .= "<p>" . $re['subject'] . "</p>";
		$display_string .= "</article>";
	}
	
	echo $display_string;
?>