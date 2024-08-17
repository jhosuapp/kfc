<?php
/*=================
Template Name: Usuario registradoOLDTWO
===================*/
$loginaccess = "";
$registracodigo = "active";
if ( is_user_logged_in() ){
    $loginaccess = "";
    $registracodigo = "active";
}else{
    $loginaccess = "active";
    $registracodigo = "";    
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];
    
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
            wp_redirect(home_url());
        }
    }
}

get_header('wordpress');
?>
<style>
    .login{
        display:none;
    }
    .login.active{
        display:block;
    }
    .registracode{
        display:none;
    }
    .registracode.active{
        display:block;
    }
</style>
<section class="login <?php echo $loginaccess;?>">
    <form method="POST">
        <p>
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required>
        </p>
        <p>
            <label for="password">Password: JOSH OCULTEME</label>
            <input type="password" name="password" id="password" required>
        </p>
        <p>
            <button type="submit">Ingresar</button>
        </p>
    </form>
</section>

<section class="registracode <?php echo $registracodigo;?>">
    <?php echo do_shortcode('[registroskfc]'); ?>
</section>



<?php get_footer(); ?>
