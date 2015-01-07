<?php	
	require_once('../../includes/cms-library.php');
	
	//Grabs users that are geeks because I suck at sql
	list($geeks, $geeksMetaData) = getRecords(array(
		'tableName'   => 'users',
		'loadUploads' => true,
		'allowSearch' => false,
		'where'       => "geek = 1",
	));
	
	//Setting things.
	$next = intval($_GET['next']);
	$subject = $_GET['subject'];
	$view = $_GET['view'];
	$display_string = "";
	$columnCount = 1;	
	$offset = 0;
	$or = array();
	
	
	// Builds where clause
	// ifelse  - Decides if it needs to have a subject and/or if it's just published
	// foreach - Builds the OR parts of the array based on writer (concatenated with the ifelse)
	// $where  - Builds the where clause buy concatenating all the ors
	if($subject == 'all'){$pub = 'published = 1';}else{$pub = 'subject = \'' . $subject . '\' AND published = 1';}
	foreach($geeks as $g){array_push($or, "(writer = '" . $g['num'] . "' AND " . $pub . ")");}
	$where = implode(" OR ", $or);
	
	//Builds offset based on how many times this has been called.
	for($i = $next; $i > 0; $i--){$offset = $offset + 9;}
	
	//Get the articles from the database based on the where string built above
	list($records, $recordsMetaData) = getRecords(array(
		'tableName'   => 'geek_stuff',
		'loadUploads' => true,
		'allowSearch' => false,
		'limit'       => '9',
		'offset' 	  => $offset,
		'where'       => $where,
	));
	
	//Decided which class the article container will be.
	//if($view == "main"){$view = "article-main";}else{$view = "article-sub";}
	$view = "article-main";
	//Builds output
	foreach($records as $re){
		//checks the writername vs all geeks to get current article writers id
		foreach($geeks as $g){
			if($g['num'] == $re['writer']){
				$num = $g['num'];
			}
		}
		
		if($columnCount == 1){$display_string .= "<div class=\"row-fluid\">";}
		
		$display_string .= "<div class=\"span4 " . $view . "\">";
		foreach ($re['story_image'] as $index => $upload){
			$display_string .= "<a href=\"article-viewer.php?num=" . $re['num'] . "&subject=" . $re['subject'] . "\"><div class=\"article-image\" style=\"background-image:url(" . $upload['urlPath'] . "); background-position: center; \"></div></a>";
        }
		$display_string .= "<div class=\"article-text\">";
		$display_string .= "<h4 class=\"\"><a href=\"article-viewer.php?num=" . $re['num'] . "&subject=" . $re['subject'] . "\">" . $re['title'] . "</a></h4>";
		$display_string .= "<p>" . blurbify($re['content']) . " <a href=\"article-viewer.php?num=" . $re['num'] . "&subject=" . $re['subject'] . "\">read more</a></p>";
		$display_string .= "<div class=\"posted\"><p>Posted by: <a href=\"the-geeks.php?num=" . $num . "\">" . $re['writer:label'] . "</a> on " . date('F jS, Y', strtotime($re['createdDate'])) . "</p></div>";
		$display_string .= "</div>";
		$display_string .= "</div>";
		if($columnCount == 3){$display_string .= "</div>"; $columnCount = 1;}else{$columnCount++;}
	}
	
	//$display_string .= "<div class=\"hidden-record-num\">".$recordsMetaData['totalRecords']."</div>";
	
	echo $display_string;
	
	//Cuts out the first 30 words of the article to make the blurb.
	function blurbify($article){
		$articleWords = explode(" ", getFirstPara($article));
		$blurb = "";
		array_splice($articleWords, 26);

		foreach($articleWords as $word){
			$blurb .= $word . " ";
		}
		
		return $blurb;
	}

	function getFirstPara($string){
        $string = substr($string,0, strpos($string, "</p>")+4);
        return $string;
    }
?>