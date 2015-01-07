<?php include('edit-articles-c.php'); ?>
<?php if(@$_POST){ updateEditedArticle(); } ?>

<script src="http://tinymce.cachefly.net/4.0/tinymce.min.js"></script>
<script>tinymce.init({selector:'#article-editor'});</script>
<style>
	table{		
		width: 1200px;	
	}
</style>
<script>
	$(document).ready(function(){
		sortShit("1", "published_date");
		$('input[name="column"]').change(function(){ sortShit($('input[name="published"]:checked').val(), $(this).val()) });
		$('input[name="published"]').change(function(){ sortShit($(this).val(), $('input[name="column"]:checked').val()) });
	});
	
	//Displays articles when either loading a page or when the showmore button is clicked
	function sortShit(published, sort){
		var ajaxRequest;
		$('#edit-article-listings').fadeOut(300).empty();
		ajaxRequest = new XMLHttpRequest();
		
		ajaxRequest.onreadystatechange = function(){
			if(ajaxRequest.readyState == 4){$('#edit-article-listings').append(ajaxRequest.responseText).hide().fadeIn(300);}
		}
		
		var queryString = "?published=" + published;
		queryString += "&sort=" + sort;
		ajaxRequest.open("GET", "modules/edit-articles-ajax.php" + queryString, true);
		ajaxRequest.send(null); 	
	}
</script>

<?php if(checkForNum()): ?>
	<p><a href="admin-article-editor.php"><< back </a></p>
	<?php $article = loadArticleSingle($_GET['num']); ?>
	<form action="admin-article-editor.php?num=<?php echo $_GET['num'] ?>" method="post">
		<table>
			<tr>
				<td>Writer:</td>
				<td><?php echo $article['writer:label'] ?></td>
			</tr>
			<tr>
				<td>Title:</td>
				<td><input type="text" name="title" value="<?php echo $article['title'] ?>" /></td>
			</tr>
			<tr>
				<td>Content:</td>
				<td><textarea id="article-editor" name="content" style="height: 500px"><?php echo $article['content'] ?></textarea></td>
			</tr>
			<tr>
				<td>Created Date:</td>
				<td><?php echo date('F jS, Y', strtotime($article['createdDate'])) ?></td>
			</tr>
			<tr>
				<td>Subject:</td>
				<td>
					<select name="subject">
						<?php foreach(getSubjects() as $sub): ?>
							<option value="<?php echo $sub['title']; ?>"><?php echo $sub['title']; ?></option>
						<?php endforeach ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Published Date:</td>
				<td><?php echo $article['published_date'] ?></td>
			</tr>
			<tr>
				<td>Published This Article: <?php echo $article['published'] ?></td>
				<td>
					<input type="radio" name="published" value="1" <?php if($article['published']==1){echo checked;} ?>>Published<br />
					<input type="radio" name="published" value="0" <?php if($article['published']!=1){echo checked;} ?>>Unpublished
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<button id="submit" name="submit" value="sumbit">Submit</button>
					<button id="delete" name="delete" value="delete">Delete</button>
				</td>
			</tr>
		</table>
	</form>
<?php else: ?>
	<div class="row-fluid">
		<div class="span9">
			<table>
				<tr>
					<th width="150"><strong>Published Date:</strong></th>
					<th width="350"><strong>Title:</strong></th>
					<th width="150"><strong>Writer (geek):</strong></th>
					<th width="150"><strong>Subject:</strong></th>
					<th width="100"><strong>EDIT BUTTON!:</strong></th>
				</tr>
			</table>
			<table id="edit-article-listings">
			</table>
		</div>
		<div class="span3 well">
			<h3>Sorting</h3>
			<h4>Column:</h4>
			<input type="radio" name="column" value="published_date" checked>Published Date<br />
			<input type="radio" name="column" value="title">Title<br />
			<input type="radio" name="column" value="writer">Writer (geek)<br />
			<input type="radio" name="column" value="subject">Subject<br />
			<br /><br />
			<h4>Published:</h4>
			<input type="radio" name="published" value="1" checked>Yes<br />
			<input type="radio" name="published" value="0">No<br />
	</div>
<?php endif ?>