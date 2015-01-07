<?php		
	//Single referes to the number of users
	function loadArticleSingle($num){		
		$where = 'num = \'' . $num . '\'';
		
		list($article, $user_stuffMetaData) = getRecords(array(
			'tableName'   => 'geek_stuff',
			'loadUploads' => true,
			'allowSearch' => false,
			'where'       => $where,
			'limit'       => 1,
		));
		
		return $article[0];
	}
	
	//Load all articles
	// 1 = published
	// 0,2-9 = Not published
	function loadArticles($pub, $sortby){		
		$articles = array();
		
		$query = "SELECT cms_geek_stuff.*, cms_users.geek, cms_users.username FROM cms_geek_stuff LEFT JOIN cms_users ON cms_geek_stuff.writer = cms_users.num WHERE cms_users.geek = 1 AND published = $pub ORDER BY $sortby";
		$data = mysql_query($query);
		
		while($row = mysql_fetch_assoc($data)){
			array_push($articles, $row);
		}
		
		return $articles;
	}
	
	function getSubjects(){
		list($subjects, $subjects) = getRecords(array(
			'tableName'   => 'subject',
			'loadUploads' => true,
			'allowSearch' => false,
		));
		
		return $subjects;
	}
	
	function updateEditedArticle(){
		$num = $_GET['num'];
		
		$query = "UPDATE `cms_geek_stuff` SET
				 `updatedDate` = NOW(),
				 `title` = '" . mysql_escape($_POST['title']) . "',
				 `content` = '" . mysql_escape($_POST['content']) . "',
				 `subject` = '" . mysql_escape($_POST['subject']) . "',
				 `published` = '" . mysql_escape($_POST['published']) . "'
				WHERE num = " . $num . ";";		
		mysql_query($query) or die('you fucked up');
	}
?>