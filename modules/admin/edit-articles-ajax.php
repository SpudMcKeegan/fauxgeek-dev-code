<?php
	require_once('/home4/fauxgeek/www/dev/modules/admin/edit-articles-c.php');
	require_once('/home4/fauxgeek/www/dev/includes/cms-library.php');

	$articles = loadArticles($_GET['published'], $_GET['sort']);
?>
<tbody>
<?php foreach($articles as $article): ?>
	<tr>
		<td width="150"><?php echo date('F jS, Y', strtotime($article['createdDate'])); ?></td>
		<td width="350"><?php echo $article['title']; ?></td>
		<td width="150"><?php echo $article['username']; ?></td>
		<td width="150"><?php echo $article['subject']; ?></td>
		<td width="100"><a href="/dev/admin/edit-articles.php?num=<?php echo $article['num'] ?>" class="btn btn-success">Edit</a></td>
	</tr>
<?php endforeach ?>
</tbody>