<?php
	add_action('init', 'product_register');
	function product_register() {
    	$args = array(
        	'label' => __('Article'),
        	'singular_label' => __('Article'),
        	'public' => true,
        	'show_ui' => true,
        	'capability_type' => 'post',
        	'hierarchical' => true,
        	'rewrite' => array('slug' => 'article'),
        	'supports' => array('title','editor','thumbnail','comments','excerpt')
        );
		register_post_type( 'article' , $args );
		$args = array(
        	'label' => __('Match'),
        	'singular_label' => __('Match'),
        	'public' => true,
        	'show_ui' => true,
        	'capability_type' => 'post',
        	'hierarchical' => true,
        	'rewrite' => array('slug' => 'match'),
        	'supports' => array('title','editor','thumbnail','comments','excerpt')
        );
    	register_post_type( 'match' , $args );
		$args = array(
        	'label' => __('Player'),
        	'singular_label' => __('Player'),
        	'public' => true,
        	'show_ui' => true,
        	'capability_type' => 'post',
        	'hierarchical' => true,
        	'rewrite' => array('slug' => 'player'),
        	'supports' => array('title','editor','thumbnail','comments','excerpt')
        );
    	register_post_type( 'player' , $args );
		$args = array(
        	'label' => __('Photo'),
        	'singular_label' => __('Photo'),
        	'public' => true,
        	'show_ui' => true,
        	'capability_type' => 'post',
        	'hierarchical' => true,
        	'rewrite' => array('slug' => 'photo'),
        	'supports' => array('title','editor','thumbnail','comments','excerpt')
        );
    	register_post_type( 'photo' , $args );
		$args = array(
        	'label' => __('Video'),
        	'singular_label' => __('Video'),
        	'public' => true,
        	'show_ui' => true,
        	'capability_type' => 'post',
        	'hierarchical' => true,
        	'rewrite' => array('slug' => 'video'),
        	'supports' => array('title','editor','thumbnail','comments','excerpt')
        );
    	register_post_type( 'video' , $args );
		$args = array(
        	'label' => __('Magazine'),
        	'singular_label' => __('Magazine'),
        	'public' => true,
        	'show_ui' => true,
        	'capability_type' => 'post',
        	'hierarchical' => true,
        	'rewrite' => array('slug' => 'magazine'),
        	'supports' => array('title','editor','thumbnail','comments','excerpt')
        );
    	register_post_type( 'magazine' , $args );
		$args = array(
        	'label' => __('Download'),
        	'singular_label' => __('Download'),
        	'public' => true,
        	'show_ui' => true,
        	'capability_type' => 'post',
        	'hierarchical' => true,
        	'rewrite' => array('slug' => 'download'),
        	'supports' => array('title','editor','thumbnail','comments','excerpt')
        );
    	register_post_type( 'download' , $args );
	}
?>
<?php
	add_action ('init', 'build_taxonomies', 0);
	function build_taxonomies() {
		register_taxonomy ('team_cat',array('post','match','photo','video','article'),array('hierarchical' => true, 'label' => 'Teams Category', 'query_var' => true, 'rewrite' => true ));
		register_taxonomy ('post_cat',array('post','match','photo','video','article'),array('hierarchical' => true, 'label' => 'Post Category', 'query_var' => true, 'rewrite' => true ));
		register_taxonomy ('player_cat',array('post','photo','video'),array('hierarchical' => true, 'label' => 'Player Category', 'query_var' => true, 'rewrite' => true ));
		register_taxonomy ('photo_cat',array('photo'),array('hierarchical' => true, 'label' => 'Photo Category', 'query_var' => true, 'rewrite' => true ));
		register_taxonomy ('video_cat',array('video'),array('hierarchical' => true, 'label' => 'Video Category', 'query_var' => true, 'rewrite' => true ));
		register_taxonomy ('match_cat',array('match'),array('hierarchical' => true, 'label' => 'Match Category', 'query_var' => true, 'rewrite' => true ));

	}
