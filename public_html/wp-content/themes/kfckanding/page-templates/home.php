<?php
/*=================
Template Name: HOME
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
                <small class="national">PRQ. simón bolívar / Bogotá - Colombia</small>
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
                <li class="gothicBlack">
                    1 Combo doble dos días
                </li>
                <li class="gothicBlack">
                    13 boletas sencillas por día
                </li>
            </ul>
            <div>
                <p class="national uppercase">*El combo será para el ganador<br> que más <strong class="national bold">número de compras acumule</strong></p>
            </div>
        </div>
    </article>
    <article class="kfc-hero__bg">
        <img src="<?php echo get_template_directory_uri(); ?>/images/bg-hero.png" alt="Fondo kfc">
    </article>
</section>

<section class="container container--no-linear-mobile container--top kfc-message custom-fonts">
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

<section class="container container--top container--bottom kfc-form custom-fonts" id="form-kfc">
    <article>
        <h3 class="center frenteNacionalregular">¿Cómo participar?</h3>
    </article>
    <article class="kfc-form__content">
        <div class="steps">
            <ul>
                <li class="gothicBlack">
                    <strong class="frenteNacionalregular"> PASO 1</strong>: Descarga y regístrate en KFC APP
                </li>
                <li class="gothicBlack image">
                    <strong class="frenteNacionalregular"> PASO 2</strong>
                    <div class="gothicBlack">
                        : Ingresa a <img src="<?php echo get_template_directory_uri(); ?>/images/icon-kfc.png" />
                    </div>
                </li>
                <li class="gothicBlack">
                    <strong class="frenteNacionalregular"> PASO 3</strong>: Pide tu mega variedad XL gaseosa y recoge en tienda
                </li>
                <li class="gothicBlack">
                    <strong class="frenteNacionalregular"> PASO 4</strong>: Diligencia el formulario que encontrarás aquí con tus mismos datos de kfc app
                </li>
                <li class="gothicBlack">
                    <strong class="frenteNacionalregular"> PASO 5</strong>: Ingresa el código de pedido, terminado en 010403
                </li>
            </ul>
             <h4 class="gothicBlack center">
                Entre más compras acumules
            </h4>
            <h3 class="center frenteNacionalregular">
                Más probabilidades<br> tienes de ganar
            </h3>
        </div>
        <div class="home__divider"></div>
        <?php echo do_shortcode('[register]'); ?>
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
