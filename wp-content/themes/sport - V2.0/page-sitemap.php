<?php
/*
Template Name: Sitemap Page
*/
?>
	<?php get_header(); ?>

	<div class="middle">
		<div id="sidebar">
			<?php get_sidebar('Sidebar'); ?>
		</div>

		<div id="main">
			<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
			<!--Singles Last Posts-->
			<div class="cat-title-bg">
				<div class="cat-title-bg-l"></div>
				<div class="cat-title-bg-m">
					<div class="single-title">
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><h5><?php the_title(); ?></h5></a>
					</div>
				</div>
				<div class="cat-title-bg-r"></div>
			</div>
			<div class="cat-bg">				
				<div class="single-content">
					<div class="site-list list-single"><ul><?php wp_list_categories( 'taxonomy=singer_cat&hide_empty=0&title_li=<h2>' .__('Singer','postechin'). '</h2>' ); ?></ul></div>
					<div class="site-list list-music"><ul><?php wp_list_categories( 'taxonomy=music_cat&hide_empty=0&title_li=<h2>' .__('Music genre','postechin'). '</h2>' ); ?></ul></div>
					<div class="site-list list-cast"><ul><?php wp_list_categories( 'taxonomy=cast_cat&hide_empty=0&title_li=<h2>' .__('Cast','postechin'). '</h2>' ); ?></ul></div>
					<div class="site-list list-director"><ul><?php wp_list_categories( 'taxonomy=director_cat&hide_empty=0&title_li=<h2>' .__('Director','postechin'). '</h2>' ); ?></ul></div>
					<div class="site-list list-movie"><ul><?php wp_list_categories( 'taxonomy=movie_cat&hide_empty=0&title_li=<h2>' .__('Movie','postechin'). '</h2>' ); ?></ul></div>
					<div class="site-list list-series"><ul><?php wp_list_categories( 'taxonomy=series_cat&hide_empty=0&title_li=<h2>' .__('Series','postechin'). '</h2>' ); ?></ul></div>
				</div>
			</div>
	<?php endwhile; ?>


	<?php else : ?>

		<div class="post">
			<h2><?php _e('Not Found','postechin'); ?></h2>
		</div>

	<?php endif; ?>
			
		</div>

	</div>       <?php get_footer(); ?>	