?>
<?php
$prefix = 'home_';
$home_meta_box = array(
    'id' => 'home-meta-box',
    'title' => 'Home Team',
    'page' => 'match',
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
        array(
            'name' => 'Home Team',
            'desc' => '',
            'id' => $prefix . 'team',
            'type' => 'select',
            'options' => array('', __('AS Roma','postechin'),  __('Atalanta','postechin'), __('Bologna','postechin') ,__('Cagliari','postechin') ,__('Catania','postechin') ,__('Cesena','postechin') ,__('Chievo','postechin'), __('Fiorentina','postechin'), __('Genoa','postechin') , __('Internazionale','postechin') , __('Juventus','postechin') ,  __('Lazio','postechin'), __('Lecce','postechin'),__('Milan','postechin') ,__('Napoli','postechin') ,__('Palermo','postechin') ,__('Parma','postechin') ,__('Siena','postechin') ,__('Udinese','postechin') )
        ),
		array(
            'name' => 'Team Kit',
            'desc' => '',
            'id' => $prefix . 'kit_num',
            'type' => 'select',
            'options' => array('1','2')
        ),
		array(
            'name' => 'Home Team Name',
            'desc' => '',
            'id' => $prefix . 'name',
            'type' => 'text',
            'std' => ''
        ),
		array(
            'name' => 'Home Team Logo',
            'desc' => '',
            'id' => $prefix . 'logo',
            'type' => 'text',
            'std' => ''
        ),
		array(
            'name' => 'Home Team Coach',
            'desc' => '',
            'id' => $prefix . 'coach',
            'type' => 'text',
            'std' => ''
        ),
		array(
            'name' => 'Home Team Skit',
            'desc' => '',
            'id' => $prefix . 'skit',
            'type' => 'text',
            'std' => ''
        ),
		array(
            'name' => 'Formation',
            'id' => $prefix . 'formation',
            'type' => 'select',
            'options' => array('4-4-2', '4-3-1-2', '4-2-3-1','4-2-1-3', '4-3-2-1', '4-1-2-3', '4-3-3', '3-4-1-2', '3-3-2-2', '3-4-3', '5-2-2-1')
        ),
		array(
            'name' => 'Team Kit',
            'id' => $prefix . 'Kit',
            'type' => 'select',
            'options' => array('Red', 'White', 'Blue', 'Sky-Blue','Black','Yellow','Green', 'Violet', 'Pink', 'Red-Black', 'Blue-Black', 'White-Black', 'Red-Yellow', 'Red-Blue')
        ),
		array(
            'name' => 'Home Team Squad',
            'desc' => '',
            'id' => $prefix . 'squad',
            'type' => 'textarea',
            'std' => ''
        ),
        array(
            'name' => 'Home Team Scorer',
            'desc' => '',
            'id' => $prefix . 'scorer',
            'type' => 'textarea',
            'std' => ''
        )	
    ),
);
?>
<?php
add_action('admin_menu', 'mytheme_add_box');
function mytheme_add_box() {
    global $home_meta_box;
    add_meta_box($home_meta_box['id'], $home_meta_box['title'], 'mytheme_show_box', $home_meta_box['page'], $home_meta_box['context'], $home_meta_box['priority']);
}
?>
<?php
function mytheme_show_box() {
    global $home_meta_box, $post;
    echo '<input type="hidden" name="mytheme_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
    echo '<table class="form-table">';
    foreach ($home_meta_box['fields'] as $field) {
        $meta = get_post_meta($post->ID, $field['id'], true);
        echo '<tr>',
                '<th style="width:20%"><label for="', $field['id'], '">', $field['name'], '</label></th>',
                '<td>';
        switch ($field['type']) {
            case 'text':
                echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" size="30" style="width:97%" />', '<br />', $field['desc'];
                break;
            case 'textarea':
                echo '<textarea name="', $field['id'], '" id="', $field['id'], '" cols="60" rows="4" style="width:97%">', $meta ? $meta : $field['std'], '</textarea>', '<br />', $field['desc'];
                break;
            case 'select':
                echo '<select name="', $field['id'], '" id="', $field['id'], '">';
                foreach ($field['options'] as $option) {
                    echo '<option', $meta == $option ? ' selected="selected"' : '', '>', $option, '</option>';
                }
                echo '</select>';
                break;
            case 'radio':
                foreach ($field['options'] as $option) {
                    echo '<input type="radio" name="', $field['id'], '" value="', $option['value'], '"', $meta == $option['value'] ? ' checked="checked"' : '', ' />', $option['name'];
                }
                break;
            case 'checkbox':
                echo '<input type="checkbox" name="', $field['id'], '" id="', $field['id'], '"', $meta ? ' checked="checked"' : '', ' />';
                break;
        }
        echo     '<td>',
            '</tr>';
    }
    echo '</table>';
}
?>
<?php
add_action('save_post', 'mytheme_save_data');
function mytheme_save_data($post_id) {
    global $home_meta_box;
    if (!wp_verify_nonce($_POST['mytheme_meta_box_nonce'], basename(__FILE__))) {
        return $post_id;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }
    if ('page' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id)) {
            return $post_id;
        }
    } elseif (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }
    foreach ($home_meta_box['fields'] as $field) {
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];
        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    }
}
?>
<?php
$prefix = 'away_';
$away_meta_box = array(
    'id' => 'away-meta-box',
    'title' => 'Away Team',
    'page' => 'match',
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
        array(
            'name' => 'Away Team',
            'desc' => '',
            'id' => $prefix . 'team',
            'type' => 'select',
            'options' => array('', __('Roma','postechin'),  __('Atalanta','postechin'), __('Bologna','postechin') ,__('Cagliari','postechin') ,__('Catania','postechin') ,__('Cesena','postechin') ,__('Chievo','postechin'), __('Fiorentina','postechin'), __('Genoa','postechin') , __('Internazionale','postechin') , __('Juventus','postechin') ,  __('Lazio','postechin'), __('Lecce','postechin'),__('Milan','postechin') ,__('Napoli','postechin') ,__('Palermo','postechin') ,__('Parma','postechin') ,__('Siena','postechin') ,__('Udinese','postechin') )
        ),
		array(
            'name' => 'Team Kit',
            'desc' => '',
            'id' => $prefix . 'kit_num',
            'type' => 'select',
            'options' => array('1','2')
        ),
		array(
            'name' => 'Away Team Name',
            'desc' => '',
            'id' => $prefix . 'name',
            'type' => 'text',
            'std' => ''
        ),
		array(
            'name' => 'Away Team Logo',
            'desc' => '',
            'id' => $prefix . 'logo',
            'type' => 'text',
            'std' => ''
        ),
		array(
            'name' => 'Away Team Coach',
            'desc' => '',
            'id' => $prefix . 'coach',
            'type' => 'text',
            'std' => ''
        ),
		array(
            'name' => 'Away Team Skit',
            'desc' => '',
            'id' => $prefix . 'skit',
            'type' => 'text',
            'std' => ''
        ),
		array(
            'name' => 'Formation',
            'id' => $prefix . 'formation',
            'type' => 'select',
            'options' => array('4-4-2', '4-3-1-2', '4-2-3-1','4-2-1-3', '4-3-2-1', '4-1-2-3', '4-3-3', '3-4-1-2', '3-3-2-2', '3-4-3', '5-2-2-1')
        ),
		array(
            'name' => 'Team Kit',
            'id' => $prefix . 'Kit',
            'type' => 'select',
            'options' => array('Red', 'White', 'Blue', 'Sky-Blue','Black','Yellow','Green', 'Violet', 'Pink', 'Red-Black', 'Blue-Black', 'White-Black', 'Red-Yellow', 'Red-Blue')
        ),
		array(
            'name' => 'Away Team Squad',
            'desc' => '',
            'id' => $prefix . 'squad',
            'type' => 'textarea',
            'std' => ''
        ),
        array(
            'name' => 'Away Team Scorer',
            'desc' => '',
            'id' => $prefix . 'scorer',
            'type' => 'textarea',
            'std' => ''
        )
    )
);
?>
<?php
add_action('admin_menu', 'mytheme_add_box2');
function mytheme_add_box2() {
    global $away_meta_box;
    add_meta_box($away_meta_box['id'], $away_meta_box['title'], 'mytheme_show_box2', $away_meta_box['page'], $away_meta_box['context'], $away_meta_box['priority']);
}
?>
<?php
function mytheme_show_box2() {
    global $away_meta_box, $post;
    echo '<input type="hidden" name="mytheme_meta_box_nonce2" value="', wp_create_nonce(basename(__FILE__)), '" />';
    echo '<table class="form-table">';
    foreach ($away_meta_box['fields'] as $field) {
        $meta = get_post_meta($post->ID, $field['id'], true);
        echo '<tr>',
                '<th style="width:20%"><label for="', $field['id'], '">', $field['name'], '</label></th>',
                '<td>';
        switch ($field['type']) {
            case 'text':
                echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" size="30" style="width:97%" />', '<br />', $field['desc'];
                break;
            case 'textarea':
                echo '<textarea name="', $field['id'], '" id="', $field['id'], '" cols="60" rows="4" style="width:97%">', $meta ? $meta : $field['std'], '</textarea>', '<br />', $field['desc'];
                break;
            case 'select':
                echo '<select name="', $field['id'], '" id="', $field['id'], '">';
                foreach ($field['options'] as $option) {
                    echo '<option', $meta == $option ? ' selected="selected"' : '', '>', $option, '</option>';
                }
                echo '</select>';
                break;
            case 'radio':
                foreach ($field['options'] as $option) {
                    echo '<input type="radio" name="', $field['id'], '" value="', $option['value'], '"', $meta == $option['value'] ? ' checked="checked"' : '', ' />', $option['name'];
                }
                break;
            case 'checkbox':
                echo '<input type="checkbox" name="', $field['id'], '" id="', $field['id'], '"', $meta ? ' checked="checked"' : '', ' />';
                break;
        }
        echo     '<td>',
            '</tr>';
    }
    echo '</table>';
}
?>
<?php
add_action('save_post', 'mytheme_save_data2');
function mytheme_save_data2($post_id) {
    global $away_meta_box;
    if (!wp_verify_nonce($_POST['mytheme_meta_box_nonce2'], basename(__FILE__))) {
        return $post_id;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }
    if ('page' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id)) {
            return $post_id;
        }
    } elseif (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }
    foreach ($away_meta_box['fields'] as $field) {
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];
        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    }
}
?>
<?php
$prefix = 'match_';
$match_meta_box = array(
    'id' => 'match-meta-box',
    'title' => 'Match Info',
    'page' => 'match',
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
        array(
            'name' => 'Time',
            'desc' => '',
            'id' => $prefix . 'time',
            'type' => 'text',
            'std' => ''
        ),
		array(
            'name' => 'Date',
            'desc' => '',
            'id' => $prefix . 'date',
            'type' => 'text',
            'std' => ''
        ),
		array(
            'name' => 'Home Result',
            'desc' => '',
            'id' => $prefix . 'home_result',
            'type' => 'text',
            'std' => ''
        ),
		array(
            'name' => 'Away Result',
            'desc' => '',
            'id' => $prefix . 'away_result',
            'type' => 'text',
            'std' => ''
        ),
		array(
            'name' => 'Stadium',
            'desc' => '',
            'id' => $prefix . 'stadium',
            'type' => 'text',
            'std' => ''
        ),
        array(
            'name' => 'Refree',
            'desc' => '',
            'id' => $prefix . 'refree',
            'type' => 'text',
            'std' => ''
        ),
		array(
            'name' => 'TV Channel',
            'desc' => '',
            'id' => $prefix . 'tv',
            'type' => 'text',
            'std' => ''
        ),
		array(
            'name' => 'Match Report',
            'desc' => '',
            'id' => $prefix . 'review',
            'type' => 'textarea',
            'std' => ''
        ),
		array(
            'name' => 'Live Commentry',
            'desc' => '',
            'id' => $prefix . 'live',
            'type' => 'textarea',
            'std' => ''
        ),
		array(
            'name' => 'Match Type',
            'id' => $prefix . 'type',
            'type' => 'radio',
            'options' => array(
				array('name'=>'Pre Match','value'=>'pre'),
				array('name'=>'Done Match','value'=>'done')
			)
        )
    )
);
?>
<?php
add_action('admin_menu', 'mytheme_add_box3');
function mytheme_add_box3() {
    global $match_meta_box;
    add_meta_box($match_meta_box['id'], $match_meta_box['title'], 'mytheme_show_box3', $match_meta_box['page'], $match_meta_box['context'], $match_meta_box['priority']);
}
?>
<?php
function mytheme_show_box3() {
    global $match_meta_box, $post;
    echo '<input type="hidden" name="mytheme_meta_box_nonce3" value="', wp_create_nonce(basename(__FILE__)), '" />';
    echo '<table class="form-table">';
    foreach ($match_meta_box['fields'] as $field) {
        $meta = get_post_meta($post->ID, $field['id'], true);
        echo '<tr>',
                '<th style="width:20%"><label for="', $field['id'], '">', $field['name'], '</label></th>',
                '<td>';
        switch ($field['type']) {
            case 'text':
                echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" size="30" style="width:97%" />', '<br />', $field['desc'];
                break;
            case 'textarea':
                echo '<textarea name="', $field['id'], '" id="', $field['id'], '" cols="60" rows="4" style="width:97%">', $meta ? $meta : $field['std'], '</textarea>', '<br />', $field['desc'];
                break;
            case 'select':
                echo '<select name="', $field['id'], '" id="', $field['id'], '">';
                foreach ($field['options'] as $option) {
                    echo '<option', $meta == $option ? ' selected="selected"' : '', '>', $option, '</option>';
                }
                echo '</select>';
                break;
            case 'radio':
                foreach ($field['options'] as $option) { ?>
                 <h4><?php   echo '<input type="radio" name="', $field['id'], '" value="', $option['value'], '"', $meta == $option['value'] ? ' checked="checked"' : '', ' />', $option['name'];?></h4><?php
                }
                break;
            case 'checkbox':
                echo '<input type="checkbox" name="', $field['id'], '" id="', $field['id'], '"', $meta ? ' checked="checked"' : '', ' />';
                break;
        }
        echo     '<td>',
            '</tr>';
    }
    echo '</table>';
}
?>
<?php
add_action('save_post', 'mytheme_save_data3');
function mytheme_save_data3($post_id) {
    global $match_meta_box;
    if (!wp_verify_nonce($_POST['mytheme_meta_box_nonce3'], basename(__FILE__))) {
        return $post_id;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }
    if ('page' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id)) {
            return $post_id;
        }
    } elseif (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }
    foreach ($match_meta_box['fields'] as $field) {
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];
        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    }
}
?>
<?php
$prefix = 'stat_';
$stat_meta_box = array(
    'id' => 'stat-meta-box',
    'title' => 'Match Stats',
    'page' => 'match',
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
        array(
            'name' => 'Total Shot(Home)',
            'desc' => '',
            'id' => $prefix . 'home_shot',
            'type' => 'text',
            'std' => ''
        ),
		array(
            'name' => 'Total Shot(Away)',
            'desc' => '',
            'id' => $prefix . 'away_shot',
            'type' => 'text',
            'std' => ''
        ),
		array(
            'name' => 'Shot On Target(Home)',
            'desc' => '',
            'id' => $prefix . 'home_target',
            'type' => 'text',
            'std' => ''
        ),
		array(
            'name' => 'Shot On Target(Away)',
            'desc' => '',
            'id' => $prefix . 'away_target',
            'type' => 'text',
            'std' => ''
        ),
		array(
            'name' => 'Pass Accuracy(Home)',
            'desc' => '',
            'id' => $prefix . 'home_pass',
            'type' => 'text',
            'std' => ''
        ),
		array(
            'name' => 'Pass Accuracy(Away)',
            'desc' => '',
            'id' => $prefix . 'away_pass',
            'type' => 'text',
            'std' => ''
        ),
		array(
            'name' => 'Offside(Home)',
            'desc' => '',
            'id' => $prefix . 'home_offside',
            'type' => 'text',
            'std' => ''
        ),
		array(
            'name' => 'Offside(Away)',
            'desc' => '',
            'id' => $prefix . 'away_offside',
            'type' => 'text',
            'std' => ''
        ),
		array(
            'name' => 'Foul(Home)',
            'desc' => '',
            'id' => $prefix . 'home_foul',
            'type' => 'text',
            'std' => ''
        ),
		array(
            'name' => 'Foul(Away)',
            'desc' => '',
            'id' => $prefix . 'away_foul',
            'type' => 'text',
            'std' => ''
        ),
		array(
            'name' => 'Yellow Card(Home)',
            'desc' => '',
            'id' => $prefix . 'home_yellow',
            'type' => 'text',
            'std' => ''
        ),
		array(
            'name' => 'Yellow Card(Away)',
            'desc' => '',
            'id' => $prefix . 'away_yellow',
            'type' => 'text',
            'std' => ''
        ),
		array(
            'name' => 'Red Card(Home)',
            'desc' => '',
            'id' => $prefix . 'home_red',
            'type' => 'text',
            'std' => ''
        ),
		array(
            'name' => 'Red Card(Away)',
            'desc' => '',
            'id' => $prefix . 'away_red',
            'type' => 'text',
            'std' => ''
        ),
		array(
            'name' => 'Corner(Home)',
            'desc' => '',
            'id' => $prefix . 'home_corner',
            'type' => 'text',
            'std' => ''
        ),
		array(
            'name' => 'Corner(Away)',
            'desc' => '',
            'id' => $prefix . 'away_corner',
            'type' => 'text',
            'std' => ''
        ),
		array(
            'name' => 'Ball Possession(Home)',
            'desc' => '',
            'id' => $prefix . 'home_ball',
            'type' => 'text',
            'std' => ''
        ),
		array(
            'name' => 'Ball Possession(Away)',
            'desc' => '',
            'id' => $prefix . 'away_ball',
            'type' => 'text',
            'std' => ''
        ),
		array(
            'name' => 'Home Win',
            'desc' => '',
            'id' => $prefix . 'home_win',
            'type' => 'text',
            'std' => ''
        ),
		array(
            'name' => 'Home Lose',
            'desc' => '',
            'id' => $prefix . 'home_lose',
            'type' => 'text',
            'std' => ''
        ),
		array(
            'name' => 'Draw',
            'desc' => '',
            'id' => $prefix . 'home_draw',
            'type' => 'text',
            'std' => ''
        ),
    )
);
?>
<?php
add_action('admin_menu', 'mytheme_add_box7');
function mytheme_add_box7() {
	global $stat_meta_box;
    add_meta_box($stat_meta_box['id'], $stat_meta_box['title'], 'mytheme_show_box7', $stat_meta_box['page'], $stat_meta_box['context'], $stat_meta_box['priority']);
}
?>
<?php
function mytheme_show_box7() {
    global $stat_meta_box, $post;
    echo '<input type="hidden" name="mytheme_meta_box_nonce7" value="', wp_create_nonce(basename(__FILE__)), '" />';
	$location = get_post_meta($post->ID, 'stat_home_shot', true);
	$location2 = get_post_meta($post->ID, 'stat_away_shot', true);
	$field=$stat_meta_box['fields'];
		$location = get_post_meta($post->ID, 'stat_home_shot', true);
		$location2 = get_post_meta($post->ID, 'stat_away_shot', true);
		echo '<div style="width:100%; margin:0 0 10px 0;"><input type="text" name="','stat_home_shot', '" id="', 'stat_home_shot', '" value="', $location, '" size="5" style="width:5%" />';
		echo '     <- Away [Total Shot] Home ->     ';
		echo '<input type="text" name="','stat_away_shot', '" id="', 'stat_away_shot', '" value="', $location2, '" size="5" style="width:5%" /></div>';
		$location = get_post_meta($post->ID, 'stat_home_target', true);
		$location2 = get_post_meta($post->ID, 'stat_away_target', true);
		echo '<div style="width:100%; margin:0 0 10px 0;"><input type="text" name="','stat_home_target', '" id="', 'stat_home_target', '" value="', $location, '" size="5" style="width:5%" />';
		echo '     <- Away [Shot On Target] Home ->    ';
		echo '<input type="text" name="','stat_away_target', '" id="', 'stat_away_target', '" value="', $location2, '" size="5" style="width:5%" /></div>';
		$location = get_post_meta($post->ID, 'stat_home_pass', true);
		$location2 = get_post_meta($post->ID, 'stat_away_pass', true);
		echo '<div style="width:100%; margin:0 0 10px 0;"><input type="text" name="','stat_home_pass', '" id="', 'stat_home_pass', '" value="', $location, '" size="5" style="width:5%" />';
		echo '     <- Away [Pass Accuracy] Home ->    ';
		echo '<input type="text" name="','stat_away_pass', '" id="', 'stat_away_pass', '" value="', $location2, '" size="5" style="width:5%" /></div>';
		$location = get_post_meta($post->ID, 'stat_home_offside', true);
		$location2 = get_post_meta($post->ID, 'stat_away_offside', true);
		echo '<div style="width:100%; margin:0 0 10px 0;"><input type="text" name="','stat_home_offside', '" id="', 'stat_home_offside', '" value="', $location, '" size="5" style="width:5%" />';
		echo '     <- Away [Offside] Home ->    ';
		echo '<input type="text" name="','stat_away_offside', '" id="', 'stat_away_offside', '" value="', $location2, '" size="5" style="width:5%" /></div>';
		$location = get_post_meta($post->ID, 'stat_home_foul', true);
		$location2 = get_post_meta($post->ID, 'stat_away_foul', true);
		echo '<div style="width:100%; margin:0 0 10px 0;"><input type="text" name="','stat_home_foul', '" id="', 'stat_home_foul', '" value="', $location, '" size="5" style="width:5%" />';
		echo '     <- Away [Foul] Home ->    ';
		echo '<input type="text" name="','stat_away_foul', '" id="', 'stat_away_foul', '" value="', $location2, '" size="5" style="width:5%" /></div>';
		$location = get_post_meta($post->ID, 'stat_home_yellow', true);
		$location2 = get_post_meta($post->ID, 'stat_away_yellow', true);
		echo '<div style="width:100%; margin:0 0 10px 0;"><input type="text" name="','stat_home_yellow', '" id="', 'stat_home_yellow', '" value="', $location, '" size="5" style="width:5%" />';
		echo '     <- Away [Yellow Card] Home ->    ';
		echo '<input type="text" name="','stat_away_yellow', '" id="', 'stat_away_yellow', '" value="', $location2, '" size="5" style="width:5%" /></div>';
		$location = get_post_meta($post->ID, 'stat_home_red', true);
		$location2 = get_post_meta($post->ID, 'stat_away_red', true);
		echo '<div style="width:100%; margin:0 0 10px 0;"><input type="text" name="','stat_home_red', '" id="', 'stat_home_red', '" value="', $location, '" size="5" style="width:5%" />';
		echo '     <- Away [Red Card] Home ->    ';
		echo '<input type="text" name="','stat_away_red', '" id="', 'stat_away_red', '" value="', $location2, '" size="5" style="width:5%" /></div>';
		$location = get_post_meta($post->ID, 'stat_home_corner', true);
		$location2 = get_post_meta($post->ID, 'stat_away_corner', true);
		echo '<div style="width:100%; margin:0 0 10px 0;"><input type="text" name="','stat_home_corner', '" id="', 'stat_home_corner', '" value="', $location, '" size="5" style="width:5%" />';
		echo '     <- Away [Corner] Home ->    ';
		echo '<input type="text" name="','stat_away_corner', '" id="', 'stat_away_corner', '" value="', $location2, '" size="5" style="width:5%" /></div>';
		$location = get_post_meta($post->ID, 'stat_home_ball', true);
		$location2 = get_post_meta($post->ID, 'stat_away_ball', true);
		echo '<div style="width:100%; margin:0 0 10px 0;"><input type="text" name="','stat_home_ball', '" id="', 'stat_home_ball', '" value="', $location, '" size="5" style="width:5%" />';
		echo '     <- Away [Ball Possession] Home ->    ';
		echo '<input type="text" name="','stat_away_ball', '" id="', 'stat_away_ball', '" value="', $location2, '" size="5" style="width:5%" /></div>';
		$location = get_post_meta($post->ID, 'stat_home_win', true);
		$location2 = get_post_meta($post->ID, 'stat_home_lose', true);
		echo 'Home Team Win';
		echo '<input type="text" name="','stat_home_win', '" id="', 'stat_home_win', '" value="', $location, '" size="5" style="width:5%" /><br/>';
		echo 'Home Team Lose';
		echo '<input type="text" name="','stat_home_lose', '" id="', 'stat_home_lose', '" value="', $location2, '" size="5" style="width:5%" /><br/>';
		$location = get_post_meta($post->ID, 'stat_home_draw', true);
		echo 'Draw';
		echo '<input type="text" name="','stat_home_draw', '" id="', 'stat_home_draw', '" value="', $location, '" size="5" style="width:5%" /><br/>';
}
?>
<?php
add_action('save_post', 'mytheme_save_data7');
function mytheme_save_data7($post_id) {
    global $stat_meta_box;
    if (!wp_verify_nonce($_POST['mytheme_meta_box_nonce7'], basename(__FILE__))) {
        return $post_id;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }
    if ('page' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id)) {
            return $post_id;
        }
    } elseif (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }
    foreach ($stat_meta_box['fields'] as $field) {
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];
        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    }
}
?>
<?php
$prefix = 'break_';
$post_meta_box = array(
    'id' => 'post-meta-box',
    'title' => 'Breaking Option',
    'pages' => array('post'),
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
        array(
            'name' => 'Slider',
			'id' => 'slider',
			'type' => 'checkbox'
        ),
		array(
            'name' => 'Slider Image',
			'id' => 'img',
			'type' => 'text'
        ),
		array(
            'name' => 'Breaking News',
			'id' => 'break',
			'type' => 'checkbox'
        ),
    )
);
?>
<?php
add_action('admin_menu', 'mytheme_add_box4');
function mytheme_add_box4() {
    global $post_meta_box;
    foreach ($post_meta_box['pages'] as $page) {
        add_meta_box($post_meta_box['id'], $post_meta_box['title'], 'mytheme_show_box4', $page, $post_meta_box['context'], $post_meta_box['priority']);
    }
}
?>
<?php
function mytheme_show_box4() {
    global $post_meta_box, $post;
    echo '<input type="hidden" name="mytheme_meta_box_nonce4" value="', wp_create_nonce(basename(__FILE__)), '" />';
    echo '<table class="form-table">';
    foreach ($post_meta_box['fields'] as $field) {
        $meta = get_post_meta($post->ID, $field['id'], true);
        echo '<tr>',
                '<th style="width:20%"><label for="', $field['id'], '">', $field['name'], '</label></th>',
                '<td>';
        switch ($field['type']) {
            case 'text':
                echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" size="30" style="width:97%" />', '<br />', $field['desc'];
                break;
            case 'textarea':
                echo '<textarea name="', $field['id'], '" id="', $field['id'], '" cols="60" rows="4" style="width:97%">', $meta ? $meta : $field['std'], '</textarea>', '<br />', $field['desc'];
                break;
            case 'select':
                echo '<select name="', $field['id'], '" id="', $field['id'], '">';
                foreach ($field['options'] as $option) {
                    echo '<option', $meta == $option ? ' selected="selected"' : '', '>', $option, '</option>';
                }
                echo '</select>';
                break;
            case 'radio':
                foreach ($field['options'] as $option) {
                    echo '<input type="radio" name="', $field['id'], '" value="', $option['value'], '"', $meta == $option['value'] ? ' checked="checked"' : '', ' />', $option['name'];
                }
                break;
            case 'checkbox':
                echo '<input type="checkbox" name="', $field['id'], '" id="', $field['id'], '"', $meta ? ' checked="checked"' : '', ' />';
                break;
        }
        echo     '<td>',
            '</tr>';
    }
    echo '</table>';
}
?>
<?php
add_action('save_post', 'mytheme_save_data4');
function mytheme_save_data4($post_id) {
    global $post_meta_box;
    if (!wp_verify_nonce($_POST['mytheme_meta_box_nonce4'], basename(__FILE__))) {
        return $post_id;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }
    if ('pages' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id)) {
            return $post_id;
        }
    } elseif (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }
    foreach ($post_meta_box['fields'] as $field) {
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];
        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    }
}
?>
<?php
$prefix = 'player_';
$series_meta_box = array(
    'id' => 'player-meta-box',
    'title' => 'Player',
    'page' => 'player',
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
        array(
            'name' => 'Name',
            'desc' => '',
            'id' => $prefix . 'name',
            'type' => 'text',
            'std' => ''
        ),
		array(
            'name' => 'Name on Shirt',
            'desc' => '',
            'id' => $prefix . 'shirt',
            'type' => 'text',
            'std' => ''
        ),
		array(
            'name' => 'Photo URL',
            'desc' => '',
            'id' => $prefix . 'img',
            'type' => 'text',
            'std' => ''
        ),
		array(
            'name' => 'Date of Birth',
            'desc' => '',
            'id' => $prefix . 'birth',
            'type' => 'text',
            'std' => ''
        ),
		array(
            'name' => 'Nationality',
            'desc' => '',
            'id' => $prefix . 'national',
            'type' => 'text',
            'std' => ''
        ),
		array(
            'name' => 'Height',
            'desc' => '',
            'id' => $prefix . 'height',
            'type' => 'text',
            'std' => ''
        ),
		array(
            'name' => 'Weight',
            'desc' => '',
            'id' => $prefix . 'weight',
            'type' => 'text',
            'std' => ''
        ),
		array(
            'name' => 'Position',
            'id' => $prefix . 'position',
            'type' => 'select',
            'options' => array('Goalkeeper', 'Defender', 'Midfielder', 'Striker', 'Manager/Coach'),
        ),
		array(
            'name' => 'Squad Number',
            'desc' => '',
            'id' => $prefix . 'number',
            'type' => 'text',
            'std' => ''
        ),
		array(
            'name' => 'Previous Teams:',
            'desc' => '',
            'id' => $prefix . 'prevteam',
            'type' => 'text',
            'std' => ''
        ),
		array(
            'name' => 'First match for Roma:',
            'desc' => '',
            'id' => $prefix . 'first',
            'type' => 'text',
            'std' => ''
        ),
		array(
            'name' => 'Club Match Count:',
            'desc' => '',
            'id' => $prefix . 'clubcount',
            'type' => 'text',
            'std' => ''
        ),
		array(
            'name' => 'National Match Count:',
            'desc' => '',
            'id' => $prefix . 'nationalcount',
            'type' => 'text',
            'std' => ''
        ),
		array(
            'name' => 'Contract Time/Value:',
            'desc' => '',
            'id' => $prefix . 'contract',
            'type' => 'text',
            'std' => ''
        )
    ),
);
?>
<?php
add_action('admin_menu', 'mytheme_add_box5');
function mytheme_add_box5() {
    global $series_meta_box;
    add_meta_box($series_meta_box['id'], $series_meta_box['title'], 'mytheme_show_box5', $series_meta_box['page'], $series_meta_box['context'], $series_meta_box['priority']);
}
?>
<?php
function mytheme_show_box5() {
    global $series_meta_box, $post;
    echo '<input type="hidden" name="mytheme_meta_box_nonce5" value="', wp_create_nonce(basename(__FILE__)), '" />';
    echo '<table class="form-table">';
    foreach ($series_meta_box['fields'] as $field) {
        $meta = get_post_meta($post->ID, $field['id'], true);
        echo '<tr>',
                '<th style="width:20%"><label for="', $field['id'], '">', $field['name'], '</label></th>',
                '<td>';
        switch ($field['type']) {
            case 'text':
                echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" size="30" style="width:97%" />', '<br />', $field['desc'];
                break;
            case 'textarea':
                echo '<textarea name="', $field['id'], '" id="', $field['id'], '" cols="60" rows="4" style="width:97%">', $meta ? $meta : $field['std'], '</textarea>', '<br />', $field['desc'];
                break;
			case 'select':
                echo '<select name="', $field['id'], '" id="', $field['id'], '">';
                foreach ($field['options'] as $option) {
                    echo '<option', $meta == $option ? ' selected="selected"' : '', '>', $option, '</option>';
                }
                echo '</select>';
                break;
            case 'radio':
                foreach ($field['options'] as $option) { ?>
                 <h4><?php echo '<input type="radio" name="', $field['id'], '" value="', $option['value'], '"', $meta == $option['value'] ? ' checked="checked"' : '', ' />', $option['name'];?><br /></h4><?php
                }
                break;
            case 'checkbox':
                echo '<input type="checkbox" name="', $field['id'], '" id="', $field['id'], '"', $meta ? ' checked="checked"' : '', ' />';
                break;
        }
        echo     '<td>',
            '</tr>';
    }
    echo '</table>';
}
?>
<?php
add_action('save_post', 'mytheme_save_data5');
function mytheme_save_data5($post_id) {
    global $series_meta_box;
    if (!wp_verify_nonce($_POST['mytheme_meta_box_nonce5'], basename(__FILE__))) {
        return $post_id;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }
    if ('page' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id)) {
            return $post_id;
        }
    } elseif (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }
    foreach ($series_meta_box['fields'] as $field) {
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];
        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    }
}
?>
<?php
$prefix = 'mag_';
$mag_meta_box = array(
    'id' => 'mag_meta_box',
    'title' => 'Magazine',
    'page' => 'magazine',
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
        array(
            'name' => 'Number',
            'desc' => '',
            'id' => $prefix . 'num',
            'type' => 'text',
            'std' => ''
        ),
		array(
            'name' => 'Date',
            'desc' => '',
            'id' => $prefix . 'date',
            'type' => 'text',
            'std' => ''
        ),
		array(
            'name' => 'Cover URL',
            'desc' => '',
            'id' => $prefix . 'img',
            'type' => 'text',
            'std' => ''
        ),
		array(
            'name' => 'Top Titles',
            'desc' => '',
            'id' => $prefix . 'title',
            'type' => 'textarea',
            'std' => ''
        )
    ),
);
?>
<?php
add_action('admin_menu', 'mytheme_add_box6');
function mytheme_add_box6() {
    global $mag_meta_box;
    add_meta_box($mag_meta_box['id'], $mag_meta_box['title'], 'mytheme_show_box6', $mag_meta_box['page'], $mag_meta_box['context'], $mag_meta_box['priority']);
}
?>
<?php
function mytheme_show_box6() {
    global $mag_meta_box, $post;
    echo '<input type="hidden" name="mytheme_meta_box_nonce6" value="', wp_create_nonce(basename(__FILE__)), '" />';
    echo '<table class="form-table">';
    foreach ($mag_meta_box['fields'] as $field) {
        $meta = get_post_meta($post->ID, $field['id'], true);
        echo '<tr>',
                '<th style="width:20%"><label for="', $field['id'], '">', $field['name'], '</label></th>',
                '<td>';
        switch ($field['type']) {
            case 'text':
                echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" size="30" style="width:97%" />', '<br />', $field['desc'];
                break;
            case 'textarea':
                echo '<textarea name="', $field['id'], '" id="', $field['id'], '" cols="60" rows="4" style="width:97%">', $meta ? $meta : $field['std'], '</textarea>', '<br />', $field['desc'];
                break;
            case 'select':
                echo '<select name="', $field['id'], '" id="', $field['id'], '">';
                foreach ($field['options'] as $option) {
                    echo '<option', $meta == $option ? ' selected="selected"' : '', '>', $option, '</option>';
                }
                echo '</select>';
                break;
            case 'radio':
                foreach ($field['options'] as $option) { ?>
                 <h4><?php echo '<input type="radio" name="', $field['id'], '" value="', $option['value'], '"', $meta == $option['value'] ? ' checked="checked"' : '', ' />', $option['name'];?><br /></h4><?php
                }
                break;
            case 'checkbox':
                echo '<input type="checkbox" name="', $field['id'], '" id="', $field['id'], '"', $meta ? ' checked="checked"' : '', ' />';
                break;
        }
        echo     '<td>',
            '</tr>';
    }
    echo '</table>';
}
?>
<?php
add_action('save_post', 'mytheme_save_data6');
function mytheme_save_data6($post_id) {
    global $mag_meta_box;
    if (!wp_verify_nonce($_POST['mytheme_meta_box_nonce6'], basename(__FILE__))) {
        return $post_id;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }
    if ('page' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id)) {
            return $post_id;
        }
    } elseif (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }
    foreach ($mag_meta_box['fields'] as $field) {
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];
        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    }
}
?>
<?php
$prefix = 'download_';
$down_meta_box = array(
    'id' => 'download_meta_box',
    'title' => 'Download',
    'page' => 'download',
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
        array(
            'name' => 'Size',
            'desc' => '',
            'id' => $prefix . 'size',
            'type' => 'text',
            'std' => ''
        ),
		array(
            'name' => 'File Type',
            'id' => $prefix . 'type',
            'type' => 'radio',
            'options' => array(
				array('name'=>'Wallpaper','value'=>'wallpaper'),
				array('name'=>'Music','value'=>'music'),
				array('name'=>'PC Theme','value'=>'pc_theme'),
				array('name'=>'Mobile Theme','value'=>'mobile_theme'),
				array('name'=>'Icon','value'=>'icon'),
				array('name'=>'Font','value'=>'font')
			)
        )
    ),
);
?>
<?php
add_action('admin_menu', 'mytheme_add_box8');
function mytheme_add_box8() {
    global $download_meta_box;
    add_meta_box($download_meta_box['id'], $download_meta_box['title'], 'mytheme_show_box6', $download_meta_box['page'], $download_meta_box['context'], $download_meta_box['priority']);
}
?>
<?php
function mytheme_show_box8() {
    global $download_meta_box, $post;
    echo '<input type="hidden" name="mytheme_meta_box_nonce8" value="', wp_create_nonce(basename(__FILE__)), '" />';
    echo '<table class="form-table">';
    foreach ($download_meta_box['fields'] as $field) {
        $meta = get_post_meta($post->ID, $field['id'], true);
        echo '<tr>',
                '<th style="width:20%"><label for="', $field['id'], '">', $field['name'], '</label></th>',
                '<td>';
        switch ($field['type']) {
            case 'text':
                echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" size="30" style="width:97%" />', '<br />', $field['desc'];
                break;
            case 'textarea':
                echo '<textarea name="', $field['id'], '" id="', $field['id'], '" cols="60" rows="4" style="width:97%">', $meta ? $meta : $field['std'], '</textarea>', '<br />', $field['desc'];
                break;
            case 'select':
                echo '<select name="', $field['id'], '" id="', $field['id'], '">';
                foreach ($field['options'] as $option) {
                    echo '<option', $meta == $option ? ' selected="selected"' : '', '>', $option, '</option>';
                }
                echo '</select>';
                break;
            case 'radio':
                foreach ($field['options'] as $option) { ?>
                 <h4><?php echo '<input type="radio" name="', $field['id'], '" value="', $option['value'], '"', $meta == $option['value'] ? ' checked="checked"' : '', ' />', $option['name'];?><br /></h4><?php
                }
                break;
            case 'checkbox':
                echo '<input type="checkbox" name="', $field['id'], '" id="', $field['id'], '"', $meta ? ' checked="checked"' : '', ' />';
                break;
        }
        echo     '<td>',
            '</tr>';
    }
    echo '</table>';
}
?>
<?php
add_action('save_post', 'mytheme_save_data8');
function mytheme_save_data8($post_id) {
    global $download_meta_box;
    if (!wp_verify_nonce($_POST['mytheme_meta_box_nonce8'], basename(__FILE__))) {
        return $post_id;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }
    if ('page' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id)) {
            return $post_id;
        }
    } elseif (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }
    foreach ($download_meta_box['fields'] as $field) {
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];
        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    }
}
?>
<?php
$prefix = 'video_';
$video_meta_box = array(
    'id' => 'video_meta_box',
    'title' => 'Video',
    'page' => 'video',
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
        array(
            'name' => 'Video Link',
            'desc' => '',
            'id' => $prefix . 'link',
            'type' => 'text',
            'std' => ''
        ),
    ),
);
?>
<?php
add_action('admin_menu', 'mytheme_add_box9');
function mytheme_add_box9() {
    global $video_meta_box;
    add_meta_box($video_meta_box['id'], $video_meta_box['title'], 'mytheme_show_box9', $video_meta_box['page'], $video_meta_box['context'], $video_meta_box['priority']);
}
?>
<?php
function mytheme_show_box9() {
    global $video_meta_box, $post;
    echo '<input type="hidden" name="mytheme_meta_box_nonce9" value="', wp_create_nonce(basename(__FILE__)), '" />';
    echo '<table class="form-table">';
    foreach ($video_meta_box['fields'] as $field) {
        $meta = get_post_meta($post->ID, $field['id'], true);
        echo '<tr>',
                '<th style="width:20%"><label for="', $field['id'], '">', $field['name'], '</label></th>',
                '<td>';
        switch ($field['type']) {
            case 'text':
                echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" size="30" style="width:97%" />', '<br />', $field['desc'];
                break;
            case 'textarea':
                echo '<textarea name="', $field['id'], '" id="', $field['id'], '" cols="60" rows="4" style="width:97%">', $meta ? $meta : $field['std'], '</textarea>', '<br />', $field['desc'];
                break;
            case 'select':
                echo '<select name="', $field['id'], '" id="', $field['id'], '">';
                foreach ($field['options'] as $option) {
                    echo '<option', $meta == $option ? ' selected="selected"' : '', '>', $option, '</option>';
                }
                echo '</select>';
                break;
            case 'radio':
                foreach ($field['options'] as $option) { ?>
                 <h4><?php echo '<input type="radio" name="', $field['id'], '" value="', $option['value'], '"', $meta == $option['value'] ? ' checked="checked"' : '', ' />', $option['name'];?><br /></h4><?php
                }
                break;
            case 'checkbox':
                echo '<input type="checkbox" name="', $field['id'], '" id="', $field['id'], '"', $meta ? ' checked="checked"' : '', ' />';
                break;
        }
        echo     '<td>',
            '</tr>';
    }
    echo '</table>';
}
?>
<?php
add_action('save_post', 'mytheme_save_data9');
function mytheme_save_data9($post_id) {
    global $video_meta_box;
    if (!wp_verify_nonce($_POST['mytheme_meta_box_nonce9'], basename(__FILE__))) {
        return $post_id;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }
    if ('page' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id)) {
            return $post_id;
        }
    } elseif (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }
    foreach ($video_meta_box['fields'] as $field) {
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];
        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    }
}
?>
<?php
function example_remove_dashboard_widgets() {
	global $wp_meta_boxes;
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);	
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);	
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);	
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);	
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);	
} 
add_action('wp_dashboard_setup', 'example_remove_dashboard_widgets' );
?>
<?php
if ( function_exists('register_sidebar') ) {
register_sidebar(array('name'=>'Sidebar'));
}
?>
<?php add_theme_support( 'post-thumbnails', array( 'post', 'article','match' , 'video', 'photo', 'player','download') );
set_post_thumbnail_size( 120, 90, true );
add_image_size( 'single-thumbnail', 360, 330, true );
 ?>
