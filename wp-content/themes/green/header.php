<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!-- Wrapper -->
<div id="wrapper">

    <!-- Header -->
    <header id="header">
        <h1><a href="<?php echo home_url(); ?>">GreenTech Solutions</a></h1>
        <nav class="links">
            <?php
            wp_nav_menu([
                'theme_location' => 'primary',
                'container' => 'ul',
            ]);
            ?>
        </nav>
        <div style="display: flex; gap: 10px; align-items: center;">
                <button id="search-button" aria-label="Search" style="background: none; border: none; cursor: pointer;">
                    🔍
                </button>
                <button id="menu-button" aria-label="Menu" style="background: none; border: none; cursor: pointer;">
                    ☰
                </button>
            </div>
    </header>
