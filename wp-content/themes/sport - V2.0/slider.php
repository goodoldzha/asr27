	<script type="text/javascript">
		$(document).ready(function() { 
			$("#item-1").show();
		});
		$(document).ready(function() { 
			$("#slider-list > ul > li:first").addClass('activated');	
			setInterval( function(){
				$activated = $("#slider-list > ul > li.activated").next();
				if ($("#slider-list > ul > li.activated").find('a').attr("title")=="#item-4") {
					$activated = $('#slider-list > ul > li:first');
					$(".item-content").slideUp();
					$("#item-1").slideDown(2000);
					$("#slider-list > ul > li").removeClass('activated');
					$activated.addClass('activated');
				} else {
					var imgTitle = $("#slider-list > ul > li.activated").next().find('a').attr("title");
					$(".item-content").slideUp();
					$(imgTitle).slideDown(2000);
					$("#slider-list > ul > li").removeClass('activated');
					$activated.addClass('activated');
				}
			}, 10000 );
			$("#slider-list > ul > li").click(function(){
					var imgTitle = $(this).find('a').attr("title");
					if ($(this).is(".activated")) {  //If it's already active, then...
						return false; // Don't click through
					} else {
						$(".item-content").slideUp();
						$(imgTitle).slideDown();
						$("#slider-list > ul > li").removeClass('activated');
						$(this).addClass('activated');
						
					}
			})
		});
	</script>	
				<?php
						$args=array(
						'post_type' => array('post'),
						'taxonomy' =>'',
						'term' => $term->slug,
						'post_status' => 'publish',
						'posts_per_page' => 100
						);
					$my_query = null;
					$my_query = new WP_Query($args);
					$counter=1;
					if( $my_query->have_posts() ) {
					while ($my_query->have_posts()) : $my_query->the_post();
						$slider=get_post_meta($post->ID, "slider" , true);
						if ($slider=='on' && $counter<5) {
					?>
						<div id="item-<?php echo $counter; ?>" class="item-content" style="">
							<div class="slide-thumb"><?php the_post_thumbnail('single-thumbnail'); ?></div>
							<div class="slide-block">
								<a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
								<p><?php the_excerpt(); ?></p>
								<div class="button"><a href="<?php the_permalink(); ?>"><?php _e('More','postechin'); ?></a></div>
							</div>
						</div>	
					<?php $counter++;}
					endwhile;
					}
					wp_reset_query();
				?>

	
	<div id="slider-list" >
		<ul>
			<?php
						$args=array(
						'post_type' => array('post'),
						'taxonomy' =>'',
						'term' => $term->slug,
						'post_status' => 'publish',
						'posts_per_page' => 100
						);
					$my_query = null;
					$my_query = new WP_Query($args);
					$counter=1;
					if( $my_query->have_posts() ) {
					while ($my_query->have_posts()) : $my_query->the_post();
						$slider=get_post_meta($post->ID, "slider" , true);
						if ($slider=='on' && $counter<5) {
					?>
							 <li id="nav-item-<?php echo $counter ?>" title="<?php the_title(); ?>"><a title="#item-<?php echo $counter; ?>"><?php the_post_thumbnail(); ?></a></li>
					<?php $counter++;}
					endwhile;
					}
					wp_reset_query();
					?>
		</ul>
	</div>