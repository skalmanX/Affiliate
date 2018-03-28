<?php 

// Add Promotion Custom Post Type
add_action('init', 'fly_slider_promostype');

function fly_slider_promostype() {

// Check it Slug has been set


$args = array(
  'labels' => array(   
         'name' => __( 'Slides' ,'highroller'),
         'singular_name' => __( 'Slide' ,'highroller'),
        'add_new' => __( 'Add New' ,'highroller'),
	'add_new_item' => __( 'Add New Slide' ,'highroller'),
	'edit' => __( 'Edit' ,'highroller'),
	'edit_item' => __( 'Edit Slide' ,'highroller'),
	'new_item' => __( 'New Slide' ,'highroller'),
	'view' => __( 'View Slide' ,'highroller'),
	'view_item' => __( 'View Slide' ,'highroller'),
	'search_items' => __( 'Search Slide' ,'highroller'),
	'not_found' => __( 'No Slides found' ,'highroller'),
	'not_found_in_trash' => __( 'No Slides found in Trash','highroller' ),
	'parent' => __( 'Parent Slide' ,'highroller'),

                ),

  'public' => false,
  'show_ui' => true,
  'capability_type' => 'post',
  'hierarchical' => false,
  //'rewrite' => array( 'slug' => $slug, 'with_front' => false ),
  'supports' => array('title', 'thumbnail','editor')
);

register_post_type('slider',$args);
}

add_action('admin_init', 'fmt_slider_metaboxes');
add_action('save_post','fmt_saveslider_meta');

function fmt_slider_metaboxes(){  
add_meta_box("slider-meta", __('Slider Properties', 'highroller'), "ftm_slider_addmeta", "slider", "normal", "low");
   }


function ftm_slider_addmeta($post) {
		$custom = get_post_custom($post->ID);  
	
		$buttonText = isset($custom["_button_text"][0]) ? $custom["_button_text"][0] : '';
		$sliderUrl = isset($custom["_slider_url"][0]) ? $custom["_slider_url"][0] : '';
?>

<style>

.fly_box {padding:0px 0px 15px 0; }


	 .fly_box p.label label {color: #333; font-size: 13px;line-height: 1.5em;font-weight: bold;padding:0;margin: 0;  display: block;
    vertical-align: text-bottom;  }

	.fly_box p.label { font-size: 12px;line-height: 1.5em; color: #666; text-shadow: 0px 1px 0px #FFF;}


	.fly_box input[type="text"], .fly_box  input[type="number"], .fly_box input[type="password"], .fly_box input[type="email"], .fly_box  textarea, .fly_box  select {
	width: 100%;
    padding: 5px;
    resize: none;
    margin: 0px;
font-size:11px;
color:#666;
}
	
</style>


<input type="hidden" name="slider_noncename" id="slider_noncename" value="<?php echo wp_create_nonce( 'slider'.$post->ID );?>" />

<div class="fly_box">
	<p class="label">
	<label><?php _e('Button Text', 'highroller'); ?></label>
	</p>
	<div class="inputwrap">
	<input type="text" name="_button_text"  value="<?php echo $buttonText; ?>" />
   </div>
</div>
<div class="fly_box">
	<p class="label">
	<label><?php _e('Slider Url', 'highroller'); ?></label>
	<?php _e('Enter The absolute url including http:// or https://', 'highroller'); ?>
	</p>
	<div class="inputwrap">
	<input type="text" name="_slider_url"  value="<?php echo $sliderUrl; ?>" />
   </div>
</div>
<?php }

function fmt_saveslider_meta($post_id) {
	global $post;

	if (isset($_POST['slider_noncename']) AND !wp_verify_nonce( $_POST['slider_noncename'], 'slider'.$post_id )) {
		return $post_id;
	}
	
	$fields = array('_slider_url','_button_text');
	foreach($fields as $field):
	if (isset($_POST[$field])) { modify_post_meta($post_id, $field, $_POST[$field]); }
	endforeach;
}	
?>