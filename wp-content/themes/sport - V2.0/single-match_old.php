<?php include(TEMPLATEPATH.'/function/formation-home.php'); ?>
<?php include(TEMPLATEPATH.'/function/formation-away.php'); ?>
	<?php get_header(); ?>
	<div class="middle">
		<div id="main">
			<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
			<div class="match-content">
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
					<ul class="tabs">
						<li><a href="#tab1"><?php _e('Preview','postechin');?></a></li>
						<li><a href="#tab2"><?php _e('Teams Squad','postechin');?></a></li>
						<li><a href="#tab3"><?php _e('Game Report','postechin');?></a></li>
						<li><a href="#tab4"><?php _e('Match Stats','postechin');?></a></li>
						<li><a href="#tab5"><?php _e('Live Commentry','postechin');?></a></li>
						<li><a href="#tab6"><?php _e('Comments','postechin');?></a></li>
						<li><a href="#tab7"><?php _e('Predict','postechin');?></a></li>
					</ul>

					<div class="tab_container">
						<div id="tab1" class="tab_content">
							<p><?php the_content(); ?></p>
						</div>
						<div id="tab2" class="tab_content">
							<?php $g=get_post_meta($post->ID, "home_squad" , true); if($g!='') { ?>
							<h2 class="match-title">
								<img src="<?php bloginfo('template_directory');?>/images/list-icon.png" style="margin-left:5px;"/><?php _e('Home:','postechin'); if(($t=get_post_meta($post->ID, "home_team" , true))!='') { echo _e($t,'postechin'); } else { echo get_post_meta($post->ID, "home_name" , true); }?><br/>
								<span><?php $m=get_post_meta($post->ID, "home_coach" , true); if($m!='') { _e('Coach:','postechin'); echo $m;  }?><h5><?php  _e('System:','postechin'); echo strrev(get_post_meta($post->ID, "home_formation" , true));?></h5></span>
								<?php $k=$t=get_post_meta($post->ID, "home_kit_num" , true); if(($t=get_post_meta($post->ID, "home_team" , true))!='') {?><img class="kit" src="<?php bloginfo('template_directory');?>/images/teams/kit/<?php echo $t.$k.'.png'; ?>" width="50" height="68" /> <?php } else { ?><img class="kit" src="<?php echo get_post_meta($post->ID, "home_skit" , true);?>" width="50" height="68" /> <?php } ?>
							</h2>
							<div class="field">	
								<h2 class="home-info">	
									<?php	
										$e = explode("\n", $g);
										$c= get_post_meta($post->ID, "home_Kit" , true);
										$sys=get_post_meta($post->ID, "home_formation" , true);?>
										<?php if ($sys=="4-4-2") {	hformation_4_4_2($e,$c); ?>
										<?php } elseif ($sys=="4-3-1-2") {	hformation_4_3_1_2($e,$c); ?>
										<?php } elseif ($sys=="4-3-2-1") {	hformation_4_3_2_1($e,$c); ?>
										<?php } elseif ($sys=="4-1-2-3") {	hformation_4_1_2_3($e,$c); ?>
										<?php } elseif ($sys=="4-2-3-1") {	hformation_4_2_3_1($e,$c); ?>
										<?php } elseif ($sys=="4-2-1-3") {	hformation_4_2_1_3($e,$c); ?>
										<?php } elseif ($sys=="4-3-3")   {	hformation_4_3_3($e,$c); ?>
										<?php } elseif ($sys=="3-4-1-2") {	hformation_3_4_1_2($e,$c); ?>
										<?php } elseif ($sys=="3-3-2-2") {	hformation_3_3_2_2($e,$c); ?>
										<?php } elseif ($sys=="3-4-3") {	hformation_3_4_3($e,$c); ?>
										<?php } elseif ($sys=="5-2-2-1") {	hformation_5_2_2_1($e,$c); }?>
								</h2>
							</div>
							<?php } else {?><p class="no-found"><?php _e('No formation for ','postechin'); echo $hn;  _e(' found.','postechin'); echo '</p>';}?>
							<?php $g=get_post_meta($post->ID, "away_squad" , true); if($g!='') { ?>
							<h2 class="match-title">
								<img src="<?php bloginfo('template_directory');?>/images/list-icon.png" style="margin-left:5px;"/><?php _e('Away:','postechin'); if(($t=get_post_meta($post->ID, "away_team" , true))!='') { echo _e($t,'postechin'); } else { echo get_post_meta($post->ID, "away_name" , true); }?><br/>
								<span><?php $m=get_post_meta($post->ID, "away_coach" , true); if($m!='') { _e('Coach:','postechin'); echo $m;  }?><h5><?php  _e('System:','postechin'); echo strrev(get_post_meta($post->ID, "away_formation" , true));?></h5></span>
								<?php $k=$t=get_post_meta($post->ID, "away_kit_num" , true); if(($t=get_post_meta($post->ID, "away_team" , true))!='') {?><img class="kit" src="<?php bloginfo('template_directory');?>/images/teams/kit/<?php echo $t.$k.'.png'; ?>" width="50" height="68" /> <?php } else { ?><img class="kit" src="<?php echo get_post_meta($post->ID, "away_skit" , true);?>" width="50" height="68" /> <?php } ?>
							</h2>
							<div class="field">	
								<h2 class="home-info">	
									<?php	
										$e = explode("\n", $g);
										$c= get_post_meta($post->ID, "away_Kit" , true);
										$sys=get_post_meta($post->ID, "away_formation" , true);?>
										<?php if ($sys=="4-4-2") {	aformation_4_4_2($e,$c); ?>
										<?php } elseif ($sys=="4-3-1-2") {	aformation_4_3_1_2($e,$c); ?>
										<?php } elseif ($sys=="4-3-2-1") {	aformation_4_3_2_1($e,$c); ?>
										<?php } elseif ($sys=="4-1-2-3") {	aformation_4_1_2_3($e,$c); ?>
										<?php } elseif ($sys=="4-2-3-1") {	aformation_4_2_3_1($e,$c); ?>
										<?php } elseif ($sys=="4-2-1-3") {	aformation_4_2_1_3($e,$c); ?>
										<?php } elseif ($sys=="4-3-3")   {	aformation_4_3_3($e,$c); ?>
										<?php } elseif ($sys=="3-4-1-2") {	aformation_3_4_1_2($e,$c); ?>
										<?php } elseif ($sys=="3-3-2-2") {	aformation_3_3_2_2($e,$c); ?>
										<?php } elseif ($sys=="3-4-3") {	aformation_3_4_3($e,$c); ?>
										<?php } elseif ($sys=="5-2-2-1") {	aformation_5_2_2_1($e,$c); }?>
								</h2>
							</div>	
							<?php } else {?><p class="no-found"><?php _e('No formation for ','postechin'); echo $an;  _e(' found.','postechin'); echo '</p>';}?>
						</div>
						<div id="tab3" class="tab_content">
							<p><?php if ($type=='done') { $fff=get_post_meta($post->ID, "match_review" , true);$ddd = str_replace("\n","<br>",$fff); if ($ddd!='') { echo $ddd;} else { _e('No report found.','postechin');  } } elseif ($type=='pre'){ _e('Game is not play yet.','postechin');  } ?></p>
						</div>
						<div id="tab4" class="tab_content">
							<div class="home-stat">
								<?php
								$fff=get_post_meta($post->ID, "home_squad" , true);
								if ($fff!='') {
								$e = explode("\n", $fff); 
								for ($i=0;$i<11;$i++) { $temp=explode('-',$e[$i]);
									echo '<div class="home-player"><div class="home-player-kit '.get_post_meta($post->ID, "home_Kit" , true).'">'.$temp[0].'</div><h2>'.do_shortcode($temp[1]).'</h2></div>';
								}
								} else { _e('No formation for ','postechin'); echo $an;  _e(' found.','postechin'); }
								?>
							</div>
							<div class="match-stat">
								<?php if ($type=='done') { ?>
								<div class="stat-detail">
									<span><?php $g=get_post_meta($post->ID, "stat_home_shot" , true); if($g!='') {echo $g;}else {echo '0';} ?></span>
									<h3><?php _e('Total Shot','postechin'); ?></h3>
									<span><?php $g=get_post_meta($post->ID, "stat_away_shot" , true); if($g!='') {echo $g;}else {echo '0';} ?></span>
								</div>
								<div class="stat-detail">
									<span><?php $g=get_post_meta($post->ID, "stat_home_target" , true); if($g!='') {echo $g;}else {echo '0';} ?></span>
									<h3><?php _e('Shot On Target','postechin'); ?></h3>
									<span><?php $g=get_post_meta($post->ID, "stat_away_target" , true); if($g!='') {echo $g;}else {echo '0';} ?></span>
								</div>
								<div class="stat-detail">
									<span><?php $g=get_post_meta($post->ID, "stat_home_pass" , true); if($g!='') {echo $g;}else {echo '0';} echo '%'; ?></span>
									<h3><?php _e('Pass Accuracy','postechin'); ?></h3>
									<span><?php $g=get_post_meta($post->ID, "stat_away_pass" , true); if($g!='') {echo $g;}else {echo '0';} echo '%'; ?></span>
								</div>
								<div class="stat-detail">
									<span><?php $g=get_post_meta($post->ID, "stat_home_offside" , true); if($g!='') {echo $g;}else {echo '0';} ?></span>
									<h3><?php _e('Offside','postechin'); ?></h3>
									<span><?php $g=get_post_meta($post->ID, "stat_away_offside" , true); if($g!='') {echo $g;}else {echo '0';} ?></span>
								</div>
								<div class="stat-detail">
									<span><?php $g=get_post_meta($post->ID, "stat_home_foul" , true); if($g!='') {echo $g;}else {echo '0';} ?></span>
									<h3><?php _e('Foul','postechin'); ?></h3>
									<span><?php $g=get_post_meta($post->ID, "stat_away_foul" , true); if($g!='') {echo $g;}else {echo '0';} ?></span>
								</div>
								<div class="stat-detail">
									<span><?php $g=get_post_meta($post->ID, "stat_home_yellow" , true); if($g!='') {echo $g;}else {echo '0';} ?></span>
									<h3><?php _e('Yellow Card','postechin'); ?></h3>
									<span><?php $g=get_post_meta($post->ID, "stat_away_yellow" , true); if($g!='') {echo $g;}else {echo '0';} ?></span>
								</div>
								<div class="stat-detail">
									<span><?php $g=get_post_meta($post->ID, "stat_home_red" , true); if($g!='') {echo $g;}else {echo '0';} ?></span>
									<h3><?php _e('Red Card','postechin'); ?></h3>
									<span><?php $g=get_post_meta($post->ID, "stat_away_red" , true); if($g!='') {echo $g;}else {echo '0';} ?></span>
								</div>
								<div class="stat-detail">
									<span><?php $g=get_post_meta($post->ID, "stat_home_corner" , true); if($g!='') {echo $g;}else {echo '0';} ?></span>
									<h3><?php _e('Corner','postechin'); ?></h3>
									<span><?php $g=get_post_meta($post->ID, "stat_away_corner" , true); if($g!='') {echo $g;}else {echo '0';} ?></span>
								</div>
								<div class="stat-detail">
									<h2><?php _e('Ball Possession','postechin'); ?></h3>
									<h4 class="ball-home"><img src="<?php bloginfo('template_directory');?>/images/panel/square-blue.png"/><?php if(($t=get_post_meta($post->ID, "home_team" , true))!='') { echo _e($t,'postechin'); } else { echo get_post_meta($post->ID, "home_name" , true); }?></h4>
									<h4 class="ball-away"><?php if(($t=get_post_meta($post->ID, "away_team" , true))!='') { echo _e($t,'postechin'); } else { echo get_post_meta($post->ID, "away_name" , true); }?><img src="<?php bloginfo('template_directory');?>/images/panel/square-green.png"/></h4>
									<?php $ddd ='[chart labels="'.get_post_meta($post->ID, "stat_home_ball" , true).'|'.get_post_meta($post->ID, "stat_away_ball" , true).'" data="'.get_post_meta($post->ID, "stat_home_ball" , true).','.get_post_meta($post->ID, "stat_away_ball" , true).'" bg="F7F9FA" colors="058DC7,50B432" size="168x80" type="pie"]'; echo do_shortcode($ddd); ?>
								</div>
								<?php } elseif ($type=='pre'){?> <p> <?php _e('Game is not play yet.','postechin'); ?></p><?php } ?>
								<div class="stat-detail">
									<?php $hw=get_post_meta($post->ID, "stat_home_win" , true); $hl=get_post_meta($post->ID, "stat_home_lose" , true); $hd=get_post_meta($post->ID, "stat_home_draw" , true); if (($hw!='')&&($hl!='')&&($hd!='')) {?>
									<h2><?php _e('History of last 10 Season','postechin'); ?></h3>
									<h4 class="win-home"><img src="<?php bloginfo('template_directory');?>/images/panel/square-blue.png"/><?php echo _e('Win ','postechin'); if(($t=get_post_meta($post->ID, "home_team" , true))!='') { echo _e($t,'postechin'); } else { echo get_post_meta($post->ID, "home_name" , true); }?></h4>
									<h4 class="win-home"><img src="<?php bloginfo('template_directory');?>/images/panel/square-green.png"/><?php echo _e('Win ','postechin'); if(($t=get_post_meta($post->ID, "away_team" , true))!='') { echo _e($t,'postechin'); } else { echo get_post_meta($post->ID, "away_name" , true); }?></h4>
									<h4 class="win-home"><img src="<?php bloginfo('template_directory');?>/images/panel/square-red.png"/><?php echo _e('Draw ','postechin');?></h4>
									<?php $ddd ='[chart labels="'.get_post_meta($post->ID, "stat_home_win" , true).'|'.get_post_meta($post->ID, "stat_home_lose" , true).'|'.get_post_meta($post->ID, "stat_home_draw" , true).'" data="'.get_post_meta($post->ID, "stat_home_win" , true).','.get_post_meta($post->ID, "stat_home_lose" , true).','.get_post_meta($post->ID, "stat_home_draw" , true).'" bg="F7F9FA" colors="058DC7,50B432,C70505" size="168x80" type="pie"]'; echo do_shortcode($ddd); 
									}
									?>
								</div>
							</div>
							<div class="away-stat">
								<?php
								$fff=get_post_meta($post->ID, "away_squad" , true);
								if ($fff!='') {
								$e = explode("\n", $fff); 
								for ($i=0;$i<11;$i++) { $temp=explode('-',$e[$i]);
									echo '<div class="away-player"><div class="away-player-kit '.get_post_meta($post->ID, "away_Kit" , true).'">'.$temp[0].'</div><h2>'.do_shortcode($temp[1]).'</h2></div>';
								}
								} else { _e('No formation for ','postechin'); echo $an;  _e(' found.','postechin'); }
								?>
							</div>
						</div>
						<div id="tab5" class="tab_content">
							<p><?php if ($type=='done') { $fff=get_post_meta($post->ID, "match_live" , true);$ddd = str_replace("\n","<br>",$fff); if ($ddd!='') { echo $ddd;} else { _e('No report found.','postechin');  } } elseif ($type=='pre'){ _e('Game is not play yet.','postechin');  } ?></p>
						</div>
						<div id="tab6" class="tab_content">
							<div class="comments-template">
								<?php comments_template(); ?>
							</div>	
						</div>
						<div id="tab7" class="tab_content">
							<p><?php _e('Coming Soon.','postechin'); ?></p>
						</div>
					</div>
					
			</div>
			<div class="single-meta">
				<h5><img src="<?php bloginfo('template_directory');?>/images/date.png"/><?php the_time('l, F jS, Y') ?></h5>
				<h6><img src="<?php bloginfo('template_directory');?>/images/author.png"/><?php echo get_the_author(); ?></h6>
				<h5><img src="<?php bloginfo('template_directory');?>/images/cat.png"/>		
					<?php echo get_the_term_list( get_the_ID(),'post_cat', '', ', ', ', ' );?>		
					<?php echo get_the_term_list( get_the_ID(),'team_cat', '', ', ', ', ' );?>		
					<?php echo get_the_term_list( get_the_ID(),'player_cat', '', ', ', ', ' );?>			
				</h5>
				<div class="share">
					<a href="http://del.icio.us/post?url=<?php the_permalink() ?>&title=<?php the_title(); ?>"><img src="<?php bloginfo('template_directory');?>/images/panel/delicious.png"/></a>
					<a href="http://twitter.com/home?status=<?php the_permalink(); ?>" title="<?php the_title(); ?>" target="_blank"><img src="<?php bloginfo('template_directory');?>/images/panel/twitter.png"/></a>
					<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&t=<?php the_title(); ?>" target="blank"><img src="<?php bloginfo('template_directory');?>/images/panel/facebook.png"/></a>
				</div>
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