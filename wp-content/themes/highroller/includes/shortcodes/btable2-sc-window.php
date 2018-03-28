<?php

/*
	Run the bonuscode2_button function when WP initialization
*/

/*
	This actually adds the html for the dialog, all html and JS needed to control the behavior should go here
*/
add_action('in_admin_footer', 'bcb2_add_editor');
function bcb2_add_editor()
{
	
	
?>
<style>
  .flytonic_sc_editor { padding: 10px !important; margin:0 auto; color:#444; font-size:12px;  }
 .flytonic_sc_editor .fly_textinput {font-size:11px; border:1px solid #ddd; border-radius:4px; -moz-border-radius:4px; color:#444; padding:3px !important; margin:0 0 10px 0; height:27px;  }
 .flytonic_sc_editor label {margin-right:5px;}
.flytonic_sc_editor p {margin:0 0 10px 0; padding:0; font-size:12px; font-style:italic; color:#666;}	
</style>
	<div id="bcb2_editor" class="flytonic_sc_editor" title="<?php _e('Fixed Casino Listings', 'highroller'); ?>"  style="display:none">
        	
       <?php $casinos = getAllPostsByType('casino'); ?>
	
	<div>
    	<label><?php _e('Casino 1', 'highroller'); ?></label>
    	<select class="fly_textinput" name="casino1" id="casino1">
		<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>"><?php echo $h->post_title?></option>
        	<?php } ?>
	</select>
	</div>

	<div>
    	<label><?php _e('Casino 2 Optional', 'highroller'); ?></label>
    	<select class="fly_textinput" name="casino2" id="casino2">
    	     <option value="">[<?php _e('Optional', 'highroller'); ?>]</option>
		<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>"><?php echo $h->post_title?></option>
        	<?php } ?>
	</select>
	</div>

	<div>
    	<label><?php _e('Casino 3 Optional', 'highroller'); ?></label>
    	<select class="fly_textinput" name="casino3" id="casino3">
    	     <option value="">[<?php _e('Optional', 'highroller'); ?>]</option>
		<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>"><?php echo $h->post_title?></option>
        	<?php } ?>
	</select>
	</div>

	<div>
    	<label><?php _e('Casino 4 Optional', 'highroller'); ?></label>
    	<select class="fly_textinput" name="casino4" id="casino4">
    	     <option value="">[<?php _e('Optional', 'highroller'); ?>]</option>
		<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>"><?php echo $h->post_title?></option>
        	<?php } ?>
	</select>
	</div>

	<div>
    	<label><?php _e('Casino 5 Optional', 'highroller'); ?></label>
    	<select class="fly_textinput" name="casino5" id="casino5">
    	     <option value="">[<?php _e('Optional', 'highroller'); ?>]</option>
		<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>"><?php echo $h->post_title?></option>
        	<?php } ?>
	</select>
	</div>

	<div>
    	<label><?php _e('Casino 6 Optional', 'highroller'); ?></label>
    	<select class="fly_textinput" name="casino6" id="casino6">
    	     <option value="">[<?php _e('Optional', 'highroller'); ?>]</option>
		<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>"><?php echo $h->post_title?></option>
        	<?php } ?>
	</select>
	</div>

	<div>
    	<label><?php _e('Casino 7 Optional', 'highroller'); ?></label>
    	<select class="fly_textinput" name="casino7" id="casino7">
    	     <option value="">[<?php _e('Optional', 'highroller'); ?>]</option>
		<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>"><?php echo $h->post_title?></option>
        	<?php } ?>
	</select>
	</div>

	<div>
    	<label><?php _e('Casino 8 Optional', 'highroller'); ?></label>
    	<select class="fly_textinput" name="casino8" id="casino8">
    	     <option value="">[<?php _e('Optional', 'highroller'); ?>]</option>
		<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>"><?php echo $h->post_title?></option>
        	<?php } ?>
	</select>
	</div>
	
		<div>
    	<label><?php _e('Casino 9 Optional', 'highroller'); ?></label>
    	<select class="fly_textinput" name="casino9" id="casino9">
    	     <option value="">[<?php _e('Optional', 'highroller'); ?>]</option>
		<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>"><?php echo $h->post_title?></option>
        	<?php } ?>
	</select>
	</div>
	
		<div>
    	<label><?php _e('Casino 10 Optional', 'highroller'); ?></label>
    	<select class="fly_textinput" name="casino10" id="casino10">
    	     <option value="">[<?php _e('Optional', 'highroller'); ?>]</option>
		<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>"><?php echo $h->post_title?></option>
        	<?php } ?>
	</select>
	</div>
	
	<div>
    	<label><?php _e('Choose extra field to show (default is rating)', 'highroller'); ?></label>
    	<select class="fly_textinput" name="bcb_ratefield2" id="bcb_ratefield2">
    	     <option value="">[<?php _e('Default', 'highroller'); ?>]</option>
			<option value="payout"><?php _e('Payout %', 'highroller'); ?></option>
			<option value="bonuscode"><?php _e('Bonus Code', 'highroller'); ?></option>
			<option value="mindep"><?php _e('Min. Deposit', 'highroller'); ?></option>
    	</select>
	</div>
	
	<div>
    	<label><?php _e('Show Review Link or Button?', 'highroller'); ?></label>
    	<select class="fly_textinput" name="bcb_revtable2" id="bcb_revtable2">
    	     <option value=""><?php _e('Yes', 'highroller'); ?></option>
			<option value="no"><?php _e('No', 'highroller'); ?></option>
    	</select>
	</div>
     
