<?php load_plugin_textdomain('private-message', "http://localhost/roma/wp-content/plugins/private-message/");

// Load Inbox Message
 ?>
<div class="wrap">  
<?php	if($_GET['message_id'] && $_GET['user_id']) { ?>
	<h2><?php _e("Show Message" , 'private-message'); ?></h2>
	<?php global $current_user; get_currentuserinfo();
	if ($current_user->id==$_GET['user_id']) { $message=get_message($_GET['message_id']);?>
		<div class="postbox">
			<h3 class="hndle" style="padding: 10px;">
				<span style="margin: 10px;"><?php echo $message->subject; ?> </span>
				<br/><br/><span style="font-size:11px; margin: 10px;"><?php _e("From: " , 'private-message'); ?></span><input type="submit" class="button-primary" name="Submit" value="<?php $user_info=get_userdata( $message->author_id ); echo $user_info->display_name; ?>" />  
				<div style="float: left;">
					<a title="<?php _e("Forward This Mail" , 'private-message'); ?>" href="admin.php?page=private-message/write.php&action=forward&message_id=<?php echo $message->id; ?>"><img src="<?php bloginfo('url');?>/wp-content/plugins/private-message/images/mail-reply.png"/></a>
					<a title="<?php _e("Back to Sent" , 'private-message'); ?>" href="admin.php?page=private-message/sent.php"><img src="<?php bloginfo('url');?>/wp-content/plugins/private-message/images/mail-inbox.png"/></a>
				</div>
			</h3>
			<p style="margin: 10px;"><?php echo $message->content; ?></p>
			<hr/>
			<em style="margin: 10px; font-size:11px; color:#888;"><?php echo $message->timestamp_gmt; ?></em>
			<br/>
		</div>
	
	
	
	
	<?php } else { echo 'your are not allow to see this message.';} ?>
<?php } else {?>
    <h2><?php _e("Inbox" , 'private-message'); ?></h2>
	
	<table class="widefat fixed" cellspacing="0">

		<thead>
		<tr>
			<th class="column-cb check-column"><input type="checkbox" /></th>
			<th class="um-time-column"><?php _e("Date" , 'private-message'); ?></th>
			<th class="um-from-column"><?php _e("From" , 'private-message'); ?></th>
			<th class="um-subject-colum"><?php _e("Subject" , 'private-message'); ?></th>
		</tr>
		</thead>
	
		<tfoot>
		<tr>
			<th class="column-cb check-column"><input type="checkbox" /></th>
			<th class="um-time-column"><?php _e("Date" , 'private-message'); ?></th>
			<th class="um-from-column"><?php _e("From" , 'private-message'); ?></th>
			<th class="um-subject-colum"><?php _e("Subject" , 'private-message'); ?></th>
		</tr>
		</tfoot>
		<tbody>
	<?php $messages=load_sent();
		foreach($messages as $message) {
	?>
			<tr >
				<th scope="row" class="check-column"><input type="checkbox" name="message_ids[]" value="2" /></th>	
				<td><?php echo $message->timestamp_gmt;?></td>
				<td><span class="um-user-name"><?php $user_info=get_userdata($message->author_id); echo $user_info->user_login;  ?></span></td>
				<td><a href="admin.php?page=private-message/sent.php&message_id=<?php echo $message->id; ?>&user_id=<?php echo $message->author_id; ?>" title="Click to view the message" class="um-show-message"><?php echo $message->subject; ?></a></td>
			</tr>
		<?php } ?>
		</tbody>
	</table>
<?php } ?>
	
	
   </div> 