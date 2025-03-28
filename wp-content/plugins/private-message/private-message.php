<?php
/*
Plugin Name: private-message Private Message
Plugin URI: http://private-message.com
Description: User can send message to eachother
Author: Peyman3d
Version: 0.6
Author URI: http://private-message.com
*/
load_plugin_textdomain('private-message', "/wp-content/plugins/private-message/");
global $wpdb, $table_prefix;

// Create Table
function my_plugin_create_table2()
{
    // do NOT forget this global
	global $wpdb;
 
	// this if statement makes sure that the table doe not exist already
	if($wpdb->get_var("show tables like wp_notification") != 'wp_notification') 
	{
		$sql = "CREATE TABLE wp_pc_message (
					id BIGINT(20) NOT NULL AUTO_INCREMENT, 
                    status SMALLINT NOT NULL DEFAULT 1,      
                    subject TEXT NOT NULL, 
                    content TEXT NOT NULL, 
                    author_id BIGINT(20) NOT NULL,   
                    recipient_id BIGINT(20) NOT NULL,      
                    timestamp_gmt DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
                    PRIMARY KEY  (id) 
		)ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;";
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta($sql);
	}
}
// this hook will cause our creation function to run when the plugin is activated
register_activation_hook( __FILE__, 'my_plugin_create_table2' );

function wppm_init() {
    $parent = dirname(__FILE__).'/main.php';
    $dir = dirname(__FILE__);
    
    add_menu_page(__('Messages', 'private-message'), __('Messages', 'private-message'), 0, $dir.'/main.php');
    add_submenu_page($parent, __('Write New', 'private-message'), __('Write New', 'private-message'), 0, $dir.'/write.php');
    add_submenu_page($parent, __('Sent', 'private-message'), __('Sent', 'private-message'), 0, $dir.'/sent.php');
    add_submenu_page($parent, __('Send To All', 'private-message'), __('Send To All', 'private-message'), 2, $dir.'/sendtoall.php');
}
add_action('admin_menu', 'wppm_init');


function users_list(){
	global $wpdb;
	$q="SELECT ID,display_name FROM wp_users";
	$fivesdrafts = $wpdb->get_results ($q);
	return $fivesdrafts;
}

function send_message($author,$to,$subject,$message){
	global $wpdb;
    $replydate = date('Y-m-d H:i:s');
	$wpdb->insert( 'wp_pc_message', array(
										'status' => 1,
										'subject' => $subject,
										'content' => $message,
										'author_id' => $author,
										'recipient_id' => $to,
										'timestamp_gmt' => $replydate )
										);
	return 1;
}

function load_inbox(){
	global $wpdb;
	global $current_user; get_currentuserinfo();
	$q="SELECT * FROM wp_pc_message WHERE recipient_id = '".$current_user->ID."' ORDER BY timestamp_gmt DESC";
	$fivesdrafts = $wpdb->get_results ($q);
	return $fivesdrafts;
}

function load_sent(){
	global $wpdb;
	global $current_user; get_currentuserinfo();
	$q="SELECT * FROM wp_pc_message WHERE author_id = '".$current_user->ID."' ORDER BY timestamp_gmt DESC";
	$fivesdrafts = $wpdb->get_results ($q);
	return $fivesdrafts;
}

function get_message($id){
	global $wpdb;
	$q="SELECT * FROM wp_pc_message WHERE id = ".$id;
	$fivesdrafts = $wpdb->get_results ($q);
	$five=$wpdb->query("UPDATE wp_pc_message SET status = 0 WHERE id = ".$id);
	foreach ($fivesdrafts as $fivesdraft) {return $fivesdraft;}
}

function set_unread($id){
	global $wpdb;
	$five=$wpdb->query("UPDATE wp_pc_message SET status = 1 WHERE id = ".$id);
}

function check_message(){
	global $wpdb;
	global $current_user; get_currentuserinfo();
	$q="SELECT * FROM wp_pc_message WHERE recipient_id = '".$current_user->ID."'";
	$fivesdrafts = $wpdb->get_results ($q);
	return $fivesdrafts;
}
?>
