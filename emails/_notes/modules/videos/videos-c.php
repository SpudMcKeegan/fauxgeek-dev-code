<?php
 	
	//Load all videos
	function loadAllVideos(){
		// load records from 'videos'
		$videos = [];
		$query = "SELECT cms_videos. * , cms_users.geek, cms_users.username
				  FROM cms_videos
				  LEFT JOIN cms_users ON cms_videos.videographer = cms_users.num
				  WHERE cms_users.geek =1
				  OR cms_users.video =1
				  ORDER BY cms_videos.createdDate";	

		mysql_query($query) or die('you fucked up');
		$data = mysql_query($query);
		
		while($row = mysql_fetch_assoc($data)){
			array_push($videos, $row);
		}

		return $videos;
	}

?>