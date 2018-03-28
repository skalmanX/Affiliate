<?php

/*
	Run the bonuscode_button function when WP initialization
*/


/*
	This actually adds the html for the dialog, all html and JS needed to control the behavior should go here
*/



add_action('admin_footer', 'ftable_add_editor');



function ftable_add_editor(){
	


		$loop = new WP_Query( array( 'post_type' =>'casino', 'posts_per_page' => -1, 'orderby'=>'title' ) ); 
		$sites = $loop->posts;
	
?>
<style> .flytonic_sc_editor { padding: 10px !important; margin:0 auto; color:#444; font-size:12px;  }
 .flytonic_sc_editor .fly_textinput {font-size:11px; border:1px solid #ddd; border-radius:4px; -moz-border-radius:4px; color:#444; padding:4px; margin:0 0 10px 0; }
 .flytonic_sc_editor label {margin-right:5px;}
.flytonic_sc_editor p {margin:0 0 10px 0; padding:0; font-size:12px; font-style:italic; color:#666;}	


</style>
	<div id="ftable_editor" class="flytonic_sc_editor" title="Featured Casino Shortcode" style="display:none;">
	
	 <?php $casinos = getAllPostsByType('casino'); ?>
	
	<div>
    	<label><?php _e('Featured Site', 'highroller'); ?></label>
    	<select class="fly_textinput" name="ftable_casino" id="ftable_casino">
			<option value="">[<?php _e('Random', 'highroller'); ?>]</option>
		<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>"><?php echo $h->post_title?></option>
        	<?php } ?>
	</select>
	</div>
  


	<div>
    	<label for=""><?php _e('Summary Text', 'highroller'); ?></label>
	<textarea class="fly_textinput" id="ftable_body" style="width: 100%; height: 80px;"></textarea>
   	</div>	

	<div>
    	<label><?php _e('Show Review Link or Button?', 'highroller'); ?></label>
    	<select class="fly_textinput" name="ftable_revtable" id="ftable_revtable">
    	     <option value=""><?php _e('Yes', 'highroller'); ?></option>
			<option value="no"><?php _e('No', 'highroller'); ?></option>
    	</select>
	</div>	


    </div>

    <script>
	jQuery(document).ready( function() {
		
		jQuery('#ftable_editor').dialog({
			autoOpen:false,
			draggable: false,
			modal: true,
			width: 450,
			resizable: false,
			buttons: {
				Ok: function() {
					var str = '[featured_casino ';
					
					if (jQuery('#ftable_casino :selected').val()!='') str += 'site=\'' + jQuery('#ftable_casino :selected').val() + '\' '; //a select box
						if (jQuery('#ftable_revtable :selected').val()!='') str += 'showreview=\'' + jQuery('#ftable_revtable :selected').val() + '\' '; //a select box
					
					str += ']';
					
					str += jQuery('#ftable_body').val() + '[/featured_casino]';
					
					var Editor = tinyMCE.get('content');
					Editor.focus();
					Editor.selection.setContent(str);

					
					jQuery( this ).dialog( "close" );
				},
				     

				Cancel:  function() {
					jQuery( this ).dialog( "close" );
				}
			}


		});
	});
	</script>
<?php
}


?>