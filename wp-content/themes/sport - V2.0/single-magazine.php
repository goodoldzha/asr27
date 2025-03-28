	<?php get_header(); ?>
	<div class="middle">
		<div id="main">
			<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
			<h2 class="single-title"><img src="<?php bloginfo('template_directory');?>/images/list-icon.png"/><?php the_title(); ?></h2>
			<div class="single-mag">
				<div class="mag-page">
					<?php if (($info=get_post_meta($post->ID, "mag_img" , true))!='') {?> <img title="<?php echo $m; ?>" src="<?php echo $info; ?>" width="180" height="254"><?php } ?>
					<div class="mag-info">
						<h2><?php $m=get_post_meta($post->ID, "mag_num" , true); if($m!='') { echo $m; } ?></h2>
						<h3><?php $m=get_post_meta($post->ID, "mag_date" , true); if($m!='') { echo $m; } ?></h3>
					</div>
				</div>
				<p><?php the_content(); ?></p>
			</div>
			
			<div class="comments-template">
				<?php comments_template(); ?>
			</div>
			
			<div class="single-meta">
				<div class="share">
					<a href="http://del.icio.us/post?url=<?php the_permalink() ?>&title=<?php the_title(); ?>"><img src="<?php bloginfo('template_directory');?>/images/panel/delicious.png"/></a>
					<a href="http://twitter.com/home?status=<?php the_permalink(); ?>" title="<?php the_title(); ?>" target="_blank"><img src="<?php bloginfo('template_directory');?>/images/panel/twitter.png"/></a>
					<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&t=<?php the_title(); ?>" target="blank"><img src="<?php bloginfo('template_directory');?>/images/panel/facebook.png"/></a>
				</div>
                <h5><img src="<?php bloginfo('template_directory');?>/images/date.png"/><?php echo get_the_date(); echo '   ';?></h5>
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
		<div id="sidebar">
			<?php get_sidebar('Sidebar'); ?>
		</div>
	</div>
	<?php get_footer(); ?>	