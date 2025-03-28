<script type="text/javascript"> 
$(document).ready(function(){
	$(".subpanel").hide();
	$(".subpanel2").hide();
	$.fn.adjustPanel = function(){ 
		$(this).find("ul, .subpanel").css({ 'height' : 'auto'}); 
		$(this).find(".subpanel2").css({ 'height' : 'auto'}); 
		
		var windowHeight = $(window).height(); 
		var panelsub = $(this).find(".subpanel").height();
		var panelsub = $(this).find(".subpanel2").height();
		var panelAdjust = windowHeight - 100;
		var ulAdjust =  panelAdjust - 25;
		
		if ( panelsub >= panelAdjust ) {	
			$(this).find(".subpanel").css({ 'height' : panelAdjust });
			$(this).find("ul").css({ 'height' : ulAdjust});
		}
		else if ( panelsub < panelAdjust ) { 
			$(this).find("ul").css({ 'height' : 'auto'}); 
		}
	};
	$("#chatpanel").adjustPanel();
	$("#chatpanel2").adjustPanel();
	$("#alertpanel").adjustPanel();
	$(window).resize(function () { 
		$("#chatpanel").adjustPanel();
		$("#chatpanel2").adjustPanel();
		$("#alertpanel").adjustPanel();
	});
	$("#chatpanel a:first, #alertpanel a:first").click(function() { 
		if($(this).next(".subpanel").is(':visible')){ 
			$(this).next(".subpanel").fadeOut('fast'); 
			$("#footpanel li a").removeClass('active'); 
		}
		else {
			$(".subpanel").fadeOut();
			$(this).next(".subpanel").fadeIn('fast'); 
			$("#footpanel li a").removeClass('active');
			$(this).toggleClass('active');
		}
		return false; 
	});
	$("a.seconder").click(function() { 
		if($(this).next(".subpanel2").is(':visible')){ 
			$(this).next(".subpanel2").fadeOut('fast'); 
			$("#footpanel li a").removeClass('active2'); 
		}
		else {
			$(".subpanel2").fadeOut();
			$(this).next(".subpanel2").fadeIn('fast'); 
			$("#footpanel li a").removeClass('active2');
			$(this).toggleClass('active2');
		}
		return false; 
	});
	$(document).click(function() { 
		$(".subpanel").fadeOut('fast');
		$(".subpanel2").fadeOut('fast');
		$("#footpanel li a").removeClass('active');
		$("#footpanel li a").removeClass('active2');
	});
	$('.subpanel ul').click(function(e) { 
		e.stopPropagation();
	});
	$("#alertpanel li").hover(function() {
		$(this).find("a.delete").css({'visibility': 'visible'});
	},function() {
		$(this).find("a.delete").css({'visibility': 'hidden'});
	});
});
</script>

<div id="footer">
	<div class="footer-bg-l"></div>
	<div class="footer-bg-m">
		<div class="copyright">
			<?php _e('Copy Right','postechin'); ?>
			<?php _e('Design','postechin'); ?><a href="http://www.postechin.com"><?php _e('Postechin','postechin'); ?></a>
		</div>
		<!-- Begin WebGozar.com Counter code -->
<script type="text/javascript" language="javascript" src="http://www.webgozar.ir/c.aspx?Code=2224952&amp;t=counter" ></script>
<noscript><a href="http://www.webgozar.com/counter/stats.aspx?code=2224952" target="_blank">&#1570;&#1605;&#1575;&#1585;</a></noscript>
<!-- End WebGozar.com Counter code -->
	</div>
                <!-- PersianStat -->
<script language='javascript' type='text/javascript' src='http://www.persianstat.com/service/stat.js'></script>
<script language='javascript' type='text/javascript'>
persianstat(10158886, 0);
</script>
<!-- /PersianStat -->
	</div>

	<div class="footer-bg-r"></div>