<?php
class Postechin_Ad_940_100 extends WP_Widget {
	function Postechin_Ad_940_100() {
		$widget_ops = array('classname' => 'widget_simpleimage', 'description' => __('Show Ad in Postechin Theme'));
		$control_ops = array();
		$this->WP_Widget('simpleimage', __('Postechin Ad - 940*100'), $widget_ops, $control_ops);
	}
	function widget( $args, $instance ) {
		extract($args);
  	if ($instance['link']) {
  		if ($instance['new_window'])
  			$before_image = "<a href=\"".$instance['link']."\" target=\"_blank\">";
  		else
  			$before_image = "<a href=\"".$instance['link']."\">";

  		$after_image = "</a>";
  	}		
  	echo $before_widget; ?>
  	<div class="ad-940">
  	  <?php echo $before_image; ?>
  		<img src="<?php echo $instance['image']; ?>" width="940" height="100"/>
  		<?php echo $after_image; ?>
  	</div>
  	<?php echo $after_widget;
	}
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['image'] = strip_tags($new_instance['image']);
		$instance['link'] = strip_tags($new_instance['link']);
		return $instance;
	}
	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'image' => '', 'link' => '') );
		if ($instance['image'])
  		$title = preg_replace('/\?.*/', "", basename($instance['image']));
