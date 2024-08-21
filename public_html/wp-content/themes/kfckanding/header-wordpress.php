<!DOCTYPE html>
<html <?php language_attributes(); ?> >

<head>

    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php bloginfo( 'name' );  wp_title(); ?></title>
    
    <meta name="generator" content="CD <?php bloginfo( 'version' ); ?>" />
    <meta name="description" content="<?php bloginfo( 'description' ); ?>" />

    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>"/>
    <!--styles-->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css" type="text/css">

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-WQRTDK1J2E"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-WQRTDK1J2E');
    </script>
    <?php wp_head(); ?>
</head>

<body>
    <?php get_header(); ?>