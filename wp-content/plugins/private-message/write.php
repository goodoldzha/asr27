<?php load_plugin_textdomain('private-message', "http://localhost/roma/wp-content/plugins/private-message/");

$to=$_POST['recipent'];
$subject=$_POST['subject'];
$message=$_POST['message'];
global $current_user; get_currentuserinfo();
if($to && $subject && $message) {
	$res=send_message($current_user->ID,$to,$subject,$message);
	if(!$res && !$to && !$subject && !$message) { echo " ERROR"; } else { ?> 
	<div class="updated">
		<strong>
		<p><?php _e("The message has been delivered to " , 'private-message');?></p>
		</strong>
		<div style="clear:right;"></div>
	</div>
<?php } 
}
?>
	<div class="wrap">  
        <?php    echo "<h2>" . __( 'Write New Private Message', 'private-message' ) . "</h2>"; ?>  
		<form name="write_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">  
		<div class="postbox">
			<h3 class="hndle" style="padding: 10px;">
				<p><?php _e("Recipent: " , 'private-message'); $user_list=users_list();?>
												<?php if($_GET['action']=='reply' && $_GET['message_id']) { $message=get_message($_GET['message_id'])?><SELECT NAME="recipent"><OPTION  VALUE="<?php echo $message->author_id; $user_info=get_userdata($message->author_id) ?>"><?php echo $user_info->display_name; ?></OPTION></SELECT></p> <?php } else {?>
														<SELECT NAME="recipent" style="width:100px;">
															<?php foreach ( $user_list as $users ) { 
																	?>
																		<OPTION  VALUE="<?php echo $users->ID; ?>"><?php echo $users->display_name; ?></OPTION>
																	
																	 
																	<?php } ?>
														</SELECT></p> <?php } ?>
				<p><?php _e("Subject: " ); ?><input type="text" name="subject" size="61" value="<?php if($_GET['action']=='forward' && $_GET['message_id']) { $message=get_message($_GET['message_id']);_e("FW: " , 'private-message'); echo $message->subject; } elseif ($_GET['action']=='reply' && $_GET['message_id']) { $message=get_message($_GET['message_id']);_e("Reply: " , 'private-message'); echo $message->subject; }?>"></p>
			</h3>
			<p  style="padding: 5px 15px 5px 10px;"><textarea name="message" id="comment" rows="10" cols="61"><?php if($_GET['action']=='forward' && $_GET['message_id']) { $message=get_message($_GET['message_id']); echo $message->content; }?></textarea></p>
		</div>
            <p class="submit">  
				<input type="submit" class="button-primary" name="Submit" value="<?php _e('Send Message', 'private-message' ) ?>" />  
            </p>  
        </form>  
    </div> 
