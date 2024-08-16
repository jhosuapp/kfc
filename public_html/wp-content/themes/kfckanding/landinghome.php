<?php
/*=================
Template Name: landinghomen
===================*/
?>

<?php get_header('wordpress'); ?>

<section class="intro">
  <div class="tripartita">
    <div class="col">
      <div class="textvariable">
        <img class="kbum" src="<?php echo get_template_directory_uri(); ?>/images/kbum.svg" alt="">
        <div class="first">El Coronel</div>
        <div class="sec">Te LLeva Al</div>
      </div>
      <img src="<?php echo get_template_directory_uri(); ?>/images/logocordillera01.svg" alt="">
    </div>
    <div class="colmid">
      <img src="<?php echo get_template_directory_uri(); ?>/images/bucket.png" alt="">
    </div>
    <div class="col">
      <div class="textparticipa">
        <div class="text">Participa por Boletas VIP</div>
        <div class="list">
          <ul>
            <li><img src="<?php echo get_template_directory_uri(); ?>/images/fuego.svg" alt="">1 Combo Doble Dos Días</li>
            <li><img src="<?php echo get_template_directory_uri(); ?>/images/fuego.svg" alt="">13 Boletas Sencillas por Día</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="texto-couldbe">
    <p>Tú puedes ser uno de los <span>14 ganadores de boletas VIP</span></p>
  </div>

</section>
<section class="participa">
  <div class="container">
    <div class="titulo">
      <div class="izq"><img src="" alt=""></div>
      <div class="center">
        <h3>¿Como participar?</h3>
      </div>
      <div class="der"><img src="" alt=""></div>
    </div>
    <div class="pasosform">
      <div class="col pasosline">
        <div class="pasos">
          <div class="pasodiv"><img class="image" src="<?php echo get_template_directory_uri(); ?>/images/fuego.svg" alt=""><p><span>PASO 1:</span>Descarga y Regístrate en KFC APP</p></div>
          <div class="pasodiv"><img class="image" src="<?php echo get_template_directory_uri(); ?>/images/fuego.svg" alt=""><p><span>PASO 2:</span>Ingresa a <img class="appimage" src="<?php echo get_template_directory_uri(); ?>/images/kfcexpress.svg" alt=""></p></div>
          <div class="pasodiv"><img class="image" src="<?php echo get_template_directory_uri(); ?>/images/fuego.svg" alt=""><p><span>PASO 3:</span>Pide tu mega variedad XL gaseosa y Recoge en Tienda.</p></div>
          <div class="pasodiv"><img class="image" src="<?php echo get_template_directory_uri(); ?>/images/fuego.svg" alt=""><p><span>PASO 4:</span>Diligencia el Formulario que encontraras aquí con tus mismos datos de KFC APP</p></div>
          <div class="pasodiv"><img class="image" src="<?php echo get_template_directory_uri(); ?>/images/fuego.svg" alt=""><p><span>PASO 5:</span>Ingresa el Código de pedido, terminado en 010403</p></div>
        </div>
        <div class="centervariado">
          <p>Entré más compras acumules,</p>
          <p class="big">Más probabilidades Tienes de ganar</p>
        </div>
        <div class="coronelcool">
          <img src="<?php echo get_template_directory_uri(); ?>/images/coronelh.svg" alt=""> 
        </div>
      </div>
      <div class="col form">
        <?php echo do_shortcode('[register]'); ?>
      </div>
    </div>
  </div>  
</section>
<div id="modal" class="modal modal-codigo">
  <div class="container">
    <div id="closemodal" class="cerrar">X</div>
    <img class="image" src="<?php echo get_template_directory_uri(); ?>/images/codigopedido.png" alt="">
  </div>
</div>
<?php get_footer(); ?>
