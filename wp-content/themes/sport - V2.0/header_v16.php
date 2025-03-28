<?php load_theme_textdomain( 'postechin' ) ; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
<?php wp_head(); ?>

	<script type="text/javascript"> var $ = jQuery.noConflict(); </script>

	<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>

	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />	
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats please -->

	<link rel="shortcut icon" href="<?php bloginfo('template_directory');?>/images/favicons/favicon.ico">
	<link rel="apple-touch-icon" sizes="57x57" href="<?php bloginfo('template_directory');?>/images/favicons/apple-touch-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo('template_directory');?>/images/favicons/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php bloginfo('template_directory');?>/images/favicons/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php bloginfo('template_directory');?>/images/favicons/apple-touch-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?php bloginfo('template_directory');?>/images/favicons/apple-touch-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php bloginfo('template_directory');?>/images/favicons/apple-touch-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php bloginfo('template_directory');?>/images/favicons/apple-touch-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php bloginfo('template_directory');?>/images/favicons/apple-touch-icon-152x152.png">
	<link rel="icon" type="image/png" href="<?php bloginfo('template_directory');?>/images/favicons/favicon-196x196.png" sizes="196x196">
	<link rel="icon" type="image/png" href="<?php bloginfo('template_directory');?>/images/favicons/favicon-160x160.png" sizes="160x160">
	<link rel="icon" type="image/png" href="<?php bloginfo('template_directory');?>/images/favicons/favicon-96x96.png" sizes="96x96">
	<link rel="icon" type="image/png" href="<?php bloginfo('template_directory');?>/images/favicons/favicon-16x16.png" sizes="16x16">
	<link rel="icon" type="image/png" href="<?php bloginfo('template_directory');?>/images/favicons/favicon-32x32.png" sizes="32x32">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="msapplication-TileImage" content="<?php bloginfo('template_directory');?>/images/favicons/mstile-144x144.png">
	<meta name="msapplication-config" content="<?php bloginfo('template_directory');?>/images/favicons/browserconfig.xml">


	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link href="<?php bloginfo('template_directory');?>/function/css/shortcodes.css" rel="stylesheet" type="text/css" /> 
	<?php wp_get_archives('type=monthly&format=link'); ?>
	<!-- <script type="text/javascript" src="<?php bloginfo('template_directory');?>/jquery.min.js" ></script> -->
	<script type="text/javascript" src="<?php bloginfo('template_directory');?>/jquery-ui.min.js" ></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory');?>/jquery.customSelect.min.js" ></script>	
    <script type="text/javascript" src="<?php bloginfo('template_directory');?>/jquery.marquee.min.js" ></script>
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

		    $("select[name=archive-dropdown]").addClass("styled-select");
			$(".styled-select").css("display", "block");
			$(".styled-select").css("margin", "10px 25px");
			$(".styled-select").css("width", "250px");
			$(".styled-select").css("font-family", "BBCNassim, Mitra");
			$(".styled-select").css("font-size", "18px");
			$('.styled-select').customSelect();
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


<style type="text/css">

	div.jm_actions > a.jm_logo{
		background-image: url("http://asroma27.com/wp-content/themes/sport%20-%20V2.0/images/favicons/favicon-160x160.png") !important;
		background-size: contain !important;
		background-position: right !important;

	}
	div.jm_actions > a.jm_join{
		display: none !important;

	}
	div.jm_actions, jm_chat-content > div.jm_actions, div.jm_actions > a.jm_status, div.jm_status_picker, div.jm_actions > a.jm_close{
		background-color: #000 !important;

	}
	div.jm_search > input, input.jm_send-messages{
		font-family: BBCNassim !important;
	}

	div#jappix_mini{
		visibility: hidden;

	}

	a.jm_chat-tab > span.jm_notify{
		right: 120px !important;

	}

	div.jm_received-messages *{
		font-size: 14px !important;
	}
	div.jm_received-messages{

		background-size: contain;
		opacity: 0.2;
	}

	div.jm_grouped > div.jm_name{
		display: none !important;
	}

	a.jm_chat-tab > span.jm_name{

		font-size: 12px !important;
		line-height: 14px !important;
		font-weight: bold !important;
	}

	a.jm_friend, span.jm_counter{
		font-size: 14px !important;
		line-height: 14px !important;
		

	}

	div.jm_search > input.jm_searchbox{
		font-size: 14px !important;
		background-position: 9px -376px !important;

	}

	input.jm_send-messages, span.jm_name{
		font-size:14px !important;

	}

	div.jm_received-messages{
		height:310px !important;

	}

	span.jm_date{
		direction: ltr;

	}

	div.jm_actions > span.jm_nick{
		
		font-family: BBCNassim !important;
		font-size: 14px !important;
		line-height: 14px !important;
		width: inherit !important;
		float: left !important;
		margin-left: 40px !important;
	}

	#jappix_mini div.jm_received-messages div.jm_group{

		border-bottom: 1px solid #FF7A00 !important;
	}

	div.jm_received-messages > div.jm_group > b.jm_name{

		color: #A93535 !important;
	}

	#mainpanel > div:nth-child(3){
		
		visibility: hidden;
			
	}

</style>

<?php

if (is_user_logged_in()){	
	$nickname = get_userdata(get_current_user_id())->user_login; 
	echo "\n".'

<script type="text/javascript">
  jQuery.ajaxSetup({ cache: true });
  
  jQuery.getScript("https://static.jappix.com/server/get.php?l=fa&t=js&g=mini.xml", function() {
     JappixMini.launch({
        connection: {
           domain: "anonymous.jappix.com",
        },

        application: {
           network: {
              autoconnect: false,
           },

           interface: {
              showpane: false,
              animate: true,
           },

           user: {
              random_nickname: false,
			  nickname: "'.$nickname.'",
           },

           groupchat: {
              open: ["asr27publicchat@muc.jappix.com"],
           },
        },
     });
  });
</script>';


}
?>


</head>
<body>
<div id="wrapper">
	<div class="header">
		<div class="head-img">
		</div>
		
			<?php wp_nav_menu('menu=main&after=<span class=container></span>'); ?>
		
	</div>
