<?php
/*
Template Name: Download Category Page
*/
?>
	<?php get_header(); ?>
	<div class="middle">
		<div id="main">
			<h2 class="part-title"><?php _e('Last Downloads','postechin');?></h2>
				<?php
					$additional_loop = new WP_Query("post_type=download&posts_per_page=10&paged=$paged");
					$count=1;
					$num = (have_posts()) ? sizeof($my_query->posts) : 0;
					while ($additional_loop->have_posts()) : $additional_loop->the_post(); ?>
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
									<h4><?php $m=get_post_meta($post->ID, "download_size" , true); if($m!='') { _e('Download Size:','postechin'); ?><?php echo $m;?><br/><?php } ?></h4>
									<span><?php the_time('l, F jS, Y') ?></span>
								</div>
								<div class="share">
									<a href="http://del.icio.us/post?url=<?php the_permalink() ?>&title=<?php the_title(); ?>"><img src="<?php bloginfo('template_directory');?>/images/panel/delicious.png"/></a>
									<a href="http://twitter.com/home?status=<?php the_permalink(); ?>" title="<?php the_title(); ?>" target="_blank"><img src="<?php bloginfo('template_directory');?>/images/panel/twitter.png"/></a>
									<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&t=<?php the_title(); ?>" target="blank"><img src="<?php bloginfo('template_directory');?>/images/panel/facebook.png"/></a>
								</div>
							</div>
					<?php
						
					endwhile;
					kriesi_pagination($additional_loop->max_num_pages);
				?>
		</div>
		<div id="sidebar">
			<?php get_sidebar('Sidebar'); ?>
		</div>
	</div>
	<?php get_footer(); ?>	