<?php
/*=================
Template Name: landinghomen
===================*/
?>

<?php get_header('wordpress'); ?>

<section class="container container--top container--lines kfc-hero">
    <!-- Lines top -->
    <article class="lines">
        <div></div>
        <div></div>
        <div></div>
    </article>
    <!-- End lines top -->
    <article class="kfc-hero__content">
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
        </div>
        <div class="bucket">
            <img src="<?php echo get_template_directory_uri(); ?>/images/bucket.png" alt="Kfc pollo">
        </div>
        <div class="combo custom-fonts">
            <h2 class="frenteNacionalregular">
                Participa por boletas VIP
            </h2>
            <ul class="frenteNacionalregular">
                <li class="frenteNacionalregular">
                    1 Combo doble dos días
                </li>
                <li class="frenteNacionalregular">
                    13 boletas sencillas por día
                </li>
            </ul>
            <div>
                <p class="gothicBlack">El combo será para el ganador<br> que más <strong class="gothicBlack">número de compras acumule</strong></p>
            </div>
        </div>
    </article>
    <article class="kfc-hero__bg">
        <img src="<?php echo get_template_directory_uri(); ?>/images/bg-hero.png" alt="Fondo kfc">
    </article>
</section>

<section class="container container--top kfc-message custom-fonts">
    <h3 class="center frenteNacionalregular"><strong class="gothicBlack">Tú puedes ser uno de los</strong> 14 ganadores de boletas vip</h3>
</section>

<section class="kfc-splash">
    <picture>
        <img src="<?php echo get_template_directory_uri(); ?>/images/splash-right.png" alt="Nube">
    </picture>
    <picture>
        <img src="<?php echo get_template_directory_uri(); ?>/images/splash-left.png" alt="Nube">
    </picture>
</section>

<section class="container container--top container--bottom kfc-form custom-fonts">
    <article>
        <h3 class="center frenteNacionalregular">¿Cómo participar?</h3>
    </article>
    <article class="kfc-form__content">
        <div class="steps">
            <ul>
                <li class="gothicBlack">
                    <strong class="frenteNacionalregular"> PASO 1</strong>: Descarga y regístrate en KFC APP
                </li>
                <li class="gothicBlack">
                    <strong class="frenteNacionalregular"> PASO 2</strong>: Ingresa a <img src="" />
                </li>
                <li class="gothicBlack">
                    <strong class="frenteNacionalregular"> PASO 3</strong>: Pide tu mega variedad XL gaseosa y recoge en tienda
                </li>
                <li class="gothicBlack">
                    <strong class="frenteNacionalregular"> PASO 4</strong>: Diligencia el formulario que encontrarás aquí con tus mismos datods de kfc app
                </li>
                <li class="gothicBlack">
                    <strong class="frenteNacionalregular"> PASO 5</strong>: Ingresa el código de pedido, terminado en 010403
                </li>
            </ul>
             <h4 class="gothicBlack center">
                Entre más compras acumules
            </h4>
            <h3 class="center frenteNacionalregular">
                Más probablidades<br> tienes de ganar
            </h3>
        </div>
        <?php echo do_shortcode('[register]'); ?> 
        
         <!-- jhosss --
        <form class="form form-general" action="">
            <div class="block">
                <label class="frenteNacionalregular" for="#">Nombre completo</label>
                <input type="text">
            </div>
            <div class="block">
                <label class="frenteNacionalregular" for="#">Documento identidad</label>
                <input type="text">
            </div>
            <div class="block">
                <label class="frenteNacionalregular" for="#">Correo</label>
                <input type="text">
            </div>
            <div class="block">
                <label class="frenteNacionalregular" for="#">Celular</label>
                <input type="text">
            </div>
            <div class="block">
                <label class="frenteNacionalregular" for="#">Código pedido <em class="gothicBlack" id="open-modal">Indetificalo aquí</em></label>
                <input type="text">
            </div>
            <div class="block block--file">
                <label class="frenteNacionalregular button-form" id="file-loaded" for="file">Cargar factura</label>
                <input type="file" name="file" id="file">
            </div>
            <div class="block block--terms mt-5">
                <label for="terms">
                    <input type="checkbox" id="terms" name="terms">
                    Aplican Términos y condiciones. Consúltalos en: <a href="https://www.infokfc.com/promos-colombia-terminos-y-condiciones">https://www.infokfc.com/promos-colombia-terminos-y-condiciones</a>
                </label>
            </div>
            <div class="block block--terms">
                <label for="policies">
                    <input type="checkbox" id="policies" name="policies">
                    Autorizo a KFC Colombia el tratamiento de datos personalos según las políticas de habeas data
                </label>
            </div>
            <div class="block block--submit mt-5">
                <img src="<?php echo get_template_directory_uri(); ?>/images/kbum.svg" alt="Boom">
                <button>
                    <label class="frenteNacionalregular">Completar</label>
                </button>
                <img src="<?php echo get_template_directory_uri(); ?>/images/kbum.svg" alt="Boom">
            </div>
        </form>
        -->
    </article>


    <article class="kfc-form__bg">
        <picture>
            <img src="<?php echo get_template_directory_uri(); ?>/images/kfc.png" alt="Fondo kfc">
        </picture>
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

<?php get_footer(); ?>
