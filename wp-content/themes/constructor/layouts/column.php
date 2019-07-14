<?php
/**
 * @package WordPress
 * @subpackage constructor
 */
__('Column', 'constructor'); // required for correct translation
?>
<div id="content" class="box shadow opacity <?php the_constructor_layout_class('none') ?>">
    <div id="container" class="column">
    <?php
        /* Need three columns, with next layout

            1 | 2 | 3
            4 | 5 | 6
            7 | 8 | ..

         */
        if (have_posts()) :
            global $wp_query;
            $wp_query->post_count;
            for ($col=0; $col < 3; $col++) :
    ?>
        <section>
        <?php
            // start from -1
            for ($i=$col-1; $i < $wp_query->post_count; $i = $i+3) :
                if ($i >= $wp_query->post_count-1) continue;
                $wp_query->current_post = $i;
                the_post();
            ?>
            <article <?php post_class('opacity shadow box'); ?> id="post-<?php the_ID() ?>">
                <header class="opacity column">
                    <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute('echo=1'); ?>"><?php the_title(); ?></a></h2>
                </header>
                <div class="thumbnail">
                    <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute('echo=1'); ?>">
                    <?php 
                        the_post_thumbnail('tile-post-thumbnail');
                    ?>
                    </a>
                </div>
                <div class="entry clear">
                	<?php the_content(''); ?>
                </div>
                <footer>
                    <?php edit_post_link(__('Edit', 'constructor'), '', ' | '); ?>
                    <?php if (get_constructor_option('content', 'date')) { the_date(); echo ' | '; } ?>
                    <?php if (get_constructor_option('content', 'links', 'category') && count( get_the_category() ) ) : ?>
                        <?php _e('Posted in', 'constructor'); echo ": "; the_category(', '); echo ' | ';?>
                    <?php endif; ?>
                </footer>
            </article>
        <?php endfor; ?>
        </section>
        <?php endfor; ?>
        <?php if (function_exists('wp_pagenavi')) wp_pagenavi(); else get_constructor_navigation(); ?>
    <?php else: get_constructor_nothing(); endif; ?>
    </div>
    <?php get_constructor_sidebar(); ?>
</div><!-- id='content' -->