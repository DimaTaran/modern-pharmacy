<?php
/**
 * @package WordPress
 * @subpackage constructor
 */
__('Tile', 'constructor'); // required for correct translation
?>
<div id="content" class="box shadow opacity <?php the_constructor_layout_class('none') ?>">
    <div id="container" class="tile">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <div>
            <article <?php post_class('opacity shadow box'); ?> id="post-<?php the_ID() ?>">
                <header class="opacity tile">
                    <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute('echo=1'); ?>"><?php the_title(); ?></a></h2>
                </header>
                <div class="thumbnail">
                    <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute('echo=1'); ?>">
                    <?php 
                        // try to found post thubmnail
                        if (!($thumb = get_the_post_thumbnail(NULL, 'tile-post-thumbnail'))) {
                            $thumb = get_constructor_noimage();
                        } 
                        echo $thumb;    
                    ?>
                    </a>
                </div>
                <footer class="opacity">
                    <div class="date"><?php the_date() ?></div>
                </footer>
            </article>
            </div>
        <?php endwhile; ?>
        <?php if (function_exists('wp_pagenavi')) wp_pagenavi(); else get_constructor_navigation(); ?>
    <?php else: get_constructor_nothing(); endif; ?>
    </div>
    <?php get_constructor_sidebar(); ?>
</div><!-- id='content' -->