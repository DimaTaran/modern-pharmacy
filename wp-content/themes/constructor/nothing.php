<?php
/**
 * @package WordPress
 * @subpackage Constructor
 */
?>
<article <?php post_class(); ?>>
<?php if (get_bloginfo('language') == 'ru-RU') { ?>
    <h1 class="opacity box center"><a href="#" title="Не найдено">Не найдено</a></h1>
    <p>Извините, по вашему запросу ничего не найдено.</p>
<?php } else { ?>
    <h1 class="opacity box center"><a href="#" title="<?php _e( 'Nothing Found', 'constructor' ); ?>"><?php _e( 'Nothing Found', 'constructor' ); ?></a></h1>
    <p><?php _e('Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'constructor'); ?></p>
<?php } ?>
    <?php get_search_form() ?>
</article>
<script type="text/javascript">
    // focus on search field after it has loaded
    document.getElementById('s') && document.getElementById('s').focus();
</script>