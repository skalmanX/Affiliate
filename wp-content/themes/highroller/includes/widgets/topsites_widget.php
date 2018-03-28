<?php

/* Add our function to the widgets_init hook. */
add_action( 'widgets_init', 'fly_load_topsites' );

/* Function that registers our widget. */
function fly_load_topsites() {
	register_widget( 'Top_Site_Widget' );
}

class Top_Site_Widget extends WP_Widget {
	
function __construct() {
		parent::__construct(
			'topsites-widget', // Base ID
			__( 'Top Gambling Sites', 'highroller' ), // Name
			array( 'description' => __( 'Display top casinos and gambling sites in widget.', 'highroller' ), ) // Args
		);
	}		
	

public function widget( $args, $instance ) {
		extract( $args );

		/* User-selected settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$site1=$instance['ts_casinoname1'];
		$site2=$instance['ts_casinoname2'];
		$site3=$instance['ts_casinoname3'];
		$site4=$instance['ts_casinoname4'];
		$site5=$instance['ts_casinoname5'];
		$site6=$instance['ts_casinoname6'];
		$site7=$instance['ts_casinoname7'];
        $site8=$instance['ts_casinoname8'];
		$site9=$instance['ts_casinoname9'];
		$site10=$instance['ts_casinoname10'];
		
		$site11=$instance['ts_casinoname11'];
		$site12=$instance['ts_casinoname12'];
		$site13=$instance['ts_casinoname13'];
		$site14=$instance['ts_casinoname14'];
		$site15=$instance['ts_casinoname15'];
		$site16=$instance['ts_casinoname16'];
		$site17=$instance['ts_casinoname17'];
		$site18=$instance['ts_casinoname18'];
		$site19=$instance['ts_casinoname19'];
		$site20=$instance['ts_casinoname20'];
		
		 $version = $instance['version'];
		  $detailslink = $instance["detailslink"];
		    $detailslink2 = $instance["detailslink2"];
      
$sites = array ($site1,$site2,$site3,$site4,$site5,$site6,$site7,$site8,$site9,$site10,$site11,$site12,$site13,$site14,$site15,$site16,$site17,$site18,$site19,$site20);	  

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Title of widget (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;


		

?>

<?php

$slugkey=fly_redirect_slug(); 

 if ($version=='Version 2') { ?>

<?php

global $post;
$opost = $post;
foreach ($sites as $site) :

if ($site !='') {

	// Get Terms and Conditions

	$_tc_enable = (get_post_meta($site,"_tc_enable",true)) ?: '';
	$_tc_link 	= (get_post_meta($site,"_tc_link",true)) ?: '#'; 
	$_tc_text 	= (get_post_meta($site,"_tc_text",true)) ?: '';

	?> 

	<div class="topsiteswidget_v2 ts2_first">
		<div class="ts_left">
			<?php echo get_the_post_thumbnail($site,'casino-logo',array('class' => 'ts_logo')); ?> 
		</div>
		<div class="ts_right">
			<h4><a href="" class=""><?php echo get_the_title($site) ?></a></h4>
			<span class="hilite"><?php echo get_post_meta($site,"_as_bonustext",true);?></span>
			
			<?php if ($detailslink) { ?>
				<a class="visbutton sm"><?php _e('Review', 'highroller'); ?></a>
			<?php }  else { ?>
					 	<a class="visbutton sm"><?php _e('Visit Now', 'highroller'); ?></a>
			<?php } ?>
		</div>

		<?php if ($detailslink) { ?>
			<a href="<?php echo get_the_permalink($site); ?>" class="fulllink"></a>
		<?php }  else { ?>
			<a <?php if (get_theme_option('redirect-new-window')) { echo "target=\"_blank\""; }?> href="<?php bloginfo('url'); ?>/<?php echo $slugkey; ?>/<?php echo get_post_meta($site,"_as_redirectkey",true);?>/" class="fulllink"></a>
		
		<?php } ?>
	</div>

	<?php if ($_tc_enable == 'enabled') : ?>
		<a href="<?php echo $_tc_link ?>" class="revlink tc widget center"><?php echo __($_tc_text, 'highroller') ?></a>
	<?php endif; 

} // End of if exists loop

endforeach;
?>
		

 <?php }  else { ?>
 
 <table class="topsiteswidget">
	<tr>
		<th class="ts_casinocol"><?php _e('Casino', 'highroller'); ?></th>
		<th  class="ts_bonusocol"><?php _e('Bonus', 'highroller'); ?></th>
		<th  class="ts_casinocol"><?php _e('Visit', 'highroller'); ?></th>
	</tr>

<?php

global $post;
$opost = $post;
foreach ($sites as $site) :

if ($site !='') {
	
$rateper=get_post_meta($site,"_as_rating",true)*20;
// Get Terms and Conditions

$_tc_enable = (get_post_meta($site,"_tc_enable",true)) ?: '';
$_tc_link 	= (get_post_meta($site,"_tc_link",true)) ?: '#'; 
$_tc_text 	= (get_post_meta($site,"_tc_text",true)) ?: '';

?> 

	<tr>
			<td><a <?php if (get_theme_option('redirect-new-window')) { echo "target=\"_blank\""; }?> href="<?php bloginfo('url'); ?>/<?php echo $slugkey; ?>/<?php echo get_post_meta($site,"_as_redirectkey",true);?>/"> <?php echo get_the_post_thumbnail($site,'casino-logo',array('class' => 'ts_logo')); ?>
		  
		  </a></td>
		  <td><span class="hilite"><?php echo get_post_meta($site,"_as_bonustext",true);?></span>
		  	<?php if ($_tc_enable == 'enabled') : ?>
		  		<a href="<?php echo $_tc_link ?>" class="revlink tc"><?php echo __($_tc_text, 'highroller') ?></a>
		  	<?php endif; ?>
		  </td>
		  <td>
		  <a <?php if (get_theme_option('redirect-new-window')) { echo "target=\"_blank\""; }?> href="<?php bloginfo('url'); ?>/<?php echo $slugkey; ?>/<?php echo get_post_meta($site,"_as_redirectkey",true);?>/"  class="visbutton sm"><?php _e('Visit', 'highroller'); ?></a>
		  <?php if ($detailslink2) { ?>
		  <?php } else { ?>
		  <a href="<?php the_permalink($site) ?>" class="revlink"><?php _e('Review', 'highroller'); ?></a>
		  <?php }?>
		  </td>
		</tr>

<?php 
} // End of if exists loop

endforeach;
?>
		 
</table><!--.ratingwidget-->   
 
 <?php } ?>

 <?php  
	  
		/* After widget (defined by themes). */
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags (if needed) and update the widget settings. */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['ts_casinoname1'] = strip_tags( $new_instance['ts_casinoname1'] );
		$instance['ts_casinoname2'] = strip_tags( $new_instance['ts_casinoname2'] );
		$instance['ts_casinoname3'] = strip_tags( $new_instance['ts_casinoname3'] );
		$instance['ts_casinoname4'] = strip_tags( $new_instance['ts_casinoname4'] );
		$instance['ts_casinoname5'] = strip_tags( $new_instance['ts_casinoname5'] );
		$instance['ts_casinoname6'] = strip_tags( $new_instance['ts_casinoname6'] );
		$instance['ts_casinoname7'] = strip_tags( $new_instance['ts_casinoname7'] );
		$instance['ts_casinoname8'] = strip_tags( $new_instance['ts_casinoname8'] );
		$instance['ts_casinoname9'] = strip_tags( $new_instance['ts_casinoname9'] );
		$instance['ts_casinoname10'] = strip_tags( $new_instance['ts_casinoname10'] );
		
		$instance['ts_casinoname11'] = strip_tags( $new_instance['ts_casinoname11'] );
		$instance['ts_casinoname12'] = strip_tags( $new_instance['ts_casinoname12'] );
		$instance['ts_casinoname13'] = strip_tags( $new_instance['ts_casinoname13'] );
		$instance['ts_casinoname14'] = strip_tags( $new_instance['ts_casinoname14'] );
		$instance['ts_casinoname15'] = strip_tags( $new_instance['ts_casinoname15'] );
		$instance['ts_casinoname16'] = strip_tags( $new_instance['ts_casinoname16'] );
		$instance['ts_casinoname17'] = strip_tags( $new_instance['ts_casinoname17'] );
		$instance['ts_casinoname18'] = strip_tags( $new_instance['ts_casinoname18'] );
		$instance['ts_casinoname19'] = strip_tags( $new_instance['ts_casinoname19'] );
		$instance['ts_casinoname20'] = strip_tags( $new_instance['ts_casinoname20'] );
		
		$instance['version'] = strip_tags( $new_instance['version'] );
		$instance['detailslink'] = strip_tags( $new_instance['detailslink'] );
				$instance['detailslink2'] = strip_tags( $new_instance['detailslink2'] );
               
		return $instance;
	}

public function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => 'Top Sites');
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
<p>
<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'highroller'); ?>:</label>
<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" type="text" style="width:100%;" />
</p>

  <?php $casinos = getAllPostsByType('casino'); ?>
