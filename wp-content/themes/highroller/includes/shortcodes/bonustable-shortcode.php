<?php

function fly_bonustable_func($atts) {
	extract(shortcode_atts(array(
		'num' => 10,
		'orderby' => 'menu_order',
		'sort' => 'ASC',
		'tag'=>'',
		'field'=>'',
		'showreview'=>'',
	), $atts));


if ($orderby == 'date'){
	
$loop = new WP_Query( array( 'post_type' => 'casino', 'posts_per_page' => -1, 'orderby'=>'date','order' => 'DESC'  )); 

} elseif ($orderby=='random'){	
	
$loop = new WP_Query( array( 'post_type' => 'casino', 'posts_per_page' => -1, 'orderby'=>'rand', 'order' => 'ASC' ) );   

} elseif ($orderby=='title'){	
	
$loop = new WP_Query( array( 'post_type' => 'casino', 'posts_per_page' => -1, 'orderby'=>'title', 'order' => 'ASC' ) );   

} else if ($orderby == 'menu_order') {

$loop = new WP_Query( array( 'post_type' => 'casino', 'posts_per_page' => -1, 'order'=>$sort, 'orderby'=>'menu_order' )); 

} else {

$loop = new WP_Query( array( 'post_type' => 'casino', 'posts_per_page' => -1, 'order'=>$sort, 'orderby'=>'meta_value_num', 'meta_key'=>$orderby ) );

}

	$i=0;
	$posts = array();
	foreach ($loop->posts as $p) {
		if ($i>=$num) continue;
		
		if ($tag!='' && !has_term($tag, 'casino-tags', $p)) continue;
		$custom = get_post_custom($p->ID);	
		
		$posts[] = $p;
		$i++;
	}


$redirectslug=fly_redirect_slug();



$ret = '
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
		  
         $ret .= ' <th  class="visitcol">'.__('Visit', 'highroller').'</th>
        </tr>
';
$x=0;
global $post;
$opost = $post;
foreach ($posts as $post) :
	setup_postdata($post); 
$x=$x+1;

// Get Terms and Conditions

$_tc_enable = (get_post_meta($post->ID,"_tc_enable",true)) ?: '';
$_tc_link 	= (get_post_meta($post->ID,"_tc_link",true)) ?: '#'; 
$_tc_text 	= (get_post_meta($post->ID,"_tc_text",true)) ?: ''; 
$ret .= '

<tr><td class="rankcol"><span class="rankcir">'.$x.'</span></td>
         <td class="casinocol"><a '. (get_theme_option('redirect-new-window')!="" ? "target=\"_blank\"" : "") .' href="'. get_bloginfo('url') .'/'. $redirectslug  .'/'. get_post_meta($post->ID,"_as_redirectkey",true)  .'">
		  '. get_the_post_thumbnail($post->ID,'casino-logo',array('class' => 'logocomp')).'
			</a>
		</td>
        <td><span class="hilite">'. get_post_meta($post->ID,"_as_bonustext",true)  .'</span>';

        if ($_tc_enable = 'enabled') {
            $ret .= '<a href="' . $_tc_link . '" class="revlink tc center">'.__($_tc_text, 'highroller').'</a>';
        }

        $ret .= '</td>
		
        <td class="depcol">';
		
			 if ($field=='payout') {			 
				$ret .= '  '. get_post_meta($post->ID,"_as_payout",true) .' %';
			 } else if ($field=='bonuscode') {		
				$ret .= '  '. get_post_meta($post->ID,"_as_bonuscode",true) .'';
			 } else if ($field=='mindep') {		
				$ret .= ' '. get_post_meta($post->ID,"_as_mindeposit",true) .'';
			 } else {
				$ret .= '<span class="rate ratecen"> <span class="ratetotal" style="width: '. get_post_meta($post->ID,"_as_rating",true)*20 .'%"></span></span>';
			 }  
		
	
		$ret .= '</td>

        <td class="visitcol"><a '. (get_theme_option('redirect-new-window')!="" ? "target=\"_blank\"" : "") .' href="'. get_bloginfo('url') .'/'. $redirectslug  .'/'. get_post_meta($post->ID,"_as_redirectkey",true)  .'" class="visbutton">'.__('Visit', 'highroller').'</a>';
		
		     if ($showreview!='no') {			 
			$ret .= ' <a href="' . get_permalink() . '" class="revlink">'.__('Review', 'highroller').'</a>';
		 }
    
	$ret .= '</td></tr>
';

endforeach;
$post = $opost;

 $ret .='</table>';
 

 return $ret;

}

add_shortcode('bonustable', 'fly_bonustable_func');

?>