<?php 
/*=======================
template para el Contenido 
por default del single
========================*/
?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <!-- loop, remplazar el schema segun convenga para mejorar el SEO -->
    <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
        <div class="page-header">
            
            
                <h1 class="titulo-page" itemprop="headline"><?php the_title(); ?></h1>
                    <?php // Thumbnail opcional. 
                if ( has_post_thumbnail() ) { 
                    the_post_thumbnail();
                }else{ 
                    echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/img/thumbnail-default.jpg" />'; 
                } 
            ?>
            <span>Publicado: <?php the_time('l F d, Y'); ?> </span>
        </div>
        <section itemprop="articleBody">
            <?php the_content(); ?>
        </section> <!-- end article section -->
        <div class="post-ended">
            <span>escrito por: <?php the_author_posts_link(); ?> </span>
            <?php the_tags('<p class="tags">' , ', ', '</p>'); ?>
        </div> <!-- end article footer -->
        <hr/>
    </article> <!-- end article -->
    <?php comments_template('',true); ?>			
<?php endwhile; ?>				
<?php else : ?>
    <article id="post-not-found">
        <h1>Post No encontrado</h1>
        <section>
            <p>Contenido inexistente</p>
        </section>
    </article>
<?php endif; ?>
<div class="paginador">
    <?php /* VER documentacion para paginador solo de categorias */
        previous_post_link(); ?> / <?php next_post_link(); 
    ?>
</div>