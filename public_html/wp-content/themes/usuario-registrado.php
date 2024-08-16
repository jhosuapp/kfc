<?php
/*=================
Template Name: Usuario registrado
===================*/
?>

<?php get_header('wordpress'); ?>

<section>
    <div class="doscol">
        <div class="col">
            <?php echo do_shortcode('[mi_formulario]'); ?>
        </div>
        <div class="col logocordillera">
            <img src="<?php echo get_template_directory_uri(); ?>/images/logocordillera01.svg" alt="">
        </div>
    </div>
</section>

<?php get_footer(); ?>
