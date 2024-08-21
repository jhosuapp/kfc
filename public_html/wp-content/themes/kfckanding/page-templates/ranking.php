<?php
/*=================
Template Name: ranking
===================*/
?>

<?php get_header('wordpress'); ?>

<!-- Bg -->
<article class="kfc-ranking__bg kfc-ranking__bg--right">
    <img src="<?php echo get_template_directory_uri(); ?>/images/splash-left.png" alt="nube">
</article>
<!-- End Bg -->

<section class="container container--top container--bottom container--logos kfc-ranking">
    <!-- logos top -->
    <article class="logos">
        <picture>
            <img src="<?php echo get_template_directory_uri(); ?>/images/kfc.svg" alt="kfc">
        </picture>
        <picture>
            <img src="<?php echo get_template_directory_uri(); ?>/images/pepsi.png" alt="pepsi">
        </picture>
    </article>
    <!-- End logos top -->
     <article class="kfc-ranking__content custom-fonts">
        <?php echo do_shortcode('[ranking_usuarios]'); ?>
        <!-- <ul>
            <li>
                <p class="frenteNacionalregular">1.</p>
                <p class="frenteNacionalregular">
                    Nombre del participante
                    <div class="point"></div>
                </p>
                <p class="frenteNacionalregular">40</p>
            </li>
            <li>
                <p class="frenteNacionalregular">1</p>
                <p class="frenteNacionalregular">
                    Jehosua Penagos Villafrade Villafrade Villafrade
                    <div class="point"></div>
                </p>
                <p class="frenteNacionalregular">40</p>
            </li>
            <li>
                <p class="frenteNacionalregular">1</p>
                <p class="frenteNacionalregular">
                    Orlando espinel mendoza Villafrade
                    <div class="point"></div>
                </p>
                <p class="frenteNacionalregular">40</p>
            </li>
        </ul> -->
       
     </article>
     <article class="kfc-ranking__icon">
        <img src="<?php echo get_template_directory_uri(); ?>/images/kfc-logo.png" alt="">
     </article>
     <article class="kfc-ranking__bg-montuain">
        <picture>
            <img src="<?php echo get_template_directory_uri(); ?>/images/bg-form.png" alt="Kfc pollo">
        </picture>
     </article>
</section>

<!-- Bg -->
<article class="kfc-ranking__bg kfc-ranking__bg kfc-ranking__bg--left">
    <img src="<?php echo get_template_directory_uri(); ?>/images/splash-right.png" alt="nube">
</article>
<!-- End Bg -->