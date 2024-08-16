<?php get_header('wordpress'); ?>

    <div id="container">
        <p>CONTENIDO</p>
        
        <?php get_template_part('template-parts/content','single');?>

        <p>inicio de sidebar</p>
        <?php get_sidebar(); ?>
        
    </div><!-- fin container -->


<?php get_footer(); ?>