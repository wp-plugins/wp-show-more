<?php
/*
Plugin Name: WP show more
Plugin URI:  http://plugins.wordpress.org/wp-show-more/
Description: Add a user-defined link to display more content.
Version:     1.0.1
Author:      JAMOS Web Service
Author URI:  http://www.jamos.ch/plugins/wp-show-more
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: WP show more
*/

/*
 * Usage: [show_more title="Read more" color="#0066CC"] Your hidden Content [/show_more]
 */

add_shortcode( 'show_more', 'sm');

function sm( $attr, $content ) {
  if (!isset($attr['color'])) $attr['color'] = '#cc0000';
  $string  = '<div class="show_more">';
  $string .=' <p class="show_more_title" style="color: ' . $attr['color'] . ' ">'; 
  $string .= $attr['title'];
  $string .= '</p><div class="show_more_body" style="display:none">';
  $string .= $content;
  $string .= '</div></div>';
  return $string;
}

add_action( 'wp_enqueue_scripts', 'sm_scripts');
function sm_scripts (){
  $plugin_url = plugins_url( '/', __FILE__ );
  wp_enqueue_style (
  	'sm-style',
  	$plugin_url . 'style.css'
  );
  wp_enqueue_script (
  	'sm-script',
  	$plugin_url . 'script.js',
  	array( 'jquery' ),
  	'1.0.0',
  	true
  );
}
?>