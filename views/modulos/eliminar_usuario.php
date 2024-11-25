<?php
require_once("../../models/Crud.php");

if (isset($_GET['id'])) {
    $crud = new Crud();
    $id = $_GET['id'];
    
    // Llamamos al método para desactivar el usuario
    $crud->delete("usuarios", "id", $id);

    echo "Usuario desactivado exitosamente. <a href='lista_usuarios.php'>Volver a la lista</a>";
} else {
    echo "ID de usuario no válido.";
}
?>
