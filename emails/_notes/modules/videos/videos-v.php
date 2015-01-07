<?php
//Stuff to do
//	Section for each preson
// 	include section to right for user details
//  Videos load from youtube api
//  When clicked, loads in lightbox
?>

<?php include('videos-c.php'); ?>

<?php $videos = loadAllVideos(); ?>

<?php //var_dump($videos); ?>
<?php foreach($videos as $vid): ?>
	<div class="span3">
		<a href=""><img src="http://img.youtube.com/vi/<?php echo $vid['youtube_video_id'] ?>/<?php echo $vid['youtube_thumbnail_id'] ?>.jpg" alt="" height="80" width="150"></a>
		<span style="font-size: 10px"><em><?php echo date('F jS, Y, g:i a', strtotime($vid['createdDate'])); ?></span><br />
		<span style="font-size: 10px">Geek: <a href="geeks.php?num=<?php echo $vid['videographer']?>"><?php echo $vid['username']; ?></a></span>
	</div>
<?php endforeach ?>