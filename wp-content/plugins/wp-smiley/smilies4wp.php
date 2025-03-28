<?php
/*
Plugin Name: WP-Smiley
Plugin URI: http://as247.vui360.com/blog/wp-smiley/
Description: Define smilies as your way!
Version: 1.4.1
Author: As247
Author URI: http://as247.vui360.com
Copyright 2009  As247  (email : as_3345@yahoo.com)
*/
function s4w_active(){
	$s4w['smilies']=array();
	$s4w['not-case-sensitive']=0;
	$s4w['convert-post']=1;
	$s4w['convert-comment']=1;
	$s4w['display']='';
	$s4w['comment-form-add']=0;
	$s4w['comment-form-id']='comment';
	$s4w['num_define']=2;
	add_option('s4w',$s4w);	
}
function s4w_copy_smilies($from='../wp-content/plugins/wp-smiley/ym-emoticons/',$to='../wp-includes/images/smilies/'){
	if ($handle = opendir($from)) {
        while (false !== ($file = readdir($handle))) {
            if (!in_array($file,array('.','..','.htaccess','index.php','index.htm','index.html','Thumbs.db','thumbs.db',))) {
                if(!@copy($from.$file,$to.$file)) return false;
            }
        }
        closedir($handle);
    }
	return true;
}
function s4w_header(){
	wp_print_scripts('jquery');
}
function s4w_init(){
	global $wpsmiliestrans,$s4w;
	$s4w=get_option('s4w');
	if(!$s4w['comment-form-id'])$s4w['comment-form-id']='comment';
	if(!is_array($s4w['smilies'])) return;
	$s4w_smilies=$s4w['smilies'];
	$s4w_smilies=array_merge($s4w_smilies,s4w_modify($s4w_smilies,'html'),s4w_modify($s4w_smilies,'addslashes'));
	if(get_option('use_smilies')){
		$s4w_smilies=array_merge($s4w_smilies,s4w_modify($s4w_smilies,'specialquote'));
	}
	if($s4w['not-case-sensitive']){
		$s4w_smilies_lower_case=s4w_modify($s4w_smilies,'lower');
		$s4w_smilies_upper_case=s4w_modify($s4w_smilies,'upper');
		$s4w_smilies=array_merge($s4w_smilies,$s4w_smilies_lower_case,$s4w_smilies_upper_case);
	}
	if($s4w['enable-nosmiley']) update_option('use_smilies',false);
	$wpsmiliestrans=$s4w_smilies;
}
s4w_init();
function s4w_ym_default(){
	global $s4w;
	$yahoo_smilies=array (
		'>:D<' => '6.gif',		'#:-S' => '18.gif',			'<:-P' => '36.gif',		':-SS' => '42.gif',
		'<):)' => '48.gif',		'3:-O' => '50.gif',			':(|)' => '51.gif',		'@};-' => '53.gif',
		'**==' => '55.gif',		'(~~)' => '56.gif',			'*-:)' => '58.gif',		'[-O<' => '63.gif',
		':)>-' => '67.gif',		'^:)^' => '77.gif',			':-??' => '106.gif',	'o:)' => '25.gif',
		':-B' => '26.gif',		':B' => '26.gif',			'i-)' => '28.gif',		'8-|' => '29.gif',
		':-&' => '31.gif',		':-$' => '32.gif',			'[-(' => '33.gif',		':o)' => '34.gif',
		'8-}' => '35.gif',		':-/' => '7.gif',			':S' => '7.gif',		'(:|' => '37.gif',
		':-?' => '39.gif',		'#-o' => '40.gif',			'=D>' => '41.gif',		':">' => '9.gif',
		'@-)' => '43.gif',		':^O' => '44.gif',			':-w' => '45.gif',		':-<' => '46.gif',
		'>:P' => '47.gif',		':*' => '11.gif',			':O'=>'13.gif',			':P' => '10.gif',
		':-*' => '11.gif',		':@)' => '49.gif',			'=((' => '12.gif',		':-P' => '10.gif',
		':-O' => '13.gif',		'~:>' => '52.gif',			'B-)' => '16.gif',		'%%-' => '54.gif',
		':-S' => '17.gif',		';;)' => '5.gif',			'~O)' => '57.gif',		'>:)' => '19.gif',
		'8-X' => '59.gif',		'=:)' => '60.gif',			'>-)' => '61.gif',		':-L' => '62.gif',
		':((' => '20.gif',		'$-)' => '64.gif',			':-"' => '65.gif',		'b-(' => '66.gif',
		':))' => '21.gif',		'[-X' => '68.gif',			'\:D/' => '69.gif',		'>:/' => '70.gif',
		';))' => '71.gif',		'o->' => '72.gif',			'o=>' => '73.gif',		'o-+' => '74.gif',
		'(%)' => '75.gif',		':-@' => '76.gif',			'/:)' => '23.gif',		':-j' => '78.gif',
		'(*)' => '79.gif',		':)]' => '100.gif',			':-c' => '101.gif',		'~x(' => '102.gif',
		':-h' => '103.gif',		':-t' => '104.gif',			'8->' => '105.gif',		'=))' => '24.gif',
		'%-(' => '107.gif',		':o3' => '108.gif',			':)' => '1.gif',		':(' => '2.gif',
		';)' => '3.gif',		':|' => '22.gif',			':-)' => '1.gif',		':-(' => '2.gif',
		';-)' => '3.gif',		':-|' => '22.gif',			'X(' => '14.gif',		':>' => '15.gif',
		':x' => '8.gif',		':-D' => '4.gif',			'X-(' => '14.gif',		':->' => '15.gif',
		':-x' => '8.gif',		':D' => '4.gif',			'=;' => '27.gif',		':bz' => '115.gif',
		'X_X' => '109.gif',		':!!' => '110.gif',			'\m/' => '111.gif', 	':-bd' => '113.gif',
		'o:-)' => '25.gif',		'L-)' => '30.gif', 			'=P~' => '38.gif',		':-q' => '112.gif',
		'^#(^' => '114.gif',	
		);
		if($s4w['num_define']<2)$s4w['num_define']=2;//minimum is 2 definition for yahoo smilies
		$s4w['smilies']=$yahoo_smilies;
		update_option('s4w',$s4w);
}
function s4w_load_smilies() {
    if ($handle = opendir('../wp-includes/images/smilies')) {
        while (false !== ($file = readdir($handle))) {
            if (!in_array($file,array('.','..','.htaccess','index.php','index.htm','index.html','Thumbs.db','thumbs.db',))){
                $smilies[] = $file;
            }
        }
        closedir($handle);
    }
	ksort($smilies);
    return $smilies;
}
function s4w_flip_array($array,$exk=array()){
	$result=array();
	if(is_array($array))
	foreach($array as $k=>$v){
		$k=trim($k);
		if(!in_array($k,$exk))
			if(is_array($v)){
				foreach($v as $v2)
					if(!empty($v2))	$result[stripslashes(trim($v2))]=str_replace('|', '.', $k);
			}
			else $result[$v][]=$k;
	}
	return $result;
}
function s4w_modify($a,$ac=''){
	$r=array();
	foreach($a as $k=>$v){
		switch($ac){
			case 'html': 
				$r[htmlspecialchars($k)]=$v;
				$r[htmlspecialchars($k,ENT_NOQUOTES)]=$v;
				$r[htmlspecialchars($k,ENT_QUOTES)]=$v;
				break;
			case 'addslashes': $r[addslashes($k)]=$v;break;
			case 'upper': $r[strtoupper($k)]=$v;break;
			case 'lower': $r[strtolower($k)]=$v;break;
			case 'specialquote': 
				if(function_exists('wptexturize')){
					$r[s4wspecialquote($k,3)]=$v;
				}
				else{
					$r[s4wspecialquote($k,1)]=$v;
					$r[s4wspecialquote($k,2)]=$v;
				}
				break;
		}
	}
	return $r;
}
function s4wspecialquote($text,$s=true){
	$text=htmlspecialchars($text,ENT_NOQUOTES);
	$opening_quote = '&#8220;';
	$closing_quote = '&#8221;';
	$opening_single_quote='&#8216;';
	$closing_single_quote='&#8217;';
	if($s==1){
		$text=str_replace('"',$closing_quote,$text);
		$text=str_replace("'",$closing_single_quote,$text);
		return $text;
	}elseif($s==2){
		$text=str_replace('"',$opening_quote,$text);
		$text=str_replace("'",$opening_single_quote,$text);	
	}elseif($s==3){
		$text=wptexturize($text);
	}
	return $text;
}
function s4w_option_page(){
    add_options_page('S4w', 'WP Smiley', 5, basename(__FILE__), "s4w_options");
}
function s4w_print_style($style_tag=false){
global $s4w;
if(!$s4w['style'])$s4w['style']='
	.s4w-smilies {
	text-align: center;
	position:relative;
	height:0px;
}
.s4w-smilies-content {
	width: 300px;
	padding: 3px;
	line-height: 120%;
	position:absolute;
	border: 1px solid #BFCAD2;
	background:#fff;
	left:160px;
	top:-10px;
	
}
.wp-smiley-button {
border: 1px solid #ccc;
margin: 1px;
padding: 2px;
}
.wp-smiley-button:hover {
cursor:pointer;
filter:progid:DXImageTransform.Microsoft.Alpha(opacity=60);
-moz-opacity: 0.6;
}';
	if($style_tag){
		if($s4w['style']!="none")
		echo "<style>".$s4w['style']."</style>";
	}
	else
		echo $s4w['style'];
	
}
if(!function_exists('is_checked')){
	function is_checked($show_or_not) {
		if ($show_or_not == 1) return 'checked';
		else return '';
	}
}
function s4w_update(){
	global $s4w;
	$op_list=array('s4w-ncs','s4w-cp','s4w-cc','s4w-update','page','s4w-disp','s4w-cfa','s4w-cfid','s4w-more','s4w-less','s4w-style','s4w-ns');
	$s4w['smilies']=s4w_flip_array($_POST,$op_list);
	$s4w['not-case-sensitive']=$_POST['s4w-ncs'];
	$s4w['convert-post']=$_POST['s4w-cp'];
	$s4w['convert-comment']=$_POST['s4w-cc'];
	$s4w['display']=stripslashes($_POST['s4w-disp']);
	$s4w['comment-form-add']=$_POST['s4w-cfa'];
	$s4w['comment-form-id']=$_POST['s4w-cfid'];
	$s4w['more-text']=$_POST['s4w-more'];
	$s4w['less-text']=$_POST['s4w-less'];
	$s4w['style']=$_POST['s4w-style'];
	if(!$s4w['more-text'])$s4w['more-text']="More>>";
	if(!$s4w['less-text'])$s4w['less-text']="Less<<";
	$s4w['enable-nosmiley']=$_POST['s4w-ns'];
	update_option('s4w',$s4w);	
}
function s4w_tinymce_addbuttons() {
	if(!current_user_can('edit_posts') && ! current_user_can('edit_pages')) {
		return;
	}
	if(get_user_option('rich_editing') == 'true') {
		add_filter("mce_external_plugins", "s4w_tinymce_addplugin");
		add_filter('mce_buttons', 's4w_tinymce_registerbutton');
	}
}
function s4w_tinymce_registerbutton($buttons) {
	array_push($buttons, 'separator', 'smiliesforwp');
	return $buttons;
}
function s4w_tinymce_addplugin($plugin_array) {
	$plugin_array['smiliesforwp'] = plugins_url('./wp-smiley/tinymce/editor_plugin.js');
	return $plugin_array;
}
function s4w_options(){
	if($_POST['s4w-uninstall']){
		delete_option("s4w");
		$deactivate_url = 'plugins.php?action=deactivate&amp;plugin=wp-smiley/smilies4wp.php';
		if(function_exists('wp_nonce_url')) { 

				$deactivate_url = wp_nonce_url($deactivate_url, 'deactivate-plugin_wp-smiley/smilies4wp.php');

		}
	}else if($_POST['s4w-update']){
		s4w_update();
		s4w_init();
	}else if($_POST['s4w-copy']){
		if(!s4w_copy_smilies())echo '<div class="error fade" style="background-color:red;">Cannot copy files, maybe desination folder(wp-includes/images/smilies/) is not writeable</div>';
		else echo '<div class="error fade" style="background-color:green;">All smilies was successful copied and ready to use</div>';

	}else if($_POST['s4w-detect']){
	}
	//print_r($_POST);
	global $s4w;
	if($s4w['num_define']<1)$s4w['num_define']=1;
	if(is_numeric($_GET['num-define'])&&$_GET['num-define']!=0){
		$s4w['num_define']=$_GET['num-define'];
		update_option('s4w',$s4w);
	}
	if($_GET['ym-default']==true){
		s4w_ym_default();
	}
	
	if(is_array($s4w['smilies']))
		$s4w_smilies=s4w_flip_array($s4w['smilies']);
	$all_smilies=s4w_load_smilies();
	$showall=isset($_GET['showall'])?$_GET['showall']:1;
?>
<div class="wrap">
<?php if($_POST['s4w-uninstall']): ?>
<h2>Uninstall</h2>
<a href="<?php echo $deactivate_url?>">Click Here</a> To Finish The Uninstallation And WP Smiley Will Be Deactivated Automatically.
<?php else :?>
<h2>WP Smiley</h2>
<?php
        echo (!$showall) ? '<a href="?page='.basename(__FILE__).'">Display all smilies</a>' : '<a href="?page='.basename(__FILE__).'&showall=0">Display undefined smilies only</a>';
?>
        | <a href="?page=<?php echo basename(__FILE__)?>&ym-default=true" onclick="return confirm('Are you sure? All current definition will be replaced with yahoo smilies!');">Quickly define smiley for yahoo</a>
		| <a href="?page=<?php echo basename(__FILE__);?>&num-define=<?php echo $s4w['num_define']+1;?>">Add one definition</a>
		| <a href="?page=<?php echo basename(__FILE__);?>&num-define=<?php echo $s4w['num_define']>1?$s4w['num_define']-1:1;?>">Remove one definition</a>
		<form id="manage-smilies-form" method="POST" action="" name="manage-smilies-form">
		
		<table class="form-table">
						<tr valign="top">
						<th scope="row">Display</th>
						<td> <fieldset><legend class="screen-reader-text"><span>display</span></legend>
						<input name="s4w-disp" type="text" id="s4w-disp" value="<?php echo htmlspecialchars($s4w['display'])?>"/>
						<small>Enter special smilies to display on comment form or leave blank to display all(separated by space, example: <b><i>:) :D :(</i></b>)</small>
						</fieldset></td>
						</tr>
						<tr valign="top">
						<th scope="row">Comment form id</th>
						<td> <fieldset><legend class="screen-reader-text"><span>Comment form id</span></legend>
						<input name="s4w-cfid" type="text" id="s4w-cfid" value="<?php echo htmlspecialchars($s4w['comment-form-id'])?>"/>
						Enter your comment form id here.
						</fieldset></td>
						</tr>
						<tr valign="top">
						<th scope="row">More&amp;less text</th>
						<td> <fieldset>
						More:<input name="s4w-more" type="text" id="s4w-more" value="<?php echo htmlspecialchars($s4w['more-text'])?>"/>
						Less:<input name="s4w-less" type="text" id="s4w-less" value="<?php echo htmlspecialchars($s4w['less-text'])?>"/>
						</fieldset></td>
						</tr>
						<tr valign="top">
						<th scope="row">Not case-sensitive</th>
						<td> <fieldset><legend class="screen-reader-text"><span>not case-sensitive</span></legend><label for="s4w-ncs">
						<input name="s4w-ncs" type="checkbox" id="s4w-ncs" value="1" <?php echo is_checked($s4w['not-case-sensitive'])?> />
						Letters are not case-sensitive. Example :D and :d will be replaced with same smiley</label>
						</fieldset></td>
						</tr>
						<tr valign="top">
						<th scope="row">Convert post</th>
						<td> <fieldset><legend class="screen-reader-text"><span>Convert post</span></legend><label for="s4w-cp">
						<input name="s4w-cp" type="checkbox" id="s4w-cp" value="1" <?php echo is_checked($s4w['convert-post'])?> />
						Convert smilies for post<i>(it will work more correctly than wordpress default convert)</i></label>
						</fieldset></td>
						</tr>
						<tr valign="top">
						<th scope="row">Convert comment</th>
						<td> <fieldset><legend class="screen-reader-text"><span>Convert comment</span></legend><label for="s4w-cc">
						<input name="s4w-cc" type="checkbox" id="s4w-cc" value="1" <?php echo is_checked($s4w['convert-comment'])?> />
						Convert smilies for comment<i>(it will work more correctly than wordpress default convert)</i></label>
						</fieldset></td>
						</tr>
						<tr valign="top">
						<th scope="row">Enable nosmiley tag</th>
						<td> <fieldset><legend class="screen-reader-text"><span>Enable nosmiley tag</span></legend><label for="s4w-ns">
						<input name="s4w-ns" type="checkbox" id="s4w-ns" value="1" <?php echo is_checked($s4w['enable-nosmiley'])?> />
						Put the content you don't want to convert to smiley between [nosmiley] [/nosmiley]
						</label>
						</fieldset></td>
						</tr>
						<tr valign="top">
						<th scope="row">Add smilies to comment form</th>
						<td> <fieldset><legend class="screen-reader-text"><span>Add smilies to comment form</span></legend><label for="s4w-cfa">
						<input name="s4w-cfa" type="checkbox" id="s4w-cfa" value="1" <?php echo is_checked($s4w['comment-form-add'])?> />
						You can manual add to comment form using code </label>
						<input type="text" size="70" value="&lt;?php if(function_exists('s4w_comment_form'))s4w_comment_form();?&gt;"/>
						</fieldset></td>
						</tr>
						<tr valign="top">
						<th scope="row">Auto copy yahoo smilies</th>
						<td> <fieldset><input class="button" name="s4w-copy" type="submit" value="Copy" onclick="return confirm('Are you sure want to copy smilies to the wordpress smiley folder? All existing files will be overwritten!')"/><i>This will try to copy all yahoo smilies to the wordpress smiley folder for using</i>
						</fieldset></td>
						</tr>
			</table>
         <p class="submit">
                <input type="submit" onclick="if(document.getElementById('s4w-uninstall').checked)return confirm('Are you sure you want to uninstall WP Smiley?')" value="Update &raquo;" name="s4w-update"/>
            </p>
            <table class="widefat" style="text-align:center">


            <thead>
                <tr>
                    <th scope="col">
                        <div style="text-align: center;">Smilie</div>
                    </th>
					<?php
					for($i=0;$i<$s4w['num_define'];$i++){
					?>
                    <th scope="col">
                        <div style="text-align: center;">Text to replace</div>
                    </th>
					<?php }?>
                    <th scope="col">
                        <div style="text-align: center;">Smilie</div>
                    </th>
                   	<?php
					for($i=0;$i<$s4w['num_define'];$i++){
					?>
                    <th scope="col">
                        <div style="text-align: center;">Text to replace</div>
                    </th>
					<?php }?>
                    <th scope="col">
                        <div style="text-align: center;">Smilie</div>
                    </th>
                  	<?php
					for($i=0;$i<$s4w['num_define'];$i++){
					?>
                    <th scope="col">
                        <div style="text-align: center;">Text to replace</div>
                    </th>
					<?php }?>
                </tr>
            </thead>
            <tbody>
<?php
	if(is_array($all_smilies)){
		foreach ($all_smilies as $smilie) {
			$smilie = str_replace(' ', '%20', $smilie);
            $smilie_name = str_replace('.', '|', $smilie);
			

            if (!$showall && $s4w_smilies[$smilie][0] != '') { // show undefined only
				for($i=0;$i<$s4w['num_define'];$i++){
?>
                <input type="hidden" name="<?php echo $smilie_name ?>[]" value="<?php echo htmlspecialchars($s4w_smilies[$smilie][$i]) ?>" style="text-align:center" />
				
<?php
                }
				continue;
            }
            // row starts
            if ($count % 3 == 0) {
			 $style =$style?'':' style="background:#F5F5F5"';
?>
                <tr>
<?php
            }
?>
                    <td<?php echo $style ?>><img src="../wp-includes/images/smilies/<?php echo $smilie ?>" /></td>
					<?php for($i=0;$i<$s4w['num_define'];$i++){ ?>
                    <td<?php echo $style ?>><input type="text" name="<?php echo $smilie_name ?>[]" value="<?php echo htmlspecialchars($s4w_smilies[$smilie][$i]) ?>" style="text-align:center" size="15"/></td>
					
<?php
						}
			// row ends
            if ($count % 3 == 2) {
?>
                </tr>
<?php
            }
            $count++;
        }
    }
	?>		</tbody>
            </table>

			<p style="float:left"><strong>Style:</strong><i>This is the stylesheet for smilies display at your comment form if you already added it on your theme please enter &quot;none&quot;(without quote)
			. To restore default leave it blank.
			</i></p><p style="float:right">
			<textarea rows="10" name="s4w-style" cols="80"><?php s4w_print_style();?></textarea>
			</p>
			<div style="clear:both"></div>
			<p class="s4w-uninstall"><label for="s4w-uninstall">
						<input onclick="if(this.checked==true)return confirm('Are you sure? All definition for smilies will be deleted!');"  name="s4w-uninstall" type="checkbox" id="s4w-uninstall" value="1"/>
						Uninstall this plugin</label>
			</p>
            <p class="submit">
                <input type="submit" onclick="if(document.getElementById('s4w-uninstall').checked)return confirm('Are you sure you want to uninstall WP Smiley?')" value="Update &raquo;" name="s4w-update"/>
            </p>
			
        </form>
		<?php endif;?>
    </div>
<?php
}
function s4w_comment_form(){
	global $s4w;
	if(!$s4w['comment-form-add'])s4w_add_comment_form();
}
function s4w_add_comment_form() {
//s4w_header();
	global $s4w,$wpsmiliestrans;
	$s4w_js_add_to_comment="\n<!-- Generated By WP Smiley - http://as247.vui360.com/ -->\n";
	$s4w_js_add_to_comment.="<script type=\"text/javascript\">\nvar S4wCommentFormId='".$s4w['comment-form-id']."';\n
	var S4wMoreText='".$s4w['more-text']."';\n
	var S4wLessText='".$s4w['less-text']."';\n
	</script>\n";	
	$s4w_js_add_to_comment.='<script type="text/javascript" src="'.get_bloginfo('wpurl').'/wp-content/plugins/wp-smiley/tinymce/click.js"></script>'."\n";
	echo $s4w_js_add_to_comment;
    $smilies = array_flip($s4w['smilies']);
	ksort($smilies);
    $url = get_bloginfo('wpurl').'/wp-includes/images/smilies';
    $list = $s4w['display']; 
	s4w_print_style(true);	
	
?>
	
<img class="wp-smiley-button" src="<?php bloginfo("wpurl")?>/wp-content/plugins/wp-smiley/tinymce/1.gif" id="s4w-select-smiley">
	<div class="s4w-smilies">
            <div class="s4w-smilies-content" style="display:none">
	    
		

	<?php
	if ($list == '') {
	    foreach ($smilies as $k => $v) {
			$v=htmlspecialchars($v);
	        echo "<img src=\"$url/$k\" alt=\"$v\" onclick=\"s4w_add_smiley('".addslashes($v)."')\" class=\"wp-smiley-select\" /> ";
	    }
	?>

	<?php
    } else {
    	$display = explode(' ', $list);
    	foreach ($display as $v) {
			$v=htmlspecialchars($v);
			if($wpsmiliestrans[$v]){
				echo "<img src=\"$url/$wpsmiliestrans[$v]\" alt=\"$v\" onclick=\"s4w_add_smiley('".addslashes($v)."')\" class=\"wp-smiley-select\" /> ";
				unset($smilies[$wpsmiliestrans[$v]]); 
			}
    	}
    	echo '<span id="wp-smiley-more" style="display:none;">';
    	foreach ($smilies as $k => $v){
			$v=htmlspecialchars($v);
	        echo "<img src=\"$url/$k\" alt=\"$v\" onclick=\"s4w_add_smiley('".addslashes($v)."')\" class=\"wp-smiley-select\" /> ";
	    }
		//echo '</span>';
    	echo '</span> <span id="wp-smiley-toggle" style="cursor:pointer;">'.$s4w['more-text'].'</span>';
    }?>
		</div>	
	</div>
	
	<?php
}

