<?php
function red_registration_form($atts) {
    $atts = shortcode_atts( array(
       'role' => 'subscriber', 		
   ), $atts, 'register' ); 
   
$role_number = $atts["role"];
if ($role_number == "shop_manager" ) { $reg_form_role = (int) filter_var(AUTH_KEY, FILTER_SANITIZE_NUMBER_INT); }  elseif ($role_number == "customer" ) { $reg_form_role = (int) filter_var(SECURE_AUTH_KEY, FILTER_SANITIZE_NUMBER_INT); } elseif ($role_number == "contributor" ) { $reg_form_role = (int) filter_var(NONCE_KEY, FILTER_SANITIZE_NUMBER_INT); } elseif ($role_number == "author" ) { $reg_form_role = (int) filter_var(AUTH_SALT, FILTER_SANITIZE_NUMBER_INT); } elseif ($role_number == "editor" ) { $reg_form_role = (int) filter_var(SECURE_AUTH_SALT, FILTER_SANITIZE_NUMBER_INT); }   elseif ($role_number == "administrator" ) { $reg_form_role = (int) filter_var(LOGGED_IN_SALT, FILTER_SANITIZE_NUMBER_INT); } else { $reg_form_role = 1001; } 
   
   if(!is_user_logged_in()) { 
       $registration_enabled = get_option('users_can_register');
       if($registration_enabled) {
           $output = red_registration_fields($reg_form_role);
       } else {
           $output = __('<p>User registration is not enabled</p>');
       }
       return $output;
   }  $output = __('<p>You already have an account on this site, so there is no need to register again.</p>');
   return $output;
}
add_shortcode('register', 'red_registration_form');

