<?php
/*
Template Name: Game Listings
*/
?>

<?php get_header(); ?>

<div id="main" class="contentarea">

<div class="wrap">


<section id="content" class="main-content">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
	<?php

$numposts=get_post_meta($post->ID, '_gl_numgames', 'true');
$sortby=get_post_meta($post->ID, '_gl_games_orderby', 'true');

$gtag=get_post_meta($post->ID, '_gl_gamet', 'true'); 
$gtype=get_post_meta($post->ID, '_gl_gametype', 'true'); 

if ($numposts == ''){
$numposts=12;}
?>

   	<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<div class="entry-content">
      				<?php the_content();?>
			</div><!--.entry-content-->
		</article>
	<?php endwhile; endif; ?>

<div class="gamelist_item_container">

	<?php if ( get_query_var('paged') ) {

    $page = get_query_var('paged');
 	$paged = get_query_var('paged');

	} elseif ( get_query_var('page') ) {

    $page = get_query_var('page');
    $paged = get_query_var('page');
	} else {

    $page = 1;
	$paged = 1;

	}

$order='desc';
if ($sortby=='title' || $sortby=='menu_order') {$order='asc';}

if ($sortby=='_gm_rating'){

$args = array(
	'showposts' => $numposts,
	'post_type'=>'game',
	'paged'=>$page,
	'game-tags'=>$gtag,
'gametype-tags'=>$gtype,
'order'=>$order,
'orderby'   => 'meta_value_num',
'meta_key'  => '_gm_rating'

);

} else {

$args = array(
	'showposts' => $numposts,
	'post_type'=>'game',
	'paged'=>$page,
	'game-tags'=>$gtag,
	'gametype-tags'=>$gtype,
	'orderby' =>$sortby,
	'order'=>$order
	
);

}
query_posts($args);   while ( have_posts() ) : the_post();
 ?>
 
 <div class="gamelist_item">
			  
					<div class="gameitem_img">
						<a title="<?php the_title(); ?>" href="<?php the_permalink() ?>">
						<?php the_post_thumbnail('medium');?>
						</a>
					</div>
				
					<a href="<?php the_permalink() ?> " title="<?php the_title(); ?>"> <span><?php the_title(); ?></span></a>
			  
</div>

      
  	<?php endwhile; ?>

</div>	
	
	<?php kriesi_pagination();?> 
	
</section> <!--#content-->

<?php get_sidebar(); ?>


<?php get_footer(); ?>