?>
    <input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="hidden" value="<?php echo $title; ?>" />
		<p>
			<label for="<?php echo $this->get_field_id('image'); ?>">
				<?php _e('Image URL:','postechin'); ?>
				<input class="widefat" id="<?php echo $this->get_field_id('image'); ?>" name="<?php echo $this->get_field_name('image'); ?>" type="text" value="<?php echo $instance['image']; ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('link'); ?>">
				<?php _e('Link URL (optional):','postechin'); ?>
				<input class="widefat" id="<?php echo $this->get_field_id('link'); ?>" name="<?php echo $this->get_field_name('link'); ?>" type="text" value="<?php echo $instance['link']; ?>" />
			</label>
		</p>
<?php
	}
}
  register_widget('Postechin_Ad_940_100');
?>
<?php
class Postechin_Ad_312_140 extends WP_Widget {
	function Postechin_Ad_312_140() {
		$widget_ops = array('classname' => 'widget_312', 'description' => __('Show Ad in Postechin Theme'));
		$control_ops = array();
		$this->WP_Widget('image312', __('Postechin Ad 312*140'), $widget_ops, $control_ops);
	}
	function widget( $args, $instance ) {
		extract($args);
  	if ($instance['link1']) {
  		$before_image1 = "<a href=\"".$instance['link1']."\" target=\"_blank\">";
  		$after_image1 = "</a>";
  	}
	if ($instance['link2']) {
  		$before_image2 = "<a href=\"".$instance['link2']."\" target=\"_blank\">";
  		$after_image2 = "</a>";
  	}
	if ($instance['link3']) {
  		$before_image3 = "<a href=\"".$instance['link3']."\" target=\"_blank\">";
  		$after_image3 = "</a>";
  	}
  	echo $before_widget; ?>
  	<div class="ad-312"><?php echo $before_image1; ?><img src="<?php echo $instance['image1']; ?>" style=" border-style: solid; border-color: #570000; border-width: 8px 0px; margin: 0; width: 320px;"/><?php echo $after_image1; ?><?php echo $before_image2; ?><img src="<?php echo $instance['image2']; ?>" style=" border-style: solid; border-color: #570000; border-width: 0px 0px 8px 0px; margin: 0; width: 320px;"/><?php echo $after_image2; ?><?php echo $before_image3; ?><img src="<?php echo $instance['image3']; ?>" style=" border-style: solid; border-color: #570000; border-width: 0px 0px 8px 0px; margin: 0 0 10px 0; width: 320px;"/><?php echo $after_image3; ?></div>
  	<?php echo $after_widget;
	}
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['image1'] = strip_tags($new_instance['image1']);
		$instance['link1'] = strip_tags($new_instance['link1']);
		$instance['image2'] = strip_tags($new_instance['image2']);
		$instance['link2'] = strip_tags($new_instance['link2']);
		$instance['image3'] = strip_tags($new_instance['image3']);
		$instance['link3'] = strip_tags($new_instance['link3']);
		return $instance;
	}
	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'image1' => '', 'link1' => '', 'image2' => '', 'link2' => '', 'image3' => '', 'link3' => '') );
		if ($instance['image'])
  		$title = preg_replace('/\?.*/', "", basename($instance['image']));
