	<script>
	    var maxHeight = 0;
		$(document).ready(function(){
			$(".fbContent").each(function(index) {
				if ($(this).height() > maxHeight) {
					maxHeight = $(this).height() + 50;
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
	<div id="footerbuckets">
		<div class="span3 fbContent well">
			<h4 class="muted text-center"><?php echo $hpe['lb1_title']; ?></h4>
			<p><?php echo $hpe['lb1_text']; ?></p>
			<a href="<?php echo $hpe['lb1_link']; ?>" class="btn"><i class="icon-user"></i>BUTTON!</a>
		</div>
		<div class="span3 fbContent well">
			<h4 class="muted text-center"><?php echo $hpe['lb2_title']; ?></h4>
			<p><?php echo $hpe['lb2_text']; ?></p>
			<a href="<?php echo $hpe['lb2_link']; ?>" class="btn btn-success"><i class="icon-star icon-white"></i>BUTTON!</a>
		</div>
		<div class="span3 fbContent well">
			<h4 class="muted text-center"><?php echo $hpe['lb3_title']; ?></h4>
			<p><?php echo $hpe['lb3_text']; ?></p>
			<a href="<?php echo $hpe['lb3_link']; ?>" class="btn btn-info">BUTTON!</a>
		</div>
	</div>