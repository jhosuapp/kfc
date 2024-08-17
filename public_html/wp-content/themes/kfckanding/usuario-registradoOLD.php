<?php
/*=================
Template Name: Usuario registradoOLD
===================*/
?>
<?php
require_once('wp-load.php'); 

$username = $_GET['usuario'];

// Verificar si el nombre de usuario existe
if (username_exists($username)) {
    $loginaccess = "";
    $registracodigo = "active";
} else {
    $loginaccess = "active";
    $registracodigo = "";
}
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

<?php get_header('wordpress'); ?>

<section>
    <div class="doscol">
        <div class="col">
            <div class="login <?php echo $loginaccess;?>">
                <form id="usernameForm">
                    <label for="username">Documento de identidad:</label>
                    <input type="text" id="username" name="username">
                    <span id="usernameCheck"></span>
                    <div id="checkuser" style="font-size:20px;">Ingresar</div>
                </form>
            </div>
            <div class="registracode <?php echo $registracodigo;?>">            
                <?php echo do_shortcode('[registroskfc]'); ?>
            </div>
        </div>
        <div class="col logocordillera">
            <img src="<?php echo get_template_directory_uri(); ?>/images/logocordillera01.svg" alt="">
        </div>
    </div>
</section>

<script>
document.addEventListener("DOMContentLoaded", function(event) {
    document.getElementById("checkuser").addEventListener("click", urluser);
    function urluser(){
        let usuario = document.getElementById("username");
        var usuarioValue = usuario.value;
        let currenturl = location.protocol + '//' + location.host + location.pathname;
        window.location.replace(currenturl+"?usuario="+usuarioValue);
    }
});
</script>
<?php get_footer(); ?>
