<?php
require_once("../../models/Crud.php");

$crud = new Crud();


if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $campos = ["usu_nom", "usu_correo", "usu_pass"];
        $valores = [
            $_POST['usu_nom'],
            $_POST['usu_correo'],
            $_POST['usu_pass']
        ];
        $crud->update("usuarios", $campos, $valores, "id", $id);
        echo "Usuario actualizado exitosamente. <a href='lista_usuarios.php'>Volver a la lista</a>";
    } else {

        $usuario = $crud->getById("usuarios", "id", $id);
        
        if ($usuario) {
            ?>
            <h1>Editar Usuario</h1>
            <form method="POST">
                <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
                Nombre: <input type="text" name="usu_nom" value="<?php echo $usuario['usu_nom']; ?>" required><br>
                Email: <input type="email" name="usu_correo" value="<?php echo $usuario['usu_correo']; ?>" required><br>
                Contraseña: <input type="password" name="usu_pass" value="<?php echo $usuario['usu_pass']; ?>"><br>
                <button type="submit">Actualizar</button>
                <button class="btn-regresar" onclick="history.back()">Regresar</button>
            </form>
            <?php
        } else {
            echo "Usuario no encontrado.";
        }
    }
} else {
    echo "ID de usuario no válido.";
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

a {
    color: #007bff;
    text-decoration: none;
    font-weight: bold;
}

a:hover {
    color: #0056b3;
    text-decoration: underline;
}


.message {
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