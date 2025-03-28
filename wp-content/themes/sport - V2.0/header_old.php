<?php load_theme_textdomain( 'postechin' ) ; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
	<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>

	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />	
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats please -->

	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link href="<?php bloginfo('template_directory');?>/function/css/shortcodes.css" rel="stylesheet" type="text/css" /> 
	<?php wp_get_archives('type=monthly&format=link'); ?>
	<script type="text/javascript" src="<?php bloginfo('template_directory');?>/jquery.min.js" ></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory');?>/jquery-ui.min.js" ></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory');?>/easyTooltip.js" ></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory');?>/easypaginate.js"></script>
	<script type="text/javascript">
		jQuery(function($){	
			$('ul#last-article-items').easyPaginate({
				step:4, 
				auto:false, 
				nextprev: false,
				clickstop:false,
				pause:2000
			});	
		});    
    </script>
	<script type="text/javascript">
		$(document).ready(function(){	
			$(".last-post-thumb").easyTooltip();
		});
	</script>
		<script type="text/javascript">
		$(document).ready(function() {

			//When page loads...
			$(".tab_content").hide(); //Hide all content
			$("ul.tabs li:first").addClass("active").show(); //Activate first tab
			$(".tab_content:first").show(); //Show first tab content

			//On Click Event
			$("ul.tabs li").click(function() {

				$("ul.tabs li").removeClass("active"); //Remove any "active" class
				$(this).addClass("active"); //Add "active" class to selected tab
				$(".tab_content").hide(); //Hide all tab content

				var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
				$(activeTab).fadeIn(); //Fade in the active ID content
				return false;
			});

		});
	</script>
	<script type="text/javascript">
		$(document).ready(function() { 
			$(".hover").hide();
		});
		$(document).ready(function() { 
			$('.thumb').mouseenter(function(){
				$(this).children('span').fadeIn(350);
			})
			$('.thumb').mouseleave(function(){
				$(".hover").fadeOut(350);
			})
		});
	</script>

</head>
<body>
<div id="wrapper">
	<div class="header">
		<div class="head-img">
		</div>
		
			<?php wp_nav_menu('menu=main&after=<span class=container></span>'); ?>
		
	</div>
