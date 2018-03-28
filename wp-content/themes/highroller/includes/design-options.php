<?php
// SETTINGS CONFIGURATION

$fonts=array("Arial, Helvetica, sans-serif"=>"Arial", "'Arial Black',Gadget, sans-serif"=>"Arial Black", "'Arial Narrow', sans-serif"=>"Arial Narrow", "Century Gothic,
sans-serif"=>"Century Gothic", "Copperplate Gothic Light, sans-serif"=>"Copperplate Gothic Light", "'Courier New', Courier, Monaco, monospace"=>"Courier New", "Georgia, Serif"=>"Georgia", "Gill Sans MT, sans-serif"=>"Gill Sans", "Impact, Charcoal, sans-serif"=>"Impact", 
"'Lucida Console', Monaco, monospace"=>"Lucida Console", "'Lucida Sans Unicode', 'Lucida Grande', sans-serif"=>"Lucida Sans Unicode", "'Palatino Linotype', 'Book Antiqua', Palatino, serif"=>"Palatino Linotype", "Tahoma, Geneva, sans-serif"=>"Tahoma", "'Times New Roman', Times, serif"=>"Times New Roman", "'Trebuchet MS', Helvetica, sans-serif"=>"Trebuchet MS", "Verdana, Geneva, sans-serif"=>"Verdana");

$fontsizes=array("8px"=>"8px", "10px"=>"10px", "11px"=>"11px", "12px"=>"12px", "14px"=>"14px", "16px"=>"16px", "18px"=>"18px", "20px"=>"20px","24px"=>"24px","28px"=>"28px","30px"=>"30px","36px"=>"36px", "40px"=>"40px");




$settings[] = make_advanced_group("General Colors", array(

	make_setting(__('General Link Color', 'highroller'), "gen-linkcolor","color", __('Change blue link color', 'highroller'), ""),
	make_setting(__('General Link Hover Color', 'highroller'), "gen-linkhovercolor","color", "", ""),
	
	make_setting(__('Bonus Text Color', 'highroller'), "gen-bonuscolor","color", __('Change the teal color text of bonus', 'highroller'), "span.hilite { color: "),

	make_setting(__('Dark Heading Background Color', 'highroller'), "bluehead-color","color", __('Change the color of the black background headings on review pages and casino table heading rows', 'highroller'), "h1.altheading, h2.altheading, h3.altheading,.reviewtop, .comptable th,.topsiteswidget th,.game_wrap h1{ background: "),
	make_setting(__('Rank Background Color', 'highroller'), "rank-bgcolor","color", __('Change background color of the rank in comparison table', 'highroller'), ".rankcir  { background: "),
	make_setting(__('Rank Text Color', 'highroller'), "rank-txcolor","color", __('Change text color of the rank in comparison table', 'highroller'), ".rankcir  { color: "),

));

$settings[] = make_advanced_group("Button Settings", array(

	make_setting(__('Blue Button Color', 'highroller'), "or-button-bgcolor","color", "", ""),
	make_setting(__('Blue Button Text Color', 'highroller'), "or-button-txcolor", "color", "", ""),

));


$settings[] = make_advanced_group("Background Color Settings", array(

make_setting(__('Header Background Color', 'highroller'), "header-background-color", "color", __('The header background color','highroller'), " header.main-header { background-color: "),

make_setting(__('Background Color', 'highroller'), "body-background-color","color", "", ""),
make_setting(__('Background Border Color', 'highroller'), "body-border-color", "color", __('The background color of the outer border','highroller'), " #outerwrap { background-color: "),

make_setting(__('Background Image', 'highroller'), "body-background-image", "image", __('Replace the background color with a background image', 'highroller'), " body { background: url('", "'); }"),
make_setting(__('Background Image Repeat', 'highroller'), "body-image-repeat", array("no-repeat"=>"None", "repeat"=>"Repeat","repeat-x"=>"Repeat X", "repeat-y"=>"Repeat Y"), __('Should the background image repeat', 'highroller'), " { background-repeat: "),
	

));

