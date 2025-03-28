


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



<style type="text/css">
  



a.tab-button:hover{
	color:white;
}
  
 
div.tab-button-container{
	padding: 3px 0 6px 0;
	background-color: #000;
	float: right;
	width: 25%;
	border-bottom: 1px solid #A58181;

}

a.tab-button{
	width: 125px;
	text-align: center;
	margin: 0 auto;
	display: block;
	padding: 3px;

}

a.tab-button.active-button{
	background:orangered;
}

.tab-button {
	-moz-box-shadow:inset 0px 1px 9px 1px #2e211c;
	-webkit-box-shadow:inset 0px 1px 9px 1px #2e211c;
	box-shadow:inset 0px 1px 9px 1px #2e211c;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #a93535), color-stop(1, #a93535));
	background:-moz-linear-gradient(top, #a93535 5%, #a93535 100%);
	background:-webkit-linear-gradient(top, #a93535 5%, #a93535 100%);
	background:-o-linear-gradient(top, #a93535 5%, #a93535 100%);
	background:-ms-linear-gradient(top, #a93535 5%, #a93535 100%);
	background:linear-gradient(to bottom, #a93535 5%, #a93535 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#a93535', endColorstr='#a93535',GradientType=0);
	background-color:#a93535;
	-moz-border-radius:3px;
	-webkit-border-radius:3px;
	border-radius:3px;
	border:1px solid #ff7b00;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:arial;
	font-size:15px;
	font-weight:bold;
	padding:2px 46px;
	text-decoration:none;
	text-shadow:1px 1px 0px #141212;
}
.tab-button:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #a93535), color-stop(1, #a93535));
	background:-moz-linear-gradient(top, #a93535 5%, #a93535 100%);
	background:-webkit-linear-gradient(top, #a93535 5%, #a93535 100%);
	background:-o-linear-gradient(top, #a93535 5%, #a93535 100%);
	background:-ms-linear-gradient(top, #a93535 5%, #a93535 100%);
	background:linear-gradient(to bottom, #a93535 5%, #a93535 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#a93535', endColorstr='#a93535',GradientType=0);
	background-color:#a93535;
}
.tab-button:active {
	position:relative;
	top:1px;
}


</style>



<script type="text/javascript">

	$("h3.rpwe-title").replaceWith(function() { return $(':first', this); });
	$("li.rpwe_widget > div > ul.rpwe-ul").css("overflow-x","hidden");
/*	$("li.rpwe_widget > div > ul.rpwe-ul").css("overflow-y","scroll"); */
	$("li.rpwe_widget > div > ul.rpwe-ul").css("width","320px");
	$("li.rpwe_widget > div > ul.rpwe-ul").css("max-height","600px");



</script>


<script type="text/javascript">

  var usersOnlieDiv = document.getElementById("useronline-count");
  usersOnlieDiv.style.cssText = "margin: 2px 0px;text-align: center;font-size: 32px;color: white;background-color: #a93535;border-radius: 10px;border-style: solid;text-shadow: 1px 1px 1px black;" + usersOnlieDiv.style.cssText;

  var usersOnlieBrowsingDiv = document.getElementById("useronline-browsing-page");
  usersOnlieBrowsingDiv.style.cssText = "margin: 2px 0px;  text-align: center;font-size: 16px;color: white;background-color: #a93535;  border-radius: 10px;  border-style: solid;" + usersOnlieBrowsingDiv.style.cssText;

</script>


<script type="text/javascript">
    if ($('.home-logo').length == 4) {
        $("#ujiCountdown").prependTo($("div.last-match-middle")[0]);
        $("div.last-match-middle").first().css("height", "160px");
    }

    else {
        $("div.match").first().css("display", "none");
		$("#ujiCountdown").css("visibility", "hidden");

    }
</script>

<script type="text/javascript">

	if ($("table.pool-ranking")){

		$("table.pool-ranking > tbody > tr > td").css("text-align", "center");
		$("table.pool-ranking > tbody > tr > td > a").attr("href", "#");
		$("table.pool-ranking > thead > tr > th").first().css("width", "20%");
		$("table.pool-ranking > thead > tr > th").last().css("width", "10%");



		$("table.pool-ranking").prepend('<thead><tr class="row-1 odd"><th class="column-1">رتبه</th><th class="column-3">بازیکن</th><th class="column-5">امتیاز</th></tr></thead>');
		$("table.pool-ranking").addClass("wp-table-reloaded");

		
		var firstCol = $("table.ranking-widget > tbody > tr > td:first-child");

		for (i=0; i<10; i++)
			firstCol.eq(i).html(firstCol.eq(i).html().replace(".", ""));

		var secCol = $("table.ranking-widget > tbody > tr > td:nth-child(1)");

		for (i=0; i<10; i++)
			secCol.eq(i).html(secCol.eq(i).html().replace(".", ""));

		$("table.ranking-widget > tbody > tr > td:nth-child(2) > a").contents().unwrap();

		$("table.pool-ranking > thead > tr").css("font-size", "15px");
		$("table.pool-ranking > thead > tr").css("font-weight", "bold");
		$("table.pool-ranking > tbody > tr").css("font-size", "15px");
		$("table.pool-ranking").removeClass("pool-ranking");
		$("table.ranking-widget").removeClass("ranking-widget");
	}


</script>

<script type="text/javascript">

	$(".closed.match > td:not('.score') > a").css("visibility", "hidden")
	$("#predictionform-1 > h2").html("");
	$("#predictionform-1 > .buttonblock > input").attr("value","ذخیره");
	$("#predictionform-1 > .buttonblock").css("text-align","center");
	$("#predictionform-1 > .buttonblock > input").css("font-family","BBCNassim");
	$("#predictionform-1 > .buttonblock > input").css("font-weight","bold");
	$("#predictionform-1 > .buttonblock > input").css("font-size","16px");

</script>

<script type="text/javascript">

	$(".widget_polls-widget > div.wp-polls > p, form.wp-polls-form > p").css("text-align", "right");
	$(".widget_polls-widget > div.wp-polls > p, form.wp-polls-form > p").css("padding", "12px");

</script>

<script type="text/javascript">

	$("table.matchinfo").css("direction", "rtl");
	$("table.matchinfo > tbody").css("direction", "rtl");
	$("table.matchinfo > tbody > tr > td").css("text-align", "center");
	$("table.matchinfo > tbody > tr > td:first-child").css("direction", "ltr");


</script>

<script type="text/javascript">

	$(".closed.match > td > a").attr("href","#");

</script>

<script type="text/javascript">

	$("div.ad-312 > img").css("display","none");

</script>

<script type="text/javascript">
		
		$("#commentform > p").first().html($("#commentform > p").first().html().replace("Logged in as", "تحت عنوان"));
		$("#WpQtToolBarBody > div").css("width","428px");

</script>

<style type="text/css">

.tab-button.feed-tab{

	width: 52px !important;
	margin: 2px !important;

	text-shadow: none !important;
	height: 24px;
	color: #FFF !important;
	text-align: center !important;
	padding: 0 !important;
	height: 24px;
	margin: 0 4px !important;
}

.super-rss-reader-widget{

width: 320px;
margin: 0 !important;
padding: 0;

}

.feed-tabs-bar{

border-bottom: 1px solid #A58181;
height: 27px !important;
background-color: #000;
margin: 0 0 10px 0 !important;
width: 320px !important;
padding: 4px !important;

}

.srr-active-tab{
	background-color: #FF4500 !important;
}

</style>

<script type="text/javascript">
	$( document ).ready(function() {

		$(".srr-tab-wrap.srr-tab-style-none.srr-clearfix > li").addClass("tab-button feed-tab");
		$(".srr-tab-wrap.srr-tab-style-none.srr-clearfix").addClass("feed-tabs-bar");
		$(".srr-tab-wrap.srr-tab-style-none.srr-clearfix").removeClass("srr-tab-wrap srr-tab-style-none srr-clearfix");
	});
</script>

<script type="text/javascript">

	$( document ).ready(function() {

		if ( $.browser.msie ) {
			$("span.hover").css("margin-top", "-89px");

		}	
	});

</script>

<script type="text/javascript">

	$("div.last-post-title > h4").css({

		"max-height": "96px",
		"overflow": "hidden",
		"line-height": "24px",
		"margin-bottom": "4px",

	});


</script>



<div id="footer">
	<div class="footer-bg-l"></div>
	<div class="footer-bg-m">
		<div class="copyright">
			<?php _e('Copy Right','postechin'); ?>
			<?php _e('Design','postechin'); ?><a href="http://www.postechin.com"><?php _e('Postechin','postechin'); ?></a>
		</div>

	</div>
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
								<li class="marq"><div class="breaking-news-marquee"><?php _e('Important News:','postechin'); ?><?php the_title(); ?></div></li>
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

    <script type="text/javascript">

            $('.breaking-news-marquee').marquee({ speed: 9500, gap: 350, delayBeforeStart: 0, direction: 'right', duplicated: true });
	    	$("#footpanel").css("z-index", "9999");
	    	$("#footpanel").css("visibility", "visible");
	    	$("#footpanel").css("display", "block");

	    	$("body > div#wrapper").css("margin-top", "43px");
    
    </script>
    
    <script type="text/javascript">

	$( document ).ready(function() {

	    	$(".copyright").html('<div style="height: 24px; background-color: black;"><p style="padding-top:0; float:right;">کلیه حقوق محفوظ است. استفاده از مطالب با ذکر منبع بلامانع است.</p><p style="padding-top:0; float:left;"><span style="color:white;">طراحی: </span><a href="http://www.postechin.com" style="color:yellow;">پیمان اسکندری (پوسته چین)</a></p></div>');
	    	$(".copyright").css("visibility", "visible");
	    	$(".copyright").css("display", "block");
	});

	</script>

	<script type="text/javascript">

	$( document ).ready(function() {
		$("a.jm_logo").attr("href", "#");
		$("div#jappix_mini").css("visibility", "visible");

		$("div.jm_starter > a.jm_pane.jm_button.jm_images").click(function() { 


		});
	});

	MutationObserver = window.MutationObserver || window.WebKitMutationObserver;

	var observer = new MutationObserver(function(mutations, observer) {

			$("div.jm_type_groupchat > a.jm_chat-tab > span.jm_name").html("گفتگوی عمومی");
			$("div.jm_type_groupchat > div.jm_chat-content > div.jm_actions > span.jm_nick").html("گفتگوی عمومی");
	});

	observer.observe($("div.jm_conversations")[0], {

	  subtree: true,
	  attributes: true,
	});
/*
	var observer2 = new MutationObserver(function(mutations, observer2) {

			$("div.jm_starter > a.jm_pane.jm_button.jm_images").attr("href", "#");
	});

	observer2.observe($("div.jm_starter > a.jm_pane.jm_button.jm_images")[0], {

	  subtree: true,
	  attributes: true,
	});
*/



	</script>



<script type="text/javascript">

	$(".middle").css("visibility","visible");
	$(".middle").css("display","block");

	var mainHeight = parseInt( $("div.middle > #main").css("height") );
	var sidebarHeight = parseInt( $("div.middle > #sidebar").css("height") );

	if (mainHeight > sidebarHeight)
		$("div.middle > #sidebar").css("height", (mainHeight + 600).toString());




</script>

<script type="text/javascript">

	if(parseInt($("div.last-match-result > h5").css("height")) > 60)
		$("div.last-match-result > h5").css("font-size", "35px");

</script>

<script type="text/javascript">

	$(".wp_rp_wrap").before('<a href="http://asroma27.com/?p=66686" target="_blank"><img class="post-image-center" src="http://asroma27.com/wp-content/uploads/2015/06/as-roma-banner-sponser.jpg" alt="asroma_banner" width="468" ></a><a href="http://asroma27.com/?post_cat=%D8%A8%D8%A7%D8%B2%D8%A7%D8%B1" target="_blank"><img class="post-image-center" src="http://asroma27.com/wp-content/uploads/2015/05/bazar.jpg" alt="asroma_banner" width="468" height="60"></a>');
	

</script>

<script type="text/javascript">

	$("div.single-thumb > .attachment-single-thumbnail.wp-post-image").after('<a href="http://www.aparat.com/Romachannel" target="_blank"><img style="width: 360px; margin-bottom: 15px;" class="post-image-center" src="http://asroma27.com/wp-content/uploads/2015/06/aparat-logo.jpg" alt="RomaChannel"></a>');


</script>


<script>
	$(".wp_rp_wrap > .wp_rp_content > h3").html("مطالب پیشنهادی")
</script>

</body>

    



</html>
