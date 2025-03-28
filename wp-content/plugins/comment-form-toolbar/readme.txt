=== Comment Form Toolbar ===
Contributors: San40us
Donate link: http://san40us-blog.ru/
Tags: comments, quicktags, comment form tooolbar
Requires at least: 2.7.2
Tested up to: 2.9.2
Stable tag: 1.5

Plugin for quick formatting comments with html-tags

== Description ==

* Author: [San40us](http://san40us-blog.ru/about/)
* Website: <http://san40us-blog.ru/>
* License: GPL v.2 see the bottom of

Lightweight and easy to use plug-in for easy text formatting while writing a comment. It has the ability to create custom tags and buttons. Automatically built into the shape of the element to add comments textarea, immediately after activation. In most cases, your hand does not need to install the hook into the file comments.php.

== Installation ==

To install the plugin, you should:

1. Unpack the zip-file plug-in directory 'wp-content/plugins/'
1. Activate the plugin management page plug-ins.

== Frequently Asked Questions ==
Q: I have installed and activated the plugin but in the form of adding comments, nothing has changed? 
R: The reason may be the lack of hook 'comment_form' in the file comments.php of your theme. To set the hook 'comment_form' self-open the file comments.php in the theme editor and add the code '<?php do_action('comment_form', $post->ID );?>' the end of the comment form. Save your changes and then test the plug-in.

== Screenshots ==

1. Example form with attached plugin
2. View from the trenches drop down selection list of programming languages

== Changelog ==

= 1.0 =
The release plugin, the core functionality, text formatting on the isolation and insertion of empty tags to enter text between them, inserting images and links, inserting snippets of code with the ability to select the desired language from the list.
= 1.5 =
* Added ability to create numbered and bulleted lists.
* Menu selection smiles.
* The opportunity to ask bracketed tags (eg < > or [ ]) for each button separately.

== License ==
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
	          [GNU General Public License]: http://www.gnu.org/copyleft/gpl.html