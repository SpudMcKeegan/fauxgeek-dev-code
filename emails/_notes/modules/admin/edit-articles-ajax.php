<?php
	require_once('edit-articles-c.php');
	require_once('../includes/cms-library.php');

	$articles = loadArticles($_GET['published'], $_GET['sort']);
?>
<?php foreach($articles as $article): ?>
	<tr>
		<td width="150"><?php echo date('F jS, Y', strtotime($article['createdDate'])); ?></td>
		<td width="350"><?php echo $article['title']; ?></td>
		<td width="150"><?php echo $article['username']; ?></td>
		<td width="150"><?php echo $article['subject']; ?></td>
		<td width="100"><a href="admin-article-editor.php?num=<?php echo $article['num'] ?>">edit</a></td>
	</tr>
<?php endforeach ?>