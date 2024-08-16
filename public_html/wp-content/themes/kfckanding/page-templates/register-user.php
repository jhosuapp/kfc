<?php
/*=================
Template Name: register-user
===================*/
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
        <form class="form form-general custom-fonts" action="" id="form-login">
            <div class="block">
                <label class="frenteNacionalregular" for="#">Documento de identidad</label>
                <input type="text">
            </div>
            <div class="block block--submit fullwidth">
                <button type="submit">
                    <label class="frenteNacionalregular">INGRESAR</label>
                </button>
            </div>
        </form>
        <form class="form form-general custom-fonts hidden" action="" id="form-bill">
            <div class="block">
                <label class="frenteNacionalregular" for="#">Código pedido</label>
                <input type="text">
            </div>
            <div class="block block--file">
                <label class="frenteNacionalregular button-form" id="file-loaded" for="file">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/photo-icon.svg" alt="Icono camara">
                    Cargar factura
                </label>
                <input type="file" name="file" id="file">
            </div>
            <div class="block block--submit fullwidth">
                <button type="submit">
                    <label class="frenteNacionalregular">ENVIAR</label>
                </button>
            </div>
        </form>
        <div class="coronel custom-fonts">
            <picture>
                <img src="<?php echo get_template_directory_uri(); ?>/images/kbum.svg" alt="boom">
            </picture>
            <h1 class="frenteNacionalregular">
                El coronel
                <strong class="frenteNacionalregular">Te lleva al</strong>
                <strong class="frenteNacionalregular">Festival</strong>
                <em class="frenteNacionalregular">Cordillera</em>
                <small>PRO. simón bolívar / Bogotá - Colombia</small>
            </h1>
            <picture>
                <img src="<?php echo get_template_directory_uri(); ?>/images/kbum.svg" alt="boom">
            </picture>
        </div>
    </article>
    <article class="kfc-register-user__bg">
        <picture>
            <img src="<?php echo get_template_directory_uri(); ?>/images/bg-form.png" alt="Kfc pollo">
        </picture>
    </article>
</section>

<!-- Modal -->
<section class="modal modal-register" id="modal-register">
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
                <img src="<?php echo get_template_directory_uri(); ?>/images/kbum.svg" alt="boom">
                <p class="frenteNacionalregular">¡Factura <br> registrada!</p>
                <img src="<?php echo get_template_directory_uri(); ?>/images/kbum.svg" alt="boom">
            </div>
            <figure>
                <img src="<?php echo get_template_directory_uri(); ?>/images/kfc-modal.png" alt="Registro exitoso">
            </figure>
        </div>
    </article>
 </section>