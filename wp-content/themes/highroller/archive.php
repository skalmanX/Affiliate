<?php
/**
 * The template for displaying archive pages.
 *
 * 
 */


get_header(); ?>

<div id="main" class="container" role="main">

	<div class="wrap">

	<section id="content" class="main-content">


	
	<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
             
                <?php if (is_category()) { ?>                                
                      <h1><?php echo single_cat_title(); ?></h1>
                        
                <?php } elseif( is_tag() ) { ?>
                        <h1><?php _e('Posts Tagged:', 'highroller'); ?> <?php single_tag_title(); ?></h1>
                        
                <?php } elseif (is_day()) { ?>
                       <h1><?php _e('Archive for', 'highroller'); ?> <?php echo get_the_date(); ?></h1>
                        
                <?php } elseif (is_month()) { ?>
                        <h1><?php _e('Archive for', 'highroller'); ?> <?php echo get_the_date( _x( 'F Y', 'monthly archives date format', 'highroller' ) ) ?></h1>
                        
                <?php } elseif (is_year()) { ?>
                        <h1><?php _e('Archive for', 'highroller'); ?> <?php echo get_the_date( _x( 'Y', 'yearly archives date format', 'highroller' ) ) ?></h1>
                        
                <?php } elseif (is_search()) { ?>
                      <h1><?php _e('Search Results', 'highroller'); ?></h1>
                        
                <?php } elseif ( is_author() ) { ?>
                        <h1><?php _e('Author Archive', 'highroller'); ?></h1>
                        
                <?php } elseif ( isset($_GET['paged'] ) && !empty( $_GET['paged']) ) { ?>
                        <h1><?php _e('Blog Archives', 'highroller'); ?></h1>
                        
                <?php } ?>
      

	<?php while (have_posts()) : the_post();?>

		
		<article <?php post_class('articleexcerpt') ?> id="post-<?php the_ID(); ?>">

			<?php get_template_part( 'content', 'thumb' ); ?>
	
			<h3><a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
			<?php if (!get_theme_option('bylines-hide-all')) {  get_template_part( 'content', 'meta' );  } ?>
			<?php the_excerpt();?>
		
		</article>

       <?php endwhile; ?> 

<?php kriesi_pagination();?> 
          	
</section> <!--#content-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>