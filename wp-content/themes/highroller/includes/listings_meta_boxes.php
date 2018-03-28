<?php 

add_action('admin_init', 'fly_gamelist_boxes');
add_action('save_post','fly_savegamelist_boxes');

function fly_gamelist_boxes(){  
  add_meta_box("gamelist-meta", __('Games Listings Page Options', 'highroller'), "fly_gameslist_metabox", "page", "advanced", "low");
}  

function fly_gameslist_metabox() {
         global $post;  
		$gametags = get_terms('game-tags');
		$gametypetags = get_terms('gametype-tags');
		
$custom = get_post_custom($post->ID);  

$numgames = isset($custom["_gl_numgames"][0]) ? $custom["_gl_numgames"][0] : '';
$gamet = isset($custom["_gl_gamet"][0]) ? $custom["_gl_gamet"][0] : '';
$gametype = isset($custom["_gl_gametype"][0]) ? $custom["_gl_gametype"][0] : '';

$games_orderby = isset($custom["_gl_games_orderby"][0]) ? $custom["_gl_games_orderby"][0] : '';

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

<input type="hidden" name="gamelist_type_noncename" id="gamelist_type_noncename" value="<?php echo wp_create_nonce( 'gamelist_type'.$post->ID );?>" />


<div class="fly_box">
	<p class="label">
	<label><?php _e('Number of Games Per Page To Show', 'highroller'); ?>:</label>
	</p>

	<div class="inputwrap">
	<input type="text" name="_gl_numgames" value="<?php echo $numgames; ?>" />
	</div>

</div>


<div class="fly_box">
	<p class="label">
	<label><?php _e('Filter By Games Tag', 'highroller'); ?>:</label>
	</p>

	<div class="inputwrap">
	<select name="_gl_gamet" id="_gl_gamet">
    	     	<option value="">[<?php _e('All', 'highroller'); ?>]</option>
		   <?php foreach ($gametags as $tag) { ?>
                       <option <?php if ($gamet == "$tag->name") echo 'SELECTED'; ?>><?php echo $tag->name;?></option>
                  <?php } ?>
    	</select>
	</div>

</div>


<div class="fly_box">
	<p class="label">
	<label><?php _e('Filter by Game Type', 'highroller'); ?>:</label>
	</p>

	<div class="inputwrap">
	<select name="_gl_gametype" id="_gl_gametype">
    	     	<option value="">[<?php _e('All', 'highroller'); ?>]</option>
		   <?php foreach ($gametypetags as $tag) { ?>
                       <option <?php if ($gametype == "$tag->name") echo 'SELECTED'; ?>><?php echo $tag->name;?></option>
                  <?php } ?>
    	</select>
	</div>

</div>


<div class="fly_box">
	<p class="label">
	<label>Order by:</label>
	</p>

	<div class="inputwrap">
	<select name="_gl_games_orderby" id="_gl_games_orderby">
    	     	 <option <?php if ($games_orderby == "title") echo 'SELECTED'; ?> value="title"><?php _e('Title', 'highroller'); ?></option>
                 <option <?php if ($games_orderby == "menu_order") echo 'SELECTED'; ?> value="menu_order"><?php _e('Menu Order', 'highroller'); ?></option>
                 <option <?php if ($games_orderby == "date") echo 'SELECTED'; ?> value="date"><?php _e('Date', 'highroller'); ?></option>
                 <option <?php if ($games_orderby == "_gm_rating") echo 'SELECTED'; ?> value="_gm_rating"><?php _e('Rating', 'highroller'); ?></option>
		<option <?php if ($games_orderby == "Rand") echo 'SELECTED'; ?> value="rand"><?php _e('Random', 'highroller'); ?></option>
    	</select>
	</div>

</div>


<?php  } 

function fly_savegamelist_boxes($post_id) {	
	if ( !wp_verify_nonce( $_POST['gamelist_type_noncename'], 'gamelist_type'.$post_id )) {
		return $post_id;
	}

$fields = array('_gl_numgames','_gl_gamet','_gl_gametype','_gl_games_orderby');
	foreach ($fields as $field) {
		modify_post_meta($post_id, $field, $_POST[$field]);
	}

}


?>