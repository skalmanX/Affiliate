<?php

if (!function_exists('fly_featured_func')) {
   
  function fly_featured_func($atts,$featcontent) {

         extract(shortcode_atts(array(
		'site' => '',
		'showreview'=>'',

	), $atts));

	$loop = new WP_Query( array( 'post_type' => 'casino', 'posts_per_page' => -1 ) ); 
	$posts = array();
	$all = array();
	foreach ($loop->posts as $p) {			
		if ($p->ID== $site && $site!="")
			$posts[] = $p;
			
		$all[] = $p;
	}
	
	if (count($posts)==0) $posts = $all;	
	shuffle($posts);
	
	$p = $posts[0];

if (!is_array($ret) && $ret !="") {
} else {

$redirectslug=fly_redirect_slug();
 $rating=get_post_meta($p->ID,"_as_rating",true)*20;

 $_tc_enable = (get_post_meta($p->ID,"_tc_enable",true)) ?: '';
 $_tc_link 	= (get_post_meta($p->ID,"_tc_link",true)) ?: '#'; 
 $_tc_text 	= (get_post_meta($p->ID,"_tc_text",true)) ?: ''; 
$ret= '

<div class="featuredsite">
	<div class="featleft">
	<a  '. (get_theme_option('redirect-new-window')!="" ? "target=\"_blank\"" : "") .' href="'. get_bloginfo('url') .'/'. $redirectslug  .'/'. get_post_meta($p->ID,"_as_redirectkey",true)  .'"  >
	
	  '. get_the_post_thumbnail($p->ID,'casino-logo',array('class' => 'logocomp')).'
	
	</a>
	</div>
	<div class="featright">
		<div class="feat_heading">
		<h4><a  '. (get_theme_option('redirect-new-window')!="" ? "target=\"_blank\"" : "") .' href="'. get_bloginfo('url') .'/'. $redirectslug  .'/'. get_post_meta($p->ID,"_as_redirectkey",true)  .'" >' . get_the_title($p->ID) . '</a></h4>
		<span class="rate ratecen"> <span class="ratetotal" style="width: '.$rating.'%"></span></span>
		</div>
		<div class="featright_bottom">
			<div class="featbleft">
				<span  class="hilite">'. get_post_meta($p->ID,"_as_bonustext",true);
				if ($_tc_enable = 'enabled') {
					$ret .= '<a href="' . $_tc_link . '" class="revlink tc">'.__($_tc_text, 'highroller').'</a>';
				}
				$ret .= '</span>
				'.$featcontent.'
				</div>
				<div class="featbright">
					<a  '. (get_theme_option('redirect-new-window')!="" ? "target=\"_blank\"" : "") .' href="'. get_bloginfo('url') .'/'. $redirectslug  .'/'. get_post_meta($p->ID,"_as_redirectkey",true)  .'"  class="visbutton med">'.__('Visit', 'highroller').'</a>';
					
						     if ($showreview!='no') {			 
					$ret .= '<a href="' . get_the_permalink($p->ID) . ' " class="visbutton med gray ">'.__('Review', 'highroller').'</a>';
							 }
				$ret .= '</div>
		</div>
	</div>
	
</div>';
}

return $ret;
}
add_shortcode('featured_casino', 'fly_featured_func');

}

?>