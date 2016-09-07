<?php
/*
Plugin Name: If As Shortcode
Author: Mohammad Okfie
Description: Provides an "if statement" as shortcode to conditionally some content
Version: 1.0
*/

  define('IFLANG', 'if-statement');
  add_action( 'plugins_loaded', 'if_statement_load_textdomain' );
  function if_statement_load_textdomain() {
    load_plugin_textdomain( IFLANG , false, plugin_basename( dirname( __FILE__ ) ) . '/lang' ); 
  }


include "include/restricted-content.php";
include "include/shortcode_menu.php";

//__('If As Shortcode', IFLANG);
  function register_if_statement_handle(){
    $if_statement_translation_array = array(
    'add_new_if' => __( 'Add New Condition ', IFLANG ),
    'add_new_if_title_form' => __( 'Add new condition for restrict content ', IFLANG ),
    'select_if_types' => __( 'Select type of conditions', IFLANG ),
    'if_type_custom_content_admin' => __( 'Show content for administrators only', IFLANG ),
    'if_type_custom_content_editor' => __( 'Show content for editors only', IFLANG ),
    'if_type_custom_content_author' => __( 'Show content for authors only', IFLANG ),
    'if_type_custom_content_contributor' => __( 'Show content for contributors only', IFLANG ),
    'if_type_custom_content_subscriber' => __( 'Show content for subscribers only', IFLANG ),
    'if_type_custom_content_logged_in' => __( 'Show content for users logged in', IFLANG ),
    'if_type_custom_content_post_thumbnail' => __( 'Show content if post has thumbnail', IFLANG ),
    'if_type_custom_content_comments_open' => __( 'Show content if comments open inside post/page', IFLANG ),
    'if_type_custom_content_has_tag' => __( 'Show content if post has tags', IFLANG ),
    'if_type_custom_content_is_attachment' => __( 'Show content if post/page has attachments', IFLANG ),
    'if_type_custom_content_has_excerpt' => __( 'Show content if post/page has excerpt', IFLANG ),
    'if_type_custom_content_pings_open' => __( 'Show content if pings open inside post/page', IFLANG ),
    'if_type_custom_content_is_home' => __( 'Show content if the page is home page', IFLANG ),
    'if_type_custom_content_is_rtl' => __( 'Show content if the directions for WP is RTL', IFLANG ),
    'centent_between_if' => __( 'The content between condition', IFLANG ),
    'centent_between_else' => __( 'The content if not true condition', IFLANG ),
    'a_value' => '10'
  );
  wp_register_script( 'if_statement_handle', plugin_dir_url(__FILE__).'/include/editor_plugin.js' );
  wp_enqueue_script( 'if_statement_handle' );
  wp_localize_script( 'if_statement_handle', 'if_statement_text_domain', $if_statement_translation_array );
  }
  add_action('init','register_if_statement_handle');



  function if_statement($atts, $content) {
    if (empty($atts)) return '';
        
    $callable = array_shift($atts);
    if (is_callable($callable)) {
      $condition = (boolean)call_user_func_array($callable, $atts);
    } else {
       throw new Excaption('First argument must be callable!');
    }
   
    $else = '[else]';
    if (strpos($content, $else) !== false) {
      list($if, $else) = explode($else, $content, 2);
    } else {
      $if = $content;
      $else = "";
    }
        
    return do_shortcode($condition ? $if : $else);
  }
   add_shortcode('if', 'if_statement');
   ////////////////////////////////////////////////////////////


//add tinymce button to editor
function dd_if_conditions_addbuttons() {
   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
     return;
 
   // Add only in Rich Editor mode
   if ( get_user_option('rich_editing') == 'true') {
     add_filter("mce_external_plugins", "dd_if_conditions_tinymce_plugin");
     add_filter('mce_buttons', 'dd_if_conditions_button');
   }
}

function dd_if_conditions_button($tiny_buttons) {
   array_push($tiny_buttons, "if_conditions");
   return $tiny_buttons;
}

function dd_if_conditions_tinymce_plugin($plugin_array) {
  $plugin_array['if_conditions'] = plugin_dir_url(__FILE__).'/include/editor_plugin.js';
  return $plugin_array;
}


// init process for button control
add_action('init', 'dd_if_conditions_addbuttons');


?>
