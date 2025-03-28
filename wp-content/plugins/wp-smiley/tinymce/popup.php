<?php
/*
Part of WP Smiley v1.0
© As247, <asvn89@gmail.com>, http://as247.vui360.com
*/
$wpconfig = realpath('../../../../wp-config.php');
if (!file_exists($wpconfig)) { exit('Could not find wp-config.php.'); }
require_once($wpconfig);
require_once(ABSPATH.'/wp-admin/admin.php');
if(!current_user_can('edit_posts')) die;
 $smilies = array_flip($s4w['smilies']);
 ksort($smilies);
 $url = get_bloginfo('wpurl').'/wp-includes/images/smilies/';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>{#emotions.emotions_desc}</title>
<script type="text/javascript" type="text/javascript" src="<?php bloginfo('wpurl');?>/wp-includes/js/tinymce/tiny_mce_popup.js?v=3211"></script>
<script type="text/javascript" type="text/javascript">
var s4wDialog = {
	init : function(ed) {
		tinyMCEPopup.resizeToInnerSize();
	},

	insert : function insertEmotion(code) {
    	tinyMCEPopup.execCommand('mceInsertContent', false, code);
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(s4wDialog.init, s4wDialog);

document.write('<base href="'+tinymce.baseURL+'" />');
</script>
<style type="text/css">
	table#s4w {border:0;}
	#s4w img {border:0;margin:4px;}
</style>
<base target="_self" />
</head>
<body style="display:none">
	<div align="center">

		<table id="s4w">
<?php if(is_array($smilies)) foreach($smilies as $img => $char){
		 
		 if ($count % 8 == 0) {
			$have_end_tr=false;
			echo "<tr>";
		 }
			
?>
		<td><a href="javascript:void(0);" onclick="s4wDialog.insert(' <?php echo addslashes(htmlspecialchars($char))?> ')">
            <img src="<?php echo $url.$img?>"  title="<?php echo htmlspecialchars($char)?>" onmouseover="this.style.border='1px inset black';return true" onmouseout="this.style.border='1px solid white';"/></a>
		</td>
<?php 
if($count % 8 == 7) {
echo "</tr>";
$have_end_tr=true;
}
$count++;
}
if(!$have_end_tr) echo "</tr>";
?>
		</table>
	</div>
</body>
</html>
