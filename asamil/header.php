<?php
ob_start(function($html){
    $html = preg_replace('/\/\/ (.*)/', '', $html); # 1
    $html = preg_replace('/<!\-{2}[\s\S]*?\-{2}>/', '', $html);
    $html = preg_replace('/<script>\/\/(.*)<\/script>/', '', $html);
    $html = str_replace(array("\r", "\t", "\n", "\n\r", "\r\n"), '', $html);
    $html = preg_replace('/\/\*\*?[\s\S]\*\//', '', $html);
    $html = str_replace(array('  ', '   ', '    '), '', $html);
    $html = str_replace('inputtype', 'input type', $html);
    
    return $html;
});
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title><?php bloginfo('name'); ?></title>

        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        <h1 class="font-semantic"><?php bloginfo('name'); ?></h1>
        <header class="header main-header main-header-desktop main-header-tablet main-header-mobile">
            <div class="wrapper">
                <div class="no-desktop menu-mobile-btn">
                    <button class="btn btn-header">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>

                <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('description'); ?>" class="logo logo-desktop logo-mobile"><?php bloginfo('description'); ?></a>
                
                <?php wp_nav_menu(array(
                    'menu' => 'menu-principal',
                    'container_class' => 'no-mobile menu-principal'
                )); ?>

                <?php wp_nav_menu(array(
                    'menu' => 'menu-mobile',
                    'container_class' => 'no-desktop menu-mobile'
                )); ?>

                <div class="no-desktop">
                    <button class="btn btn-header btn-search">
                        <i class="fas fa-search trigger-searchbar"></i>
                    </button>
                </div>
                
                <div class="search-bar">
                    <?php get_search_form(); ?>
                </div>
            </div>
        </header>