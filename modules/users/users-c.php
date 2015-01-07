<?php
	// Global Vars
	$where = "";
	$num = @$_GET['num'];	
	
	function loadAllUsers(){
		// load records from 'users'
		list($users, $usersMetaData) = getRecords(array(
			'tableName'   => 'users',
			'loadUploads' => true,
			'allowSearch' => false,
			'where'       => 'geek = 0',
		));
		
		$output[0] = $users;
		$output[1] = $usersMetaData;
		return $output;
	}
	
	//Multiple referes to the number of users
	function loadArticlesMultiple($users, $metadata){		
		for($i = 0; $i < $metadata["totalRecords"]; $i++){
			$where = 'writer = \'' . $users[$i]['username'] . '\'';
			
			list($articles, $user_stuffMetaData) = getRecords(array(
				'tableName'   => 'geek_stuff',
				'loadUploads' => true,
				'allowSearch' => false,
				'where'       => $where,
				'limit'       => 3,
			));
			
			$articlesByUser[$users[$i]['username']] = $articles;
		}
		
		return $articlesByUser;
	}
	
	//Single referes to the number of users
	function loadArticlesSingle($user){		
		$articlesByUser = array();
		$where = 'writer = \'' . $user['username'] . '\'';
		
		list($articles, $user_stuffMetaData) = getRecords(array(
			'tableName'   => 'geek_stuff',
			'loadUploads' => true,
			'allowSearch' => false,
			'where'       => $where,
			'limit'       => 5,
		));
		
		return $articles;
	}
	
	function loadUser($num){
		// load records from 'users'
		list($user, $usersMetaData) = getRecords(array(
			'tableName'   => 'users',
			'loadUploads' => true,
			'allowSearch' => false,
			'where'       => 'num = \'' . $num . '\'',
			'limit'       => 1,
		));
		$user[0];
		
		return $user[0];
	}
?>