?>
    <input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="hidden" value="<?php echo $title; ?>" />
		<p>
			<label for="<?php echo $this->get_field_id('image1'); ?>">
				<?php _e('Image 1 URL:'); ?>
				<input class="widefat" id="<?php echo $this->get_field_id('image1'); ?>" name="<?php echo $this->get_field_name('image1'); ?>" type="text" value="<?php echo $instance['image1']; ?>" size="10" />
			
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('link1'); ?>">
				<?php _e('Link 1 URL (optional):'); ?>
				<input class="widefat" id="<?php echo $this->get_field_id('link1'); ?>" name="<?php echo $this->get_field_name('link1'); ?>" type="text" value="<?php echo $instance['link1']; ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('image2'); ?>">
				<?php _e('Image 2 URL:'); ?>
				<input class="widefat" id="<?php echo $this->get_field_id('image2'); ?>" name="<?php echo $this->get_field_name('image2'); ?>" type="text" value="<?php echo $instance['image2']; ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('link2'); ?>">
				<?php _e('Link 2 URL (optional):'); ?>
				<input class="widefat" id="<?php echo $this->get_field_id('link2'); ?>" name="<?php echo $this->get_field_name('link2'); ?>" type="text" value="<?php echo $instance['link2']; ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('image3'); ?>">
				<?php _e('Image 3 URL:'); ?>
				<input class="widefat" id="<?php echo $this->get_field_id('image3'); ?>" name="<?php echo $this->get_field_name('image3'); ?>" type="text" value="<?php echo $instance['image3']; ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('link3'); ?>">
				<?php _e('Link 3 URL (optional):'); ?>
				<input class="widefat" id="<?php echo $this->get_field_id('link3'); ?>" name="<?php echo $this->get_field_name('link3'); ?>" type="text" value="<?php echo $instance['link3']; ?>" />
			</label>
		</p>
