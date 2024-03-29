<?php
/*
Template Name: Parent Page
*/
/**
 * @package WordPress
 * @subpackage Constructor
 */

get_header(); ?>
<div id="content" class="box shadow opacity <?php the_constructor_layout_class() ?>">
    <div id="container">
        <?php while (have_posts()) : the_post(); ?>
            <article <?php post_class(); ?> id="post-<?php the_ID() ?>">
                <header class="opacity box">
                    <h1><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('<?php the_title_attribute('echo=1'); ?> to %s', 'constructor'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h1>
                </header>
                <div class="entry">
                    <?php the_content(__('Читать полностью &raquo;', 'constructor')) ?>
                    <ul>
                        <?php wp_list_pages('title_li=&child_of='.$post->ID); ?>
                    </ul>
                    <?php wp_link_pages(array('before' => '<p class="pages"><strong>'.__('Pages', 'constructor').':</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
                </div>
                <footer>
                    <?php if ($post->post_parent) : $parent_link = get_permalink($post->post_parent); ?>
                    <a href="<?php echo $parent_link; ?>"><?php _e('Back to Parent Page', 'constructor');?></a> |
                    <?php endif; ?>
                    <?php the_date() ?> |
                    <?php the_tags(__('Tags', 'constructor') . ': ', ', ', ' |'); ?>
                    <?php edit_post_link(__('Edit', 'constructor'), '', ' | '); ?>
                    <?php comments_popup_link(__('No Comments &#187;', 'constructor'), __('1 Comment &#187;', 'constructor'), __('% Comments &#187;', 'constructor'), 'comments-link', __('Comments Closed', 'constructor') ); ?>
                </footer>
            </article>
        <?php endwhile; ?>
    </div><!-- id='container' -->
    <?php get_constructor_sidebar(); ?>
</div><!-- id='content' -->
<?php get_footer(); ?>

                    