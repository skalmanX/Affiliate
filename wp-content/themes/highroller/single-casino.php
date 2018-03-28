<?php get_header(); ?>

<?php 
// Get Terms and Conditions

$_tc_enable = (get_post_meta($post->ID,"_tc_enable",true)) ?: '';
$_tc_link 	= (get_post_meta($post->ID,"_tc_link",true)) ?: '#'; 
$_tc_text 	= (get_post_meta($post->ID,"_tc_text",true)) ?: '';

?>

<div id="main" class="container" role="main">

	<div class="wrap">


<section id="content" class="main-content" itemscope itemtype="http://schema.org/Review">
<span itemprop="author" itemscope itemtype="http://schema.org/Person">
  		<meta itemprop="name" content="<?php echo get_the_author(); ?>" />
 </span>

 <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
 
 	<div class="reviewouter">
	<div class="reviewtop">
    	<h1><span itemprop="itemReviewed" itemscope itemtype="http://schema.org/Thing"><span itemprop="name"><?php the_title(); ?></span></span></h1>
		
			<span class="rate reviewrate">
	<span class="ratetotal" style="width:<?php echo get_post_meta($post->ID,"_as_rating",true)*20;?>%"></span>
</span>
		<span itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating">
		<span class="ratevalue"><span itemprop="ratingValue"><?php echo get_post_meta($post->ID,"_as_rating",true);?></span> / 5 </span>
		<meta itemprop="bestRating" content="5" />
		<meta itemprop="worstRating" content="1" />
		</span>
	

