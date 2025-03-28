<?php
#To allow this to be as extensible as possible, make sure $table_prefix is globalised, we also need the $wpdb class functions too
function createtable_wp_track_members(){
global $table_prefix, $wpdb;
#Create the 'name' of our table which is prefixed by the standard WP table prefix (which you specified when you installed WP)
$wp_track_members_table = $table_prefix . "wp_track_members";
#Check to see if the table exists already, if not, then create it
if($wpdb->get_var("show tables like '$wp_track_members_table'") != $wp_track_members_table) {
$sql0  = "CREATE TABLE '". $wp_track_members_table . "' ( ";
$sql0 .= "  'reply_user_email'       varchar(100)      NOT NULL, ";
$sql0 .= "  'comment_user_email'       varchar(100)      NOT NULL, ";
$sql0 .= "  'post_id'       bigint(100)      NOT NULL, ";
$sql0 .= "  'todays_date'     date         NOT NULL default '0000-00-00', ";
$sql0 .= "  'todays_time'     time         NOT NULL default '00:00:00' ";
$sql0 .= ") ENGINE=MyISAM DEFAULT CHARSET=utf-8 AUTO_INCREMENT=1 ; ";
#We need to include this file so we have access to the dbDelta function below (which is used to create the table)
require_once(ABSPATH . 'wp-admin/upgrade-functions.php');
dbDelta($sql0);
}
}
?>
<?php# The Hook - you can choose which hook you want to use, for this instance, we'll run this script every time the footer is loaded
add_action('wp_footer', 'createtable_wp_track_members');
?>