<?php
	}
}
  register_widget('Postechin_Ad_312_140');
?>
<?php
class Postechin_Ad_468_60 extends WP_Widget {
	function Postechin_Ad_468_60() {
		$widget_ops = array('classname' => 'widget_468', 'description' => __('Show Ad in Postechin Theme'));
		$control_ops = array();
		$this->WP_Widget('image468', __('Postechin Ad 468*60'), $widget_ops, $control_ops);
	}
	function widget( $args, $instance ) {
		extract($args);
  	if ($instance['link1']) {
  			$before_image1 = "<a href=\"".$instance['link1']."\" target=\"_blank\">";
  		$after_image1 = "</a>";
  	}
	if ($instance['link2']) {
  			$before_image2 = "<a href=\"".$instance['link2']."\" target=\"_blank\">";
  		$after_image2 = "</a>";
  	}
  	echo $before_widget; ?>
  	<div class="ad-468">
  	  <?php echo $before_image1; ?>
  		<img src="<?php echo $instance['image1']; ?>" width="468" height="60"/>
	  <?php echo $after_image1; ?>
	  <?php echo $before_image2; ?>
  		<img src="<?php echo $instance['image2']; ?>" width="468" height="60"/>
	  <?php echo $after_image2; ?>
  	</div>
  	<?php echo $after_widget;
	}
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['image1'] = strip_tags($new_instance['image1']);
		$instance['link1'] = strip_tags($new_instance['link1']);
		$instance['image2'] = strip_tags($new_instance['image2']);
		$instance['link2'] = strip_tags($new_instance['link2']);
		return $instance;
	}
	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'image1' => '', 'link1' => '', 'image2' => '', 'link2' => '') );
		if ($instance['image'])
  		$title = preg_replace('/\?.*/', "", basename($instance['image']));