$important= "!important";
$settings[] = make_advanced_group("Typography Settings", array(

	make_setting(__('Heading H1 Font Family', 'highroller'), "bodyh1-font-family", $fonts, __('The font type for the H1 headings', 'highroller'), ".custom h1 { font-family:"),

	make_setting(__('Heading H1 Font Size', 'highroller'), "bodyh1-font-size", $fontsizes, __('The size of the H1 heading text', 'highroller'), ""),

	make_setting(__('Heading H2 Font Family', 'highroller'), "bodyh2-font-family", $fonts, __('The font type for the H1 headings', 'highroller'), ".custom h2 { font-family:"),

	make_setting(__('Heading H2 Font Size', 'highroller'), "bodyh2-font-size", $fontsizes, __('The size of the H1 heading text', 'highroller'), ".custom h2 { font-size:"),

	make_setting(__('Heading H3 Font Family', 'highroller'), "bodyh3-font-family", $fonts, __('The font type for the H3 headings', 'highroller'), ".custom h3 { font-family:"),

	make_setting(__('Heading H3 Font Size', 'highroller'), "bodyh3-font-size", $fontsizes, __('The size of the H3 heading text', 'highroller'), ".custom h3 { font-size:"),

	make_setting(__('Sidebar Widget Heading Font Family', 'highroller'), "sideh3-font-family", $fonts, __('The font type for the sidebar widget headings', 'highroller'), ".custom .widget h3 { font-family:"),

	make_setting(__('Sidebar Widget Heading Font Size', 'highroller'), "sideh3-font-size", $fontsizes, __('The size of the sidebar widget heading text'), ".custom .widget h3{ font-size:"),

));

$settings[] = make_advanced_group("Custom", array(
	make_setting(__('Custom CSS', 'highroller'), "custom", "textarea", __('Custom CSS to be inserted into the site.  Proceed styles by .custom', 'highroller'), "", "")
));


add_filter('flytonic_save_custom_css', 'ft_image_bordering', 0 , 2);
function ft_image_bordering($val, $field)
{
	
	if($field['slug']=='or-button-bgcolor') {

	return 'a.visbutton { background: ' . $val . ';}';
	
	} elseif($field['slug']=='or-button-txcolor') {

	return 'a.visbutton { color: ' . $val . '!important;}';
	
	}	elseif($field['slug']=='body-background-color') {

	return 'body {background: ' . $val . '; } ';
	
	} elseif($field['slug']=='gen-linkcolor') {

	return '.entry-content a,  .entry-content a:visited, .sidebar a, .sidebar a:visited { color: ' . $val . '} .siterow a.vislink {   color: #444;}';

	} elseif($field['slug']=='gen-linkhovercolor') {

	return ' .entry-content a:hover,  .sidebar a:hover{ color: ' . $val . '}';

	}

	//return $val;
}




// END SETTINGS CONFIGURATION

//ADMINISTRATION SCREEN
add_action('admin_menu', 'theme_styles_add_menu');
function theme_styles_add_menu()
{
	add_menu_page('Flytonic Framework', 'Flytonic', 'update_themes', 'design-options', 'theme_styles_show_ui');
	add_submenu_page('design-options', __('Design Options', 'highroller'), __('Design Options', 'highroller'), 'update_themes', 'design-options', 'theme_styles_show_ui');
	
}

