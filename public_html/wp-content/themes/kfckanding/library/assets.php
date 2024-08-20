
<?php 
/*:::::::::::::CSS y JS del tema:::::::::::::::::*/
function mainlinks()
{
    // Register styles:
	wp_register_style( 'kfc-fonts', get_template_directory_uri() . '/css/fonts.css?v=' .rand());
	wp_register_style( 'main_style', get_template_directory_uri() . '/css/main.css?v=' .rand());

	 // Register Scripts:
	wp_register_script( 'mainscript', get_template_directory_uri() . '/js/mainscript.js?v=' .rand());
	wp_register_script( 'captcha', 'https://www.google.com/recaptcha/api.js?render=6Ld2aSsqAAAAADblFNxhuzDhtVVsAJh1oVtkNsXl');

	// Add Styles ↓↓:
	wp_enqueue_style( 'kfc-fonts' );
	wp_enqueue_style( 'main_style' );
	
	// Add Scripts ↓↓:
	wp_enqueue_script( 'mainscript' );
	wp_enqueue_script( 'captcha' );
}
add_action( 'wp_enqueue_scripts', 'mainlinks', 5 );//el 5 es la prioridad para no tener conflictos con js genericos de wordpress

/*==========================================================================*/

function my_enqueue_scripts() {
    wp_enqueue_script('my-ajax-script', get_template_directory_uri() . '/js/my-ajax-script.js', array('jquery'), null, true);

    // Localizar la variable ajaxurl para que esté disponible en JavaScript
    wp_localize_script('my-ajax-script', 'ajax_object', array(
        'ajaxurl' => admin_url('admin-ajax.php')
    ));
}
add_action('wp_enqueue_scripts', 'my_enqueue_scripts');

?>