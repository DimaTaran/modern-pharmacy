<?php
/**
 * @package WordPress
 * @subpackage constructor
 */
__('List', 'constructor'); // required for correct translation
?>
<div id="content" class="box shadow opacity <?php the_constructor_layout_class() ?>">
    <div id="container" >
    <?php if (have_posts()) : $i = 0; ?>
        <?php while (have_posts()) : the_post();  $i++; ?>
            <article <?php post_class('box list opacity shadow'); ?> id="post-<?php the_ID() ?>">
                <header class="list""">
                    <h2>
                        <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute('echo=1'); ?>"><?php the_title(); ?></a>
                    </h2>
    				<div class="date color2"><?php the_date() ?></div>
                </header>
                <div class="entry clear">
                    <?php the_post_thumbnail( 'list-post-thumbnail', array('class' => 'thumb alignleft') ); ?>
    				<?php the_content(__('Читать полностью &raquo;', 'constructor')); ?>
                </div>
                <?php if (is_singular()) get_constructor_social() ?>
                <footer></footer>
            </article>
        <?php get_constructor_content_widget($i) ?>
        <?php endwhile; ?>
        <?php if (function_exists('wp_pagenavi')) wp_pagenavi(); else get_constructor_navigation(); ?>
    <?php else: get_constructor_nothing(); endif; ?>
    </div>
    <?php get_constructor_sidebar(); ?>
</div><!-- id='content' -->