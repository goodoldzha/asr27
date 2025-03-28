			<div class="match">
				<div class="sidebar-title"><?php _e('Next Match','postechin'); ?></div>
				<div class="last-match-middle">
					<?php
						$count=1;
						$args=array(
							'post_type' => 'match',
							'post_status' => 'publish',
							);
							$my_query = null;
							$my_query = new WP_Query($args);
							if( $my_query->have_posts()  ) {
							while ($my_query->have_posts()) : $my_query->the_post(); 
								$type= get_post_meta($post->ID, "match_type" , true);
								if ($type=='pre'&& $count<2){
								?>
								<h2 class="last-match-home"><?php if(($t=get_post_meta($post->ID, "home_team" , true))!='') {?><div class="home-logo"><img src="<?php bloginfo('template_directory');?>/images/teams/<?php echo $t.'.png'; ?>" width="48" height="48" /></div><?php _e($t,'postechin'); } else { ?><div class="home-logo"><img src="<?php echo get_post_meta($post->ID, "home_logo" , true);?>" width="48" height="48" /></div><?php echo get_post_meta($post->ID, "home_name" , true);?><?php } ?></h2>
								
									<div class="last-match-vs">
										<h5><?php echo get_post_meta($post->ID, "match_time" , true);?></h5>
										<h6><?php echo get_post_meta($post->ID, "match_date" , true);?></h6>
										<a href="<?php the_permalink(); ?>"><div class="button"><?php _e('Match Details','postechin'); ?></div></a>
										
									</div>

								<h2 class="last-match-away"><?php if(($t=get_post_meta($post->ID, "away_team" , true))!='') {?><div class="home-logo"><img src="<?php bloginfo('template_directory');?>/images/teams/<?php echo $t.'.png'; ?>" width="48" height="48" /></div><?php _e($t,'postechin'); } else { ?><div class="home-logo"><img src="<?php echo get_post_meta($post->ID, "away_logo" , true);?>" width="48" height="48" /></div><?php echo get_post_meta($post->ID, "away_name" , true);?><?php } ?></h2>
							<?php $count++;}
							endwhile;
							}
							wp_reset_query();
						?>
				</div>
			</div>
			<div class="match">
				<div class="sidebar-title"><?php _e('Previous Match','postechin'); ?></div>
				<div class="last-match-middle">
					<?php
						$count=1;
						$args=array(
							'post_type' => 'match',
							'post_status' => 'publish',
							);
							$my_query = null;
							$my_query = new WP_Query($args);
							if( $my_query->have_posts()  ) {
							while ($my_query->have_posts()) : $my_query->the_post(); 
								$type= get_post_meta($post->ID, "match_type" , true);
								if ($type=='done'&& $count<2){
								?>
								<h2 class="last-match-home"><?php if(($t=get_post_meta($post->ID, "home_team" , true))!='') {?><div class="home-logo"><img src="<?php bloginfo('template_directory');?>/images/teams/<?php echo $t.'.png'; ?>" width="48" height="48" /></div><?php _e($t,'postechin'); } else { ?><div class="home-logo"><img src="<?php echo get_post_meta($post->ID, "home_logo" , true);?>" width="48" height="48" /></div><?php echo get_post_meta($post->ID, "home_name" , true);?><?php } ?></h2>
								
									<div class="last-match-result">
										<h5><?php  $m=get_post_meta($post->ID, "match_away_result" , true); if ($m=='') {echo "0";} else {echo $m; }
									echo "-";
									$m=get_post_meta($post->ID, "match_home_result" , true); if ($m=='') {echo "0";} else echo $m;?></h5>
										<a href="<?php the_permalink(); ?>"><div class="button"><?php _e('Match Details','postechin'); ?></div></a>
									</div>
								<h2 class="last-match-away"><?php if(($t=get_post_meta($post->ID, "away_team" , true))!='') {?><div class="home-logo"><img src="<?php bloginfo('template_directory');?>/images/teams/<?php echo $t.'.png'; ?>" width="48" height="48" /></div><?php _e($t,'postechin'); } else { ?><div class="home-logo"><img src="<?php echo get_post_meta($post->ID, "away_logo" , true);?>" width="48" height="48" /></div><?php echo get_post_meta($post->ID, "away_name" , true);?><?php } ?></h2>
							<?php $count++;}
							endwhile;
							}
							wp_reset_query();
						?>
				</div>
			</div>
	<ul>
		<?php if(function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar') ) : else: ?>
		
		<?php endif; ?>
		
	</ul>