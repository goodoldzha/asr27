	<?php get_header(); ?>
	<div class="middle">
		<div id="main">
			<h2 class="part-title"><?php _e('Posts for:','postechin');$term=get_query_var('term'); echo $term; ?></h2>
				<?php
					if(have_posts()) { ?><?php while(have_posts()) : the_post(); ?>
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
					}
					kriesi_pagination();
				?>
		</div>
		<div id="sidebar">
			<?php get_sidebar('Sidebar'); ?>
		</div>
	</div>
	<?php get_footer(); ?>	