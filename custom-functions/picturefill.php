<?php

add_image_size('resp-large', 1000, 9999);
add_image_size('resp-medium', 800, 9999);
add_image_size('resp-small', 600, 9999);
add_image_size('resp-thumb', 450, 9999);


function get_attachment_id_from_src($url) {
  global $wpdb;
  $prefix = $wpdb->prefix;
  $attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM " . $prefix . "posts" . " WHERE guid='%s';", $url )); 
    return $attachment[0]; 
}

function responsive_image($atts){
  extract( shortcode_atts( array(
    'src' => '',
    'caption' => '',
  ), $atts ) );
  if($src != '')
  {
    $img_ID = get_attachment_id_from_src($src);
    $large = wp_get_attachment_image_src( $img_ID, 'resp-large' );
    $medium = wp_get_attachment_image_src( $img_ID, 'resp-medium' );
    $small = wp_get_attachment_image_src( $img_ID, 'resp-small' );
    $thumb = wp_get_attachment_image_src( $img_ID, 'resp-thumb' );

    $output = '<div class="responsive-image">';
    $output = '  <div class="project-image" data-picture data-alt="' . $caption . '">';
    $output.= '    <div data-src="' . $thumb[0] . '"></div>';
    $output.= '    <div data-src="' . $small[0] . '" data-media="(min-width: 36em)"></div>';
    $output.= '    <div data-src="' . $medium[0] . '" data-media="(min-width: 48em)"></div>';
    $output.= '    <div data-src="' . $large[0] . '" data-media="(min-width: 60em)"></div>';
    $output.= '    <div data-src="' . $src . '" data-media="(min-width: 80em)"></div>';
    $output.= '    <noscript>';
    $output.= '      <img src="' . $small[0] . '" alt="' . $caption . '">';
    $output.= '    </noscript>';
    $output.= '  </div>';
    if($caption != '') $output.= '  <p class="caption">' . $caption . '</p>';
    $output.= '</div>';
  }

  return $output;

}

add_shortcode('rimg', 'responsive_image');
