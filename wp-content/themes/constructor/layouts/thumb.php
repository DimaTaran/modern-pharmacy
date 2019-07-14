<?php
/**
 * @package WordPress
 * @subpackage constructor
 */
__('Single', 'constructor'); // required for correct translation
?>
<div id="content" class="box shadow opacity <?php the_constructor_layout_class() ?>">
    <div id="container" >
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <article <?php post_class(); ?> id="post-<?php the_ID() ?>">
                <header class="opacity box thumb">
                    <h1><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute('echo=1'); ?>"><?php the_title(); ?></a></h1>
                </header>
                <div class="entry clear">
                    <?php echo get_the_post_thumbnail(NULL, 'tile-post-thumbnail', array('class'=>'aligncenter')) ?>
                    <?php the_content(__('Читать полностью &raquo;', 'constructor')) ?>
				    <?php wp_link_pages(array('before' => '<p class="pages"><strong>'.__('Pages', 'constructor').':</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
                </div>
                <footer>
                    <?php edit_post_link(__('Edit', 'constructor'), '', ' | '); ?>
                    <?php if (get_constructor_option('content', 'date')) { the_date(); echo ' | '; } ?>
                    <?php if (get_constructor_option('content', 'links', 'category') && count( get_the_category() ) ) : ?>
                        <?php _e('Posted in', 'constructor'); echo ": "; the_category(', '); ?>
                    <?php endif; ?>
                    <?php if (get_constructor_option('content', 'links', 'tags')) { the_tags(__('Tags', 'constructor') . ': ', ', ', ' |'); } ?>
                </footer>
            </article>
        <?php endwhile; ?>
        <?php if (function_exists('wp_pagenavi')) wp_pagenavi(); else get_constructor_navigation(); ?>
    <?php else: get_constructor_nothing(); endif; ?>
    </div><!-- id='container' -->
    <?php get_constructor_sidebar(); ?>
</div><!-- id='content' -->