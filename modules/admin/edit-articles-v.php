<?php include('/home4/fauxgeek/www/dev/modules/admin/edit-articles-c.php'); ?>
<?php if(@$_POST){ updateEditedArticle(); } ?>

<script src="http://tinymce.cachefly.net/4.0/tinymce.min.js"></script>
<script>tinymce.init({selector:'#article-editor'});</script>
<!--style>
	#edit-article-listings ,#edit-article-listings-headings, #edit-article{		
		width: 100%;
		border-sizing: border-box;
	}
	#edit-article-listings tr{
		border-bottom: 1px solid #444; 
	}
	
	#edit-article-listings tr:last-child{
		border-bottom: none; 
	}

	#edit-article-listings tr td, #edit-article-listings-headings tr th{
		border-right: 1px solid #ccc;
		padding: 5px;
	}
</style-->
<script>
	$(function(){
		sortArticles("1", "published_date");
		$('input[name="column"]').change(function(){ sortArticles($('input[name="published"]:checked').val(), $(this).val()) });
		$('input[name="published"]').change(function(){ sortArticles($(this).val(), $('input[name="column"]:checked').val()) });
	});
	
	///Displays articles when either loading a page or when the showmore button is clicked
	function sortArticles(published, sort){
		$.ajax({
			url: '/dev/modules/admin/edit-articles-ajax.php',
			type: 'GET',
			dataType: 'html',
			data: {
				published: published,
				sort: sort,
			}
		})
		.done(function(data) {

			$('#edit-article-listings').fadeOut(300, function(){ $(this).hide().empty().append(data).fadeIn(300); });
		})
	}
</script>

<?php if(checkForNum()): ?>
	<p><a href="/dev/admin/edit-article.php"><< back </a></p>
	<?php $article = loadArticleSingle($_GET['num']); ?>
	<form action="/dev/admin/edit-article.php?num=<?php echo $_GET['num'] ?>" method="post">
		<table id="edit-article">
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
					<a id="submit" class="btn btn-default" name="submit" value="sumbit">Submit</a>
					<a id="delete" class="btn btn-danger" name="delete" value="delete">Delete</a>
				</td>
			</tr>
		</table>
	</form>
<?php else: ?>
	<div class="fluid-row">
		<div class="span12 well article-sorting">
			<h3>Sorting</h3>
			<h4>Column:</h4>
			<input type="radio" name="column" value="published_date" checked>Published Date 
			<input type="radio" name="column" value="title">Title 
			<input type="radio" name="column" value="writer">Writer (geek) 
			<input type="radio" name="column" value="subject">Subject
			<br /><br />
			<h4>Published:</h4>
			<input type="radio" name="published" value="1" checked>Yes
			<input type="radio" name="published" value="0">No
		</div>
	</div>
	<div class="row-fluid">
		<div class="span12">
			<table class="edit-article-listing-headings" class="table">
				<tr>
					<th width="150"><strong>Published Date:</strong></th>
					<th width="350"><strong>Title:</strong></th>
					<th width="150"><strong>Writer (geek):</strong></th>
					<th width="150"><strong>Subject:</strong></th>
					<th width="100"><strong>EDIT BUTTON!</strong></th>
				</tr>
			</table>
			<table id="edit-article-listings" class="table table-striped table-hover">
			</table>
		</div>
	</div>
<?php endif ?>
