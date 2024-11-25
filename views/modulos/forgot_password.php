<?php
require_once("../../config/conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $new_password = trim($_POST["new_password"]);
    $confirm_password = trim($_POST["confirm_password"]);

    $conectar = new Conectar();
    $conexion = $conectar->conexion();

    $sql = "SELECT * FROM usuarios WHERE usu_correo = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bindValue(1, $email, PDO::PARAM_STR);
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario) {
        
        if ($new_password === $confirm_password) {
           
            $plain_password = $new_password; 

            
            $sql_update = "UPDATE usuarios SET usu_pass = ? WHERE usu_correo = ?";
            $stmt_update = $conexion->prepare($sql_update);
            $stmt_update->execute([$plain_password, $email]);

            echo "Contraseña actualizada con éxito.";
        } else {
            echo "Las contraseñas no coinciden.";
        }
    } else {
        echo "El correo no está registrado.";
    }
}
?>

<form method="POST" action="">
    <label for="email">Correo Electrónico:</label>
    <input type="email" name="email" required><br><br>

    <label for="new_password">Nueva Contraseña:</label>
    <input type="password" name="new_password" required><br><br>

    <label for="confirm_password">Confirmar Contraseña:</label>
    <input type="password" name="confirm_password" required><br><br>

    <button type="submit">Cambiar Contraseña</button>
    <button class="btn-regresar" onclick="history.back()">Regresar</button>
</form>

<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f9;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}


form {
    background-color: #ffffff;
    padding: 20px 30px;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 400px;
}


form label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
    color: #333333;
}


form input[type="email"],
form input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #cccccc;
    border-radius: 5px;
    font-size: 16px;
    box-sizing: border-box;
}

/* Estilo del botón */
form button {
    width: 100%;
    padding: 10px;
    background-color: #007bff;
    border: none;
    border-radius: 5px;
    color: white;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

form button:hover {
    background-color: #0056b3;
}

form .message {
    font-size: 14px;
    margin-top: 10px;
    color: #ff0000;
    text-align: center;
}

.btn-regresar {
    display: inline-block;
    background-color: #007bff;
    color: white;
    padding: 10px 20px;
    font-size: 16px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-decoration: none;
    transition: background-color 0.3s ease;
    width: 100%; 
    text-align: center; 
    margin-top: 15px; 
}
    </style>