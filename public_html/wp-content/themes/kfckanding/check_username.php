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