function theme_styles_show_ui()
{
	
	if ( isset($_REQUEST["action"]) AND $_REQUEST["action"] == "Reset to Default") {
	
		delete_option('design-options-settings');
		design_generate_css();
	}
	
	
	
	if (isset($_REQUEST["action"]) AND $_REQUEST["action"] == "save-settings") {
		$css = $_REQUEST["css"];
		delete_option('design-options-settings');
		add_option('design-options-settings', serialize($css));
		design_generate_css();
	}	
	
	$existing_values = @unserialize(get_option('design-options-settings'));	

	

	if (!is_array($existing_values)) $existing_values = array();
	
	global $settings;

$fonts=array("Arial, Helvetica, sans-serif"=>"Arial", "'Arial Black',Gadget, sans-serif"=>"Arial Black", "'Arial Narrow', sans-serif"=>"Arial Narrow", "Century Gothic,
sans-serif"=>"Century Gothic", "Copperplate Gothic Light, sans-serif"=>"Copperplate Gothic Light", "'Courier New', Courier, Monaco, monospace"=>"Courier New", "Georgia, Serif"=>"Georgia", "Gill Sans MT, sans-serif"=>"Gill Sans", "Impact, Charcoal, sans-serif"=>"Impact", 
"'Lucida Console', Monaco, monospace"=>"Lucida Console", "'Lucida Sans Unicode', 'Lucida Grande', sans-serif"=>"Lucida Sans Unicode", "'Palatino Linotype', 'Book Antiqua', Palatino, serif"=>"Palatino Linotype", "Tahoma, Geneva, sans-serif"=>"Tahoma", "'Times New Roman', Times, serif"=>"Times New Roman", "'Trebuchet MS', Helvetica, sans-serif"=>"Trebuchet MS", "Verdana, Geneva, sans-serif"=>"Verdana");

$fontsizes=array("8px"=>"8px", "10px"=>"10px", "11px"=>"11px", "12px"=>"12px", "14px"=>"14px", "16px"=>"16px", "18px"=>"18px", "20px"=>"20px","24px"=>"24px","28px"=>"28px","30px"=>"30px","36px"=>"36px", "40px"=>"40px");


	
	$settings = apply_filters('design_settings', $settings,$fonts,$fontsizes);
?>
<style>
	.inside-left, .inside-right {
		width: 48%; float: left;
		margin: 0 5px 0 5px; }
	
	.halfpostbox { margin: 5px 0 5px 0; }
	
	.upload_image_button, .clear_field_button {
		width: auto !important; }
		
	input.farbtastic_color { width: 200px !important; }
	.farbtastic_container { display: none; }
	
	.postbox .inside { display: none; }
</style>
<script>
jQuery(document).ready( function() {
	jQuery('.handlediv').toggle( 
		function() {
			jQuery(this).siblings('.inside').slideDown();
		},
		function() {
			jQuery(this).siblings('.inside').slideUp();
		}
	);
});
</script>
	<div class="wrap meta-box-sortables">
    	<div class="icon32" id="icon-themes"><br></div>
    
        
        <div id="poststuff">
        
           
<h2><?php _e('Edit Theme Style', 'highroller'); ?></h2>
<p><?php _e('Choose to alter the design and look of your theme.  All css will be saved to your custom.css file in the includes folder.', 'highroller'); ?></p>
<form class="form-wrap" method="post" action="?page=design-options">  
<input type="hidden" name="action" value="save-settings" />    

<div class="inside-left">
<?php 
$toS = ceil(count($settings)/2);
if ($toS<1)$toS=1;

for($j=0;$j<$toS;$j++) : 
	$s = $settings[$j];
	$fields = $s["fields"]; ?>

         <div class="postbox halfpostbox" id="">
              <button type="button" class="handlediv button-link" aria-expanded="false"><span class="screen-reader-text">Toggle panel: <?php echo $s["title"];?></span><span class="toggle-indicator" aria-hidden="true"></span></button>
<h2 class="hndle ui-sortable-handle"><span><?php echo $s["title"];?></span></h2>
            <div class="inside">
                    <?php
                        for ($i=0;$i<count($fields);$i++) {
                            $f = $fields[$i];
                        ?>
                            <div class="form-field form-required">

<?php if (isset($existing_values[$f["slug"]]))  { $myslug = $existing_values[$f["slug"]]; } else { $myslug = '';}  ?>
           
                                <?php design_do_field($f, $myslug); ?>


      
                            </div>
                        <?php
                        }
                    ?>
            </div>                
        </div>
<?php endfor; ?>
</div>
<div class="inside-right">
<?php
for($j=$toS;$j<count($settings);$j++) : 
	$s = $settings[$j];
	$fields = $s["fields"]; ?>

         <div class="postbox halfpostbox" id="quick-settings">
               <button type="button" class="handlediv button-link" aria-expanded="false"><span class="screen-reader-text">Toggle panel: <?php echo $s["title"];?></span><span class="toggle-indicator" aria-hidden="true"></span></button>
<h2 class="hndle ui-sortable-handle"><span><?php echo $s["title"];?></span></h2>
            <div class="inside">
                    <?php
                        for ($i=0;$i<count($fields);$i++) {
                            $f = $fields[$i];
                        ?>
                            <div class="form-field form-required">
                                <?php if (isset($existing_values[$f["slug"]]))  { $myslug = $existing_values[$f["slug"]]; } else { $myslug = '';}  ?>
           
                                <?php design_do_field($f, $myslug); ?>
                            </div>
                        <?php
                        }
                    ?>
            </div>                
        </div>
<?php endfor; ?>
</div>
<div class="clear"></div>
<input type="submit" value="<?php _e('Save Changes', 'highroller'); ?>" accesskey="p" tabindex="5" id="publish" class="button-primary" name="publish">
<input type="submit" name="action" value="<?php _e('Reset to Default', 'highroller'); ?>" class="button-secondary">
</form>
		</div><!--poststuff-->
        
    </div><!--wrap-->

<?php
}


