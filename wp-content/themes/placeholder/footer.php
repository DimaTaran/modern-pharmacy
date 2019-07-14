<?php global $woo_options; ?>
    
	<div id="footer" class="col-full">
	
		<div id="copyright">
		<?php if($woo_options['woo_footer'] == 'true'){
		
				echo '<p>'.stripslashes($woo_options['woo_footer_text']).'</p>';	

		} else { ?>
			<p>&copy; <?php echo date('Y'); ?> <?php bloginfo(); ?>. <?php _e('All Rights Reserved.', 'woothemes') ?> <img class="divider" src="<?php bloginfo('template_directory'); ?>/images/footer-sep.png" width="2" height="19" alt="" /> <a href="<?php $aff = $woo_options['woo_footer_aff_link']; if(!empty($aff)) { echo $aff; } else { echo 'http://www.woothemes.com'; } ?>"><img src="<?php bloginfo('template_directory'); ?>/images/woothemes.png" width="74" height="19" alt="Woo Themes" /></a></p> 
		<?php } ?>
		</div>
				
	</div><!-- /#footer  -->

</div><!-- /#wrapper -->
<?php wp_footer(); ?>
<?php woo_foot(); ?>
</body>
</html>