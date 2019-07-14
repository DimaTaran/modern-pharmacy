<?php
/**
 * @package WordPress
 * @subpackage constructor
 */
__('Single', 'constructor'); // required for correct translation
?>
<div id="content" class="box shadow opacity <?php the_constructor_layout_class() ?>">
	<div id="container" >

<?php $args = array('orderby' => 'ID', 'order' => 'ASC', 'include' => '2, 3, 4, 5, 6, 7, 8'); $categories = get_categories( $args ); ?>
<?php //var_dump($categories[6]);
/*
object(stdClass)#2376 (15) {
	["term_id"]=> &string(1) "2" 
	["name"]=> &string(25) "Пульс времени" 
	["slug"]=> &string(13) "pulse-of-time" 
	["term_group"]=> string(1) "0" 
	["term_taxonomy_id"]=> string(1) "2" 
	["taxonomy"]=> string(8) "category" 
	["description"]=> &string(36) "Новости сайта, если " 
	["parent"]=> &string(1) "0" 
	["count"]=> &string(1) "3" 
	["cat_ID"]=> &string(1) "2" 
	["category_count"]=> &string(1) "3" 
	["category_description"]=> &string(36) "Новости сайта, если " 
	["cat_name"]=> &string(25) "Пульс времени" 
	["category_nicename"]=> &string(13) "pulse-of-time" 
	["category_parent"]=> &string(1) "0"
	}
*/
?>

	<div style="text-align: center; position: relative; top: -10px;"><?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("home") ) : ?><?php endif; ?></div>

	<div style="margin: 0 auto; border-radius: 10px; border: solid 1px gray; width: 710px; overflow: hidden;"><?php if(function_exists('wp_content_slider')) { wp_content_slider(); } ?></div>


	<?php query_posts($query_string.'&cat=8&showposts=5'); ?>
	<div class="home_column home_left_column"><h2 class="home_category_header" id="archive"><?php echo
			'<a href="/'
			. $categories[6]->taxonomy . '/' . $categories[6]->category_nicename
			.'" title="'
			. $categories[6]->category_description
			. '">'. $categories[6]->name
			. '</a>'; ?></h2>
    </div><br class="clear">
    <div style="position: relative; height: 300px;">
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); $i++; if ($i > 4) break; ?>
			<article <?php post_class(); ?> id="post-<?php the_ID() ?>"  style="overflow: visible; width: <?php echo (($i > 1)?('220'):('220')); ?>px; position: absolute; top: -30px; left: <?php echo (($i == 0)?(100):(220 * ($i - 1))); ?>px">
				<div class="entry">
					<?php
						if ($i > 0) {
							echo '<h4 style="font-size: 14px;"><a href="'; the_permalink(); echo '" rel="bookmark" style="text-decoration: none;">'; the_title(); echo '</a></h4>';
							the_content('');
						} else {
							//echo '<h4 style="font-size: 14px;"><a href="'; the_permalink(); echo '" rel="bookmark" style="text-decoration: none;">'; the_title(); echo '</a></h4>';
							//echo get_the_post_thumbnail(NULL, array(100, 100), array('class'=>'left', 'style' => 'border-radius: 5px; box-shadow: 1px 1px 5px; padding: 5px;'));
						} ?>
				</div>
			</article>
		<?php endwhile; ?>
	<?php endif; ?>
    </div><br class="clear">


	<?php for ($rubric = 2; $rubric < 8; $rubric++) { ?>

	<?php query_posts($query_string.'&cat='.$rubric.'&showposts=2'); ?>

	<?php
		if (!($rubric % 2)) {
			echo '<div class="home_column home_left_column">';
		} else {
			echo '<div class="home_column home_right_column">';
		}
		echo '<h2 class="home_category_header"><a href="/'
			. $categories[$rubric - 2]->taxonomy . '/' . $categories[$rubric - 2]->category_nicename
			.'" title="'
			. $categories[$rubric - 2]->category_description
			. '">'. $categories[$rubric - 2]->name
			. '</a></h2>';
	?>

	<?php if (have_posts()) : $i = 0; ?>
		<?php while (have_posts()) : the_post(); $i++;
//		get_post(the_ID());
//		var_dump(get_post(the_ID()));
//          echo  get_the_post_thumbnail_url( NULL, array(300, 100));
//            $id = the_ID();
//            $post = get_post($id);
//            var_dump(the_post());
            ?>

            <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
            <div class="container">
                <a href="<?php the_permalink() ?>" rel="bookmark">

                <img src="<?php echo get_the_post_thumbnail_url(NULL, array(400, 100)); ?>" alt="
<!--                --><?php //echo get_post($id)->post_title; ?>
                <?php printf(__('%s', 'constructor'), the_title_attribute('echo=0')); ?>" style="width:100%;">

                <div class="content">
                <h3><?php the_title(); ?></h3>
                    <div class="entry" style="overflow: visible;">
                        <p><?php
                            $content = get_the_content();
//                            var_dump(the_content());
                            $trimmed_content = wp_trim_words( $content, 14, '  ...Далее' );
                            echo $trimmed_content;
//                        $text =  get_the_content();
//                            wp_trim_words( the_content(), 6 );
//                           wp_trim_words( the_content(__('Читать полностью &raquo;', 'constructor')), 6 );
//                           var_dump( $text);
//                            echo the_content(__('Читать полностью &raquo;', 'constructor'));
                            ?>
                        </p>
                        <?php wp_link_pages(array('before' => '<p class="pages"><strong>'.__('Pages', 'constructor').':</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
                    </div>

                </div>
                </a>
                <footer style="text-align: left;">
                    <?php edit_post_link(__('<img src="/wp-content/themes/constructor/images/edit.png">', 'constructor'), '', ' | '); ?>
                    <?php if (get_constructor_option('content', 'links', 'category') && count( get_the_category() ) ) : ?>
                        <?php _e('Posted in', 'constructor'); echo ": "; the_category(', '); echo ' | ';?>
                    <?php endif; ?>
                    <?php if (get_constructor_option('content', 'links', 'tags')) { the_tags(__('Tags', 'constructor') . ': ', ', ', ' |'); } ?>
                </footer>
            </div>
            </article>

<!--				--><?php //echo get_the_post_thumbnail(NULL, array(100, 100), array('class'=>'left')); ?>
<!--				<header class="opacity box">-->
<!--
<?php ////if (get_constructor_option('content', 'date')) { the_date(); echo ', '; } ?>
<!--				</header>-->
<!--				-->








            <?php get_constructor_content_widget($i); //это не нужно ?>
		<?php endwhile; ?>
	<?php endif; ?>

    </div><!-- home-×-comlumn -->

	 <?php } //endfor ?>

	</div><!-- id='container' --><!-- br style="clear: both;" -->
	<?php get_constructor_sidebar(); ?>
</div><!-- id='content' -->
