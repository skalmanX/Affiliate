<?php


add_action('admin_footer', 'fly_shortcode_buttons');

function fly_shortcode_buttons(){
	
global $current_screen;



?>


<style>  
	.flytonic_sc_editor { padding: 10px !important; margin:0 auto; color:#444; font-size:12px;  }
 .flytonic_sc_editor .fly_textinput {font-size:11px; border:1px solid #ddd; border-radius:4px; -moz-border-radius:4px; color:#444; padding:4px; margin:0 0 10px 0; }
 .flytonic_sc_editor label {margin-right:5px;}
.flytonic_sc_editor p {margin:0 0 10px 0; padding:0; font-size:12px; font-style:italic; color:#666;}	


</style>

<div id="cdf_shortcode_dialog" class="flytonic_sc_editor" title="Custom Buttons" style="display:none;">

	<div>
    	<label for=""><?php _e('Button Text', 'highroller'); ?></label>
    	<input class="fly_textinput" type="text" name="fly_button_text" id="text" size="40">
    	<p><?php _e('Enter Button Text', 'highroller'); ?></p>
   	</div>	 

	<div>
    	<label for=""><?php _e('Button URL', 'highroller'); ?></label>
    	<input class="fly_textinput" type="text" name="fly_button_text" id="linkurl" size="40">
    	<p><?php _e('Enter Button URL', 'highroller'); ?></p>
   	</div>	 

	<div>
    	<label><?php _e('Size of Button', 'highroller'); ?></label>
    	<select class="fly_textinput" name="size" id="size">
    	     	<option value="reg"><?php _e('Regular', 'highroller'); ?></option>
		<option value="sm"><?php _e('Small', 'highroller'); ?></option>
		<option value="med"><?php _e('Medium', 'highroller'); ?></option>
               	 <option value="lg"><?php _e('Large', 'highroller'); ?></option>
   
    	</select>

	</div>

	<div>
    	<label><?php _e('Icon', 'highroller'); ?></label>
    	<select class="fly_textinput" name="icon" id="icon">
    	     	<option value="none"><?php _e('None (Default)', 'highroller'); ?></option>
               	 <option value="darrow"><?php _e('Down Arrow', 'highroller'); ?></option>
		<option value="info"><?php _e('Info', 'highroller'); ?></option>
		<option value="error"><?php _e('Error', 'highroller'); ?></option>
		<option value="check"><?php _e('Check', 'highroller'); ?></option>
   		<option value="warning"><?php _e('Warning', 'highroller'); ?></option>
    	</select>

	</div>


	<div>
    	<label><?php _e('Text Color', 'highroller'); ?></label>
    	<select class="fly_textinput" name="text_color" id="text_color">
    	     	<option value="lgt"><?php _e('Light', 'highroller'); ?></option>
                <option value="drk"><?php _e('Dark', 'highroller'); ?></option>
    	</select>

	</div>



	<div>
    	<label><?php _e('Background Color', 'highroller'); ?></label>
    	<select class="fly_textinput" name="bg_color" id="bg_color">
    	     	<option value="normal"><?php _e('Normal', 'highroller'); ?></option>
 		<option value="brown">Brown</option>
               	 <option value="red">Red</option>
<option value="yellow">Yellow</option>
<option value="green">Green</option>
<option value="gray">Gray</option>
<option value="orange">Orange</option>
<option value="purple">Purple</option>
<option value="teal">Teal</option>
<option value="black">Black</option>
		<option value="custom"><?php _e('Custom', 'highroller'); ?></option>
   
    	</select>

	</div>


	<div id="cdf_bg_color_custom" style="display:none;">
    	<label for="tag-name"><?php _e('Custom Background Color', 'highroller'); ?></label>
    	<input type="text" name="bg_color_custom" id="bg_color_custom" class="cdf-bg-color-field" size="40" />
    	<p><?php _e('Select or enter a custom background color for the button', 'highroller'); ?></p>
      </div>
    	

	

</div>

<script type="text/javascript">
jQuery(document).ready( function() {
	jQuery('#cdf_shortcode_dialog').dialog({
		autoOpen:false,
		draggable: false,
		modal: true,
		resizable: false,
		buttons: {
			Ok: function() {
				var str = '[flytonic-button ';
				
                //Attributes
				if (jQuery('#text').val() != '') {
				    str += 'text=\'' + jQuery('#text').val() + '\' '; //a normal input
				}
				if (jQuery('#linkurl').val() != '') {
				    str += 'linkurl=\'' + jQuery('#linkurl').val() + '\' '; //a normal input
				}
				if (jQuery('#size :selected').val() != '') {
				    str += 'size=\'' + jQuery('#size :selected').val() + '\' '; //a select box
				}
				if (jQuery('#icon :selected').val() != '') {
				    str += 'icon=\'' + jQuery('#icon :selected').val() + '\' '; //a select box
				}
                //Background Attributes
				if (jQuery('#bg_color :selected').val() != '') {
				    str += 'bg_color=\'' + jQuery('#bg_color :selected').val() + '\' '; //a select box
				}
				if (jQuery('#bg_color_custom').val() != '') {
				    str += 'bg_color_custom=\'' + jQuery('#bg_color_custom').val() + '\' '; //a normal input
				}
                //Border Attributes
				
                //Text Attributes
				if (jQuery('#text_color :selected').val() != '') {
				    str += 'text_color=\'' + jQuery('#text_color :selected').val() + '\' '; //a select box
				}

                
				/*if (jQuery('#someid').is(':checked')) {
				    str += 'someattribute=\'y\' '; //a checkbox
				}*/
									
				str += ']';
				
				var Editor = tinyMCE.get('content');
				Editor.focus();
				Editor.selection.setContent(str);

				
				jQuery( this ).dialog( "close" );
			},
			Cancel: function() {
				jQuery( this ).dialog( "close" );
			}
		}
	});
    
    jQuery('#text_color').live('change',function(){
        var text_color = jQuery(this).val();
        if(text_color == "custom") {
            jQuery("#cdf_text_color_custom").css("display", "block");
        } else {
            jQuery("#cdf_text_color_custom").css("display", "none");
        }
    });
    
    jQuery('#bg_color').live('change',function(){
        var bg_color = jQuery(this).val();
        if(bg_color == "custom") {
            jQuery("#cdf_bg_color_custom").css("display", "block");
        } else {
            jQuery("#cdf_bg_color_custom").css("display", "none");
        }
    });
    
    

    //Collaps
    jQuery('#advanced_cssattributes_link').on("click", function (e) { 
        e.preventDefault();
        jQuery('#advanced_cssattributes_container').toggle();
        jQuery(this).closest('.collaps').toggleClass("collapsed");
    });
    
    //Replace input with color field
    jQuery('.cdf-bg-color-field').wpColorPicker({change: function(event, ui){
        if(jQuery('#bg_color').val() == "custom") {
            jQuery("#preview_button_anchor").css("background-color", "");
            jQuery("#preview_button_anchor").attr("style", jQuery("#preview_button_anchor").attr("style") + "background-color:" + ui.color.toString() + " !important; background-image: none !important;");
        }
    }
    });
    
    
    jQuery('.cdf-text-color-field').wpColorPicker({change: function(event, ui){
        if(jQuery('#text_color').val() == "custom") {
            jQuery("#preview_button_anchor").css("color","");
            jQuery("#preview_button_anchor").attr("style", jQuery("#preview_button_anchor").attr("style") + "color:" + ui.color.toString() + " !important;");
        }
    }
    });
    
    jQuery('#text').change(function() {
        var button_text = jQuery('#text').val();
        jQuery('#preview_button_span').html(button_text);
    });

    jQuery('#text').keyup(function() {
        var button_text = jQuery('#text').val();
        jQuery('#preview_button_span').html(button_text);
    });
    
    jQuery('#size').change(function() {
        var default_size = "reg";
        var button_size = jQuery('#size').val();
        jQuery("#size option").each(function() {
            jQuery('#preview_button_anchor').removeClass(jQuery(this).val());
        });
        
        if(button_size != default_size) {
            jQuery('#preview_button_anchor').toggleClass(button_size);
        }
    });
    
    jQuery('#icon').change(function() {
        var default_icon = "reg";
        var button_icon = jQuery('#icon').val();
        jQuery("#icon option").each(function() {
            jQuery('#preview_button_span').removeClass(jQuery(this).val());
        });
        
        if(button_icon != default_icon) {
            jQuery('#preview_button_span').toggleClass(button_icon);
        }
    });
    
    jQuery('#text_color').change(function() {
        var custom_text_color = "custom";
        var button_text_color = jQuery('#text_color').val();
        jQuery("#text_color option").each(function() {
            jQuery('#preview_button_anchor').removeClass(jQuery(this).val());
        });
        
        if(button_text_color != custom_text_color) {
            jQuery('#preview_button_anchor').toggleClass(button_text_color);
        }
    });
    
});
</script>

<?php
}


?>