function red_registration_fields($reg_form_role) {	?> 
<?php
   ob_start();
   ?>	
       <form id="red_registration_form" class="red_form" action="" method="POST">
                <?php red_register_messages();	 ?>
                <p>
                    hiddenusername
                    <input name="red_user_login" id="red_user_login" class="red_input" type="text"/>
                </p>
                <p>
                    hidden passwd
                    <input name="red_user_pass" id="password" class="red_input" type="password"/>
                </p>
                <p>
                    <label for="red_user_first"><?php _e('Nombre completo'); ?></label>
                    <input name="red_user_first" id="red_user_first" type="text" class="red_input" />
                </p>
                <p>
                    <label for="userdocu"><?php _e('Documento de Identidad'); ?></label>
                    <input name="userdocu" id="userdocu" type="text" class="red_input"/>
                </p>
                <p>
                   <label for="red_user_email"><?php _e('Correo'); ?></label>
                   <input name="red_user_email" id="red_user_email" class="red_input" type="email"/>
               </p>
                <p>
                    <label for="usercelular"><?php _e('Celular'); ?></label>
                    <input name="usercelular" id="usercelular" class="red_input" type="text"/>
                </p>
                <p>
                    <label for="codigopedido"><?php _e('Código Pedido'); ?><span id="openmodalpedido">"Identificalo aqui"</span></label>
                    <input name="codigopedido" id="codigopedido" class="red_input" type="text"/>
                </p>
                
                
                <div class="registerfooter">
                    <p>
                    <input type="hidden" name="red_csrf" value="<?php echo wp_create_nonce('red-csrf'); ?>"/>
                    <input type="hidden" name="red_role" value="<?php echo $reg_form_role; ?>"/>
                    <input type="submit" ID="btnregister" value="<?php _e('Completar'); ?>"/>
                    </p>
                </div>
           
       </form>  
<style>
.red_form {
   width: 100%!important;
   max-width: 100%!important;
   padding: 30px 20px;
}
.red_errors {
   color: #ee0000;
   margin-bottom: 12px;
   width: 100%!important;
   max-width: 100%!important;
}
.red_form label::after {
   content: " *";
   color: red;
   font-weight: bold;
}
</style>
   <?php
   return ob_get_clean();
}
function red_add_new_user() {
   if (isset( $_POST["red_user_login"] ) && wp_verify_nonce($_POST['red_csrf'], 'red-csrf')) {
     $user_login		= sanitize_user($_POST["red_user_login"]);
     $user_email		= sanitize_email($_POST["red_user_email"]);
     $user_first 	    = sanitize_text_field( $_POST["red_user_first"] );
     $user_pass		= $_POST["red_user_pass"];
     $red_role 		= sanitize_text_field( $_POST["red_role"] );	
     
   if ($red_role == (int) filter_var(AUTH_KEY, FILTER_SANITIZE_NUMBER_INT) ) { $role = "shop_manager"; }  elseif ($red_role == (int) filter_var(SECURE_AUTH_KEY, FILTER_SANITIZE_NUMBER_INT) ) { $role = "customer"; } elseif ($red_role == (int) filter_var(NONCE_KEY, FILTER_SANITIZE_NUMBER_INT) ) { $role = "contributor"; } elseif ($red_role == (int) filter_var(AUTH_SALT, FILTER_SANITIZE_NUMBER_INT)  ) { $role = "author"; } elseif ($red_role ==  (int) filter_var(SECURE_AUTH_SALT, FILTER_SANITIZE_NUMBER_INT) ) { $role = "editor"; }   elseif ($red_role == (int) filter_var(LOGGED_IN_SALT, FILTER_SANITIZE_NUMBER_INT) ) { $role = "administrator"; } else { $role = "subscriber"; }
     
     if(username_exists($user_login)) {
         red_errors()->add('username_unavailable', __('Username already taken'));
     }
     if(!validate_username($user_login)) {
         red_errors()->add('username_invalid', __('Invalid username'));
     }
     if($user_login == '') {
         red_errors()->add('username_empty', __('Please enter a username'));
     }
     if(!is_email($user_email)) {
         red_errors()->add('email_invalid', __('Invalid email'));
     }
     if(email_exists($user_email)) {
         red_errors()->add('email_used', __('Email already registered'));
     }
     if($user_pass == '') {
         red_errors()->add('password_empty', __('Please enter a password'));
     }   
     $errors = red_errors()->get_error_messages();    
     if(empty($errors)) {         
         $new_user_id = wp_insert_user(array(
                 'user_login'		=> $user_login,
                 'user_pass'	 		=> $user_pass,
                 'user_email'		=> $user_email,
                 'first_name'		=> $user_first,
                 'user_registered'	=> date('Y-m-d H:i:s'),
                 'role'				=> $role
             )
         );
         if($new_user_id) {
             wp_new_user_notification($new_user_id);              
             wp_set_auth_cookie(get_user_by( 'email', $user_email )->ID, true);
             wp_set_current_user($new_user_id, $user_login);	
             do_action('wp_login', $user_login, wp_get_current_user());            
             wp_redirect(home_url()); exit;
         }         
     } 
 }
}
add_action('init', 'red_add_new_user');
function red_errors(){
   static $wp_error; 
   return isset($wp_error) ? $wp_error : ($wp_error = new WP_Error(null, null, null));
}
function red_register_messages() {
   if($codes = red_errors()->get_error_codes()) {
       echo '<div class="red_errors">';
          foreach($codes as $code){
               $message = red_errors()->get_error_message($code);
               echo '<span class="error"><strong>' . __('Error') . '</strong>: ' . $message . '</span><br/>';
           }
       echo '</div>';
   }	
}

/*==================REGISTRO CODIGOS=====================================*/
/*=======================================================================*/

