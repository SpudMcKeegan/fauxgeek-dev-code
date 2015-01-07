<?php
	// Global Vars
	$where = "";
	$num = @$_GET['num'];	
	
	function loadAllGeeks(){
		// load records from 'users'
		list($geeks, $usersMetaData) = getRecords(array(
			'tableName'   => 'users',
			'loadUploads' => true,
			'allowSearch' => false,
			'where'       => 'geek = 1',
		));
		
		$output[0] = $geeks;
		$output[1] = $usersMetaData;
		return $output;
	}
	//Multiple referes to the number of users
	function loadArticlesMultiple($geeks, $metadata){		
		for($i = 0; $i < $metadata["totalRecords"]; $i++){
			$where = "writer = '" . $geeks[$i]['username'] . "'";
			
			list($articles, $geek_stuffMetaData) = getRecords(array(
				'tableName'   => 'geek_stuff',
				'loadUploads' => true,
				'allowSearch' => false,
				'where'       => $where,
				'limit'       => 3,
			));
			
			$articlesByUser[$geeks[$i]['username']] = $articles;
		}
		
		return $articlesByUser;
	}
	
	//Single referes to the number of users
	function loadArticlesSingle($geek){		
		$articlesByUser = array();
		$where = "writer = '" . $geek['num'] . "' AND published = 1";
		
		list($articles, $geek_stuffMetaData) = getRecords(array(
			'tableName'   => 'geek_stuff',
			'loadUploads' => true,
			'allowSearch' => false,
			'where'       => $where,
			'limit'       => 5,
		));
		
		return $articles;
	}
	
	function loadGeek($num){
		// load records from 'users'
		list($geek, $usersMetaData) = getRecords(array(
			'tableName'   => 'users',
			'loadUploads' => true,
			'allowSearch' => false,
			'where'       => 'num = \'' . $num . '\'',
		));
		$geek = $geek[0];
		
		return $geek;
	}
?>