function design_admin_scripts() {
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_register_script('design-upload', get_bloginfo('template_url').'/includes/design-options.js', array('jquery','media-upload','thickbox'));
	wp_enqueue_script('design-upload');
	

}

function design_admin_styles() {
	wp_enqueue_style('thickbox');
	
}

if (isset($_GET['page']) && $_GET['page'] == 'design-options') {
	add_action('admin_print_scripts', 'design_admin_scripts');
	add_action('admin_print_styles', 'design_admin_styles');
}



//END ADMINISTRATION SCREEN



//CSS GENERATION
function design_generate_css()
{
	global $settings;



	$settings = apply_filters('design_settings', $settings);
	$existing_values = @unserialize(get_option('design-options-settings'));		
	if (!is_array($existing_values)) $existing_values = array();
	
	$template = "";
	
	foreach ($settings as $group) {
		$template .= "/* ".$group["title"]." */\n";
		foreach ($group["fields"] as $field) {
			if ($field['type']=='option_select') {
				$value = $existing_values[$field["slug"]];
				$c='';
				
				if ($value!='') {	
					$c= apply_filters('flytonic_save_custom_css', $field['options'][$value], $field);
					//$c= $field['options'][$value];
				}

				if ($c=='') {
						
					$c = $field['options'][$value];	
					}
				
				$template.=$c;
			} else {



				

  if (isset($existing_values[$field["slug"]]))  { $value = $existing_values[$field["slug"]]; } else { $value = '';} 
				
				$c='';
				if(trim($value)!="") {
					$c = apply_filters('flytonic_save_custom_css',stripslashes($value), $field);	
					if ($c=='') {
						//$c = apply_filters('flytonic_save_custom_css',$field["pre"].stripslashes($value).$field["post"]."\n", $field);	

$c = $field["pre"].stripslashes($value).$field["post"]."\n";	
					}
					//$c = $field["pre"].stripslashes($value).$field["post"]."\n";
				}
				$template.=$c;
			}
		}
		$template .= "\n";
	}
	
	if (function_exists('lo_append_to_custom_css')) {
		$template = lo_append_to_custom_css($template);
	}
	

		file_put_contents(get_stylesheet_directory()."/includes/custom.css", $template);

	return $template;
}
//END CSS GENERATION

function ft_colorBrightness($hex, $percent) {
	// Work out if hash given
	$hash = '';
	if (stristr($hex,'#')) {
		$hex = str_replace('#','',$hex);
		$hash = '#';
	}
	/// HEX TO RGB
	$rgb = array(hexdec(substr($hex,0,2)), hexdec(substr($hex,2,2)), hexdec(substr($hex,4,2)));
	//// CALCULATE 
	for ($i=0; $i<3; $i++) {
		// See if brighter or darker
		if ($percent > 0) {
			// Lighter
			$rgb[$i] = round($rgb[$i] * $percent) + round(255 * (1-$percent));
		} else {
			// Darker
			$positivePercent = $percent - ($percent*2);
			$rgb[$i] = round($rgb[$i] * $positivePercent) + round(0 * (1-$positivePercent));
		}
		// In case rounding up causes us to go to 256
		if ($rgb[$i] > 255) {
			$rgb[$i] = 255;
		}
	}
	//// RBG to Hex
	$hex = '';
	for($i=0; $i < 3; $i++) {
		// Convert the decimal digit to hex
		$hexDigit = dechex($rgb[$i]);
		// Add a leading zero if necessary
		if(strlen($hexDigit) == 1) {
		$hexDigit = "0" . $hexDigit;
		}
		// Append to the hex string
		$hex .= $hexDigit;
	}
	return $hash.$hex;
}


?>