<p>
<label for="<?php echo $this->get_field_id('ts_casinoname1'); ?>"><?php _e('Select Casino 1', 'highroller'); ?>:</label>
<select style="width:60%;" class="widefat" name="<?php echo $this->get_field_name('ts_casinoname1'); ?> ">
 <option value=""><?php _e('Select', 'highroller'); ?></option>
<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>" <?php if ($instance['ts_casinoname1'] == $h->ID) echo 'SELECTED'; ?>><?php echo $h->post_title?></option>
<?php } ?>

</select>
</p>

<p>
<label for="<?php echo $this->get_field_id('ts_casinoname2'); ?>"><?php _e('Select Casino 2', 'highroller'); ?>:</label>
<select style="width:60%;" class="widefat" name="<?php echo $this->get_field_name('ts_casinoname2'); ?> ">
 <option value=""><?php _e('Select', 'highroller'); ?></option>
<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>" <?php if ($instance['ts_casinoname2'] == $h->ID) echo 'SELECTED'; ?>><?php echo $h->post_title?></option>
<?php } ?>

</select>
</p>


<p>
<label for="<?php echo $this->get_field_id('ts_casinoname3'); ?>"><?php _e('Select Casino 3', 'highroller'); ?>:</label>
<select style="width:60%;" class="widefat" name="<?php echo $this->get_field_name('ts_casinoname3'); ?> ">
 <option value=""><?php _e('Select', 'highroller'); ?></option>
