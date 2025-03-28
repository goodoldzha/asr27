<?php
// Enable Shortcodes in Widgets
add_filter( 'widget_text', 'do_shortcode' );

// Quote Shortcodes
function postechin_quote( $atts, $content = null )
{
      return '
      <div class="postechin_quote" >'. $content . '</div>'; 
}
add_shortcode('quote', 'postechin_quote');

// Button Shortcodes
function postechin_button( $atts, $content = null )
{
    extract( shortcode_atts( array(
      'color' => 'blue',
	  'icon'  => '',
	  'size'  => 'medium',
	  'link'  => '',
      ), $atts ) );
 if($link!='') {$link='href="'.$link.'"';}
      return '
      <a class="postechin_button  '.$color.' '.$size.'" '.$link.'"><span class="icon-'.$icon.'">' . $content . '</span></a>'; 
}
add_shortcode('button', 'postechin_button');

// Box Shortcodes
function postechin_box( $atts, $content = null )
{
    extract( shortcode_atts( array(
      'icon' => 'normal'
      ), $atts ) );
      return '
      <div class="postechin_box  box-' .  $icon . '"><div class="box_content">' . $content . '</div></div>'; 
}
add_shortcode('box', 'postechin_box');

// Tweet Shortcodes
function postechin_twitter($atts, $content = null) {
   	extract(shortcode_atts(array(	'url' => '',
   									'style' => 'vertical',
   									'source' => '',
   									'text' => '',
   									'related' => '',
   									'lang' => '',
   									'float' => 'left'), $atts));
	$output = '';

	if ( $url )
		$output .= ' data-url="'.$url.'"';
		
	if ( $source )
		$output .= ' data-via="'.$source.'"';
	
	if ( $text ) 
		$output .= ' data-text="'.$text.'"';

	if ( $related ) 			
		$output .= ' data-related="'.$related.'"';

	if ( $lang ) 			
		$output .= ' data-lang="'.$lang.'"';
	
	$output = '<div class="postechin-twitter '.$float.'"><a href="http://twitter.com/share" class="twitter-share-button"'.$output.' data-count="'.$style.'">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script></div>';	
	return $output;

}
add_shortcode( 'twitter', 'postechin_twitter' );

// Digg Shortcodes
function postechin_digg($atts, $content = null) {
   	extract(shortcode_atts(array(	'link' => '',
   									'title' => '',
   									'style' => 'medium',
   									'float' => 'left'), $atts));
	$output = "		
	<script type=\"text/javascript\">
	(function() {
	var s = document.createElement( 'SCRIPT'), s1 = document.getElementsByTagName( 'SCRIPT')[0];
	s.type = 'text/javascript';
	s.async = true;
	s.src = 'http://widgets.digg.com/buttons.js';
	s1.parentNode.insertBefore(s, s1);
	})();
	</script>		
	";
	
	// Add custom URL
	if ( $link ) {
		// Add custom title
		if ( $title ) 
			$title = '&amp;title='.urlencode( $title );
			
		$link = ' href="http://digg.com/submit?url='.urlencode( $link ).$title.'"';
	}
	
	if ( $style == "large" )
		$style = "Large";
	elseif ( $style == "compact" )
		$style = "Compact";
	elseif ( $style == "icon" )
		$style = "Icon";
	else
		$style = "Medium";		
		
	$output .= '<div class="postechin-digg '.$float.'"><a class="DiggThisButton Digg'.$style.'"'.$link.'></a></div>';
	return $output;

}
add_shortcode( 'digg', 'postechin_digg' );

// Facebook Like Shortcodes
function postechin_fblike($atts, $content = null) {
   	extract(shortcode_atts(array(	'float' => 'none',
   									'url' => '',
   									'style' => 'standard',
   									'showfaces' => 'false',
   									'width' => '450',
   									'verb' => 'like',
   									'colorscheme' => 'light',
   									'font' => 'arial'), $atts));
		
	global $post;
	
	if ( ! $post ) {
		
		$post = new stdClass();
		$post->ID = 0;
		
	} // End IF Statement
	
	$allowed_styles = array( 'standard', 'button_count', 'box_count' );
	
	if ( ! in_array( $style, $allowed_styles ) ) { $style = 'standard'; } // End IF Statement		
	
	if ( !$url )
		$url = get_permalink($post->ID);
	
	$height = '60';	
	if ( $showfaces == 'true')
		$height = '100';
	
	if ( ! $width || ! is_numeric( $width ) ) { $width = 450; } // End IF Statement
		
	switch ( $float ) {
	
		case 'left':
		
			$float = 'fl';
		
		break;
		
		case 'right':
		
			$float = 'fr';
		
		break;
		
		default:
		break;
	
	} // End SWITCH Statement
		
	$output = '
<div class="postechin-fblike '.$float.'">		
<iframe src="http://www.facebook.com/plugins/like.php?href='.$url.'&amp;layout='.$style.'&amp;show_faces='.$showfaces.'&amp;width='.$width.'&amp;action='.$verb.'&amp;colorscheme='.$colorscheme.'&amp;font=' . $font . '" scrolling="no" frameborder="0" allowTransparency="true" style="border:none; overflow:hidden; width:'.$width.'px; height:'.$height.'px"></iframe>
</div>
	';
	return $output;

}
add_shortcode( 'fblike', 'postechin_fblike' );

// Facebook Share Shortcodes
function postechin_fbshare($atts, $content = null) {
   	extract(shortcode_atts(array( 'url' => '', 'type' => 'button', 'float' => 'left' ), $atts));
				
	global $post;
	
	if ( $url == '' ) { $url = get_permalink($post->ID); } // End IF Statement
	
	$output = '
<div class="postechin-fbshare '.$float.'">	
<a name="fb_share" type="'.$type.'" share_url="'.$url.'">' . $content . '</a> 
<script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" 
        type="text/javascript">
</script>
</div>
	';
	return $output;

}
add_shortcode( 'fbshare', 'postechin_fbshare' );


// List Shortcodes
function postechin_unorderedlist ( $atts, $content = null ) {

	$defaults = array( 'style' => 'default' );

	extract( shortcode_atts( $defaults, $atts ) );
	
	return '<div class="postechin-unorderedlist ' . $style . '">' . do_shortcode( $content ) . '</div>' . "\n";

}

add_shortcode( 'list', 'postechin_unorderedlist' );
?>