<?php
/*
Plugin Name: Postechin Notification
Plugin URI: http://postechin.com
Description: Notification for comment reply
Author: Peyman3d
Version: 0.1
Author URI: http://postechin.com
*/
global $wpdb, $table_prefix;

// Create Table
function my_plugin_create_table()
{
        // do NOT forget this global
	global $wpdb;
 
	// this if statement makes sure that the table doe not exist already
	if($wpdb->get_var("show tables like wp_notification") != 'wp_notification') 
	{
		$sql = "CREATE TABLE wp_notification (
		reply_user_email       varchar(100)      NOT NULL,
		comment_user_email       varchar(100)      NOT NULL,
		post_id       bigint(20)      NOT NULL,
		replytime datetime NOT NULL default '0000-00-00 00:00:00',
		status tinyint NOT NULL default '1'
		);";
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta($sql);
	}
}
// this hook will cause our creation function to run when the plugin is activated
register_activation_hook( __FILE__, 'my_plugin_create_table' );

function reply_notify($id,$data){
	global $wpdb;
	$c_cmt = get_comment($id);
    if ( !$c_cmt->comment_parent ) return;
	$p_cmt = get_comment($c_cmt->comment_parent);
	$post = get_post($c_cmt->comment_post_ID);
	$post_user = get_userdata($post->post_author);
    $post_user->display_name;
	$user_info = get_userdata(1);
	   
    $replydate = date('Y-m-d H:i:s');
	$wpdb->insert( 'wp_notification', array(
										'reply_user_email' => $c_cmt->comment_author_email,
										'comment_user_email' => $p_cmt->comment_author_email,
										'post_id' => $c_cmt->comment_post_ID,
										'replytime' => $replydate )
										);
	
        $blog_name = get_bloginfo('name');
        $user_info = get_userdata(1);
        $subject = 'Notify Test ofddd'.$blog_name = get_bloginfo('name');
        $message ='This is a testddd'.$c_cmt->comment_author_email;
        $headers = 'Content-Type: text/html; charset=utf-8';
        //wp_mail($p_cmt->comment_author_email, $subject, $message, $headers);
}
add_action('comment_post', 'reply_notify', 1, 2);

function check_notify($email){
	global $wpdb;
	$q="SELECT * FROM wp_notification WHERE comment_user_email = '".$email."' and status = 1";
	$fivesdrafts = $wpdb->get_results ($q);
	return $fivesdrafts;
}

function update_notify($ID,$email){
	global $wpdb;
	$q="UPDATE wp_notification SET status = 0 WHERE post_id = ".$ID." and comment_user_email =".$email;
	$five=$wpdb->query("UPDATE wp_notification SET status = 0 WHERE post_id = ".$ID." and comment_user_email ='".$email."'");
}
add_action('wp_footer','check_notify');

function get_users_id($email){
	global $wpdb;
	$q="SELECT ID FROM wp_users WHERE user_email = '".$email."'";
	$fivesdrafts = $wpdb->get_results ($q);
	foreach ($fivesdrafts as $fivesdraft) {$ID = $fivesdraft->ID;}
	return $ID;
}

function hello($email){
	global $wpdb;
	$five=$wpdb->query("UPDATE wp_notification SET status = 0 WHERE comment_user_email =".$email);
	echo '<h2>hello</h2>';
}