<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>" <?php if ($instance['ts_casinoname3'] == $h->ID) echo 'SELECTED'; ?>><?php echo $h->post_title?></option>
<?php } ?>

</select>
</p>


<p>
<label for="<?php echo $this->get_field_id('ts_casinoname4'); ?>"><?php _e('Select Casino 4', 'highroller'); ?>:</label>
<select style="width:60%;" class="widefat" name="<?php echo $this->get_field_name('ts_casinoname4'); ?> ">
 <option value=""><?php _e('Select', 'highroller'); ?></option>
<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>" <?php if ($instance['ts_casinoname4'] == $h->ID) echo 'SELECTED'; ?>><?php echo $h->post_title?></option>
<?php } ?>

</select>
</p>

<p>
<label for="<?php echo $this->get_field_id('ts_casinoname5'); ?>"><?php _e('Select Casino 5', 'highroller'); ?>:</label>
<select style="width:60%;" class="widefat" name="<?php echo $this->get_field_name('ts_casinoname5'); ?> ">
 <option value=""><?php _e('Select', 'highroller'); ?></option>
<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>" <?php if ($instance['ts_casinoname5'] == $h->ID) echo 'SELECTED'; ?>><?php echo $h->post_title?></option>
<?php } ?>

</select>
</p>

<p>
<label for="<?php echo $this->get_field_id('ts_casinoname6'); ?>"><?php _e('Select Casino 6', 'highroller'); ?>:</label>
<select style="width:60%;" class="widefat" name="<?php echo $this->get_field_name('ts_casinoname6'); ?> ">
 <option value=""><?php _e('Select', 'highroller'); ?></option>
<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>" <?php if ($instance['ts_casinoname6'] == $h->ID) echo 'SELECTED'; ?>><?php echo $h->post_title?></option>
<?php } ?>

</select>
</p>

<p>
<label for="<?php echo $this->get_field_id('ts_casinoname7'); ?>"><?php _e('Select Casino 7', 'highroller'); ?>:</label>
<select style="width:60%;" class="widefat" name="<?php echo $this->get_field_name('ts_casinoname7'); ?> ">
 <option value=""><?php _e('Select', 'highroller'); ?></option>
<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>" <?php if ($instance['ts_casinoname7'] == $h->ID) echo 'SELECTED'; ?>><?php echo $h->post_title?></option>
<?php } ?>

