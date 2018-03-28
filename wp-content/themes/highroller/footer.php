	 <div class="clearboth;"></div>
  </div> <!-- End of Wrap -->
	
</div><!--#Main-->

	<?php 

		//Check to See if top footer is hidden or not
		if (!get_theme_option('footer-toparea')) { 

		?>


	<footer id="footer" class="main-footer">
		<div class="wrap">

	
			<?php include(get_template_directory() . '/footerwidgets.php'); ?>
	
		</div><!--.wrap-->
		
	</footer><!--.bottomfooter-->
	
		<?php } ?>

<?php 

		//Check to See if middle footer is hidden or not
		if (!get_theme_option('footer-bottomhide')) { 

	?>

	<footer class="bottomfooter">
	<div class="wrap">
			
		<span>
		<?php if (get_theme_option('copyright-text')) {  echo stripslashes(get_theme_option('copyright-text')); ?>

  		<?php } else { ?>

  		 <?php _e('Copyright ', 'highroller'); ?>&copy; <?php echo(date('Y')); ?>. <?php _e('All Rights Reserved', 'highroller'); ?>. <a href="<?php echo get_option('home'); ?>"><?php bloginfo('name'); ?> </a> 

  		<?php if (!get_theme_option('footer-credit')) { ?>
| <a href="<?php if (get_theme_option('footer-affiliate')) { echo  get_theme_option('footer-affiliate'); } else { ?> http://www.flytonic.com/<?php } ?>">Affiliate WordPress Themes</a> by Flytonic.
  		
  		<?php } ?>
		<?php } ?>
		
		</span>
	</div><!--.wrap-->
		
	</footer><!--.bottomfooter-->

	<?php } ?>	

</div><!--.outerwrap -->


<?php wp_footer(); ?>

	<?php
 
	//Output any footer scripts from theme options panel
	echo trim(stripslashes(get_theme_option('footer-script'))); 

	?>


</body>
</html>