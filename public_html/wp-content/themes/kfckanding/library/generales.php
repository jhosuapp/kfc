<?php
/*==============menus y widgets========================*/

add_theme_support('nav-menus');

if(function_exists ('register_nav_menus')){
   register_nav_menus(
        array(
            'header-menu' => __( 'Header Menu' ),
            'footer-menu' => __( 'Footer Menu' )
          )
   );
}


/*widgets*/
function widgets_de_tema() {

    register_sidebar( array(
        'name'          => 'widget de sidebar',
        'id'            => 'widget_1',
        'before_widget' => '<div class="widgetdiv">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="titulowidget">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'widgets_de_tema' );
/*======================================*/