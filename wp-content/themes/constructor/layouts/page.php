<?php
/**
 * @package WordPress
 * @subpackage constructor
 */
__('Single', 'constructor'); // required for correct translation
?>
<div id="content" class="box shadow opacity <?php the_constructor_layout_class() ?>">
    <div id="container">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); global $post; ?>
            <article <?php post_class(); ?> id="post-<?php the_ID() ?>">
                <header class="opacity box page">
                    <h1><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute('echo=1'); ?>"><?php the_title(); ?></a></h1>
                </header>
                <div class="entry clear">
                    <?php the_content(__('Читать полностью &raquo;', 'constructor')) ?>
				    <?php wp_link_pages(array('before' => '<p class="pages"><strong>'.__('Pages', 'constructor').':</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
                </div>
                <footer>
                    <?php edit_post_link(__('Edit', 'constructor'), '', ' | '); ?>
                    <?php if ($post->post_parent) : $parent_link = get_permalink($post->post_parent); ?>
                    <a href="<?php echo $parent_link; ?>"><?php _e('Back to Parent Page', 'constructor');?></a> |
                    <?php endif; ?>
                </footer>
            </article>
        <?php endwhile; ?>
    <?php else: get_constructor_nothing(); endif; ?>
    </div><!-- id='container' -->
    <?php get_constructor_sidebar(); ?>
</div><!-- id='content' -->