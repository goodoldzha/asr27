<?php
/*
Plugin Name: Comment Form Toolbar
Plugin URI: http://san40us-blog.ru
Description: Плагин для быстрой разметки текста комментария, помощью html-тегов. НЕ требует вмешательства в код темы, просто активируйте его на странице плагинов и он готов к работе.
Version: 1.5
Author: San40us
Author URI: http://san40us-blog.ru
*/
/*
    Copyright Петухов Александр (email: san40us8906@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

class CommentFormTollbar {
     function add_styles() {
         echo '<link rel="stylesheet" type="text/css" href="'.get_settings('siteurl').'/wp-content/plugins/comment-form-toolbar/css/style_toolbar.css"/>';
    }
	function add_js() {
	?>
	   <script language="JavaScript" type="text/javascript">var WpQtSiteUrl = '<?php echo get_settings('siteurl'); ?>';</script>
	   <script language="JavaScript" type="text/javascript" src="<?php echo get_settings('siteurl'); ?>/wp-content/plugins/comment-form-toolbar/js/cft.js"></script>
	   <script language="JavaScript" type="text/javascript">WpQtToolbarInit()</script>
	<?php
	}
    function __construct() {
	   add_action('wp_head', array(&$this, 'add_styles'));
	   add_action('comment_form', array(&$this, 'add_js'));
	}
}
$CFTollbar = new CommentFormTollbar();
?>