<?php 
	list($geeksFooter, $usersMetaData) = getRecords(array(
		'tableName'   => 'users',
		'loadUploads' => true,
		'allowSearch' => false,
		'where'       => 'geek = 1',
	));
?>
<div class="footer">
	<div class="row">
		<div class="span4">
			<p>Here's the Site:</p>
			<ul id="fnav">
				<li><a href="index.php">Home</a></li>
				<li><a href="geek-stuff.php">Geek Stuff</a></li>
				<li><a href="video-games.php">Video Games</a></li>
				<li><a href="Movies.php">Movies</a></li>
				<li><a href="fauxtography.php">Fauxtography</a></li>
				<li><a href="video.php">Videos</a></li>
				<li><a href="podcasts.php">Podcasts</a></li>
				<li><a href="geeks.php">The Geeks</a></li>
			</ul>
		</div>
		<div class="span4">
			<p>Got a comment or a Question?</p>
			<table>
				<tr><td width="100px">Name</td><td width="150px"><input type="text" name="firstName" /></td></tr>
				<tr><td width="100px">Email:</td><td width="150px"><input type="text" name="email" /></td></tr>
				<tr><td colspan="2">Comment:</td></tr>
				<tr><td colspan="2"><textarea name="comment"></textarea></td></tr>
				<tr>
					<td width="100px">For Whom:</td>
					<td width="150px">
						<select name="whom">
							<?php foreach($geeksFooter as $gf): ?>	
								<option value="<?php echo $gf['username'] ?>"><?php echo $gf['username'] ?></option>
							<?php endforeach ?>
						</select>
					</td>
				</tr>
				<tr><td width="100px"><input type="submit" value="Submit" name="submit" /></td></tr>
			</table>
		</div>
		<div class="span4">
		</div>
	</div>
	<div class="row">
		<div class="span12 text-center">
			
		</div>
	</div>
</div>