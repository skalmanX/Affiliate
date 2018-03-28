<?php
/*
Template Name: Full Width Page
*/
?>
<?php get_header(); ?>

<div id="main" class="container" role="main">

	<div class="wrap">

<section id="content" class="main-content fullwidth">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
   	<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<h1><?php the_title(); ?></h1>

			<div class="entry-content">

      				<?php the_content();?>

			</div><!--.entry-content-->

		</article>
		
	<?php endwhile; endif; ?>

	<?php kriesi_pagination();?> 



<?php get_footer(); ?>