</select>
</p>

<p>
<label for="<?php echo $this->get_field_id('ts_casinoname8'); ?>"><?php _e('Select Casino 8', 'highroller'); ?>:</label>
<select style="width:60%;" class="widefat" name="<?php echo $this->get_field_name('ts_casinoname8'); ?> ">
 <option value=""><?php _e('Select', 'highroller'); ?></option>
<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>" <?php if ($instance['ts_casinoname8'] == $h->ID) echo 'SELECTED'; ?>><?php echo $h->post_title?></option>
<?php } ?>

</select>
</p>

<p>
<label for="<?php echo $this->get_field_id('ts_casinoname9'); ?>"><?php _e('Select Casino 9', 'highroller'); ?>:</label>
<select style="width:60%;" class="widefat" name="<?php echo $this->get_field_name('ts_casinoname9'); ?> ">
 <option value=""><?php _e('Select', 'highroller'); ?></option>
<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>" <?php if ($instance['ts_casinoname9'] == $h->ID) echo 'SELECTED'; ?>><?php echo $h->post_title?></option>
<?php } ?>

</select>
</p>

<p>
<label for="<?php echo $this->get_field_id('ts_casinoname10'); ?>"><?php _e('Select Casino 10', 'highroller'); ?>:</label>
<select style="width:60%;" class="widefat" name="<?php echo $this->get_field_name('ts_casinoname10'); ?> ">
 <option value=""><?php _e('Select', 'highroller'); ?></option>
<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>" <?php if ($instance['ts_casinoname10'] == $h->ID) echo 'SELECTED'; ?>><?php echo $h->post_title?></option>
<?php } ?>

</select>
</p>

<p>
<label for="<?php echo $this->get_field_id('ts_casinoname11'); ?>"><?php _e('Select Casino 11', 'highroller'); ?>:</label>
<select style="width:60%;" class="widefat" name="<?php echo $this->get_field_name('ts_casinoname11'); ?> ">
 <option value=""><?php _e('Select', 'highroller'); ?></option>
<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>" <?php if ($instance['ts_casinoname11'] == $h->ID) echo 'SELECTED'; ?>><?php echo $h->post_title?></option>
<?php } ?>

</select>
</p>

<p>
<label for="<?php echo $this->get_field_id('ts_casinoname12'); ?>"><?php _e('Select Casino 12', 'highroller'); ?>:</label>
<select style="width:60%;" class="widefat" name="<?php echo $this->get_field_name('ts_casinoname12'); ?> ">
 <option value=""><?php _e('Select', 'highroller'); ?></option>
<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>" <?php if ($instance['ts_casinoname12'] == $h->ID) echo 'SELECTED'; ?>><?php echo $h->post_title?></option>
<?php } ?>

</select>
</p>

<p>
<label for="<?php echo $this->get_field_id('ts_casinoname13'); ?>"><?php _e('Select Casino 13', 'highroller'); ?>:</label>
<select style="width:60%;" class="widefat" name="<?php echo $this->get_field_name('ts_casinoname13'); ?> ">
 <option value=""><?php _e('Select', 'highroller'); ?></option>
<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>" <?php if ($instance['ts_casinoname13'] == $h->ID) echo 'SELECTED'; ?>><?php echo $h->post_title?></option>
<?php } ?>

</select>
</p>

<p>
<label for="<?php echo $this->get_field_id('ts_casinoname14'); ?>"><?php _e('Select Casino 14', 'highroller'); ?>:</label>
<select style="width:60%;" class="widefat" name="<?php echo $this->get_field_name('ts_casinoname14'); ?> ">
 <option value=""><?php _e('Select', 'highroller'); ?></option>
<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>" <?php if ($instance['ts_casinoname14'] == $h->ID) echo 'SELECTED'; ?>><?php echo $h->post_title?></option>
<?php } ?>

</select>
</p>

<p>
<label for="<?php echo $this->get_field_id('ts_casinoname15'); ?>"><?php _e('Select Casino 15', 'highroller'); ?>:</label>
<select style="width:60%;" class="widefat" name="<?php echo $this->get_field_name('ts_casinoname15'); ?> ">
 <option value=""><?php _e('Select', 'highroller'); ?></option>
