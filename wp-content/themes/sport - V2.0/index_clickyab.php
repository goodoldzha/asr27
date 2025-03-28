	

	<?php get_header(); ?>
	<div class="slider">
		<?php include(TEMPLATEPATH.'/slider.php'); ?>
	</div>



<script type="text/javascript">

  var clickTimes = 0;

  function randomFromTo(from, to) {
        return Math.floor(Math.random() * (to - from + 1) + from);
  }



  $("body").click(  function () { 

      if (clickTimes == 0) {
          clickTimes++;
          var randNum = randomFromTo(1, 2);

          if (randNum == 1) {
              var win2 = window.open('http://asroma27.com/?post_cat=%D8%A8%D8%A7%D8%B2%D8%A7%D8%B1', '', 'width=1000,height=600,resizable=0,location=0');
              win2.blur();
              window.focus();
          }
          else if (randNum == 2) {
              var win2 = window.open('http://asroma27.com/?post_cat=%D8%A8%D8%A7%D8%B2%D8%A7%D8%B1', '', 'width=1000,height=600,resizable=0,location=0');
              win2.blur();
              window.focus();
          }
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

	$("div.slide-block > p").css({

		"max-height": "104px",
		"overflow": "hidden",
		"line-height": "26px",
	});

</script>

	<div class="last-article">
		<div class="last-article-title"></div>
			<ul id="last-article-items">
				<?php
					$args=array(
						'post_type' => 'article',
						'post_status' => 'publish',
						'posts_per_page' => 8
					);
					$my_query = null;
					$my_query = new WP_Query($args);
					if( $my_query->have_posts() ) {
					while ($my_query->have_posts()) : $my_query->the_post(); ?>
						<li>
							<div class="last-article-bg">
								<div class="last-article-bg-t"></div>
								<div class="last-article-bg-m">
									<div class="last-post-thumb"><?php
										if ( has_post_thumbnail() ) {
											?><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a><?php
										} else {
											?><a href="<?php the_permalink(); ?>"><img src="<?php bloginfo('template_directory');?>/images/no.png" width="120" height="90" /></a><?php
										}
									?></div>
									<div class="last-post-title">
										<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><h6><?php the_title(); ?></h6></a>
										<span class="meta"><?php the_time('l, F jS, Y') ?></span><span class="meta"><?php echo ', '; echo comments_number('0', '1', '%'); ?><?php _e(' comments','postechin'); ?></span>
									</div>
								</div>
								<div class="last-article-bg-d"></div>
							</div>
						</li>
					<?php
					endwhile;
					}
					wp_reset_query();
				?>
			</ul>	
	</div>
	<div class="middle">
		<div id="main">




	






			<h2 class="part-title"><?php _e('Last News','postechin'); ?></h2>


<!-- Uncomment to enable News Tabs

<div class="news-tabs" style="width: 100%;">
  
	<div class="tab-button-container"><a href="#" id="roma-news-button" class="tab-button active-button">رم</a></div>
	<div class="tab-button-container"><a href="#" id="azzurri-news-button" class="tab-button">آتزوری</a></div>
	<div class="tab-button-container"><a href="#" id="mercato-news-button" class="tab-button">بازار</a></div>
	<div class="tab-button-container"><a href="#" id="tiffosi-news-button" class="tab-button">تیفوسی‌ها</a></div>
  
</div>

-->



			<?php
			$args = array(
				'post_type' => 'post',
				'post_status' => 'publish',
				'posts_per_page' => 35,
				'tax_query' => array(
					array(
						'taxonomy' => 'post_cat',
						'field'    => 'id',
						'terms'    => array(292, 310),      //add some ids to be filtered from this tab
						'operator' => 'NOT IN',
					),
				),
			);
			$my_query = new WP_Query( $args );
	
			if( $my_query->have_posts() ) {
    	
			    $published_post_count = 27;

				?><div class="roma headlines active"><?php

				while ($my_query->have_posts()) : $my_query->the_post(); 

					if (has_term(310, 'post_cat') || has_term(292, 'post_cat')) continue; ?>
      
		            <div class="last-post">
								<div class="last-post-thumb"><?php
									if ( has_post_thumbnail() ) {
										?><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a><?php
									} else {
										?><a href="<?php the_permalink(); ?>"><img src="<?php bloginfo('template_directory');?>/images/no.png" width="120" height="90" /></a><?php
									}
								?></div>
								<div class="last-post-title">
									<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><h6><?php the_title(); ?></h6></a>
									<h4><?php the_excerpt(); ?></h4>
									<span class="meta"><?php the_time('F j, Y - g:i a') ?></span><span class="meta"><?php echo ', '; echo comments_number('0', '1', '%'); ?><?php _e(' comments','postechin'); ?></span>
								</div>
								<div class="share">
									<a href="http://del.icio.us/post?url=<?php the_permalink() ?>&title=<?php the_title(); ?>"><img src="<?php bloginfo('template_directory');?>/images/panel/delicious.png"/></a>
									<a href="http://twitter.com/home?status=<?php the_permalink(); ?>" title="<?php the_title(); ?>" target="_blank"><img src="<?php bloginfo('template_directory');?>/images/panel/twitter.png"/></a>
									<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&t=<?php the_title(); ?>" target="blank"><img src="<?php bloginfo('template_directory');?>/images/panel/facebook.png"/></a>
								</div>
					</div>

					<?php
          
			        $published_post_count--;
          
        	 		if ($published_post_count == 0)
        	    		break;
        
				endwhile;
				?></div><?php
			}
		
			wp_reset_query(); ?>






			<?php /* Uncomment to enable News Tabs
			$args = array(
				'post_type' => 'post',
				'post_status' => 'publish',
				'posts_per_page' => 20,
				'tax_query' => array(
					array(
						'taxonomy' => 'post_cat',
						'field'    => 'id',
						'terms'    => array( 55 ),
						'operator' => 'IN',
					),
				),
			);
			$my_query = new WP_Query( $args );
	
			if( $my_query->have_posts() ) {
    	
			    $published_post_count = 15;

				?><div class="azzurri headlines" style="display:none;"><?php

				while ($my_query->have_posts()) : $my_query->the_post(); 

					if (!has_term(55, 'post_cat')) continue; ?>
      
		            <div class="last-post">
								<div class="last-post-thumb"><?php
									if ( has_post_thumbnail() ) {
										?><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a><?php
									} else {
										?><a href="<?php the_permalink(); ?>"><img src="<?php bloginfo('template_directory');?>/images/no.png" width="120" height="90" /></a><?php
									}
								?></div>
								<div class="last-post-title">
									<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><h6><?php the_title(); ?></h6></a>
									<h4><?php the_excerpt(); ?></h4>
									<span class="meta"><?php the_time('F j, Y - g:i a') ?></span><span class="meta"><?php echo ', '; echo comments_number('0', '1', '%'); ?><?php _e(' comments','postechin'); ?></span>
								</div>
								<div class="share">
									<a href="http://del.icio.us/post?url=<?php the_permalink() ?>&title=<?php the_title(); ?>"><img src="<?php bloginfo('template_directory');?>/images/panel/delicious.png"/></a>
									<a href="http://twitter.com/home?status=<?php the_permalink(); ?>" title="<?php the_title(); ?>" target="_blank"><img src="<?php bloginfo('template_directory');?>/images/panel/twitter.png"/></a>
									<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&t=<?php the_title(); ?>" target="blank"><img src="<?php bloginfo('template_directory');?>/images/panel/facebook.png"/></a>
								</div>
					</div>

					<?php
          
			        $published_post_count--;
          
        	 		if ($published_post_count == 0)
        	    		break;
        
				endwhile;
				?></div><?php

			}
		
			wp_reset_query(); */ ?>









			<?php /* Uncomment to enable News Tabs
			$args = array(
				'post_type' => 'post',
				'post_status' => 'publish',
				'posts_per_page' => 20,
				'tax_query' => array(
					array(
						'taxonomy' => 'post_cat',
						'field'    => 'id',
						'terms'    => array( 292 ),
						'operator' => 'IN',
					),
				),
			);
			$my_query = new WP_Query( $args );
	
			if( $my_query->have_posts() ) {
    	
			    $published_post_count = 15;

				?><div class="mercato headlines" style="display:none;"><?php

				while ($my_query->have_posts()) : $my_query->the_post(); 

					if (!has_term(292, 'post_cat')) continue; ?>
      
		            <div class="last-post">
								<div class="last-post-thumb"><?php
									if ( has_post_thumbnail() ) {
										?><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a><?php
									} else {
										?><a href="<?php the_permalink(); ?>"><img src="<?php bloginfo('template_directory');?>/images/no.png" width="120" height="90" /></a><?php
									}
								?></div>
								<div class="last-post-title">
									<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><h6><?php the_title(); ?></h6></a>
									<h4><?php the_excerpt(); ?></h4>
									<span class="meta"><?php the_time('F j, Y - g:i a') ?></span><span class="meta"><?php echo ', '; echo comments_number('0', '1', '%'); ?><?php _e(' comments','postechin'); ?></span>

								</div>
								<div class="share">
									<a href="http://del.icio.us/post?url=<?php the_permalink() ?>&title=<?php the_title(); ?>"><img src="<?php bloginfo('template_directory');?>/images/panel/delicious.png"/></a>
									<a href="http://twitter.com/home?status=<?php the_permalink(); ?>" title="<?php the_title(); ?>" target="_blank"><img src="<?php bloginfo('template_directory');?>/images/panel/twitter.png"/></a>
									<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&t=<?php the_title(); ?>" target="blank"><img src="<?php bloginfo('template_directory');?>/images/panel/facebook.png"/></a>
								</div>
					</div>

					<?php
          
			        $published_post_count--;
          
        	 		if ($published_post_count == 0)
        	    		break;
        
				endwhile;
				?></div><?php

			}
		
			wp_reset_query(); */ ?>







			<?php /* Uncomment to enable News Tabs
			$args = array(
				'post_type' => 'post',
				'post_status' => 'publish',
				'posts_per_page' => 15,
				'tax_query' => array(
					array(
						'taxonomy' => 'post_cat',
						'field'    => 'id',
						'terms'    => array( 286 ),
						'operator' => 'IN',
					),
				),
			);
			$my_query = new WP_Query( $args );
	
			if( $my_query->have_posts() ) {
    	
			    $published_post_count = 15;

				?><div class="tiffosi headlines" style="display:none;"><?php

				while ($my_query->have_posts()) : $my_query->the_post(); 

					if (!has_term(286, 'post_cat')) continue; ?>
      
		            <div class="last-post">
								<div class="last-post-thumb"><?php
									if ( has_post_thumbnail() ) {
										?><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a><?php
									} else {
										?><a href="<?php the_permalink(); ?>"><img src="<?php bloginfo('template_directory');?>/images/no.png" width="120" height="90" /></a><?php
									}
								?></div>
								<div class="last-post-title">
									<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><h6><?php the_title(); ?></h6></a>
									<h4><?php the_excerpt(); ?></h4>
									<span class="meta"><?php the_time('F j, Y - g:i a') ?></span><span class="meta"><?php echo ', '; echo comments_number('0', '1', '%'); ?><?php _e(' comments','postechin'); ?></span>

								</div>
								<div class="share">
									<a href="http://del.icio.us/post?url=<?php the_permalink() ?>&title=<?php the_title(); ?>"><img src="<?php bloginfo('template_directory');?>/images/panel/delicious.png"/></a>
									<a href="http://twitter.com/home?status=<?php the_permalink(); ?>" title="<?php the_title(); ?>" target="_blank"><img src="<?php bloginfo('template_directory');?>/images/panel/twitter.png"/></a>
									<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&t=<?php the_title(); ?>" target="blank"><img src="<?php bloginfo('template_directory');?>/images/panel/facebook.png"/></a>
								</div>
					</div>

					<?php
          
			        $published_post_count--;
          
        	 		if ($published_post_count == 0)
        	    		break;
        
				endwhile;
				?></div><?php

			}
		
			wp_reset_query(); */ ?>




<!-- Uncomment to enable News Tabs

<script type="text/javascript">


$('#roma-news-button').click(function(e){
    e.preventDefault();
    $('div.headlines.active').fadeOut('fast', function(){
        $('div.headlines.active').removeClass('active');
        $('div.headlines.roma').addClass('active');
        $('div.news-tabs > div.tab-button-container > a.active-button').removeClass('active-button');
        $('div.news-tabs > div.tab-button-container > a#roma-news-button').addClass('active-button');
        $('div.headlines.active').fadeIn('fast');
    });
});

$('#azzurri-news-button').click(function(e){
    e.preventDefault();
    $('div.headlines.active').fadeOut('fast', function(){
        $('div.headlines.active').removeClass('active');
        $('div.headlines.azzurri').addClass('active');
        $('div.news-tabs > div.tab-button-container > a.active-button').removeClass('active-button');
        $('div.news-tabs > div.tab-button-container > a#azzurri-news-button').addClass('active-button');
        $('div.headlines.active').fadeIn('fast');
    });

});

$('#mercato-news-button').click(function(e){
    e.preventDefault();
    $('div.headlines.active').fadeOut('fast', function(){
        $('div.headlines.active').removeClass('active');
        $('div.headlines.mercato').addClass('active');
        $('div.news-tabs > div.tab-button-container > a.active-button').removeClass('active-button');
        $('div.news-tabs > div.tab-button-container > a#mercato-news-button').addClass('active-button');
        $('div.headlines.active').fadeIn('fast');
    });

});

$('#tiffosi-news-button').click(function(e){
    e.preventDefault();
    $('div.headlines.active').fadeOut('fast', function(){
        $('div.headlines.active').removeClass('active');
        $('div.headlines.tiffosi').addClass('active');
        $('div.news-tabs > div.tab-button-container > a.active-button').removeClass('active-button');
        $('div.news-tabs > div.tab-button-container > a#tiffosi-news-button').addClass('active-button');
        $('div.headlines.active').fadeIn('fast');
    });
});


</script>



-->









      	<h2 class="part-title"><?php _e('Last Video','postechin'); ?></h2>
				<ul>
				<?php
					$args=array(
						'post_type' => 'video',
						'post_status' => 'publish',
						'posts_per_page' => 16
					);
					$my_query = null;
					$my_query = new WP_Query($args);
					if( $my_query->have_posts() ) {
					while ($my_query->have_posts()) : $my_query->the_post(); ?>
							<div class="last-photo">
								<div class="last-post-thumb thumb" title="<?php the_title(); ?>"><?php
									if ( has_post_thumbnail() ) {
										?><li title="<?php the_title(); ?>"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail(); ?></a></li><?php
									} else {
										?><a href="<?php the_permalink(); ?>"><img src="<?php bloginfo('template_directory');?>/images/no.png" width="120" height="90" /></a><?php
									}?>
									<span class="hover">
										<a href="<?php the_permalink() ?>"  style="background-position: -62px 0px;"></a>
									</span>
								</div>
							</div>
					<?php
					endwhile;
					}
					wp_reset_query();
				?>
				</ul>
<!--      
        <h2 class="part-title"><?php _e('Last Photos','postechin'); ?></h2>
				<ul>
				<?php
					$args=array(
						'post_type' => 'photo',
						'post_status' => 'publish',
						'posts_per_page' => 8
					);
					$my_query = null;
					$my_query = new WP_Query($args);
					if( $my_query->have_posts() ) {
					while ($my_query->have_posts()) : $my_query->the_post(); ?>
							<div class="last-photo">
								<div class="last-post-thumb thumb" title="<?php the_title(); ?>"><?php
									if ( has_post_thumbnail() ) {
										?><li title="<?php the_title(); ?>"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail(); ?></a></li><?php
									} else {
										?><a href="<?php the_permalink(); ?>"><img src="<?php bloginfo('template_directory');?>/images/no.png" width="120" height="90" /></a><?php
									}?>
									<span class="hover">
										<a href="<?php the_permalink() ?>"  style="background-position: -124px 0px;"></a>
									</span>
								</div>
							</div>
					<?php
					endwhile;
					}
					wp_reset_query();
				?>
				</ul>
-->
			<h2 class="part-title"><?php _e('Last Downloads','postechin'); ?></h2>
				<ul>
				<?php
					$args=array(
						'post_type' => 'download',
						'post_status' => 'publish',
						'posts_per_page' => 8
					);
					$my_query = null;
					$my_query = new WP_Query($args);
					if( $my_query->have_posts() ) {
					while ($my_query->have_posts()) : $my_query->the_post(); ?>
							<div class="last-photo">
								<div class="last-post-thumb thumb" title="<?php the_title(); ?>"><?php
									if ( has_post_thumbnail() ) {
										?><li title="<?php the_title(); ?>"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail(); ?></a></li><?php
									} else {
										?><a href="<?php the_permalink(); ?>"><img src="<?php bloginfo('template_directory');?>/images/no.png" width="120" height="90" /></a><?php
									}?>
									<span class="hover">
										<a href="<?php the_permalink() ?>"  style="background-position: 0px 0px;"></a>
									</span>
								</div>
							</div>
					<?php
					endwhile;
					}
					wp_reset_query();
				?>
				</ul>

<div style="
	height: 250px;
">

<div class="wp-table-reloaded" style="
	float: left;
    width: 300px;
    height: 250px;
    margin-left: 8px;
">
<script language="javascript" src="http://tabligheirani.com/showads.php?webid=8982b5cddffd5fac453edda6bf3499f2&s=5"></script>
</div>

<div class="wp-table-reloaded" style="
	float: right;
    width: 300px;
    height: 250px;
    margin-right: 8px;
">
<script language="javascript" src="http://tabligheirani.com/showads.php?webid=8982b5cddffd5fac453edda6bf3499f2&s=5"></script>

</div>

</div>


		</div>
		<div id="sidebar">
			<?php get_sidebar('Sidebar'); ?>
		</div>
	</div>


	
	<?php get_footer(); ?>	
