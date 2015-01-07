<?php include('carosel-c.php'); ?>
<script>
	$(document).ready(function(){
		$('.carousel').carousel({
			interval: 3000
		});
	});
</script>
<!--  Carousel - consult the Twitter Bootstrap docs at
	http://twitter.github.com/bootstrap/javascript.html#carousel -->
<div id="this-carousel-id" class="carousel slide"><!-- class of slide for animation -->
	<div class="carousel-inner">
		<div class="item active"><!-- class of active since it's the first item -->
			<img src="http://placehold.it/870x300" alt="" />
			<div class="carousel-caption">
				<p>Caption 1</p>
			</div>
		</div>
		<div class="item">
			<img src="http://placehold.it/870x300" alt="" />
			<div class="carousel-caption">
				<p>Here's a second caption</p>
			</div>
		</div>
		<div class="item">
			<img src="http://placehold.it/870x300" alt="" />
			<div class="carousel-caption">
				<p>Now for a third caption</p>
			</div>
		</div>
		<div class="item">
			<img src="http://placehold.it/870x300" alt="" />
			<div class="carousel-caption">
				<p>Return of the caption, the fourth Esquire</p>
			</div>
		</div>
	</div><!-- /.carousel-inner -->
	<!--  Next and Previous controls below
	href values must reference the id for this carousel -->
	<a class="carousel-control left" href="#this-carousel-id" data-slide="prev">&lsaquo;</a>
	<a class="carousel-control right" href="#this-carousel-id" data-slide="next">&rsaquo;</a>
</div><!-- /.carousel -->