<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>" <?php if ($instance['ts_casinoname15'] == $h->ID) echo 'SELECTED'; ?>><?php echo $h->post_title?></option>
<?php } ?>

</select>
</p>

<p>
<label for="<?php echo $this->get_field_id('ts_casinoname16'); ?>"><?php _e('Select Casino 16', 'highroller'); ?>:</label>
<select style="width:60%;" class="widefat" name="<?php echo $this->get_field_name('ts_casinoname16'); ?> ">
 <option value=""><?php _e('Select', 'highroller'); ?></option>
<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>" <?php if ($instance['ts_casinoname16'] == $h->ID) echo 'SELECTED'; ?>><?php echo $h->post_title?></option>
<?php } ?>

</select>
</p>

<p>
<label for="<?php echo $this->get_field_id('ts_casinoname17'); ?>"><?php _e('Select Casino 17', 'highroller'); ?>:</label>
<select style="width:60%;" class="widefat" name="<?php echo $this->get_field_name('ts_casinoname17'); ?> ">
 <option value=""><?php _e('Select', 'highroller'); ?></option>
<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>" <?php if ($instance['ts_casinoname17'] == $h->ID) echo 'SELECTED'; ?>><?php echo $h->post_title?></option>
<?php } ?>

</select>
</p>

<p>
<label for="<?php echo $this->get_field_id('ts_casinoname18'); ?>"><?php _e('Select Casino 18', 'highroller'); ?>:</label>
<select style="width:60%;" class="widefat" name="<?php echo $this->get_field_name('ts_casinoname18'); ?> ">
 <option value=""><?php _e('Select', 'highroller'); ?></option>
<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>" <?php if ($instance['ts_casinoname18'] == $h->ID) echo 'SELECTED'; ?>><?php echo $h->post_title?></option>
<?php } ?>

</select>
</p>

<p>
<label for="<?php echo $this->get_field_id('ts_casinoname19'); ?>"><?php _e('Select Casino 19', 'highroller'); ?>:</label>
<select style="width:60%;" class="widefat" name="<?php echo $this->get_field_name('ts_casinoname19'); ?> ">
 <option value=""><?php _e('Select', 'highroller'); ?></option>
<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>" <?php if ($instance['ts_casinoname19'] == $h->ID) echo 'SELECTED'; ?>><?php echo $h->post_title?></option>
<?php } ?>

</select>
</p>

<p>
<label for="<?php echo $this->get_field_id('ts_casinoname20'); ?>"><?php _e('Select Casino 20', 'highroller'); ?>:</label>
<select style="width:60%;" class="widefat" name="<?php echo $this->get_field_name('ts_casinoname20'); ?> ">
 <option value=""><?php _e('Select', 'highroller'); ?></option>
<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>" <?php if ($instance['ts_casinoname20'] == $h->ID) echo 'SELECTED'; ?>><?php echo $h->post_title?></option>
<?php } ?>

</select>
</p>

<p>
<label for="<?php echo $this->get_field_id('version'); ?>"><?php _e('Table Variation', 'highroller'); ?>:</label>
<select name="<?php echo $this->get_field_name('version'); ?>">
 <option value="Version 1" <?php if ($instance['version'] == "Version 1") echo 'SELECTED'; ?> ><?php _e('Version 1', 'highroller'); ?></option>
 <option value="Version 2" <?php if ($instance['version'] == "Version 2") echo 'SELECTED'; ?> ><?php _e('Version 2', 'highroller'); ?></option>
</select>
</p>

<p>	
<label><?php _e('Link to Review Page Instead of Casino Directly (Version 2)', 'highroller'); ?>:</label>	
<input style="width:20px;" class="widefat" type="checkbox" <?php if ($instance['detailslink']) echo 'CHECKED'; ?> name="<?php echo $this->get_field_name('detailslink'); ?>" /><?php _e('Check to link widget to review page instead of outbound casino.', 'highroller'); ?>
</p>

<p>	
<label><?php _e('Hide Review Link (Version 1)', 'highroller'); ?>:</label>	
<input style="width:20px;" class="widefat" type="checkbox" <?php if ($instance['detailslink2']) echo 'CHECKED'; ?> name="<?php echo $this->get_field_name('detailslink2'); ?>" /><?php _e('Check to remove review links from version 1.', 'highroller'); ?>
</p>


  <?php
    }
 }

?>