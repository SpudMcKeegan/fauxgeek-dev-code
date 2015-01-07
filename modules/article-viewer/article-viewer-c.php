<?php
	$which = $_GET['num'];
	$articleWhere = "num = $which";
	$commentsWhere = "article = $which";
	
	// load record from 'geek_stuff'
	list($article, $articleMetaData) = getRecords(array(
		'tableName'   => 'geek_stuff',
		'where'       => $articleWhere,
		'loadUploads' => true,
		'allowSearch' => false,
		'limit'       => '1',
	));
	$article = @$article[0]; // get first record
	
	list($comments, $commentsMetaData) = getRecords(array(
		'tableName'   => 'comments',
		'where'       => $commentsWhere,
		'loadUploads' => true,
		'allowSearch' => false,
	));
	
	function constructHREF($user){
		$whereHREF = "num = " . (int)$user;
		
		list($writer, $userMetaData) = getRecords(array(
			'tableName'   => 'users',
			'where'       => $whereHREF,
			'loadUploads' => true,
			'allowSearch' => false,
			'limit'       => '1',
		));
		$writer = @$writer[0];
		
		$display_string = "<a href=\"";
		
		if($writer['geek'] == 1){
			$display_string .= "the-geeks.php?num=";
		}else{
			$display_string .= "users.php?num=";
		}
		
		$display_string .= $writer['num'] . "\">" . $writer['username'] . "</a>";
		return $display_string;
	}
?>