</div>
<div id="footpanel">
    <ul id="mainpanel">
		 <?php
		if ( is_user_logged_in() ) { global $current_user; get_currentuserinfo();?>
			<li id="chatpanel">
				<a href="#" class="chat setting"></a>
				<div class="subpanel">
					<ul>
						<li class="chat-title"><span><?php if($current_user->display_name!='') {echo $current_user->display_name;} else { echo $current_user->user_login; } ?></span></li>
							<li><a href="<?php bloginfo('url'); ?>/wp-admin/profile.php"><?php _e('Profile','postechin'); ?></a></li>
							<li><a href="<?php echo home_url(); ?>/wp-login.php?action=logout&amp;redirect_to=<?php echo urlencode($_SERVER['REQUEST_URI']) ?>"><?php _e('Logout','postechin'); ?></a></li>
							<li><a href="http://www.gravatar.com"><?php _e('Change Avatar','postechin'); ?></a></li>
					</ul>
				</div>
			</li>
			<div class="buttons">
				<div class="button-r"></div>
				<div class="button-m">
					<li><a href="<?php bloginfo('url'); ?>/wp-admin"><img src="<?php bloginfo('template_directory');?>/images/panel/home.png"/></a></li>
					<li><a href="<?php bloginfo('url'); ?>/wp-admin/profile.php"><img src="<?php bloginfo('template_directory');?>/images/panel/user.png"/></a></li>
				<?php if ( current_user_can('edit_posts') ) {?>
					<li><a href="<?php bloginfo('url'); ?>/wp-admin/post-new.php"><img src="<?php bloginfo('template_directory');?>/images/panel/newspaper_add.png"/></a></li>
					<li><a href="<?php bloginfo('url'); ?>/wp-admin/post-new.php?post_type=article"><img src="<?php bloginfo('template_directory');?>/images/panel/page_add.png"/></a></li>
					<li><a href="<?php bloginfo('url'); ?>/wp-admin/post-new.php?post_type=match"><img src="<?php bloginfo('template_directory');?>/images/panel/match_add.png"/></a></li>
					<li><a href="<?php bloginfo('url'); ?>/wp-admin/post-new.php?post_type=photo"><img src="<?php bloginfo('template_directory');?>/images/panel/photo_add.png"/></a></li>
				<?php } ?>
					<li>
						<a href="#" class="seconder"><img src="<?php bloginfo('template_directory');?>/images/panel/comments.png"/></a>
						<?php update_notify($post->ID,$current_user->user_email); $fivesdrafts=check_notify($current_user->user_email); $nc=0; foreach ($fivesdrafts as $fivesdraft) {$nc++;}
						if ($nc>0) {?>
						<div class="subpanel2">
							<ul class="notification">
								<?php foreach ($fivesdrafts as $fivesdraft) {  $userid=get_users_id($fivesdraft->reply_user_email); 
										$user_info = get_userdata($userid);?>
									<li>
										<a onclick="<?php hello($current_user->user_email); ?>" href="<?php echo get_permalink($fivesdraft->post_id); ?>"><p><?php echo '<h4>'.$user_info->display_name.'</h4><p>'; _e(' to your comment on ','postechin'); echo '</p><h4>'.get_the_title($fivesdraft->post_id).'</h4><p>'; _e(' answer.','postechin');echo '</p><span>'.$fivesdraft->replytime.'<span>';?></a>
									</li>
								<?php } ?>
							</ul>
						</div>
						<?php } ?>
						<span class="notify"><?php echo $nc; ?></span>
						
						<a href="<?php bloginfo('url'); ?>/wp-admin/admin.php?page=private-message/main.php" class="third"><img src="<?php bloginfo('template_directory');?>/images/panel/mail.png"/></a>
						<?php $fivesdrafts=check_message($current_user->user_email); $nm=0; foreach ($fivesdrafts as $fivesdraft) {if($fivesdraft->status==1)$nm++;}
						if ($nc>0) {?>
						<?php } ?>
						<span class="notify2"><?php echo $nm; ?></span>
						
					</li>
				</div>
				<div class="button-l"></div>
			</div>
			<?php if ( current_user_can('edit_posts') ) {?>

			<?php } ?>
		<div class="buttons">
			<div class="button-r"></div>
			<div class="button-m">
				<?php
						$week = date('W');
						$year = date('Y');
							$args=array(
								'post_type' => array('post'),
								'taxonomy' =>'',
								'term' => $term->slug,
								'post_status' => 'publish',
								'posts_per_page' => 100,
								'year' => $year,
								'w' => $week,
								);
							$my_query = null;
							$my_query = new WP_Query($args);
							$counter=1;
							if( $my_query->have_posts() ) {
							while ($my_query->have_posts()) : $my_query->the_post();
								$break=get_post_meta($post->ID, "break" , true);
								if ($break=='on' && $counter<2) {
							?>
								<li class="marq"><marquee direction=right height=30 width=635 scrollamount=3><?php _e('Important News:','postechin'); ?><?php the_title(); ?></marquee></li>
							<?php $counter++;}
							endwhile;
							}
							wp_reset_query();
						?>
			</div>
			<div class="button-l"></div>
		</div>
		<div class="small-avatar"><?php echo get_avatar($current_user->user_email,'30'); ?></div>
		<div class="profile">
			<div class="profile-r"></div>
			<div class="profile-m">
				<?php
					echo '<h2>' ;
					if($current_user->display_name!='') {echo $current_user->display_name;} else { echo $current_user->user_login; }
					echo '</h2>';
					commentuser($current_user->ID);
				?>
			</div>
			<div class="profile-l"></div>
		</div>
		<?php } else {?>
			<form action="<?php echo home_url(); ?>/wp-login.php" method="post">
				<p class="form-item">
				<h4 class="form-item"><?php _e('User:','postechin'); ?></h4><input type="text" class="form-item" name="log" id="log" value="<?php echo wp_specialchars(stripslashes($user_login), 1) ?>" size="22" />
				<label for="pwd"><h4 class="form-item"><?php _e('Password:','postechin'); ?></h4><input class="form-item" type="password" name="pwd" id="pwd" size="22" /></label>
				<h4 class="form-item"><label for="rememberme"><input name="rememberme" id="rememberme" type="checkbox" checked="checked" value="forever" /> <?php _e('Remember me','postechin'); ?></label></h4>
				<input type="submit" name="submit" value="<?php _e('Login','postechin'); ?>" class="button" id="submit" />
				</p>
				<input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>"/>
				<h4 class="form-item"><a href="<?php echo home_url(); ?>/wp-register.php"><?php _e('Register','postechin'); ?></a></h4>
				<h4 class="form-item"><a href="<?php echo home_url(); ?>/wp-register.php"><?php _e('Recover Password','postechin'); ?></a></h4>
			</form>
		<?php } ?>
    </ul>
</div>

</div>
<?php wp_footer(); ?>
</body>

</html>
