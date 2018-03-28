<?php 

add_action('init', 'fly_game_ptype');

function fly_game_ptype() {

// Check it Slug has been set
if (get_theme_option('game-slug')){
	$slug=get_theme_option('game-slug');
   } else { $slug= 'game'; 

}

$args = array(
  'labels' => array(   
         'name' => __( 'Games' ,'highroller'),
         'singular_name' => __( 'Games','highroller' ),
        'add_new' => __( 'Add New','highroller' ),
	'add_new_item' => __( 'Add New Games' ,'highroller'),
	'edit' => __( 'Edit','highroller' ),
	'edit_item' => __( 'Edit Games', 'highroller'),
	'new_item' => __( 'New Games','highroller' ),
	'view' => __( 'View Games', 'highroller'),
	'view_item' => __( 'View Games' ,'highroller'),
	'search_items' => __( 'Search Games' ,'highroller'),
	'not_found' => __( 'No Games found', 'highroller'),
	'not_found_in_trash' => __( 'No Games found in Trash', 'highroller'),
	'parent' => __( 'Parent Games','highroller'),

                ),

  'public' => true,
  'show_ui' => true,
  'capability_type' => 'post',
  'hierarchical' => false,
  'rewrite' => array( 'slug' => $slug, 'with_front' => false ),
  'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'custom-fields', 'page-attributes','comments','author')
);

register_post_type('game',$args);

  $labels = array(
    'name' => _x( 'Games Tags', 'Game tag' ,'highroller'),
    'singular_name' => _x( 'Games Tag', 'Game tag' ,'highroller'),
    'search_items' =>  __( 'Search Games Tags' ,'highroller'),
    'all_items' => __( 'All Games Tags' ,'highroller'),
    'parent_item' => __( 'Parent Games Tag' ,'highroller'),
    'parent_item_colon' => __( 'Parent Games Tag:' ,'highroller'),
    'edit_item' => __( 'Edit Games Tag','highroller' ), 
    'update_item' => __( 'Update Games Tag' ,'highroller'),
    'add_new_item' => __( 'Add New Games Tag','highroller'),
    'new_item_name' => __( 'New Games Tag' ,'highroller'),
    'menu_name' => __( 'Games Tags','highroller' ),
  ); 	

register_taxonomy('game-tags',array('game'), array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'gametag' ),
  ));
	

register_taxonomy('gametype-tags',array('game'), array(
    'hierarchical' => true,
    'label' => __( 'Game Type' ,'highroller'),
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'gametype' ),
  ));
  
  register_taxonomy('gamesoftware-tags',array('game'), array(
    'hierarchical' => true,
    'label' =>__( 'Game Software' ,'highroller'),
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'gamesoftware' ),
  ));


}


add_action('admin_init', 'fly_game_meta');

add_action('save_post','save_gamemetaboxes');

function fly_game_meta(){  
  add_meta_box("games-meta", __('Game Properties', 'highroller'), "games_type_metabox", "game", "normal", "low");


   }  

