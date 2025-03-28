<?php
/*
Template Name: Players Page
*/
?>
	<?php get_header(); ?>
	<div class="middle">
		<div id="main">
			<h2 class="part-title"><?php _e('Players','postechin'); ?></h2>
					<?php
					$additional_loop = new WP_Query("post_type=player&posts_per_page=8&paged=$paged");
					while ($additional_loop->have_posts()) : $additional_loop->the_post(); ?>
									<div class="player-info-page">
										<?php if (($info=get_post_meta($post->ID, "player_img" , true))!='') {?> <img src="<?php echo $info; ?>" width="87" height="110"><?php } ?>
										<div class="player-details">
											<?php if (($info=get_post_meta($post->ID, "player_number" , true))!='') {?>
												<div class="player-number">
													<?php if (($n=get_post_meta($post->ID, "player_shirt" , true))!='') {?> <h3><?php echo $n; }?></h3>
													<h2><?php echo $info; ?></h2>
												</div>
											<?php } ?>
											<?php if (($info=get_post_meta($post->ID, "player_name" , true))!='') {?> <a href="<?php the_permalink(); ?>"><h6><?php echo $info; }?></h6></a>
											<?php if (($info=get_post_meta($post->ID, "player_position" , true))!='') {?><h4> <?php _e('Position:','postechin'); ?>
												<?php if ($info=='Goalkeeper') { ?> <?php _e('Goalkeeper','postechin'); ?>
												<?php } elseif ($info=='Defender') { ?> <?php _e('Defender','postechin'); ?>
												<?php } elseif ($info=='Midfielder') { ?> <?php _e('Midfielder','postechin'); ?>
												<?php } elseif ($info=='Striker') { ?> <?php _e('Striker','postechin'); ?>
												<?php } elseif ($info=='Manager/Coach') { ?><?php _e('Manager/Coach','postechin'); }?></h4>
											<?php } ?>
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