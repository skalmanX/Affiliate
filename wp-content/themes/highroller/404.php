<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * 
 */

get_header(); ?>

<div id="main" class="container" role="main">

	<div class="wrap">

	<section id="content" class="main-content">
		
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">

			<h2 class="entry-title"><?php _e('Page Not Found', 'highroller'); ?></h2>

			<div class="entry-content">

			<p><?php _e('Page not found or has been removed.  Please browse one of our other pages. Search our site below', 'highroller') ; ?></p>
			
			<?php get_search_form(); ?>

			</div><!--.entry-content-->

		</article>
          	
</section> <!--#content-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>