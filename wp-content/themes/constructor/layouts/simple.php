<?php
/**
 * @package WordPress
 * @subpackage constructor
 */
__('Simple', 'constructor'); // required for correct translation
?>
<div id="content" class="box shadow opacity <?php the_constructor_layout_class() ?>">
    <div id="container" >
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post();?>
            <article <?php post_class('simple'); ?> id="post-<?php the_ID() ?>">
                <header class="simple">
                    <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute('echo=1'); ?>"><?php the_title(); ?></a></h2>
                </header>
                <div class="entry clear">
                	<?php
                        // without "more" link
                        the_content('');
                    ?>
                </div>
                <?php if (is_singular()) get_constructor_social() ?>
                <footer></footer>
            </article>
        <?php endwhile; ?>
        <?php if (function_exists('wp_pagenavi')) wp_pagenavi(); else get_constructor_navigation(); ?>
    <?php else: get_constructor_nothing(); endif; ?>
    </div>
    <?php get_constructor_sidebar(); ?>
</div><!-- id='content' -->
