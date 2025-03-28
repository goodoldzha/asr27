<?php load_plugin_textdomain('private-message', "http://localhost/roma/wp-content/plugins/private-message/");

$to=$_POST['recipent'];
$subject=$_POST['subject'];
$message=$_POST['message'];
global $current_user; get_currentuserinfo();
$users_list=users_list();
foreach($users_list as $user) {
	if($user && $subject && $message) {
		$res=send_message($current_user->ID,$user->ID,$subject,$message);
	} 
}
?>
	<div class="wrap">  
        <?php    echo "<h2>" . __( 'Write New Private Message', 'private-message' ) . "</h2>"; ?>  
		<form name="write_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">  
		<div class="postbox">
			<h3 class="hndle" style="padding: 10px;">
				<p><?php _e("Subject: " ); ?><input type="text" name="subject" size="61"></p>
			</h3>
			<p  style="padding: 5px 15px 5px 10px;"><textarea name="message" id="comment" rows="10" cols="61"></textarea></p>
		</div>
            <p class="submit">  
				<input type="submit" class="button-primary" name="Submit" value="<?php _e('Send Message', 'private-message' ) ?>" />  
            </p>  
        </form>  
    </div> 