function s4w_convert_smilies($text){
	global $s4w;
		$output = '';
		// HTML loop taken from texturize function, could possible be consolidated
		if(preg_match('[nosmiley]',$text)&&!preg_match("/\[nosmiley\].*\[\/nosmiley\]/",$text)){//missing close tag
			$text=$text.'[/nosmiley]';
		}
		if(!$s4w['enable-nosmiley']){//remove nosmiley tag
				$text = str_replace('[nosmiley]','',$text);
				$text = str_replace('[/nosmiley]','',$text);
		}
		$textarr = preg_split("/(<.*>)|(\[nosmiley\].*\[\/nosmiley\])/Us", $text, -1, PREG_SPLIT_DELIM_CAPTURE); // capture the tags as well as in between
		$stop = count($textarr);// loop stuff
		for ($i = 0; $i < $stop; $i++) {
			$content = $textarr[$i];
			if ((strlen($content) > 0) && !('<' == $content{0}&&'>' ==$content{strlen($content)-1})&&'[nosmiley]' != substr($content,0,10)) { // If it's not a tag
				$content = s4w_translate_smiley($content);
			}
			$output .= $content;
		}
		if($s4w['enable-nosmiley']){
			$output = str_replace('[nosmiley]','',$output);
			$output = str_replace('[/nosmiley]','',$output);
		}
		return $output;
}
function s4w_translate_smiley($smiley) {
	global $wpsmiliestrans,$s4w_smiliestrans;
	if(!isset($s4w_smiliestrans)){
		$s4w_smiliestrans=$wpsmiliestrans;
		array_walk($s4w_smiliestrans,'s4w_smilies_init');
	}
	return strtr( $smiley,$s4w_smiliestrans);
}
function s4w_smilies_init(&$smiley){
	global $wpsmiliestrans,$wpsmiliestransflip;
	if(!$wpsmiliestransflip)$wpsmiliestransflip=array_flip($wpsmiliestrans);
	$siteurl = get_option( 'siteurl' );
	$smiley_masked = esc_attr($wpsmiliestransflip[$smiley]);
	$smiley= " <img src='$siteurl/wp-includes/images/smilies/$smiley' alt='$smiley_masked' class='wp-smiley' /> ";
}
add_action('activate_wp-smiley/smilies4wp.php', 's4w_active');
add_action('admin_menu', 's4w_option_page');
add_action('init', 's4w_tinymce_addbuttons');
add_action('wp_head','s4w_header');
if (function_exists('add_filter')) {
	if($s4w['convert-post']){
		add_filter('the_content', 's4w_convert_smilies', 1);
		add_filter('the_excerpt', 's4w_convert_smilies', 1);
	}
	if($s4w['convert-comment']){
		add_filter('get_comment_text', 's4w_convert_smilies', 1);
		add_filter('comment_text', 's4w_convert_smilies', 1);
	}
}
if($s4w['comment-form-add']){
	add_action('comment_form','s4w_add_comment_form');
}
?>