<?php
/*=================
Template Name: register-user
===================*/

$loginaccess = "hidden";
$registracodigo = "";
if ( is_user_logged_in() ){
    $loginaccess = "hidden";
    $registracodigo = "";
}else{
    $loginaccess = "";
    $registracodigo = "hidden";    
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = $_POST['username'];
    
        if (username_exists($username)) {
            $creds = array(
                'user_login'    => $username,
                'user_password' => $password,
            );
    
            $user = wp_signon($creds, false);
    
            if (is_wp_error($user)) {
                echo '<div class="error">' . $user->get_error_message() . '</div>';
            } else {
                wp_redirect(site_url( 'usuario-registrado/' ) );// Redirige al inicio después del login
                exit;
            }
        } else {
            wp_redirect('/#form-kfc');
        }
    }
}

?>

<?php get_header('wordpress'); ?>

<section class="container container--top container--lines kfc-register-user container--bottom">
    <!-- Lines top -->
    <article class="lines">
        <div></div>
        <div></div>
        <div></div>
    </article>
    <!-- End lines top -->
    <article class="kfc-register-user__content">
        <form method="POST" class="form form-general custom-fonts <?php echo $loginaccess;?>" id="form-login">
            <div class="block">
                <label class="frenteNacionalregular" for="username">Documento de identidad</label>
                <input type="text" name="username" id="username">
                <p class="msg-error" id="error-document">Ingrese mínimo 5 caracteres</p>
            </div>
            <div class="block block--submit fullwidth mt-5 mt-2-mobile">
                <button type="submit">
                    <label class="frenteNacionalregular">INGRESAR</label>
                </button>
            </div>
        </form>
        <div class="form <?php echo $registracodigo;?>">
            <?php echo do_shortcode('[registroskfc]'); ?>
            <!-- <div class="block block--submit fullwidth">
                <button type="submit">
                    <label class="frenteNacionalregular">ENVIAR</label>
                </button>
            </div> -->
        </div>
        <div class="coronel custom-fonts">
            <picture>
                <img src="<?php echo get_template_directory_uri(); ?>/images/kbum.svg" alt="boom">
            </picture>
            <h1 class="frenteNacionalregular">
                El coronel
                <strong class="frenteNacionalregular">Te lleva al</strong>
                <strong class="frenteNacionalregular">Festival</strong>
                <em class="frenteNacionalregular">Cordillera</em>
                <small class="national">PRQ. simón bolívar / Bogotá - Colombia</small>
            </h1>
            <picture>
                <img src="<?php echo get_template_directory_uri(); ?>/images/kbum.svg" alt="boom">
            </picture>
        </div>
    </article>
    <article class="kfc-ranking__icon kfc-ranking__icon--mobile">
        <img src="<?php echo get_template_directory_uri(); ?>/images/kfc-logo.png" alt="">
     </article>
    <article class="kfc-register-user__bg">
        <picture>
            <img src="<?php echo get_template_directory_uri(); ?>/images/bg-form.png" alt="Kfc pollo">
        </picture>
    </article>
</section>

<!-- Modal -->
<section class="modal" id="modal-instructions">
    <article class="modal__bg modal--close-event"></article>
    <article class="modal__content">
        <picture>
            <img src="<?php echo get_template_directory_uri(); ?>/images/codigopedido.png" alt="factura kfc">
            <p class="modal__close modal--close-event">X</p>
        </picture>
    </article>
 </section>