<?php
//Stuff to do
//	Section for each preson
// 	include section to right for user details
//  Videos load from youtube api
//  When clicked, loads in lightbox
?>
<script type="text/javascript" src="http://gdata.youtube.com/feeds/users/stefanynunchucks/uploads?v=2&alt=json-in-script&format=5&callback=showMyVideos"></script>
<script>
	function showMyVideos(data) {
			var feed = data.feed;
			var entries = feed.entry || [];
			var html = ['<ul>'];
			for (var i = 0; i < entries.length; i++) {
			var entry = entries[i];
			var title = entry.title.$t;
			html.push('<li>', title, '</li>');
		}
		html.push('</ul>');
		document.getElementById('videos').innerHTML = html.join('');
	}
</script>

<?php include('videos-c.php'); ?>

<?php $videos = loadAllVideos(); ?>
<div class="row-fluid">
	<?php //var_dump($videos); ?>
	<?php foreach($videos as $vid): ?>
		<div class="span3">
			<a href=""><img src="http://img.youtube.com/vi/<?php echo $vid['youtube_video_id'] ?>/<?php echo $vid['youtube_thumbnail_id'] ?>.jpg" alt="" height="80" width="150"></a>
			<span style="font-size: 10px"><em><?php echo date('F jS, Y, g:i a', strtotime($vid['createdDate'])); ?></em></span><br />
			<span style="font-size: 10px">Geek: <a href="geeks.php?num=<?php echo $vid['videographer']?>"><?php echo $vid['username']; ?></a></span>
		</div>
	<?php endforeach ?>
</div>

<div class="row-fluid" id="videos">

</div>