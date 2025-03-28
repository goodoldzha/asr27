<?php
/*
Template Name: Magazine Category Page
*/
?>
	<?php get_header(); ?>
	<div class="middle">
		<div id="main">
			<h2 class="part-title"><?php the_title(); ?></h2>
					<?php
					$additional_loop = new WP_Query("post_type=magazine&posts_per_page=4&paged=$paged");
					while ($additional_loop->have_posts()) : $additional_loop->the_post(); ?>
						<?php $fff=get_post_meta($post->ID, "mag_title" , true);$m = str_replace("\n","<br>",$fff); ?>
						<a href="<?php the_permalink(); ?>">
						<div class="mag-page">
							<?php if (($info=get_post_meta($post->ID, "mag_img" , true))!='') {?> <img title="<?php echo $m; ?>" src="<?php echo $info; ?>" width="180" height="254"><?php } ?>
							<div class="mag-info">
								<h2><?php $m=get_post_meta($post->ID, "mag_num" , true); if($m!='') { echo $m; } ?></h2>
								<h3><?php $m=get_post_meta($post->ID, "mag_date" , true); if($m!='') { echo $m; } ?></h3>
							</div>
						</div>
						</a>
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