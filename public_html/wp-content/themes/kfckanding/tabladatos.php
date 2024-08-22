<?php
/*=================
Template Name: tabladatos
===================*/

if (isset($_POST['download_csv'])) {
    generar_csv();
}

function generar_csv() {
    global $wpdb;

    // Nombre del archivo y tipo de contenido
    $filename = "usuarios_registrados_" . date('Ymd') . ".csv";
    header("Content-Type: text/csv");
    header("Content-Disposition: attachment;filename=" . $filename);

    // Nombre de la tabla personalizada
    $tabla = $wpdb->prefix . 'codigo_registrado';

    // Obtener los datos de la tabla personalizada
    $resultados = $wpdb->get_results("SELECT * FROM $tabla");

    // Abrir la salida para escribir en el archivo CSV
    $output = fopen('php://output', 'w');

    // Escribir los encabezados del CSV

    fputcsv($output, array('ID usuario','Nombre Completo','Documento Identidad','Correo','Celular','codigo registrado', 'URL de la Imagen', 'Puntaje'));

    if ($resultados) {
        foreach ($resultados as $fila) {
            // Obtener el user_id de cada fila
            $user_id = $fila->user_id;
            $user_info = get_userdata($user_id);
            $nombre_completo = $user_info->first_name;
            $docuser = get_the_author_meta('userdocu', $user_id);
            $usermail = $user_info->user_email;
            $usercelphone = get_the_author_meta('usercelular', $user_id);


            // Escribir cada fila de datos en el CSV
            fputcsv($output, array(
                $user_id,
                $nombre_completo,
                $docuser,
                $usermail,
                $usercelphone,
                $fila->textcodigo,
                $fila->imagen_url,
                $fila->puntaje
            ));
        }
    }

    fclose($output);
    exit();
}

?>

<?php get_header('wordpress'); ?>

<style>
table, th, td {
  border: 1px solid;
  font-size:18px;
}
th, td {
  padding: 15px;
  text-align: left;
}
.landing-container{
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 100%;
}
.landing-container h1{
    font-size:25px;
    margin-bottom:15px;
}
button{
    margin: 20px;
    padding: 12px;
    border-radius: 20px;
    cursor: pointer;
    font-weight: bold;
    border: none;
    font-size: 18px;
}
</style>

<section class="container container--top container--lines kfc-hero">
    <!-- Lines top -->
    <article class="lines">
        <div></div>
        <div></div>
        <div></div>
    </article>
    <!-- End lines top -->
    <article>
        <form method="post">
            <button type="submit" name="download_csv">Descargar CSV</button>
        </form>
    </article>
</section>

<section class="container container--top kfc-message custom-fonts">
<article class="kfc-hero__content">
        <div class="landing-container">
        <h1>Datos de los Usuarios Registrados</h1>
        <table>
            <thead>
                <tr>
                    <th>ID Usuario</th>
                    <th>Nombre Completo</th>
                    <th>Documento Identidad</th>
                    <th>Correo</th>
                    <th>Celular</th>
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
                        $docuser = get_the_author_meta('userdocu', $user_id);
                        $usermail = $user_info->user_email;
                        $usercelphone = get_the_author_meta('usercelular', $user_id);
                        
                        // Mostrar los datos en la tabla
                        echo '<tr>';
                        echo '<td>' . esc_html($user_id) . '</td>';
                        echo '<td>' . esc_html($nombre_completo) . '</td>';
                        echo '<td>' . esc_html($docuser) . '</td>';
                        echo '<td>' . esc_html($usermail) . '</td>';
                        echo '<td>' . esc_html($usercelphone) . '</td>';
                        echo '<td>' . esc_html($fila->textcodigo) . '</td>';
                        echo '<td><a href="' . esc_url($fila->imagen_url) . '" target="_blank">ver factura</a></td>';
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


<?php get_footer(); ?>