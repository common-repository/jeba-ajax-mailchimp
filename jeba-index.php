<?php
/*
Plugin Name: Jeba Ajax Mailchimp 
Plugin URI: http://prowpexpert.com/jeba-ajax-mailchimp
Description: This is Jeba ajax wordpress mailchimp plugin really looking awesome. Everyone can use the ajax mailchimp plugin easily like other wordpress plugin. By using [jeba_mailchimp] shortcode use the mailchimp every where post, widget, page and template.
Author: Md Jahed
Version: 1.0
Author URI: http://prowpexpert.com/
*/
function jeba_ajax_wp_latest_jquery() {
	wp_enqueue_script('jquery');
}
add_action('init', 'jeba_ajax_wp_latest_jquery');


function plugin_function_jeba_mailchimp() {
    wp_enqueue_script( 'jeba-mailchimp-js', plugins_url( '/js/jquery.formchimp.js', __FILE__ ), true);
    wp_enqueue_script( 'jeba-mail-js', plugins_url( '/js/main.js', __FILE__ ), true);
    wp_enqueue_style( 'jeba-mailchimp-css', plugins_url( '/js/main.css', __FILE__ ));
}

add_action('wp_footer','plugin_function_jeba_mailchimp');


function jeba_mailchimp_shortcode($atts, $content = null) {
	extract( shortcode_atts( array(
		'title1' => '',
		'title2' => '',
		'formaction' => '',
		'submit' => '',
	), $atts ) );
	
	return'<div class="mailchimps">
	<h1>'.$title1.'</h1>
		<h2>'.$title2.'</h2>

		<form id="newsletter-form" name="newsletter-form" method="post" action="'.$formaction.'">

			<label for="email">Email*:</label>
			<input id="email" name="EMAIL" type="email" value="" />

			<label for="name">Name*:</label>
			<input id="name" name="FNAME" type="text" value="" />

			<button type="submit" value="Subscribe">'.$submit.'</button>

		</form>
		</div>
		';
}
add_shortcode('jeba_mailchimp', 'jeba_mailchimp_shortcode'); 

function  mailchimp_jeba_add_mce_button() {
if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) {
return;
}
if ( 'true' == get_user_option( 'rich_editing' ) ) {
add_filter( 'mce_external_plugins', 'mailchimp_jeba_add_tinymce_plugin' );
add_filter( 'mce_buttons', 'mailchimp_jeba_register_mce_button' );
}
}
add_action('admin_head', 'mailchimp_jeba_add_mce_button');

function  mailchimp_jeba_add_tinymce_plugin( $plugin_array ) {
$plugin_array['mailchimp_jeba_slider_button'] = plugins_url('/js/tinymce-button.js', __FILE__ );
return $plugin_array;
}
function mailchimp_jeba_register_mce_button( $buttons ) {
array_push( $buttons, 'mailchimp_jeba_slider_button' );
return $buttons;
}
add_filter('widget_text', 'do_shortcode');
?>