?>
    <input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="hidden" value="<?php echo $title; ?>" />
		<p>
			<label for="<?php echo $this->get_field_id('image1'); ?>">
				<?php _e('Image 1 URL:'); ?>
				<input class="widefat" id="<?php echo $this->get_field_id('image1'); ?>" name="<?php echo $this->get_field_name('image1'); ?>" type="text" value="<?php echo $instance['image1']; ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('link1'); ?>">
				<?php _e('Link 1 URL (optional):'); ?>
				<input class="widefat" id="<?php echo $this->get_field_id('link1'); ?>" name="<?php echo $this->get_field_name('link1'); ?>" type="text" value="<?php echo $instance['link1']; ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('image2'); ?>">
				<?php _e('Image 2 URL:'); ?>
				<input class="widefat" id="<?php echo $this->get_field_id('image2'); ?>" name="<?php echo $this->get_field_name('image2'); ?>" type="text" value="<?php echo $instance['image2']; ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('link2'); ?>">
				<?php _e('Link 2 URL (optional):'); ?>
				<input class="widefat" id="<?php echo $this->get_field_id('link2'); ?>" name="<?php echo $this->get_field_name('link2'); ?>" type="text" value="<?php echo $instance['link2']; ?>" />
			</label>
		</p>
<?php
	}
}
  register_widget('Postechin_Ad_468_60');
?>
<?php
class Postechin_Ad_170 extends WP_Widget {
	function Postechin_Ad_170() {
		$widget_ops = array('classname' => 'widget_170', 'description' => __('Show Ad in Postechin Theme'));
		$control_ops = array();
		$this->WP_Widget('image170', __('Postechin Ad - 170'), $widget_ops, $control_ops);
	}
	function widget( $args, $instance ) {
		extract($args);
  	if ($instance['link']) {
  		if ($instance['new_window'])
  			$before_image = "<a href=\"".$instance['link']."\" target=\"_blank\">";
  		else
  			$before_image = "<a href=\"".$instance['link']."\">";

  		$after_image = "</a>";
  	}		
  	echo $before_widget; ?>
  	<div class="ad-170">
  	  <?php echo $before_image; ?>
  		<img src="<?php echo $instance['image']; ?>" width="170"/>
  		<?php echo $after_image; ?>
  	</div>
  	<?php echo $after_widget;
	}
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['image'] = strip_tags($new_instance['image']);
		$instance['link'] = strip_tags($new_instance['link']);
		return $instance;
	}
	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'image' => '', 'link' => '') );
		if ($instance['image'])
  		$title = preg_replace('/\?.*/', "", basename($instance['image']));
?>
    <input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="hidden" value="<?php echo $title; ?>" />
		<p>
			<label for="<?php echo $this->get_field_id('image'); ?>">
				<?php _e('Image URL:','postechin'); ?>
				<input class="widefat" id="<?php echo $this->get_field_id('image'); ?>" name="<?php echo $this->get_field_name('image'); ?>" type="text" value="<?php echo $instance['image']; ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('link'); ?>">
				<?php _e('Link URL (optional):','postechin'); ?>
				<input class="widefat" id="<?php echo $this->get_field_id('link'); ?>" name="<?php echo $this->get_field_name('link'); ?>" type="text" value="<?php echo $instance['link']; ?>" />
			</label>
		</p>
<?php
	}
}
  register_widget('Postechin_Ad_170');
?>
<?php
function myUrl($atts, $content = null) {
	extract(shortcode_atts(array(
		"href" => 'http://'
	), $atts));
	return '<a href="'.$href.'">'.$content.'</a>';
}
add_shortcode("url", "myUrl");
?>
<?php
function box_shortcode( $atts, $content = null )
{
    extract( shortcode_atts( array(
      'color' => 'blue'
      ), $atts ) );
 
      return '
      <div class="shortcode_box  ' .  $color . '">' . $content . '</div>'; 
}
add_shortcode('box', 'box_shortcode');
?>
<?php
function kriesi_pagination($pages = '', $range = 2)
{  
     $showitems = ($range * 2)+1;  
     global $paged;
     if(empty($paged)) $paged = 1;
     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   
     if(1 != $pages)
     {
         echo "<div class='pagination'>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo;</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
             }
         }
         if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a>";  
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>&raquo;</a>";
         echo "</div>\n";
     }
}
?>
<?php
class WP_Widget_Upcoming_Posts extends WP_Widget {
    function WP_Widget_Upcoming_Posts() {
        $widget_ops = array('classname' => 'widget_upcoming_entries', 'description' => __( "List scheduled/upcoming posts", 'upcoming_posts_widget') );
        $this->WP_Widget('upcoming-posts', __('Upcoming Posts', 'upcoming_posts_widget'), $widget_ops);
    }
 
    function widget($args, $instance) {
        extract($args);
 
        $title = empty($instance['title']) ? __('Upcoming Posts', 'upcoming_posts_widget') : apply_filters('widget_title', $instance['title']);
        if ( !$number = (int) $instance['number'] )
            $number = 10;
        else if ( $number < 1 )
            $number = 1;
 
        $queryArgs = array(
            'p'         => $number,
            'ignore_sticky_posts'  => 1,
            'order'             => 'ASC'
        );
 
        $r = new WP_Query($queryArgs);
        if ($r->have_posts()) :
    ?>
        
		<?php echo $before_widget; ?>
			<div class="post-widget-title">
				<div class="widget-l"></div>
				<div class="widget-m">
					<h2><?php echo $title; ?></h2>
				</div>
				<div class="widget-r"></div>
			</div>
        <ul>
        <?php  while ($r->have_posts()) : $r->the_post(); ?>
        <div class="index-post-up"><?php if ( get_the_title() ) the_content(); else the_ID(); ?></div>
        <?php endwhile; ?>
        </ul>
        <?php echo $after_widget; ?>
    <?php
        endif;
        wp_reset_query();  // Restore global post data stomped by the_post().
		?>
		</div>
		<?php
    }
 
    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['number'] = (int) $new_instance['number'];
 
