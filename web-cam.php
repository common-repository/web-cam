<?php
/**
* Plugin Name: web-cam
* Plugin URI: https://test-projext.000webhostapp.com/
* Description: This is the very first plugin I ever created and this is a unique plugin because using .
* Version: 1.0
* WC tested up to: 5.8.2
* Author: Murtuza Makda(idrish)
* Author URI: https://www.upwork.com/freelancers/~018f06972fe4607ad0
*License: GPL v3
* License URI: https://www.gnu.org/licenses/gpl-3.0.html
**/

defined('ABSPATH') or die('Keep Silent');

add_action('wp_enqueue_scripts','web_cam_frontend_script');

function web_cam_frontend_script() {

wp_register_script( 'webcame', plugins_url('assets/js/webcam.min.js', __FILE__), array(), true );
wp_enqueue_script('webcame');

wp_register_script( 'custom-script', plugins_url('assets/js/script.js', __FILE__), array('jquery'), true );
wp_enqueue_script('custom-script');

}



function web_cam_function( $atts = array()) {
extract(shortcode_atts(array(
     'slug' => ''
    ), $atts));

$output = '<form method="POST" action="" name="web_cam" id="web_cam">';

$output = $output.'<div class="row">';

$output = $output.'<div class="col-md-6">';

$output = $output.'<div id="my_camera" class="my_camera"></div>';

$output = $output.'<br/>';

$output = $output.'<input type=button value="Take Snapshot" class="takeimage" id="takeimage">';

$output = $output.'<input type="hidden" name="image" class="image-tag">';

$output = $output.'<input type="hidden" name="slug" value="'.$slug.'">';

$output = $output.'</div>';

$output = $output.'<div class="col-md-6">';

$output = $output.'<h4 id="results">Your captured image will appear here...</h4>';

$output = $output.'</div>';

$output = $output.'<div class="col-md-12 text-center">';

$output = $output.'<br/>';

$output = $output.'<input type="submit" value="UPLOAD" name="web_cam_submit" class="btn btn-success">';

$output = $output.'</div>';

$output = $output.'</div>';

$output = $output.'</form>';
        
return $output;
}
add_shortcode('web-cam', 'web_cam_function');



add_action('init','web_cam_form_submittion');
function web_cam_form_submittion(){
    if(isset($_POST['web_cam_submit']))
    {
        $img = sanitize_text_field($_POST['image']);
        if($_POST['slug']){
            $slug = sanitize_text_field($_POST['slug']);
        }
        else{
            $slug = "";
        }
        $base = dirname(__FILE__);
        $folderPath = $base."/upload/";

        $image_parts = explode(";base64,", $img);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
      
        $image_base64 = base64_decode($image_parts[1]);
        $fileName = uniqid() . '.png';
      
        $file_before_upload = $folderPath . $fileName;
        file_put_contents($file_before_upload, $image_base64);

        $image_url = $file_before_upload;

        $upload_dir = wp_upload_dir();

        $image_data = file_get_contents( $image_url );

        $filename = basename( $image_url );
        if ( wp_mkdir_p( $upload_dir['path'] ) ) {
            $file = $upload_dir['path'] . '/' . $filename;
        }
        else {
            $file = $upload_dir['basedir'] . '/' . $filename;
        }
        file_put_contents( $file, $image_data );

        $wp_filetype = wp_check_filetype( $filename, null );
        $attachment = array(
          'post_mime_type' => $wp_filetype['type'],
          'post_title' => sanitize_file_name( $filename ),
          'post_content' => '',
          'post_status' => 'inherit'
        );

        $attach_id = wp_insert_attachment( $attachment, $file );

        require_once( ABSPATH . 'wp-admin/includes/image.php' );
        $attach_data = wp_generate_attachment_metadata( $attach_id, $file );
        wp_update_attachment_metadata( $attach_id, $attach_data );
        unlink($file_before_upload);
        if(has_action("web_cam_media_id")){
           do_action("web_cam_media_id",array("media_id"=>$attach_id,"slug" =>$slug));
        }
        
    }
    else{
        return '';
    }
}