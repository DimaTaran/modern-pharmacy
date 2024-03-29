<?php
/**
 * @package WordPress
 * @subpackage Constructor
 */
?>
    </div><!-- id='wrapcontent' -->
    <div id="wrapfooter" class="wrapper">
    	<footer id="footer">
    		<?php
            // check active
            if (is_active_sidebar('footer')
                or is_active_sidebar('footer-posts')
                or is_active_sidebar('footer-pages')
                or is_active_sidebar('footer-categories')) {

                echo "<ul>";

                // switch statement for widget place
                switch (true) {
                    case (is_archive() && dynamic_sidebar('footer-categories')):
                        break;
                    case (is_page() && dynamic_sidebar('footer-pages')):
                        break;
                    case (is_single() && dynamic_sidebar('footer-posts')):
                        break;
                    case (dynamic_sidebar('footer')):
                        break;
                    default:
                        // nothing
                        break;
                }

                echo "</ul>";
            }
    	    ?>
        	<p class="clear copy" style="text-align: left; font-weight: bold; color: white;">
            	<?php get_constructor_footer(); ?>
            	<p style="text-align: left; font-weight: bold; color: white;" class="clear copy"><?php get_copyright('2012', '&copy;&nbsp;', '&nbsp;-&nbsp;', '&nbsp;Все права защищены.<br>Журнал «Современная фармация»', true); ?></p>
        	</p>
    	</footer>
	</div>
</div>
<?php wp_footer(); ?>
</body>
</html>