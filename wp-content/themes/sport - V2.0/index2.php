
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
				<?php
					$args=array(
						'post_type' => 'post',
						'post_status' => 'publish',
						'posts_per_page' => 100
					);
					$my_query = null;
					$my_query = new WP_Query($args);
					if( $my_query->have_posts() ) {
          $published_post_count = 20;
					while ($my_query->have_posts()) : $my_query->the_post(); ?>
            
            <?php if (has_term(310, 'post_cat') || has_term(292, 'post_cat') || has_term(286, 'post_cat') || has_term(296, 'post_cat') || has_term(297, 'post_cat')) continue; ?>
      
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
					}
					wp_reset_query();
				?>

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