<?php
/**
 * The template for displaying all single posts.
 *
 * 
 */

get_header(); ?>

<div id="main" class="container" role="main">

	<div class="wrap">

	<section id="content" class="main-content">

	<?php while (have_posts()) : the_post(); ?>	
	
		<h1 class="entry-title"><?php the_title(); ?></h1>
		
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">

			
			<?php if (!get_theme_option('bylines-hide-all')) { get_template_part( 'content', 'meta' ); } ?>
		
			<div class="entry-content">

      				<?php the_content();?>
				
				<?php comments_template(); // Get comments template ?>

			</div><!--.entry-content-->

		</article>

        <?php endwhile; ?>
          	
</section> <!--#content-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>