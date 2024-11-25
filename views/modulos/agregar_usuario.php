<?php
require_once("../../models/Crud.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $crud = new Crud();
    
    $campos = ["usu_nom", "usu_correo", "usu_apep", "usu_pass", "est"];
    $valores = [
        $_POST['nombre'], 
        $_POST['email'],    
        $_POST['apellido'], 
        $_POST['password'], 
        1   
    ];
    $crud->insert("usuarios", $campos, $valores);
    echo "Usuario agregado exitosamente. <a href='lista_usuarios.php'>Volver a la lista</a>";
} else {
?>
    <h1>Agregar Usuario</h1>
    <form method="POST">
        Nombre: <input type="text" name="nombre" required><br>
        Apellido: <input type="text" name="apellido" required><br>
        Email: <input type="email" name="email" required><br>
        Contraseña: <input type="password" name="password" required><br>
        <button type="submit">Agregar</button>
        <button class="btn-regresar" onclick="history.back()">Regresar</button>
    </form>
<?php
}
?>
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

h1 {
    text-align: center;
    color: #333;
    margin-bottom: 20px;
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

form input[type="text"],
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

/* Estilo para los enlaces */
a {
    color: #007bff;
    text-decoration: none;
    font-weight: bold;
}

a:hover {
    color: #0056b3;
    text-decoration: underline;
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
