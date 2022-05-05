<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <title><?php bloginfo( 'name' ); ?></title>
    <?php wp_head() ?>
</head>

<body <?php body_class(); ?>>
<div class="container">
    <header class="site-header">
        <div id="header-title">
            <h1><a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a></h1>
            <h4><?php bloginfo( 'description' ); ?></h4>
        </div>
        <?php wp_nav_menu(['theme_location' => 'primary', 'container' => 'nav']); ?>
        <div id="header-btn">
            <button>Boka här!</button>
        </div>
    </header>