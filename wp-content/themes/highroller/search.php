<?php get_header(); ?>

<div id="main" class="container" role="main">

	<div class="wrap">

	<section id="content" class="main-content">
	
	
<?php if (have_posts()) : ?>

		<h1><?php _e('Search Result For', 'highroller'); ?> -  <?php /* Search Count */ $allsearch = new WP_Query("s=$s&showposts=-1"); $key = wp_specialchars($s, 1); $count = $allsearch->post_count; _e(''); _e('<span class="search-terms">'); echo $key; _e('</span>'); _e(' &mdash; '); echo $count . ' ';  wp_reset_query(); ?></h1>

		<div class="entry-content">
 <ul>

		<?php while (have_posts()) : the_post(); ?>

				<li><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link to', 'highroller'); ?> <?php the_title_attribute(); ?>"><strong><?php the_title(); ?></strong></a>, <?php the_time('l, F jS, Y') ?></small>
                  </li>

		<?php endwhile; ?>

	</ul>	
	
	</div>

<?php kriesi_pagination();?> 

	<?php else : ?>

		<h1 class="center"><?php _e('No posts found. Try a different search?', 'highroller'); ?></h1>
		<?php include (STYLESHEETPATH. '/searchform.php'); ?>

	<?php endif; ?>

</section> <!--#content-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>