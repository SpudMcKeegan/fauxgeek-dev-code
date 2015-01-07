<?php include('article-viewer-c.php'); ?>
<h1><?php echo htmlencode($article['title']); ?></h1>
<p>Posted By: <?php echo constructHREF($article['writer']); ?> on <?php echo date('F jS, Y', strtotime($article['createdDate'])); ?></p>
<p><?php echo $article['content']; ?></p>
<p>Tags: <?php echo join(', ', $article['tags:labels']); ?></p>
<hr />
<h2>COMMENTS</h2>
<?php foreach($comments as $comment): ?>
	<div style="float: left; width: 100%; border: 2px solid #fff">
		<?php echo $comment['content']; ?>
		<?php echo constructHREF($comment['user']); ?>
	</div>
<?php endforeach ?>