<?php
/*=================
Template Name: tabladatos
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
    <div class="landing-container">
        <h1>Datos de los Usuarios Registrados</h1>
        <table>
            <thead>
                <tr>
                    <th>Nombre Completo</th>
                    <th>codigo</th>
                    <th>Imagen</th>
                    <th>Puntaje</th>
                </tr>
            </thead>
            <tbody>
                <?php
                global $wpdb;

                // Nombre de la tabla personalizada
                $tabla = $wpdb->prefix . 'codigo_registrado';

                // Consulta para obtener los datos
                $resultados = $wpdb->get_results("SELECT * FROM $tabla");

                if ($resultados) {
                    foreach ($resultados as $fila) {
                        // Obtener el user_id de cada fila
                        $user_id = $fila->user_id;

                        // Obtener el nombre completo del usuario desde WordPress
                        $user_info = get_userdata($user_id);
                        $nombre_completo = $user_info->first_name;

                        // Mostrar los datos en la tabla
                        echo '<tr>';
                        echo '<td>' . esc_html($nombre_completo) . '</td>';
                        echo '<td>' . esc_html($fila->texto) . '</td>';
                        echo '<td><img src="' . esc_url($fila->imagen_url) . '" alt="Imagen del usuario" style="max-width: 150px;"/></td>';
                        echo '<td>' . esc_html($fila->puntaje) . '</td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="4">No hay registros disponibles.</td></tr>';
                }
                ?>
            </tbody>
        </table>

        </div>
    </article>
</section>

<section class="container container--top kfc-message custom-fonts">
    <h3 class="center frenteNacionalregular"><strong class="gothicBlack">t</h3>
</section>


<?php get_footer(); ?>