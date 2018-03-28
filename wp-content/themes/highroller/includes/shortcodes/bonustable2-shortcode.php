<?php 

// Adds Bonus Table Shortcode
function fly_bonustable2_func($atts) {
	extract(shortcode_atts(array(
		'site1' => '',
		'site2' => '',
		'site3' => '',
		'site4' => '',
		'site5' => '',
		'site6' => '',
		'site7' => '',
		'site8' => '',
		'site9' => '',
		'site10' => '',
		'field'=>'',
		'showreview'=>'',
	), $atts));

$sites = array ($site1,$site2,$site3,$site4,$site5,$site6,$site7,$site8,$site9,$site10);

$redirectslug=fly_redirect_slug();

$x=0;
$ret = '';
global $post;

$ret='
<table class="comptable">
    <tr class="topcomp">
          <th class="rankcol">'.__('Rank', 'highroller').'</th>
          <th class="casinocol ">'.__('Casino', 'highroller').'</th>
		     <th class="bonuscol">'.__('Bonus', 'highroller').'</th>';
			 
			 if ($field=='payout') {			 
				$ret .= '  <th  class="depcol">'.__('Payout %', 'highroller').'</th>';
			 } else if ($field=='bonuscode') {		
				$ret .= '  <th  class="depcol">'.__('Bonus Code', 'highroller').'</th>';
			 } else if ($field=='mindep') {		
				$ret .= '  <th  class="depcol">'.__('Min. Deposit', 'highroller').'</th>';
			 } else {
				$ret .= '  <th  class="depcol">'.__('Rating', 'highroller').'</th>';
			 }  
		  
         $ret .= ' <th  class="visitcol ">'.__('Visit', 'highroller').'</th>
        </tr>
';

foreach ($sites as $casino) {

if ($casino !='') {

$x=$x+1;

// Get Terms and Conditions

$_tc_enable = (get_post_meta($casino,"_tc_enable",true)) ?: '';
$_tc_link 	= (get_post_meta($casino,"_tc_link",true)) ?: '#'; 
$_tc_text 	= (get_post_meta($casino,"_tc_text",true)) ?: ''; 

$ret .= '


<tr><td class="rankcol"><span class="rankcir">'.$x.'</span></td>
         <td class="casinocol"><a '. (get_theme_option('redirect-new-window')!="" ? "target=\"_blank\"" : "") .' href="'. get_bloginfo('url') .'/'. $redirectslug  .'/'. get_post_meta($casino,"_as_redirectkey",true)  .'">
		  '. get_the_post_thumbnail($casino,'casino-logo',array('class' => 'logocomp')).'
			</a>
		</td>
        <td><span class="hilite">'. get_post_meta($casino,"_as_bonustext",true)  .'</span>';

        if ($_tc_enable = 'enabled') {
        	$ret .= '<a href="' . $_tc_link . '" class="revlink tc center">'.__($_tc_text, 'highroller').'</a>';
        }

        $ret .= '</td>
		
        <td class="depcol">';
		
			 if ($field=='payout') {			 
				$ret .= '  '. get_post_meta($casino,"_as_payout",true) .' %';
			 } else if ($field=='bonuscode') {		
				$ret .= '  '. get_post_meta($casino,"_as_bonuscode",true) .'';
			 } else if ($field=='mindep') {		
				$ret .= ' '. get_post_meta($casino,"_as_mindeposit",true) .'';
			 } else {
				$ret .= '<span class="rate ratecen"> <span class="ratetotal" style="width: '. get_post_meta($casino,"_as_rating",true)*20 .'%"></span></span>';
			 }  
		
	
		$ret .= '</td>

        <td class="visitcol"><a '. (get_theme_option('redirect-new-window')!="" ? "target=\"_blank\"" : "") .' href="'. get_bloginfo('url') .'/'. $redirectslug  .'/'. get_post_meta($casino,"_as_redirectkey",true)  .'" class="visbutton">'.__('Visit', 'highroller').'</a>';
         if ($showreview!='no') {			 
			$ret .= '<a href="' . get_the_permalink($casino) . '" class="revlink">'.__('Review', 'highroller').'</a>';
		 }

		
 $ret .= '</td></tr>
';

} // End of if exists loop

} // End of for loop

 $ret .=' </table> ';
 
 return $ret;
}

add_shortcode('bonustable_fixed', 'fly_bonustable2_func');

?>