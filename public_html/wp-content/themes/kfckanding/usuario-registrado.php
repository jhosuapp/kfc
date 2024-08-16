<?php
/*=================
Template Name: Usuario registrado
===================*/
?>

<?php get_header('wordpress'); ?>
<section>
    <div class="doscol">
        <div class="col">
            <div class="login">
                <form id="usernameForm">
                    <label for="username">Nombre de usuario:</label>
                    <input type="text" id="username" name="username">
                    <span id="usernameCheck"></span>
                    <button type="submit">Registrarse</button>
                </form>


                <?php
                // check_username.php
                if (isset($_POST['username'])) {
                    $username = $_POST['username'];
                    
                    // Conectar a la base de datos
                    $conn = new mysqli('localhost', 'usuario_db', 'password_db', 'nombre_db');
                    
                    if ($conn->connect_error) {
                        die('Conexión fallida: ' . $conn->connect_error);
                    }
                    
                    $stmt = $conn->prepare("SELECT COUNT(*) FROM usuarios WHERE username = ?");
                    $stmt->bind_param('s', $username);
                    $stmt->execute();
                    $stmt->bind_result($count);
                    $stmt->fetch();
                    
                    $response = array('exists' => $count > 0);
                    
                    echo json_encode($response);
                    
                    $stmt->close();
                    $conn->close();
                }
                ?>





            </div>
            <div class="registracode">            
                <?php echo do_shortcode('[registroskfc]'); ?>
            </div>
        </div>
        <div class="col logocordillera">
            <img src="<?php echo get_template_directory_uri(); ?>/images/logocordillera01.svg" alt="">
        </div>
    </div>
</section>
<script>
document.getElementById('usernameForm').addEventListener('submit', function(event) {
    const usernameCheck = document.getElementById('usernameCheck').textContent;
    if (usernameCheck === 'Este nombre de usuario ya está en uso.') {
        event.preventDefault(); // Previene el envío del formulario
        alert('Por favor, elige otro nombre de usuario.');
    }
});

document.getElementById('username').addEventListener('input', function() {
    const username = this.value;
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'check_username.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            const response = JSON.parse(xhr.responseText);
            const usernameCheck = document.getElementById('usernameCheck');
            if (response.exists) {
                usernameCheck.textContent = 'Este nombre de usuario ya está en uso.';
                usernameCheck.style.color = 'red';
            } else {
                usernameCheck.textContent = 'Nombre de usuario disponible.';
                usernameCheck.style.color = 'green';
            }
        }
    };
    xhr.send('username=' + encodeURIComponent(username));
});

</script>


<?php get_footer(); ?>
