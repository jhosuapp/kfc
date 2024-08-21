<!DOCTYPE html>
<html <?php language_attributes(); ?> >

<head>

    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title><?php bloginfo( 'name' );  wp_title(); ?></title>
    
    <meta name="generator" content="CD <?php bloginfo( 'version' ); ?>" />
    <meta name="description" content="<?php bloginfo( 'description' ); ?>" />

    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>"/>
    <!--styles-->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css" type="text/css">

    <?php wp_head(); ?>
</head>

<body>
    <?php get_header(); ?>