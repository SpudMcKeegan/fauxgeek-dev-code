	<script>
	    var maxHeight = 0;
		$(function(){
			$(".fbContent").each(function(index) {
				if ($(this).height() > maxHeight) {
					maxHeight = $(this).height() + 100;
				}
			});
			
			$(".fbContent").each(function(index){
				$(this).css("height", maxHeight + "px");
			});
		});
	</script>
	<style>
		.fbContent{
			margin-bottom: 10px;
			position: relative;
		}
		.fbContent .btn{
			position: absolute;
			bottom: 0px;
		}
	</style>
	<div class="span4 fbContent well well-box">
		<h4 class="muted text-center"><?php echo $homePageEditor['lb1_title']; ?></h4>
		<p><?php echo $homePageEditor['lb1_text']; ?></p>
		<a href="<?php echo $homePageEditor['lb1_link']; ?>" class="btn"><i class="icon-user"></i>BUTTON!</a>
	</div>
	<div class="span4 fbContent  well well-box">
		<h4 class="muted text-center"><?php echo $homePageEditor['lb2_title']; ?></h4>
		<p><?php echo $homePageEditor['lb2_text']; ?></p>
		<a href="<?php echo $homePageEditor['lb2_link']; ?>" class="btn btn-success"><i class="icon-star icon-white"></i>BUTTON!</a>
	</div>
	<div class="span4 fbContent well well-box">
		<h4 class="muted text-center"><?php echo $homePageEditor['lb3_title']; ?></h4>
		<p><?php echo $homePageEditor['lb3_text']; ?></p>
		<a href="<?php echo $homePageEditor['lb3_link']; ?>" class="btn btn-info">BUTTON!</a>
	</div>