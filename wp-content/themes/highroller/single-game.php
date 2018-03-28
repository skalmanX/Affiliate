<?php
/**
 * The template for displaying all single casino reviews
 *
 * 
 */

get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php 

$rate = get_post_meta($post->ID,"_gm_rating",true)*20; 

$redirectkey=fly_redirect_slug(); 
$casino=get_post_meta($post->ID,"_gm_wtp1",true);

?>

	<div id="main" class="contentarea" itemscope itemtype="http://schema.org/Review">
		<div class="wrap">
	
		<span itemprop="author" itemscope itemtype="http://schema.org/Person">
  		<meta itemprop="name" content="<?php echo get_the_author(); ?>" />
 </span>


	<section id="content" class="main-content">
	
	<div class="game_wrap">

	<h1><span itemprop="itemReviewed" itemscope itemtype="http://schema.org/Thing"><span itemprop="name"><?php the_title(); ?></span></span></h1>
	
	<div class="game_detblock">
	
		<div class="game_detblock_col1">
			<div class="game_screen">
				<?php the_post_thumbnail('casino-logo'); ?>
					<div class="gmrate_area">
					
					<span itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating">
		<span  class="ratevaluegm"><span itemprop="ratingValue"><?php echo get_post_meta($post->ID,"_gm_rating",true);?></span>  <span class="ratevaluegm2">/5</span> </span>
		<meta itemprop="bestRating" content="5" />
		<meta itemprop="worstRating" content="1" />
		</span>
					
						<span class="rate ratecen ">	<span class="ratetotal" style="width:<?php echo get_post_meta($post->ID,"_gm_rating",true)*20; ?>%;"></span></span>
					</div>
			</div>
			<div class="gamefeat_site">
				<div class="left_featgm">
					<a  title="<?php the_title(); ?>" <?php if (get_theme_option('redirect-new-window')) { echo "target=\"_blank\""; }?> href="<?php bloginfo('url'); ?>/<?php echo $redirectkey; ?>/<?php echo get_post_meta($casino,"_as_redirectkey",true);?>/">
				<?php echo get_the_post_thumbnail($casino,'casino-logo'); ?>
					</a>
				</div>
				<div class="right_featgm">
					<span class="bonus_text"><?php echo get_post_meta($casino,"_as_bonustext",true);?></span>
						<a class="visbutton" title="<?php the_title(); ?>" <?php if (get_theme_option('redirect-new-window')) { echo "target=\"_blank\""; }?> href="<?php bloginfo('url'); ?>/<?php echo $redirectkey; ?>/<?php echo get_post_meta($casino,"_as_redirectkey",true);?>/"><?php _e('Play Now', 'highroller'); ?></a>
				</div>
			</div>
			</div>
		
		<div class="game_detblock_col2">
			<h4><?php the_title(); ?> <?php _e('Features', 'highroller'); ?> </h4> 
			<ul class="game_list1">
				 <?php   
        $features=get_post_meta($post->ID, '_gm_gamefeatures', true); 
        $feat = explode("|", $features);
        for($i = 0; $i < count($feat); $i++){ 
        echo '<li>'. $feat[$i] .'</li>';
        } 
      ?>
			</ul>	
			
			<h4><?php the_title(); ?> <?php _e('Information', 'highroller'); ?></h4>
				<ul class="game_list2">
				<?php if( has_term('','gametype-tags') ) { ?>
				<li><span><?php _e('Game Type', 'highroller'); ?>: </span> <?php echo fly_unlinkterm($post->ID,"gametype-tags"); ?></li>
				<?php } ?>
				<?php if( has_term('','gamesoftware-tags') ) { ?>
				<li><span><?php _e('Software', 'highroller'); ?>: </span> <?php echo fly_unlinkterm($post->ID,"gamesoftware-tags"); ?></li>
				<?php } ?>
				<?php if (get_post_meta($post->ID, '_gm_customhinput1', true) != '') { ?>
				<li><span><?php echo get_post_meta($post->ID, '_gm_customhl1', true);?> :</span> <?php echo get_post_meta($post->ID, '_gm_customhinput1', true);?></li>
				<?php } ?>
				
				<?php if (get_post_meta($post->ID, '_gm_customhinput2', true) != '') { ?>
				<li><span><?php echo get_post_meta($post->ID, '_gm_customhl2', true);?> :</span> <?php echo get_post_meta($post->ID, '_gm_customhinput2', true);?></li>
				<?php } ?>
				
				<?php if (get_post_meta($post->ID, '_gm_customhinput3', true) != '') { ?>
				<li><span><?php echo get_post_meta($post->ID, '_gm_customhl3', true);?> :</span> <?php echo get_post_meta($post->ID, '_gm_customhinput3', true);?></li>
				<?php } ?>
				
				<?php if (get_post_meta($post->ID, '_gm_customhinput4', true) != '') { ?>
				<li><span><?php echo get_post_meta($post->ID, '_gm_customhl4', true);?> :</span> <?php echo get_post_meta($post->ID, '_gm_customhinput4', true);?></li>
				<?php } ?>
				
				<?php if (get_post_meta($post->ID, '_gm_customhinput5', true) != '') { ?>
				<li><span><?php echo get_post_meta($post->ID, '_gm_customhl5', true);?> :</span> <?php echo get_post_meta($post->ID, '_gm_customhinput5', true);?></li>
				<?php } ?>
					</ul>
			
			
		</div>
	
	
	</div>
	
	<?php if (get_post_meta($post->ID,"_gm_demogame",true)!='') { ?>
	<div class="game_demoblock">
		<h3 class="altheading"><?php the_title(); ?></h3>
		<div class="game_demoarea">
				<?php echo stripslashes(get_post_meta($post->ID,"_gm_demogame",true)); ?>
		</div>
		<div class="gamedemo_casino">
			<div class="gamedemo_logo">
			<a  title="<?php the_title(); ?>" <?php if (get_theme_option('redirect-new-window')) { echo "target=\"_blank\""; }?> href="<?php bloginfo('url'); ?>/<?php echo $redirectkey; ?>/<?php echo get_post_meta($casino,"_as_redirectkey",true);?>/">
						<?php echo get_the_post_thumbnail($casino,'casino-logo'); ?>
					</a>
			</div>
			<div class="gamedemo_bonus bonus_text">
			<?php echo get_post_meta($casino,"_as_bonustext",true);?>
			</div>
			<div class="gamedemo_play">
			<a  title="<?php the_title(); ?>" <?php if (get_theme_option('redirect-new-window')) { echo "target=\"_blank\""; }?> href="<?php bloginfo('url'); ?>/<?php echo $redirectkey; ?>/<?php echo get_post_meta($casino,"_as_redirectkey",true);?>/" class="visbutton"> <?php _e('Play Now', 'highroller'); ?></a>
			</div>
		</div>
	</div>
	
	<?php } ?>
</div><!--.game_wrap-->
	
<div class="entry-content">
 
  <?php the_content();?>

 	<?php endwhile; endif; ?> 
 </div>

 </section> <!--.content-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>