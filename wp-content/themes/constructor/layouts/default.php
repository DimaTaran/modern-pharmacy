<?php
/**
 * @package WordPress
 * @subpackage constructor
 */
__('Default', 'constructor'); // required for correct translation
?>
<div id="content" class="box shadow opacity <?php the_constructor_layout_class() ?>">
    <div id="container" >
    <?php if (have_posts()) : $i = 0; ?>
        <?php while (have_posts()) : the_post(); $i++; ?>
            <article <?php post_class(); ?> id="post-<?php the_ID() ?>">
                <header class="opacity box default">
                    <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute('echo=1'); ?>">
                            <?php the_title(); ?></a></h2>
                </header>
                <div class="entry clear">
                	<?php the_content(__('Читать полностью &raquo;', 'constructor')); ?>
                </div>
                <footer>
                    <?php edit_post_link(__('Edit', 'constructor'), '', ' | '); ?>
<!--                    --><?php //if (get_constructor_option('content', 'date')) { the_date(); echo ' | '; } ?>
                    <?php if (get_constructor_option('content', 'links', 'category') && count( get_the_category() ) ) : ?>
                        <?php _e('Posted in', 'constructor'); echo ": "; the_category(', '); echo ' | ';?>
                    <?php endif; ?>
                    <?php if (get_constructor_option('content', 'links', 'tags')) { the_tags(__('Tags', 'constructor') . ': ', ', ', ' |'); } ?>
                </footer>
            </article>
            <?php get_constructor_content_widget($i) ?>
        <?php endwhile; ?>
        <?php if (function_exists('wp_pagenavi')) wp_pagenavi(); else get_constructor_navigation(); ?>
    <?php else: get_constructor_nothing(); endif; ?>
    </div>
    <?php get_constructor_sidebar(); ?>
</div><!-- id='content' -->