</div>

   
    <script>
	jQuery(document).ready( function() {
		jQuery('#bcb2_editor').dialog({
			buttons: {
				Ok: function() {
					var str = '[bonustable_fixed ';

									
if (jQuery('#casino1 :selected').val()!='') str += 'site1=\'' + jQuery('#casino1 :selected').val() + '\' '; //a select box
if (jQuery('#casino2 :selected').val()!='') str += 'site2=\'' + jQuery('#casino2 :selected').val() + '\' '; //a select box
if (jQuery('#casino3 :selected').val()!='') str += 'site3=\'' + jQuery('#casino3 :selected').val() + '\' '; //a select box
if (jQuery('#casino4 :selected').val()!='') str += 'site4=\'' + jQuery('#casino4 :selected').val() + '\' '; //a select box
if (jQuery('#casino5 :selected').val()!='') str += 'site5=\'' + jQuery('#casino5 :selected').val() + '\' '; //a select box
if (jQuery('#casino6 :selected').val()!='') str += 'site6=\'' + jQuery('#casino6 :selected').val() + '\' '; //a select box
if (jQuery('#casino7 :selected').val()!='') str += 'site7=\'' + jQuery('#casino7 :selected').val() + '\' '; //a select box
if (jQuery('#casino8 :selected').val()!='') str += 'site8=\'' + jQuery('#casino8 :selected').val() + '\' '; //a select box
if (jQuery('#casino9 :selected').val()!='') str += 'site9=\'' + jQuery('#casino9 :selected').val() + '\' '; //a select box
if (jQuery('#casino10 :selected').val()!='') str += 'site10=\'' + jQuery('#casino10 :selected').val() + '\' '; //a select box
	if (jQuery('#bcb_ratefield2 :selected').val()!='') str += 'field=\'' + jQuery('#bcb_ratefield2 :selected').val() + '\' '; //a select box
	if (jQuery('#bcb_revtable2 :selected').val()!='') str += 'showreview=\'' + jQuery('#bcb_revtable2 :selected').val() + '\' '; //a select box
					str += ']';
					
					tinyMCE.activeEditor.selection.getContent();

					tinyMCE.activeEditor.selection.setContent(str);

					
					jQuery( this ).dialog( "close" );
				},
				Cancel: function() {
					jQuery( this ).dialog( "close" );
				}
			},
			autoOpen:false,
			draggable: false,
			modal: true,
			resizable: false
		});
	});
	</script>
<?php
}

?>