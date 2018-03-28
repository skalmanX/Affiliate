<div class="bylines">

<?php //meta 

	if (!get_theme_option('bylines-hide-date')) { ?>
<time class="entry-date date updated" datetime="<?php the_time('o-m-d') ?>"><?php the_time( get_option( 'date_format' ) ); ?></time>

<?php }

 if (!get_theme_option('bylines-hide-author')) { ?> <?php _e('By', 'highroller'); ?>

<span class="vcard author">	
 <span class="fn"><?php the_author_posts_link(); ?></span>
</span>

<?php } ?>   

<?php  if (!get_theme_option('bylines-hide-category')) { ?> &bull;  <?php _e('Posted in', 'highroller'); ?> <?php the_category(', '); }  ?>   

<?php if (!get_theme_option('bylines-hide-comment')) { ?> &bull; <a href="<?php the_permalink(); ?>#comments">   <?php comments_number(); ?></a> <?php } ?>

</div><!--.bylines-->