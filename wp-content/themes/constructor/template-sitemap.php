<?php
/*
Template Name: Sitemap
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
                    <h2><?php _e('Pages', 'constructor') ?></h2>
                    <ul>
                        <?php wp_list_pages('title_li=' ); ?>
                    </ul>
                    
                    <h2><?php _e('Categories', 'constructor') ?></h2>
                    <ul>
        			    <?php wp_list_categories('title_li=&depth=1&show_count=1'); ?>
                    </ul>
                    
                    <h2><?php _e('Archives', 'constructor') ?></h2>
                    <ul>
                        <?php wp_get_archives('type=monthly&show_post_count=1'); ?>
                    </ul>

                    <?php /*
                    // TODO: last 15 post for each categories
                    foreach (get_categories() as $cat) :
                          query_posts('cat='.$cat->cat_ID);
                    ?>
                    <h3><?php echo $cat->cat_name; ?></h3>
                    <ul>
                            <?php while (have_posts()) : the_post(); ?>
                            <li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>
                            <?php endwhile;  ?>
                    </ul>
					<?php endforeach;*/ ?>
                </div>
                <footer>
                    <?php if($post->post_parent) : $parent_link = get_permalink($post->post_parent); ?>
                    <a href="<?php echo $parent_link; ?>"><?php _e('Back to Parent Page', 'constructor');?></a> |
                    <?php endif; ?>
                    <?php edit_post_link(__('Edit', 'constructor'), '', ''); ?>
                </footer>
            </article>
        <?php endwhile; ?>
    </div><!-- id='container' -->
    <?php get_constructor_sidebar(); ?>
</div><!-- id='content' -->
<?php get_footer(); ?>

                    