function games_type_metabox($post) {
         $custom = get_post_custom($post->ID);  

$rating = isset($custom["_gm_rating"][0]) ? $custom["_gm_rating"][0] : '';
$wtp1 = isset($custom["_gm_wtp1"][0]) ? $custom["_gm_wtp1"][0] : '';
   
$demogame = isset($custom["_gm_demogame"][0]) ? $custom["_gm_demogame"][0] : '';
$gamefeatures = isset($custom["_gm_gamefeatures"][0]) ? $custom["_gm_gamefeatures"][0] : '';

$customhl1 = isset($custom["_gm_customhl1"][0]) ? $custom["_gm_customhl1"][0] : '';    
$customhinput1 = isset($custom["_gm_customhinput1"][0]) ? $custom["_gm_customhinput1"][0] : '';    
$customhl2 = isset($custom["_gm_customhl2"][0]) ? $custom["_gm_customhl2"][0] : '';    
$customhinput2 = isset($custom["_gm_customhinput2"][0]) ? $custom["_gm_customhinput2"][0] : '';    
$customhl3 = isset($custom["_gm_customhl3"][0]) ? $custom["_gm_customhl3"][0] : '';    
$customhinput3 = isset($custom["_gm_customhinput3"][0]) ? $custom["_gm_customhinput3"][0] : '';    
$customhl4 = isset($custom["_gm_customhl4"][0]) ? $custom["_gm_customhl4"][0] : '';    
$customhinput4 = isset($custom["_gm_customhinput4"][0]) ? $custom["_gm_customhinput4"][0] : '';    
$customhl5 = isset($custom["_gm_customhl5"][0]) ? $custom["_gm_customhl5"][0] : '';    
$customhinput5 = isset($custom["_gm_customhinput5"][0]) ? $custom["_gm_customhinput5"][0] : '';    


?>

<style>

.fly_box {border-bottom:1px solid #e5e5e5;padding:0px 0px 15px 0; }


	 .fly_box p.label label {color: #333; font-size: 13px;line-height: 1.5em;font-weight: bold;padding:0;margin: 0;  display: block;
    vertical-align: text-bottom;  }

	.fly_box p.label { font-size: 12px;line-height: 1.5em; color: #666; text-shadow: 0px 1px 0px #FFF;}


	.fly_box input[type="text"], .fly_box  input[type="number"], .fly_box input[type="password"], .fly_box input[type="email"], .fly_box  textarea,.fly_box  select {
	width: 100%;
    padding: 5px;
    resize: none;
    margin: 0px;
font-size:11px;
color:#666;
}
	
</style>

<input type="hidden" name="game_type_noncename" id="game_type_noncename" value="<?php echo wp_create_nonce( 'game_type'.$post->ID );?>" />


<?php $casinos = getAllPostsByType('casino'); ?>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Default Casino to Link To', 'highroller'); ?></label>
	<?php _e('Select the casino to link this game to by default', 'highroller'); ?>
	</p>

	<div class="inputwrap">
	<select name="_gm_wtp1">
    		<option value=""><?php _e('Select...', 'highroller'); ?></option>
  		<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>" <?php if ($h->ID == $wtp1) echo 'SELECTED'?>><?php echo $h->post_title?></option>
        <?php } ?>
  	</select>
	</div>
</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Features, separate each by |', 'highroller'); ?>:</label>
	</p>
	<div class="inputwrap">
	<input type="text" name="_gm_gamefeatures" value="<?php echo $gamefeatures; ?>" />
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Game Editor Rating', 'highroller'); ?>:</label>
	<?php _e('Select the rating to be show to visitors or in Google Markup', 'highroller'); ?>
	</p>

	<div class="inputwrap">
	<select name="_gm_rating" class="smallmetatwo">
        <option value=""><?php _e('Select', 'highroller'); ?></option>
    	<option <?php if ($rating == "1") echo 'SELECTED'; ?>>1</option>


<?php $x=0; while ($x<=5){ ?>

<option <?php if ($rating == "$x") echo 'SELECTED'; ?>><?php echo $x; ?></option>
<?php $x=$x+0.1; } ?>
       </select>
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Embedded Game or Free Game Demo', 'highroller'); ?></label>
	<?php _e('You can insert you embed code or iframe code here for a game demo', 'highroller'); ?>
	</p>

	<div class="inputwrap">
	<textarea name="_gm_demogame" cols="10" rows="10"><?php echo $demogame; ?></textarea>
	</div>

</div>

<h3><?php _e('Optional Custom Fields to Add to Game Review', 'highroller'); ?></h3>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Custom Field Headline 1', 'highroller'); ?>:</label>
	
	<?php _e('This is a custom field you can add on the game review page.  Please enter the value below.', 'highroller'); ?>
	</p>

	<div class="inputwrap">
	<input type="text" name="_gm_customhl1" value="<?php echo $customhl1; ?>" />
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Custom Field 1', 'highroller'); ?>:</label>
	
	</p>

	<div class="inputwrap">
	<input type="text" name="_gm_customhinput1" value="<?php echo $customhinput1; ?>" />
	</div>

</div>


<div class="fly_box">
	<p class="label">
	<label><?php _e('Custom Field Headline 2', 'highroller'); ?>:</label>
	
	</p>

	<div class="inputwrap">
	<input type="text" name="_gm_customhl2" value="<?php echo $customhl2; ?>" />
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Custom Field 2', 'highroller'); ?>:</label>
	
	</p>

	<div class="inputwrap">
	<input type="text" name="_gm_customhinput2" value="<?php echo $customhinput2; ?>" />
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Custom Field Headline 3', 'highroller'); ?>:</label>
	
	</p>

	<div class="inputwrap">
	<input type="text" name="_gm_customhl3" value="<?php echo $customhl3; ?>" />
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Custom Field 3', 'highroller'); ?>:</label>
	
	</p>

	<div class="inputwrap">
	<input type="text" name="_gm_customhinput3" value="<?php echo $customhinput3; ?>" />
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Custom Field Headline 4', 'highroller'); ?>:</label>
	
	</p>

	<div class="inputwrap">
	<input type="text" name="_gm_customhl4" value="<?php echo $customhl4; ?>" />
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Custom Field 4', 'highroller'); ?>:</label>
	
	</p>

	<div class="inputwrap">
	<input type="text" name="_gm_customhinput4" value="<?php echo $customhinput4; ?>" />
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Custom Field Headline 5', 'highroller'); ?>:</label>
	

	</p>

	<div class="inputwrap">
	<input type="text" name="_gm_customhl5" value="<?php echo $customhl5; ?>" />
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Custom Field 5', 'highroller'); ?>:</label>
	
	</p>

	<div class="inputwrap">
	<input type="text" name="_gm_customhinput5" value="<?php echo $customhinput5; ?>" />
	</div>

</div>

<script>
var destObj = false;
var oldSendTo;

jQuery(document).ready(function() {

	jQuery('.upload_image_button').click(function() {
	 formfield = jQuery(this).prev().attr('name');
	 destObj = jQuery(this).prev();
	 tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
	 return false;
	});
	
	oldSendTo = window.send_to_editor;
	window.send_to_editor = function(html) {
		if (destObj != false) {
			 imgurl = jQuery('img',html).attr('src');
			 jQuery(destObj).val(imgurl);
			 jQuery(destObj).parent().find('img').attr('src', imgurl);
			 tb_remove();
			 destObj = false;
		} else {
			oldSendTo(html);
		}
	}
	
	jQuery('.clear_field_button').click( function() {
		jQuery(this).prev().prev().val('');
	});
});
</script>


<?php
      }


function save_gamemetaboxes($post_id) {
	global $post;

	if ( !wp_verify_nonce( $_POST['game_type_noncename'], 'game_type'.$post_id )) {
		return $post_id;
	}
	

	$fields = array('_gm_rating','_gm_wtp1','_gm_demogame','_gm_gamefeatures','_gm_customhl1','_gm_customhl2','_gm_customhl3','_gm_customhl4','_gm_customhl5','_gm_customhinput1','_gm_customhinput2','_gm_customhinput3','_gm_customhinput4','_gm_customhinput5');
	foreach ($fields as $field) {
		modify_post_meta($post_id, $field, $_POST[$field]);
	}

}

?>