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
?>