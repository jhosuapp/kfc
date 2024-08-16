document.addEventListener('DOMContentLoaded', function() {
    // Selecciona el campo de entrada para el nombre de usuario
    const usernameInput = document.getElementById('username');
    const usernameCheck = document.getElementById('usernameCheck');

    // Agrega un evento que se dispara cuando el usuario escribe en el campo
    usernameInput.addEventListener('input', function() {
        const username = this.value.trim();

        // Verifica si el campo de usuario no está vacío
        if (username.length > 0) {
            // Crear una nueva solicitud AJAX
            var ajaxUrl = "<?php echo get_template_directory_uri(); ?>/check_username.php";
            const xhr = new XMLHttpRequest();
            xhr.open('POST', ajaxUrl, true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            // Función a ejecutar cuando la solicitud recibe una respuesta
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);
                    
                    // Verifica la respuesta del servidor
                    if (response.exists) {
                        usernameCheck.textContent = 'Este nombre de usuario ya está en uso.';
                        usernameCheck.style.color = 'red';
                    } else {
                        usernameCheck.textContent = 'Nombre de usuario disponible.';
                        usernameCheck.style.color = 'green';
                    }
                }
            };

            // Enviar la solicitud con el nombre de usuario
            xhr.send('username=' + encodeURIComponent(username));
        } else {
            // Limpia el mensaje si el campo está vacío
            usernameCheck.textContent = '';
        }
    });
});