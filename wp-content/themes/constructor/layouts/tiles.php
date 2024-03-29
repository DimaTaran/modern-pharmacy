<?php
/**
 * @package WordPress
 * @subpackage constructor
 */
__('Tile', 'constructor'); // required for correct translation
?>
<div id="content" class="box shadow opacity <?php the_constructor_layout_class() ?>">
    <div id="container" >
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <article <?php post_class('tiles'); ?> id="post-<?php the_ID() ?>">
                <h2 class="announce opacity tiles">
                    <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute('echo=1'); ?>">
                        <span class="color4"><?php the_date() ?></span>

                        <?php the_title(); ?>
                    </a>
                </h2>
                <div class="thumbnail">
                   <?php
                        // try to found post thubmnail
                        if (!($thumb = get_the_post_thumbnail(NULL, 'list-post-thumbnail'))) {
                            $thumb = get_constructor_noimage(128,128);
                        }
                        echo $thumb;
                   ?>
                </div>
            </article>
        <?php endwhile; ?>
        <div class="tiles next">
            <?php next_posts_link('&rarr;') ?>
        </div>
    <?php else: get_constructor_nothing(); endif; ?>
    </div>
    <?php get_constructor_sidebar(); ?>
</div><!-- id='content' -->