<meta itemprop="datePublished" content = "<?php the_time('c'); ?>">
<?php $slugkey=fly_redirect_slug(); ?>

    </div>
    <div class="review-topcontent">
	
    	<a   <?php if (get_theme_option('redirect-new-window')) { echo "target=\"_blank\""; }; ?> href="<?php bloginfo('url'); ?>/<?php echo $slugkey; ?>/<?php echo get_post_meta($post->ID,"_as_redirectkey",true);?>/">
		<?php echo get_the_post_thumbnail($post->ID,'casino-logo',array('class' => 'reviewlogo')); ?>
		</a>
	
        <div class="review-middle">
        	<h3><?php echo get_post_meta($post->ID,"_as_bonustext",true); ?></h3>
        	<?php if ($_tc_enable == 'enabled') { ?>
        		<a href="<?php echo $_tc_link ?>" class="revlink tc center"><?php echo __($_tc_text, 'highroller') ?></a>
        	<?php } ?>
        </div>
		
        <div class="review-right">
        	<a  <?php if (get_theme_option('redirect-new-window')) { echo "target=\"_blank\""; }; ?> href="<?php bloginfo('url'); ?>/<?php echo $slugkey; ?>/<?php echo get_post_meta($post->ID,"_as_redirectkey",true);?>/" class="visbutton med" ><?php _e('Visit', 'highroller'); ?></a>
        </div>
    </div>
	
    <div class="rev-cencontent">
  	
		<div class="rev-image-info">
				<a    <?php if (get_theme_option('redirect-new-window')) { echo "target=\"_blank\""; }; ?> href="<?php bloginfo('url'); ?>/<?php echo $slugkey; ?>/<?php echo get_post_meta($post->ID,"_as_redirectkey",true);?>/" >
				<img alt="Screenshot 1" src="<?php if (get_post_meta($post->ID,"_as_thumb1",true)!= ''){ echo get_post_meta($post->ID, '_as_thumb1', true); } else { echo get_post_meta($post->ID, '_as_screen1', true);  } ?>"  />
				</a>
			<a   <?php if (get_theme_option('redirect-new-window')) { echo "target=\"_blank\""; }; ?> href="<?php bloginfo('url'); ?>/<?php echo $slugkey; ?>/<?php echo get_post_meta($post->ID,"_as_redirectkey",true);?>/" class="weburl-link"><?php echo get_post_meta($post->ID,"_as_weburl",true); ?></a>
	
        </div>
		
        <div class="rev-rightcontent">
			<h3><?php the_title(); ?></h3>

				<ul>
			 <?php   
        $features=get_post_meta($post->ID, '_as_features', true); 
        $feat = explode("|", $features);
        for($i = 0; $i < count($feat); $i++){ 
        echo '<li>'. $feat[$i] .'</li>';
        } 
      ?>
				</ul>
				<div class="clearboth"></div>      
        </div>
    </div>
	<div class="rev-widget-pros">
    	<div class="pro-cons-icon"><i class="fa fa-thumbs-up"></i></div>
        <h2><?php _e('Pros', 'highroller'); ?></h2>
			<ul>
			<?php  $pros=get_post_meta($post->ID, '_as_pros', true); 
			$feat = explode("|", $pros);
			  for($i = 0; $i < count($feat); $i++){ ?>
				<li><?php echo $feat[$i]; ?></li>
			 <?php } ?>
	</ul>
	 </div>
    <div class="rev-widget-pros rev-widget-cons">
    	<div class="pro-cons-icon"><i class="fa fa-thumbs-down"></i></div>
        <h2><?php _e('Cons', 'highroller'); ?></h2>
			<ul>      
			<?php $cons=get_post_meta($post->ID, '_as_cons', true); 
			  $feat = explode("|", $cons);
			  for($i = 0; $i < count($feat); $i++){ ?>
				<li><?php echo $feat[$i]; ?></li>
			 <?php } ?> 
	 </ul>
	 </div>
    <div class="bottomrev">
        <h2 class="altheading"><?php the_title(); ?> <?php _e('info', 'highroller'); ?></h2>
          <table class="reviewsummary">
				<tr>
					<th><?php _e('Name', 'highroller'); ?></th>
					<td><?php the_title(); ?></td>
				</tr>
				
				<?php if (get_post_meta($post->ID,"_as_weburl",true) !='') { ?>
				<tr>
					<th><?php _e('Website URL', 'highroller'); ?></th>
					<td><?php echo get_post_meta($post->ID,"_as_weburl",true); ?></td>
				</tr>
				<?php } ?>
				<?php if (get_post_meta($post->ID,"_as_founded",true) !='') { ?>
				<tr>
					<th><?php _e('Established', 'highroller'); ?></th>
					<td><?php echo get_post_meta($post->ID,"_as_founded",true); ?></td>
				</tr>
				<?php } ?>
				<?php if (get_post_meta($post->ID,"_as_location",true) !='') { ?>
					<tr>
					<th><?php _e('Location', 'highroller'); ?></th>
					<td><?php echo get_post_meta($post->ID,"_as_location",true); ?></td>
				</tr>
				
					<?php } ?>
					<?php if (get_post_meta($post->ID,"_as_mindeposit",true) !='') { ?>
					<tr>
					<th><?php _e('Minimum Deposit', 'highroller'); ?></th>
					<td><?php echo get_post_meta($post->ID,"_as_mindeposit",true); ?></td>
				</tr>
				<?php } ?>
				
				<?php if (get_post_meta($post->ID,"_as_support",true) !='') { ?>
					<tr>
					<th><?php _e('Support Options', 'highroller'); ?></th>
					<td><?php echo get_post_meta($post->ID,"_as_support",true); ?></td>
				</tr>
				<?php } ?>
				
					<?php if (get_post_meta($post->ID,"_as_depositopt",true) !='') { ?>
					<tr>
					<th><?php _e('Deposit Options', 'highroller'); ?></th>
					<td><?php echo get_post_meta($post->ID,"_as_depositopt",true); ?></td>
				</tr>
				<?php } ?>
				
				<?php if (get_post_meta($post->ID,"_as_withopt",true) !='') { ?>
					<tr>
					<th><?php _e('Withdrawal Options', 'highroller'); ?></th>
					<td><?php echo get_post_meta($post->ID,"_as_withopt",true); ?></td>
				</tr>
				<?php } ?>
				
				<?php if (get_post_meta($post->ID, '_as_customhinput1', true) != '') { ?>
			<tr>
				<th><?php echo get_post_meta($post->ID, '_as_customhl1', true);?></th>
				<td><?php echo get_post_meta($post->ID, '_as_customhinput1', true);?></td>
			</tr>
			<?php } ?>

			<?php if (get_post_meta($post->ID, '_as_customhinput2', true) != '') { ?>
			<tr>
				<th><?php echo get_post_meta($post->ID, '_as_customhl2', true);?></th>
				<td><?php echo get_post_meta($post->ID, '_as_customhinput2', true);?></td>
			</tr>
			<?php } ?>

			<?php if (get_post_meta($post->ID, '_as_customhinput3', true) != '') { ?>
			<tr>
				<th><?php echo get_post_meta($post->ID, '_as_customhl3', true);?></th>
				<td><?php echo get_post_meta($post->ID, '_as_customhinput3', true);?></td>
			</tr>
			<?php } ?>

			<?php if (get_post_meta($post->ID, '_as_customhinput4', true) != '') { ?>
			<tr>
				<th><?php echo get_post_meta($post->ID, '_as_customhl4', true);?></th>
				<td><?php echo get_post_meta($post->ID, '_as_customhinput4', true);?></td>
			</tr>
			<?php } ?>

			<?php if (get_post_meta($post->ID, '_as_customhinput5', true) != '') { ?>
			<tr>
				<th><?php echo get_post_meta($post->ID, '_as_customhl5', true);?></th>
				<td><?php echo get_post_meta($post->ID, '_as_customhinput5', true);?></td>
			</tr>
			<?php } ?>

				
			</table>

    </div>
</div>

 <div class="entry-content">
 
  <?php the_content();?>

 </div>
 

<?php endwhile; endif;  ?>

<?php comments_template(); // Get comments template ?>

</section> <!--#content-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>