	<?php get_header(); ?>
	<div class="middle">
		<div id="main">
			<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
			<h2 class="single-title"><img src="<?php bloginfo('template_directory');?>/images/list-icon.png"/><?php the_title(); ?></h2>
			<div class="single-meta">
            <div class="share">
				<a href="http://del.icio.us/post?url=<?php the_permalink() ?>&title=<?php the_title(); ?>"><img src="<?php bloginfo('template_directory');?>/images/panel/delicious.png"/></a>
				<a href="http://twitter.com/home?status=<?php the_permalink(); ?>" title="<?php the_title(); ?>" target="_blank"><img src="<?php bloginfo('template_directory');?>/images/panel/twitter.png"/></a>
				<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&t=<?php the_title(); ?>" target="blank"><img src="<?php bloginfo('template_directory');?>/images/panel/facebook.png"/></a>
			</div>
				<h5><img src="<?php bloginfo('template_directory');?>/images/date.png"/><?php the_time('F j, Y - g:i a') ?></h5>
				<h6><img src="<?php bloginfo('template_directory');?>/images/author.png"/><?php echo get_the_author(); ?></h6>
				<h5><img src="<?php bloginfo('template_directory');?>/images/cat.png"/>		
					<?php echo get_the_term_list( get_the_ID(),'post_cat', '', ', ', ', ' );?>		
					<?php echo get_the_term_list( get_the_ID(),'team_cat', '', ', ', ', ' );?>		
					<?php echo get_the_term_list( get_the_ID(),'player_cat', '', ', ', ', ' );?>			
				</h5>
				<h6><img src="<?php bloginfo('template_directory');?>/images/view.png"/><?php if(function_exists('the_views')) { the_views(); } ?></h6>
			</div>
			<div class="single-content">
				<div class="single-thumb"><?php if ( has_post_thumbnail() ) { the_post_thumbnail('single-thumbnail'); }?></div>
				<p><?php the_content(); ?></p>

                <?php if(function_exists('like_counter_p')) { like_counter_p(''); } ?>

				<?php if(function_exists('the_ratings')) { the_ratings(); } ?>
			</div>
			<div class="horiz-line"><h2 class="part-title"><?php echo comments_number('0', '1', '%'); _e(' comments','postechin'); ?></h2></div>
			<div class="comments-template">
				<?php comments_template(); ?>
			</div>
			
			
			
		
			<?php endwhile; ?>


			<?php else : ?>

				<div class="post">
					<h2><?php _e('Not Found','postechin'); ?></h2>
				</div>

			<?php endif; ?>
		</div>
		<div id="sidebar">
			<?php get_sidebar('Sidebar'); ?>
		</div>
	</div>
	<?php get_footer(); ?>	