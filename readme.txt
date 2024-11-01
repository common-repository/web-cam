=== web-cam ===
Upwork profle link:https://www.upwork.com/freelancers/~018f06972fe4607ad0
Tags: web-cam,image uploader, take image,camera,capture, capture image,picture, webcam,image,camera,cam
Requires at least: 5.0
Tested up to: 6.2
Stable Tag: 2.0
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.html

Web-cam is a simple but fantastic plugin that allows you to Click Photo from website and autometically upload in wp_media and return an id of that media file via hook. so you can access photo in verious functions.

for the id you have to use one hook => 'web_cam_media_id', Example is below.

== Description ==
To use this plugin, you need to first add a shortcode to your page. Once the shortcode is added, you can then click on the "Take Picture" button to capture an image using your webcam. After taking the picture, click on the "Upload" button, which will upload the image to the WP media library.

Using the "web_cam_media_id" hook, you can retrieve the media ID of the uploaded image. This media ID can be used to customize various features, such as uploading an avatar image, setting a product image, getting product image feedback, and many more.

It is important to note that this plugin is designed to provide a simple and efficient way to upload images using your webcam, and can be customized based on your specific requirements. By using the web_cam_media_id hook, you can easily integrate this plugin into your WordPress website and enhance its functionality.

If you need to use the webcam image upload feature on multiple pages or forms within your WordPress website, you can pass a unique slug in the shortcode for each instance. This allows you to differentiate between the various pages or forms and customize the behavior of the plugin accordingly.

Once the user takes a picture and uploads it using the plugin, the "web_cam_media_id" action hook is triggered. This hook passes the media ID of the uploaded image as a parameter to any function that is registered to listen for this action.

web_cam_media_id use this action to get capture image id on function.php file

Shortcode to use: `[web-cam]`

Parameters used within shortcode:
- `slug`

For example: `[web-cam slug="unique-slug"]`

add_action('web_cam_media_id','get_media_id');
function get_media_id($value){
	if($value['slug'] == 'home-page'){
		print_r($value['media_id']);
	}
	if($value['slug'] == 'contact-page'){
		//your custome code to handle media
	}
}

Visit My Upwork Profile-https://www.upwork.com/freelancers/~018f06972fe4607ad0

= Which browsers does it support? =
PC / Mac:
- Firefox, Chrome, Safari, Opera, Edge, All Modern Browser

Mobile Os: 
- Android, IOS

== Installation ==
1. Upload the entire plugin folder to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
							or 													
1. Simpley Click on install button in plugin menu. 

== Frequently Asked Questions ==
= Use Cases of this plugin =
<ul>
	<li>Capture Live Picture<li>
	<li>KYC Purpose</li>
	<li>Image Selling Website</li>
	<li>Product Feedback</li>
	<li>Survey Purpose</li>
	<li>Other live taking image</li>
</ul>
= Where can we chat with you if we face any problem? =
you can direct chat with me on my linked <a href="https://www.linkedin.com/in/idrish-makda/" target="_blank">profile</a>
= Where can I request new features? =
We are available on the WordPress support forum.
or you can contact me on upwork <a href="https://www.upwork.com/freelancers/~018f06972fe4607ad0" target="_blank">Profile</a>

== Screenshots ==

1. Example Web-cam
2. Example of shortcode
3. Example how to get image id after button click 

= 1.0 =

Initial Version

== Upgrade Notice ==
None
