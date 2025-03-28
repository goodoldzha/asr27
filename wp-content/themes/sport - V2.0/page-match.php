<?php
/*
Template Name: Match Archive Page
*/
?>
	<?php get_header(); ?>
	<div class="middle">
		<div id="main">
			<h2 class="part-title"><?php _e('Match Archives','postechin');single_cat_title();  ?></h2>
					<?php
					$additional_loop = new WP_Query("post_type=match&posts_per_page=8&paged=$paged");
					while ($additional_loop->have_posts()) : $additional_loop->the_post(); ?>
							<div class="match-content">
								<a href="<?php the_permalink(); ?>">
								<div class="match-info">
									<div class="single-match-home"><?php if(($hn=get_post_meta($post->ID, "home_team" , true))!='') {?><img src="<?php bloginfo('template_directory');?>/images/teams/<?php echo $hn.'.png'; ?>" width="48" height="48" /><h3><?php _e($hn,'postechin');?></h3></div><?php } else { ?><img src="<?php echo get_post_meta($post->ID, "home_logo" , true);?>" width="48" height="48" /><h3><?php $hn=get_post_meta($post->ID, "home_name" , true); echo $hn;?></h3></div><?php } ?>
									<div class="single-match-result">
										<?php $type= get_post_meta($post->ID, "match_type" , true); 
											if ($type=='done') {?>
										<h5><?php  $m=get_post_meta($post->ID, "match_away_result" , true); if ($m=='') {echo "0";} else {echo $m; }
									echo "-";
									$m=get_post_meta($post->ID, "match_home_result" , true); if ($m=='') {echo "0";} else echo $m;?></h5>
											<?php } elseif ($type=='pre') { ?>
										<h5><?php echo get_post_meta($post->ID, "match_time" , true);?></h5>
											<?php } ?>
									</div>
									<div class="single-match-away"><?php if(($an=get_post_meta($post->ID, "away_team" , true))!='') {?><img src="<?php bloginfo('template_directory');?>/images/teams/<?php echo $an.'.png'; ?>" width="48" height="48" /><h3><?php _e($an,'postechin');?></h3></div><?php } else { ?><img src="<?php echo get_post_meta($post->ID, "away_logo" , true);?>" width="48" height="48" /><h3><?php $an=get_post_meta($post->ID, "away_name" , true); echo $an?></h3></div><?php } ?>
								</div>
								</a>
								<div class="match-detail">
									<h2 class="home-scorer"><?php $fff=get_post_meta($post->ID, "away_scorer" , true);$ddd = str_replace("\n","<br>",$fff); ?><?php echo $ddd; ?></h2>
									<h2 class="more-detail">
										<?php $m=get_post_meta($post->ID, "match_date" , true); if($m!='') { _e('Match Date:','postechin'); ?><?php echo $m;?><br/><?php } ?>
										<?php $m=get_post_meta($post->ID, "match_stadium" , true); if($m!='') { _e('Stadium:','postechin'); echo $m;?><br/><?php } ?>
										<?php $m=get_post_meta($post->ID, "match_refree" , true); if($m!='') { _e('Refree:','postechin'); echo $m;?><br/><?php } ?>
										<?php $m=get_post_meta($post->ID, "match_tv" , true); if($m!='') { _e('TV Channels:','postechin'); echo $m;?><br/><?php } ?>
									</h2>
									<h2 class="away-scorer"><?php $fff=get_post_meta($post->ID, "home_scorer" , true);$ddd = str_replace("\n","<br>",$fff); ?><?php echo $ddd; ?></h2>
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