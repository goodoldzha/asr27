	<?php get_header(); ?>
	<div class="middle">
		<div id="main">
			<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
			<h2 class="single-title"><img src="<?php bloginfo('template_directory');?>/images/list-icon.png"/><?php the_title(); ?></h2>
			<div class="player-info">
				<?php if (($info=get_post_meta($post->ID, "player_img" , true))!='') {?> <img src="<?php echo $info; ?>" width="186" height="236"><?php } ?>
				<div class="player-details">
					<?php if (($info=get_post_meta($post->ID, "player_number" , true))!='') {?>
						<div class="player-number">
							<?php if (($n=get_post_meta($post->ID, "player_shirt" , true))!='') {?> <h3><?php echo $n; }?></h3>
							<h2><?php echo $info; ?></h2>
						</div>
					<?php } ?>
					<?php $name=get_post_meta($post->ID, "player_name" , true); ?>
					<?php if (($info=get_post_meta($post->ID, "player_birth" , true))!='') {?> <h4> <?php _e('Date of Birth:','postechin'); ?><?php echo $info; }?></h4>
					<?php if (($info=get_post_meta($post->ID, "player_national" , true))!='') {?> <h4> <?php _e('Nationality:','postechin'); ?><?php echo $info; }?></h4>
					<?php if (($info=get_post_meta($post->ID, "player_height" , true))!='') {?> <h4> <?php _e('Height:','postechin'); ?><?php echo $info; }?></h4>
					<?php if (($info=get_post_meta($post->ID, "player_weight" , true))!='') {?> <h4> <?php _e('Weight:','postechin'); ?><?php echo $info; }?></h4>
					<?php if (($info=get_post_meta($post->ID, "player_position" , true))!='') {?><h4> <?php _e('Position:','postechin'); ?>
						<?php if ($info=='Goalkeeper') { ?> <?php _e('Goalkeeper','postechin'); ?>
						<?php } elseif ($info=='Defender') { ?> <?php _e('Defender','postechin'); ?>
						<?php } elseif ($info=='Midfielder') { ?> <?php _e('Midfielder','postechin'); ?>
						<?php } elseif ($info=='Striker') { ?> <?php _e('Striker','postechin'); ?>
						<?php } elseif ($info=='Manager/Coach') { ?><?php _e('Manager/Coach','postechin'); }?></h4>
					<?php } ?>
					<?php if (($info=get_post_meta($post->ID, "player_prevteam" , true))!='') {?> <h4> <?php _e('Previus Teams:','postechin'); ?><?php echo $info; }?></h4>
					<?php if (($info=get_post_meta($post->ID, "player_first" , true))!='') {?> <h4> <?php _e('First match for Roma:','postechin'); ?><?php echo $info; }?></h4>
					<?php if (($info=get_post_meta($post->ID, "player_clubcount" , true))!='') {?> <h4> <?php _e('Club match count:','postechin'); ?><?php echo $info; }?></h4>
					<?php if (($info=get_post_meta($post->ID, "player_nationalcount" , true))!='') {?> <h4> <?php _e('National match count:','postechin'); ?><?php echo $info; }?></h4>
					<?php if (($info=get_post_meta($post->ID, "player_contract" , true))!='') {?> <h4> <?php _e('Contract Time/Value:','postechin'); ?><?php echo $info; }?></h4>
					<?php if (($info=get_post_meta($post->ID, "player_Number" , true))!='') {?> <h4> <?php _e('Squad Number:','postechin'); ?><?php echo $info; }?></h4>
				</div>
			</div>
			<div class="single-meta">
   					<div class="share">
									<a href="http://del.icio.us/post?url=<?php the_permalink() ?>&title=<?php the_title(); ?>"><img src="<?php bloginfo('template_directory');?>/images/panel/delicious.png"/></a>
									<a href="http://twitter.com/home?status=<?php the_permalink(); ?>" title="<?php the_title(); ?>" target="_blank"><img src="<?php bloginfo('template_directory');?>/images/panel/twitter.png"/></a>
									<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&t=<?php the_title(); ?>" target="blank"><img src="<?php bloginfo('template_directory');?>/images/panel/facebook.png"/></a>
					</div>
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
		<div id="sidebar">
			<?php get_sidebar('Sidebar'); ?>
		</div>
	</div>
	<?php get_footer(); ?>	