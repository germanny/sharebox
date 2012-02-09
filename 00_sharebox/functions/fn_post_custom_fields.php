<?php 
$post_custom_fields =
array(
	"infographic" => array(
		"name" => "infographic",
		"std" => "",
		"title" => "Is this an infographic post? If you check this box, we'll add a Pin It share option.",
		"description" => "",
		"type" => "checkbox"),
);
function post_custom_fields() {
	global $post, $post_custom_fields;
	foreach($post_custom_fields as $meta_box) {
		$meta_box_value = stripslashes(get_post_meta($post->ID, $meta_box['name'].'_value', true));
		if($meta_box_value == "")
			$meta_box_value = $meta_box['std'];

			if ($meta_box['type'] == "h2" ) {
				echo '<h2 style="background:#eee;color:#dd5928 !important;padding:3px 10px 0;font-family:Lucida Grande,Verdana,Arial,Bitstream Vera Sans,sans-serif !important; font-style:normal !important;font-weight:bold !important;">'.$meta_box['title'].'</h2>';
				echo'<input type="hidden" name="'.$meta_box['name'].'" id="'.$meta_box['name'].'" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';
			} else {
			echo '<p style="margin-bottom:10px;">';
			echo'<input type="hidden" name="'.$meta_box['name'].'" id="'.$meta_box['name'].'" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';
			echo'<strong>'.$meta_box['title'].'</strong> <em>'.$meta_box['description'].'</em>';

			switch ( $meta_box[ 'type' ] ) {
			case "select" : ?>
			<br /><select name="<?php echo $meta_box['name'].'_value'; ?>" id="<?php echo $meta_box['name'].'_value'; ?>"><?php foreach ($meta_box['options'] as $option) { ?><option value="<?php echo $option; ?>"<?php if ( attribute_escape($meta_box_value) == $option) { echo ' selected="selected"'; } elseif ( attribute_escape($meta_box_value) == '' && $option == $meta_box['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?></select>

			<?php break;
			case "input": 
			echo'<input type="'.$meta_box['type'].'" name="'.$meta_box['name'].'_value" value="'.attribute_escape($meta_box_value).'" style="width:98%;" /><br />';
			break;
			case "checkbox": 
			if ( attribute_escape($meta_box_value) === "true" ){
				$checked = "checked=\"checked\""; 
			} else {
				$checked = "";
			} 
			echo'<br /><br /><input type="'.$meta_box['type'].'" name="'.$meta_box['name'].'_value" class="checkbox" value="true" '.$checked.' /><br />';
			break;
			case "textarea":
			echo'<textarea type="text" name="'.$meta_box['name'].'_value" cols="80" rows="5" style="width:98%;">'.attribute_escape($meta_box_value).'</textarea><br />';
			break;
			case "calendar": ?><br />
				<script src="<?php echo get_bloginfo('template_directory');?>/includes/php_calendar/php_calendar/scripts.js" type="text/javascript"></script>
				<input type="input" id="date" name="<?php echo $meta_box['name']; ?>_value" value="<?php if ( attribute_escape($meta_box_value) != ''){echo $meta_box_value;} else {} ?>" style="width:200px;" /> <a href="javascript:viewcalendar()"><img src="../wp-content/themes/ghp/includes/php_calendar/images/iconCalendar.gif" /></a><br />
			<?php break; } echo '</p>'; }
	}
}
function create_post_meta_box() {
	global $theme_name;
		if ( function_exists('add_meta_box') ) {
			add_meta_box( 'new-meta-boxes', 'Additional Information', 'post_custom_fields', 'post', 'normal', 'high' );
	}
}
function save_postdata( $post_id ) {
	global $post, $post_custom_fields;
	foreach($post_custom_fields as $meta_box) {
		// Verify
		if ( !wp_verify_nonce( $_POST[$meta_box['name']], plugin_basename(__FILE__) )) {
			return $post_id;
	}
	if ( 'page' == $_POST['post_type'] ) {
		if ( !current_user_can( 'edit_page', $post_id ))
			return $post_id;
		} else {
		if ( !current_user_can( 'edit_post', $post_id ))
			return $post_id;
	}
	$data = $_POST[$meta_box['name'].'_value'];
	if(get_post_meta($post_id, $meta_box['name'].'_value') == "")
		add_post_meta($post_id, $meta_box['name'].'_value', $data, true);
	elseif($data != get_post_meta($post_id, $meta_box['name'].'_value', true))
		update_post_meta($post_id, $meta_box['name'].'_value', $data);
	elseif($data == "")
		delete_post_meta($post_id, $meta_box['name'].'_value', get_post_meta($post_id, $meta_box['name'].'_value', true));
	}
}
add_action('admin_menu', 'create_post_meta_box');
add_action('save_post', 'save_postdata');
?>