        return $instance;
    }
 
    function form( $instance ) {
        $title = attribute_escape($instance['title']);
        if ( !$number = (int) $instance['number'] )
            $number = 1;
    ?>
        <p><label for="<?php echo $this->get_field_id('title'); ?>">
        <?php _e('Title:'); ?>
        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
 
        <p><label for="<?php echo $this->get_field_id('number'); ?>">
        <?php _e('Number of posts to show:'); ?>
        <input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" /></label>
        <br /><small><?php _e('(at most 15)'); ?></small></p>
    <?php
    }
}
function registerUpcomingPostsWidget() {
    register_widget('WP_Widget_Upcoming_Posts');
}
add_action('widgets_init', 'registerUpcomingPostsWidget');
?>
<?php 
add_custom_background();
?>
<?php
function event($atts, $content = null) {
	extract(shortcode_atts(array(
		"m" => '',
		"e" => 'normal'
	), $atts));
	return '<div class="commentry-item"><div class="event '.$e.'"></div><h2 class="min">'.$m.'</h2><p>'.$content.'</p></div>';
}
add_shortcode("event", "event");
?>
<?php
function yellow_card($atts, $content = null) {
	return '<h2 class="yellow-card"></h2>';
}
add_shortcode("y", "yellow_card");
function red_card($atts, $content = null) {
	return '<h2 class="red-card"></h2>';
}
add_shortcode("r", "red_card");
function sub_out($atts, $content = null) {
	return '<h2 class="sub-out"></h2>';
}
add_shortcode("sout", "sub_out");
function sub_in($atts, $content = null) {
	return '<h2 class="sub-in"></h2>';
}
add_shortcode("sin", "sub_in");
function assist($atts, $content = null) {
	return '<h2 class="player-assist"></h2>';
}
add_shortcode("a", "assist");
function goal($atts, $content = null) {
	return '<h2 class="player-goal"></h2>';
}
add_shortcode("g", "goal");
?>
<?php
function rate($atts, $content = null) {
	extract(shortcode_atts(array(
		"r" => '',
		"m" => ''
	), $atts));
	return '<h2 class="player-rate '.$m.'"><span>'.$r.'</span></h2>';
}
add_shortcode("rate", "rate");
?>
<?php
function image_shortcode($atts, $content = null) {
    extract( shortcode_atts( array(
    'name' => '',
    'align' => 'right',
    'ext' => 'png',
    'path' => '/wp-content/uploads/',
    'url' => ''
    ), $atts ) );
    $file=ABSPATH."$path$name.$ext";
    if (file_exists($file)) {
        $size=getimagesize($file);
        if ($size!==false) $size=$size[3];
        $output = "<img src='".get_option('siteurl')."$path$name.$ext' alt='$name' $size align='$align' class='align$align' />";
        if ($url) $output = "<a href='$url' title='$name'>".$output.'</a>';
        return $output;
    }
    else {
        trigger_error("'$path$name.$ext' image not found", E_USER_WARNING);
        return '';
    }
}
add_shortcode('image','image_shortcode');
?>
<?php
function chart_shortcode( $atts ) {
	extract(shortcode_atts(array(
	    'data' => '',
	    'colors' => '',
	    'size' => '400x200',
	    'bg' => 'ffffff',
	    'title' => '',
	    'labels' => '',
	    'advanced' => '',
	    'type' => 'pie'
	), $atts));
	switch ($type) {
		case 'line' :
			$charttype = 'lc'; break;
		case 'xyline' :
			$charttype = 'lxy'; break;
		case 'sparkline' :
			$charttype = 'ls'; break;
		case 'meter' :
			$charttype = 'gom'; break;
		case 'scatter' :
			$charttype = 's'; break;
		case 'venn' :
			$charttype = 'v'; break;
		case 'pie' :
			$charttype = 'p3'; break;
		case 'pie2d' :
			$charttype = 'p'; break;
		default :
			$charttype = $type;
		break;
	}
 
	if ($title) $string .= '&chtt='.$title.'';
	if ($labels) $string .= '&chl='.$labels.'';
	if ($colors) $string .= '&chco='.$colors.'';
	$string .= '&chs='.$size.'';
	$string .= '&chd=t:'.$data.'';
	$string .= '&chf='.$bg.'';
 
	return '<img title="'.$title.'" src="http://chart.apis.google.com/chart?cht='.$charttype.''.$string.$advanced.'" alt="'.$title.'" chds="a" />';
}
add_shortcode('chart', 'chart_shortcode');
?>
<?php
class Stat extends WP_Widget {
	function Stat() {
		$widget_ops = array('classname' => 'Stat', 'description' => __('Show Ad in Postechin Theme'));
		$control_ops = array();
		$this->WP_Widget('Statsimpleimage', __('Stat'), $widget_ops, $control_ops);
	}
	function widget( $args, $instance ) {
		extract($args);
  	if ($instance['link']) {
  		if ($instance['new_window'])
  			$before_image = "<a href=\"".$instance['link']."\" target=\"_blank\">";
  		else
  			$before_image = "<a href=\"".$instance['link']."\">";

  		$after_image = "</a>";
  	}		
  	echo $before_widget;
  	echo '<h2 class="widgettitle">'.__('Stats','postechin').'</h2>';  ?>
	<h2 class="stat"><?php _e('Online:','postechin'); ?> <?php cystats_countUsersOnline(); ?> </h2>
	<h2 class="stat"><?php _e('Today Visits:','postechin'); ?> <?php cystats_countVisits(today); ?> </h2>
	<h2 class="stat"><?php _e('Yesterday Visits:','postechin'); ?> <?php cystats_countVisits(yesterday); ?> </h2>
	<h2 class="stat"><?php _e('All Visits:','postechin'); ?> <?php cystats_countVisits(all); ?> </h2>
	<h2 class="stat"><?php _e('Post Count:','postechin'); ?> <?php cystats_countPosts(); ?> </h2>
  	<?php echo $after_widget;
	}
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['image'] = strip_tags($new_instance['image']);
		$instance['link'] = strip_tags($new_instance['link']);
		return $instance;
	}
	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'image' => '', 'link' => '') );
		if ($instance['image'])
  		$title = preg_replace('/\?.*/', "", basename($instance['image']));
?>
<?php
	}
}
  register_widget('Stat');
?>
<?php
function commentCount($cid) {
	global $wpdb;
	if(get_comment_author_email()){
		$count = $wpdb->get_var('SELECT COUNT(comment_ID) FROM ' . $wpdb->comments. ' WHERE user_id = "' . $cid . '"');
		echo '<div class="user-stars">';
		if($count<250) { //Silver Stars
			$stars=0;
			$s=(int)($count/50);
			for($i=0;$i<$s;$i++){
				echo '<span class="star" style="background-position:0px -20px"></span>';
				$stars++;
			}
			$s=(int)($count%50); 
			$s=(int)($s/25); 
			if ($s==1) { echo '<span class="star" style="background-position:-19px -20px"></span>'; $stars++;}
			$stars=5-$stars;
			for($i=0;$i<$stars;$i++){
				echo '<span class="star" style="background-position:-38px -20px"></span>';
			}
		}
		elseif($count>249) { //Gold Stars
			$stars=0;
			$s=(int)($count/250);
			for($i=0;$i<$s;$i++){
				echo '<span class="star" style="background-position:0px 0px"></span>';
				$stars++;
			}
			$s=(int)($count%250); 
			$s=(int)($s/125); 
			if ($s==1) { echo '<span class="star" style="background-position:-19px 0px"></span>'; $stars++;}
			$stars=5-$stars;
			for($i=0;$i<$stars;$i++){
				echo '<span class="star" style="background-position:-38px 0px"></span>';
			}
		}
		echo '</div>';
		echo '<h2 class="count">'.$count; _e(' comments','postechin'); echo '</h2>';
	}
}
function commentuser($usermail) {
	global $wpdb;
		$count = $wpdb->get_var('SELECT COUNT(comment_ID) FROM ' . $wpdb->comments. ' WHERE user_id = "' . $usermail . '"');
		echo '<div class="user-stars">';
		if($count<250) { //Silver Stars
			$stars=0;
			$s=(int)($count/50);
			for($i=0;$i<$s;$i++){
				echo '<span class="star" style="background-position:0px -20px"></span>';
				$stars++;
			}
			$s=(int)($count%50); 
			$s=(int)($s/25); 
			if ($s==1) { echo '<span class="star" style="background-position:-19px -20px"></span>'; $stars++;}
			$stars=5-$stars;
			for($i=0;$i<$stars;$i++){
				echo '<span class="star" style="background-position:-38px -20px"></span>';
			}
		}
		elseif($count>249) { //Gold Stars
			$stars=0;
			$s=(int)($count/250);
			for($i=0;$i<$s;$i++){
				echo '<span class="star" style="background-position:0px 0px"></span>';
				$stars++;
			}
			$s=(int)($count%250); 
			$s=(int)($s/125); 
			if ($s==1) { echo '<span class="star" style="background-position:-19px 0px"></span>'; $stars++;}
			$stars=5-$stars;
			for($i=0;$i<$stars;$i++){
				echo '<span class="star" style="background-position:-38px 0px"></span>';
			}
		}
		echo '</div>';
}
$functions_path = get_template_directory() . '/function/';
require_once ( $functions_path . 'shortcodes.php' );			// Postechin Shortcodes
show_admin_bar(false);


function add_like_comment_text($content) {

    if(function_exists('like_counter_c')) { 
        return $content . like_counter_c(''); 
    }
    else
        return $content;
}
add_filter('comment_text', 'add_like_comment_text', 1);



?>