	<?php get_header(); ?>
	<div class="slider">
		<?php include(TEMPLATEPATH.'/slider.php'); ?>
	</div>
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

<style type="text/css">
  
a.tab-button:hover{
	color:white;
}
  
 
div.tab-button-container{
	padding: 3px 0 6px 0;
	background-color:black;
	float:right;
	width: 25%;
	border-bottom: 1px solid #A58181;
}

a.tab-button{
	width: 42px;
	text-align: center;
	margin: 0 auto;
	display: block;
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
	font-size:16px;
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


<div class="news-tabs" style="width: 100%;">
  
	<div class="tab-button-container"><a href="#" id="roma-news-button" class="tab-button">رم</a></div>
	<div class="tab-button-container"><a href="#" id="italia-news-button" class="tab-button">تیم ملی</a></div>
	<div class="tab-button-container"><a href="#" id="europe-news-button" class="tab-button">اروپا</a></div>
	<div class="tab-button-container"><a href="#" id="world-news-button" class="tab-button">بازار</a></div>
  
</div>





			<?php
			$args = array(
				'post_type' => 'post',
				'post_status' => 'publish',
				'posts_per_page' => 40,
				'tax_query' => array(
					array(
						'taxonomy' => 'post_cat',
						'field'    => 'id',
						'terms'    => array( 310, 292, 286, 296, 297 ),
						'operator' => 'NOT IN',
					),
				),
			);
			$my_query = new WP_Query( $args );
	
			if( $my_query->have_posts() ) {
    	
			    $published_post_count = 20;

				?><div class="roma headlines active"><?php

				while ($my_query->have_posts()) : $my_query->the_post(); 

					if (has_term(310, 'post_cat') || has_term(292, 'post_cat') || has_term(286, 'post_cat') || has_term(296, 'post_cat') || has_term(297, 'post_cat')) continue; ?>
      
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








			<?php
			$args = array(
				'post_type' => 'post',
				'post_status' => 'publish',
				'posts_per_page' => 40,
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
    	
			    $published_post_count = 20;

				?><div class="italia headlines" style="display:none;"><?php

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
		
			wp_reset_query(); ?>









			<?php
			$args = array(
				'post_type' => 'post',
				'post_status' => 'publish',
				'posts_per_page' => 40,
				'tax_query' => array(
					array(
						'taxonomy' => 'post_cat',
						'field'    => 'id',
						'terms'    => array( 309 ),
						'operator' => 'IN',
					),
				),
			);
			$my_query = new WP_Query( $args );
	
			if( $my_query->have_posts() ) {
    	
			    $published_post_count = 20;

				?><div class="europe headlines" style="display:none;"><?php

				while ($my_query->have_posts()) : $my_query->the_post(); 

					if (!has_term(309, 'post_cat')) continue; ?>
      
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







			<?php
			$args = array(
				'post_type' => 'post',
				'post_status' => 'publish',
				'posts_per_page' => 40,
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
    	
			    $published_post_count = 20;

				?><div class="world headlines" style="display:none;"><?php

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
		
			wp_reset_query(); ?>






<script type="text/javascript">


$('#roma-news-button').click(function(e){
    e.preventDefault();
    $('div.headlines.active').fadeOut('fast', function(){
        $('div.headlines.active').removeClass('active');
        $('div.headlines.roma').addClass('active');
        $('div.headlines.active').fadeIn('fast');
    });
});

$('#italia-news-button').click(function(e){
    e.preventDefault();
    $('div.headlines.active').fadeOut('fast', function(){
        $('div.headlines.active').removeClass('active');
        $('div.headlines.italia').addClass('active');
        $('div.headlines.active').fadeIn('fast');
    });

});

$('#europe-news-button').click(function(e){
    e.preventDefault();
    $('div.headlines.active').fadeOut('fast', function(){
        $('div.headlines.active').removeClass('active');
        $('div.headlines.europe').addClass('active');
        $('div.headlines.active').fadeIn('fast');
    });

});

$('#world-news-button').click(function(e){
    e.preventDefault();
    $('div.headlines.active').fadeOut('fast', function(){
        $('div.headlines.active').removeClass('active');
        $('div.headlines.world').addClass('active');
        $('div.headlines.active').fadeIn('fast');
    });
});


</script>













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
      <!--
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
        -->
		</div>
		<div id="sidebar">
			<?php get_sidebar('Sidebar'); ?>
		</div>
	</div>
	<?php get_footer(); ?>	
