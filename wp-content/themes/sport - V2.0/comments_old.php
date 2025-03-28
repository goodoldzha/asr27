<?php 
/*     This is comment.phps by Christian Montoya, http://www.christianmontoya.com

    Available to you under the do-whatever-you-want license. If you like it, 
    you are totally welcome to link back to me. 
    
    Use of this code does not grant you the right to use the design or any of the 
    other files on my site. Beyond this file, all rights are reserved, unless otherwise noted. 
    
    Enjoy!
*/
?>

<!-- Comments code provided by christianmontoya.com -->

<?php if (!empty($post->post_password) && $_COOKIE['wp-postpass_'.COOKIEHASH]!=$post->post_password) : ?>
    <p id="comments-locked"><?php _e('Enter your password to view comments.','postechin'); ?></p>
<?php return; endif; ?>

<?php if ($comments) : ?>

<?php 

    /* Author values for author highlighting */
    /* Enter your email and name as they appear in the admin options */
    $author = array(
            "highlight" => "highlight",
            "email" => "YOUR EMAIL HERE",
            "name" => "YOUR NAME HERE"
    ); 

    /* Count the totals */
    $numPingBacks = 0;
    $numComments  = 0;

    /* Loop throught comments to count these totals */
    foreach ($comments as $comment) {
        if (get_comment_type() != "comment") { $numPingBacks++; }
        else { $numComments++; }
    }
    
    /* Used to stripe comments */
    $thiscomment = 'odd'; 
?>

<?php 

    /* This is a loop for printing comments */
    if ($numComments != 0) : ?>

    <ol id="comments">
    
    <?php foreach (array_reverse($comments) as $comment) : ?>
    <?php if (get_comment_type()=="comment") : ?>
    
        <li id="comment-<?php comment_ID(); ?>" class="<?php 
        
        /* Highlighting class for author or regular striping class for others */
        
        /* Get current author name/e-mail */
        $this_name = $comment->comment_author;
        $this_email = $comment->comment_author_email;
        
        /* Compare to $author array values */
        if (strcasecmp($this_name, $author["name"])==0 && strcasecmp($this_email, $author["email"])==0)
            _e($author["highlight"]); 
        else 
            _e($thiscomment); 
        
        ?>">
            <div class="comment-main">
				<div class="comment-bg">
					<div class="comment-info">
						<div class="avatars"><?php if(function_exists('get_avatar')) { echo get_avatar($comment, '50'); } ?></div>
						<div class="comment-author">
							<h2><?php comment_author_link() ?></h2>
						</div>
						<span style="display: none;"><?php $cid=comment_ID(); ?></span>
						<?php $cid=get_comment( $cid ); if ($cid->user_id!=0) { commentCount($cid->user_id);} ?>
					</div>
					<div class="comment-text">
							<?php comment_text(); ?>
							<span class="comment-date"><?php comment_date('F j, Y - g:i a'); ?></span>
					</div>
				</div>
			</div>
        </li>
        
    <?php if('odd'==$thiscomment) { $thiscomment = 'even'; } else { $thiscomment = 'odd'; } ?>
    
    <?php endif; endforeach; ?>
    
    </ol>
    
    <?php endif; ?>
    
<?php else : 

    /* No comments at all means a simple message instead */ 
?>

	<h2 class="comments-header"><?php _e('No Comments Yet','postechin'); ?></h2>
    
<?php endif; ?>

<?php if (comments_open()) : ?>

<?php /* This would be a good place for live preview... 
    <div id="live-preview">
        <h2 class="comments-header">Live Preview</h2>
        <?php live_preview(); ?>
    </div>
 */ ?>

    <div id="comments-form">
    
    <h2 id="comments-header"><?php _e('Leave a comment','postechin'); ?></h2>
    
    <?php if (get_option('comment_registration') && !$user_ID ) : ?>
        <p id="comments-blocked"><?php _e('No Comments Yet','postechin'); ?><?php _e('You must be','postechin'); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=
        <?php the_permalink(); ?>"><?php _e('logged in','postechin'); ?></a><?php _e('to post a comment.','postechin'); ?> </p>
    <?php else : ?>

    <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

    <?php if ($user_ID) : ?>
    
    <p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php">
        <?php echo $user_identity; ?></a>. 
        <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account"><?php _e('Logout','postechin'); ?></a>
    </p>
    
    <?php else : ?>
    
        <p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="30" />
        <label for="author"><?php _e('Name','postechin'); ?><?php if ($req) _e(' (required)','postechin'); ?></label></p>
        
        <p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="30" />
        <label for="email"><?php _e('E-mail (will not be published)','postechin'); ?><?php if ($req) _e(' (required)','postechin'); ?></label></p>
       
        <p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="30" />
        <label for="url"><?php _e('Website','postechin'); ?></label></p>
    
    <?php endif; ?>

    <?php /* You might want to display this: 
        <p>XHTML: You can use these tags: <?php echo allowed_tags(); ?></p> */ ?>
	<?php if(function_exists('s4w_comment_form'))s4w_comment_form();?>
        <p><textarea name="comment" id="comment" rows="10" cols="61"></textarea></p>
        
        <?php /* Buttons are easier to style than input[type=submit], 
                but you can replace: 
                <button type="submit" name="submit" id="sub">Submit</button>
                with: 
                <input type="submit" name="submit" id="sub" value="Submit" />
                if you like */ 
        ?>
        <p><button type="submit" name="submit" id="sub" class="small-button color-orange"><?php _e('Submit','postechin'); ?></button>
        <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>"></p>
    
    <?php do_action('comment_form', $post->ID); ?>

    </form>
    </div>
<?php endif; // If registration required and not logged in ?>
<?php else : // Comments are closed ?>
    <p id="comments-closed"><?php _e('Sorry, comments for this entry are closed at this time.','postechin'); ?></p>
<?php endif; ?> 