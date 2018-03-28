<?php
/*
Template Name: Top Slider
*/

get_header(); ?>


<div id="main" class="container" role="main">

	<div class="wrap">

	<section id="content" class="main-content">

		<!-- Slider -->
		<?php
			$args = array('posts_per_page' => 5,'post_type'=>'slider','orderby'=> 'date','order' => 'desc'	); 
			$myposts = get_posts( $args );

			if (count($myposts)>0) {
			
		?>
		<div class="top-slider">

		<div class="flexslider">
  			<ul class="slides">
			<?php
			foreach ( $myposts as $post ) { setup_postdata( $post );
			?>
			<li>
			<div class="slide-item">
				<div class="banner-image">
					<a href="<?php echo get_post_meta($post->ID,"_slider_url",true);?>">
					<?php echo get_the_post_thumbnail($post->ID,'slideimg', array('class' => 'bannerimg'));?>
					</a>
				</div>
				<div class="banner-content">
					<h2><?php the_title();?></h2>
					<?php the_content();?>
					<a href="<?php echo get_post_meta($post->ID,"_slider_url",true);?>" class="visbutton lg"><?php echo get_post_meta($post->ID,"_button_text",true);?></a>	
				</div>
			</div>   
    		</li>	

			<?php }  ?>
  	    	  
          	</ul>		
        </div>
        </div>
        <?php } ?>

        <!-- slider close-->


	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
   	<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
									
			<div class="entry-content">

      				<?php the_content();?>

			</div><!--.entry-content-->

		</article>
		
	<?php endwhile; endif; ?>
	
</section> <!--#content-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>