<?php

/* Add our function to the widgets_init hook. */
add_action( 'widgets_init', 'fly_post_cat_widget' );

/* Function that registers our widget. */
function fly_post_cat_widget() {
	register_widget( 'fly_post_cat_widg' );
}

class fly_post_cat_widg extends WP_Widget {
	
function __construct() {
		parent::__construct(
			'cat-post', // Base ID
			__( 'Recent Post and Thumbnails by Category', 'highroller' ), // Name
			array( 'description' => __( 'Display recent posts with thumbnail by category.', 'highroller' ), ) // Args
		);
	}		
	
public function widget( $args, $instance ) {
		extract( $args );

		/* User-selected settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		           

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Title of widget (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;

		$align = $instance['gallalign'];

             $loop = new WP_Query( array( 'post_type' => 'post' , 'posts_per_page' => -1, 'orderby'=>'date','order' => 'DESC' ) );
                
		
		$i=0;
		$posts = array();
		foreach ($loop->posts as $p) {
			if ($i>=$instance["numsites"]) continue;
		
			if ($instance['cat']!='' && !has_term($instance['cat'], 'category', $p)) continue;
			if ($instance['tag']!='' && !has_term($instance['tag'], 'post_tag', $p)) continue;

			$custom = get_post_custom($p->ID);
			
			$posts[] = $p;
			$i++;
		}
		
		
?>

<?php


global $post;
$opost = $post;
foreach ($posts as $post) :
	setup_postdata($post); 
$stringtext = get_the_excerpt();
	$stringtext = fly_limit_text($stringtext,155);

 ?>

 <div class="fly_cat <?php if ($align=='Right') { echo 'right'; }?>">
<a title="<?php the_title(); ?>" href="<?php the_permalink() ?>"><?php if ( has_post_thumbnail() ) { the_post_thumbnail('thumbnail',array('class' => 'thumb'));  } ?></a>
<h4><a title="<?php the_title(); ?>" href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
<span><?php echo $stringtext; ?></span>	
</div>

		
<?php endforeach;
$post = $opost;

 ?>

      <?php  
	  
		
		
		/* After widget (defined by themes). */
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags (if needed) and update the widget settings. */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['numsites'] = strip_tags( $new_instance['numsites'] );
		$instance['tag'] = strip_tags( $new_instance['tag'] );
		$instance['cat'] = strip_tags( $new_instance['cat'] );
		$instance['gallalign'] = strip_tags( $new_instance['gallalign'] );

		return $instance;
	}

public function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => 'Latest Posts','numsites' => '5','tag' => '','cat' =>'','gallalign'=>'Left');
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
<p>
<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'highroller'); ?>:</label>
<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" type="text" style="width:100%;" />
</p>

<p>
<label for="<?php echo $this->get_field_id('numsites'); ?>"><?php _e('Number of Posts to Show', 'highroller'); ?>:</label>
<input class="widefat" id="<?php echo $this->get_field_id('numsites'); ?>" name="<?php echo $this->get_field_name('numsites'); ?>" value="<?php echo $instance['numsites']; ?>" type="text" style="width:25px;" />
</p>

<p>
	<label><?php _e('Filter By Category (Optional)', 'highroller'); ?>:</label>
    <?php
		$terms = get_terms('category', array('hide_empty'=>0));
	?>
    <select style="width:60%;" class="widefat" name="<?php echo $this->get_field_name('cat');?>">
    	<option value=""><?php _e('Show All', 'highroller'); ?></option>
    <?php	foreach ($terms as $term) { ?>
    	<option <?php echo ($instance['cat']==$term->term_id?'SELECTED':'');?> value="<?php echo $term->term_id;?>"><?php echo $term->name;?></option>
    <?php  } ?>
    </select>
</p>

<p>
	<label><?php _e('Filter By Tag (Optional)', 'highroller'); ?></label>
    <?php
		$terms = get_terms('post_tag', array('hide_empty'=>0));
	?>
    <select style="width:60%;" class="widefat" name="<?php echo $this->get_field_name('tag');?>">
    	<option value=""><?php _e('Show All', 'highroller'); ?></option>
    <?php	foreach ($terms as $term) { ?>
    	<option <?php echo ($instance['tag']==$term->term_id?'SELECTED':'');?> value="<?php echo $term->term_id;?>"><?php echo $term->name;?></option>
    <?php  } ?>
    </select>
</p>

<p>
	<label><?php _e('Image Align Left or Right', 'highroller'); ?></label>

    <select style="width:60%;" class="widefat" name="<?php echo $this->get_field_name( 'gallalign' ); ?>">
    
    	<option <?php if ($instance['gallalign']== 'Left') { echo "SELECTED"; }?> value="Left"><?php _e('Left', 'highroller'); ?></option>
	<option <?php if ($instance['gallalign']== 'Right') { echo "SELECTED"; }?> value="Right"><?php _e('Right', 'highroller'); ?></option>
 
    </select>
</p>



  <?php
    }
 }

?>