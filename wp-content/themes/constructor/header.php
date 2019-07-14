<?php
/**
 * @package WordPress
 * @subpackage Constructor
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
     <meta charset="UTF-8">
    <title><?php wp_title('&raquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
    <!--[if lt IE 9]>
    <script type="text/javascript" src="<?php echo CONSTRUCTOR_DIRECTORY_URI; ?>/js/html5.js"></script>
    <![endif]-->
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('stylesheet_url'); ?>"/>
    <link rel="stylesheet" type="text/css" media="print" href="<?php echo CONSTRUCTOR_DIRECTORY_URI; ?>/print.css" />
	<link rel="stylesheet" type="text/css" media="only screen and (max-device-width: 480px)" href="<?php echo CONSTRUCTOR_DIRECTORY_URI; ?>/style-480.css" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php wp_get_archives('type=monthly&format=link'); ?>
    <?php wp_head(); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-41796382-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-41796382-1');
</script>

</head>
<body <?php body_class(); ?>>
<div id="body">
   <div id="wrapheader" class="wrapper">
       <header id="header">
            <div style="float: right; margin: 0 70px 5px 0; padding: 5px; border: solid 2px white; background: #EAE9E7;">
                <a href="#" id="header_switcher" style="font-weight: bold;"><img src="/wp-content/themes/constructor/images/calendar.png" style="vertical-align: middle;">
                <?php
                    $out = date('d-M-Y');
                    $month_en = array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');
                    $month = array('янв', 'фев', 'мар', 'апр', 'май', 'июн', 'июл', 'авг', 'сен', 'окт', 'ноб', 'дек');
                    $out = str_replace($month_en, $month, $out);
                    echo  $out;
                ?></a>
                <div style="width: 0; height: 0; position: relative; overflow: visible;">
                    <div id="header_calendar" style="width: 300px; padding: 15px; position: absolute; left: -240px; top: 10px; z-index: 400; background: white; visibility: hidden;">
                        <?php get_calendar(); ?>
                    </div>
                </div>
            </div><br style="clear: both;">
            <script language="JavaScript"><!--
                jQuery(document).ready(function () {
                    jQuery('#header_switcher').click(function() {
                        //jQuery('#header_calendar').show();
                        //jQuery('#header_calendar').slideDown('200');
                        var calendar = document.getElementById('header_calendar');
                        //alert(calendar.style.visibility);
                        if (calendar.style.visibility == 'hidden') {
                            //jQuery('#header_calendar').slideDown('200');
                            calendar.style.visibility = 'visible';
                        } else {
                            //jQuery('#header_calendar').slideUp('200');
                            calendar.style.visibility = 'hidden';
                        }
                    });
                });
            //--></script>
            <?php get_search_form() ?>
            <?php get_constructor_menu() ?>
            <div id="title">
				<?php if (is_home() || is_front_page()) { ?>
					<img src="/wp-content/themes/constructor/images/logo.png" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>" id="logo">
					<h1 id="name"><a href="<?php echo home_url(); ?>/" title="<?php bloginfo('name'); echo " &raquo; "; bloginfo('description');?>"><?php bloginfo('name'); ?></a></h1>
				<?php } else { ?>	
					<a href="<?php echo home_url(); ?>/" title="<?php bloginfo('name'); echo " &raquo; "; bloginfo('description');?>"><img src="/wp-content/themes/constructor/images/logo.png" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>" id="logo"></a>
					<div id="name"><a href="<?php echo home_url(); ?>/" title="<?php bloginfo('name'); echo " &raquo; "; bloginfo('description');?>"><?php bloginfo('name'); ?></a></div>
				<?php } ?>
                <div id="description"><?php bloginfo('description');?></div>
            </div>
       </header>
   </div>
   
   <div id="wrapcontent" class="wrapper">