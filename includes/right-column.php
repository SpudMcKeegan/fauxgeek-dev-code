<div class="row-fluid">
	<div class="span12 well">
		<div class="title-box purple">
			Newest Video
		</div>
		<div class="new-video"><iframe width="330" height="186" src="//www.youtube.com/embed/vag1GzJEn1c?list=UUPcTH9nEqruU37zLUfKxRCw" frameborder="0" allowfullscreen></iframe></div>
	</div>
</div>
<div class="row-fluid">
	<div class="span12 well hidden-phone">
		<div class="title-box twitter-color">
			TWITTER
		</div>
		<div class="twitter-box"></div>
	</div>
</div>
<div class="row-fluid">
	<div class="span12 well hidden-phone">
		<div class="title-box red">
			Newest Members
		</div>
		<div class="users-box">
			<?php //getNewestUsers comes from the CMS library ?>
			<?php $users = getNewestUsers(); ?>
			<ul style="list-style-type: none">
				<?php foreach($users as $user): ?>
					<?php if($user['geek'] == 1): ?>
						<li><a href="the-geeks.php?user=<?php echo $user['username'] ?>"><?php echo $user['username'] ?></a></li>
					<?php else: ?>
						<li><a href="users.php?user=<?php echo $user['username'] ?>"><?php echo $user['username'] ?></a></li>
					<?php endif ?>
				<?php endforeach ?>
			</uk>
		</div>
	</div>
</div>