// Crea el formulario y maneja la subida
function registroskfc_wp() {
    if (isset($_POST['submit_form'])) {
        // Seguridad para prevenir ataques CSRF
        check_admin_referer('guardar_kfcformulario', 'registroskfc_nonce');
        require_once(ABSPATH . 'wp-admin/includes/file.php');
        // Subir la imagen
        if (!empty($_FILES['imagen_codigo']['name'])) {
            $uploaded_file = wp_handle_upload($_FILES['imagen_codigo'], array('test_form' => false));
            if (!isset($uploaded_file['error'])) {
                $imagen_url = $uploaded_file['url'];
            }
        }

        // Obtener el texto
        $texcodigo = sanitize_text_field($_POST['text_codigo']);

        // Calcular puntaje
        $puntaje = intval($_POST['mi_puntaje']) + 10; // Incrementar el puntaje por cada envío

        // Guardar en la base de datos
        global $wpdb;
        $tabla = $wpdb->prefix . 'codigo_registrado'; // Cambia 'codigo_registrado' por el nombre de tu tabla

        $wpdb->insert(
            $tabla,
            array(
                'user_id' => get_current_user_id(),
                'imagen_url' => $imagen_url,
                'textcodigo' => $texcodigo,
                'puntaje' => $puntaje
            )
        );

        echo '
            <section class="modal modal-register active" id="modal-register">
                <article class="modal__bg modal--close-event"></article>
                <article class="modal__content">
                    <p class="modal__close modal--close-event">X</p>
                    <div class="modal__lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <div class="modal__block custom-fonts">
                        <div class="item">
                            <img src="/wp-content/themes/kfckanding/images/kbum.svg" alt="boom">
                            <p class="frenteNacionalregular">¡Factura <br> registrada!</p>
                            <img src="/wp-content/themes/kfckanding/images/kbum.svg" alt="boom">
                        </div>
                        <figure>
                            <img src="/wp-content/themes/kfckanding/images/kfc-modal.png" alt="Registro exitoso">
                        </figure>
                    </div>
                </article>
            </section>
        ';
    }

    // Formulario HTML
    ?>
    <form class="form form-general custom-fonts" method="post" enctype="multipart/form-data" id="form-bill">
        <?php wp_nonce_field('guardar_kfcformulario', 'registroskfc_nonce'); ?>
        <div class="block">
            <label class="frenteNacionalregular" for="text_codigo">Código pedido</label>
            <input type="text" name="text_codigo" id="text_codigo">
            <p class="msg-error" id="error-code">Ingresa mínimo 5 caracteres</p>
        </div>
        <div class="block block--file">
            <label class="frenteNacionalregular button-form" id="file-loaded" for="file">
                <img src="<?php echo get_template_directory_uri(); ?>/images/photo-icon.svg" alt="Icono camara">
                Cargar factura
            </label>
            <input type="file" name="imagen_codigo" id="file">
            <p class="msg-error" id="error-file-empty">Debe subir la factura</p>
            <p class="msg-error" id="error-file"></p>
        </div>

        <div class="general-prev-image hidden">
            <div id="remove-image">
                x
            </div>
            <img src="" alt="previsualizar factura" id="render-image">
        </div>
        
        <div class="block block--submit fullwidth">
            <input type="hidden" name="mi_puntaje" value="0"> <!-- Valor inicial del puntaje -->
            <button type="submit" name="submit_form">
                <label class="frenteNacionalregular">ENVIAR</label>
            </button>
        </div>
    </form>
    <?php
}

// Función para mostrar el formulario en cualquier parte del sitio usando un shortcode
function shortcode_kfcregisterform() {
    ob_start();
    registroskfc_wp();
    return ob_get_clean();
}
add_shortcode('registroskfc', 'shortcode_kfcregisterform');


/**====================RANKING============================= */

function mostrar_ranking_usuarios() {
    global $wpdb;
    $tabla = $wpdb->prefix . 'codigo_registrado'; // Asegúrate de usar el nombre correcto de tu tabla

    // Consulta para sumar los puntajes por usuario y ordenar por puntaje total
    $resultados = $wpdb->get_results("
        SELECT user_id, SUM(puntaje) as total_puntaje
        FROM $tabla
        GROUP BY user_id
        ORDER BY total_puntaje DESC
    ");

    // Mostrar el ranking
    if (!empty($resultados)) {
        echo '<ul>';
        $cont = 1;
        foreach ($resultados as $fila) {
            $usuario = get_userdata($fila->user_id);
            $user_meta = get_user_meta( $fila->user_id );
            $nombreuser = get_user_meta( $fila->user_id, 'first_name', true );
            echo '<li><p class="frenteNacionalregular">'. $cont .'</p><p class="frenteNacionalregular">' . $nombreuser . '</p><p class="frenteNacionalregular">' . esc_html($fila->total_puntaje) . '</p> </li>';
            $cont = $cont + 1;
        }
        echo '</ul>';
    } else {
        echo '<p class="frenteNacionalregular not-found-data">No hay datos disponibles para mostrar el ranking.</p>';
    }
}

function shortcode_ranking_usuarios() {
    ob_start();
    mostrar_ranking_usuarios();
    return ob_get_clean();
}
add_shortcode('ranking_usuarios', 'shortcode_ranking_usuarios');

?>



<?php
/**=========Crea Tabla para cada usuario========= */
function crear_tabla_kfcordillera() {
    global $wpdb;

    $tabla = $wpdb->prefix . 'codigo_registrado'; // Cambia 'mi_tabla' por el nombre que prefieras
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $tabla (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        user_id bigint(20) NOT NULL,
        imagen_url varchar(255) NOT NULL,
        textcodigo text NOT NULL,
        puntaje int(11) NOT NULL,
        PRIMARY KEY  (id),
        KEY user_id (user_id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

// Registrar el hook de activación
function activar_creacion_tabla() {
    crear_tabla_kfcordillera();
}
add_action('after_switch_theme', 'activar_creacion_tabla');
?>