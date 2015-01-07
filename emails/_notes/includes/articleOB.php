<?php
	require_once('includes/cms-library.php');
	
	$articlesArr; //Array for article objects
	
	// load records from 'geek_articles'
	list($geek_articlesRecords, $geek_articlesMetaData) = getRecords(array(
		'tableName'   => 'geek_articles',
		'perPage'     => '10',
		'loadUploads' => true,
		'allowSearch' => false,
	));
	
	/*foreach ($geek_articlesRecords as $record){
		//$content, $dateCreated, $writer, $tags, $published, $title, $recordNum
		$article = new article($record['content'], $record['createdDate'], $record['writer'], $record['tags:values'], $record['published:text'], htmlencode($record['title']), $record['num']);
		array_push($articlesArr, $article);
    }*/
?>

<?php
	class article{
		public $content;
		public $dateCreated;
		public $writer;
		public $tags;
		public $published;
		public $title;
		public $recordNum;
		public $imageLarge;
		public $imageSmall;
	
		function __construct($content, $dateCreated, $writer, $tags, $published, $title, $recordNum){
			$this->content = $content;
			$this->dateCreated = formatDate($dateCreated);
			$this->writer = $writer;
			$this->tags = $tags;
			$this->published = $published;
			$this->title = $title;
			$this->recordNum = $recordNum;
		}
		
		function formatDate($dateToChange){
			$newDate = date('l F jS, Y', $dateToChange);
			
			echo $newDate;
			return $newDate;
		}
		
		function displayArticle(){
			$string = "<article class=\"inner-page\">";
			$string .= "<p class=\"title\">$title</p>";
			$string .= "<p class=\"date\">$dateCreated</p>";
			$string .= "<p>$content</p>";
			$string .= "<p><a href=\"articleReader.php?id=$recordNum\">Read More</a>";
			$string .= "</article>";
			
			return($string);
		}
	}
?>