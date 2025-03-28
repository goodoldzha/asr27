<?php
/*
Template Name: Full Width Page
*/
?>
	<?php get_header(); ?>
	<div class="middle">
		<div id="main-full">
			<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
			<h2 class="full-title"><img src="<?php bloginfo('template_directory');?>/images/list-icon.png"/><?php the_title(); ?></h2>
			<div class="full-content">
				<div class="full-thumb"><?php if ( has_post_thumbnail() ) { the_post_thumbnail('full-thumbnail'); }?></div>
				<p><?php the_content(); ?></p>
			</div>
			<div class="full-meta">
					<h5><img src="<?php bloginfo('template_directory');?>/images/date.png"/><?php the_time('l, F jS, Y') ?></h5>
					<h6><img src="<?php bloginfo('template_directory');?>/images/author.png"/><?php echo get_the_author(); ?></h6>
					<h5><img src="<?php bloginfo('template_directory');?>/images/cat.png"/>		
						<?php echo get_the_term_list( get_the_ID(),'post_cat', '', ', ', ', ' );?>		
						<?php echo get_the_term_list( get_the_ID(),'team_cat', '', ', ', ', ' );?>		
						<?php echo get_the_term_list( get_the_ID(),'player_cat', '', ', ', ', ' );?>			
					</h5>
			</div>
		
			<?php endwhile; ?>


			<?php else : ?>

				<div class="post">
					<h2><?php _e('Not Found','postechin'); ?></h2>
				</div>

			<?php endif; ?>
		</div>
	</div>
	<?php get_footer(); ?>	