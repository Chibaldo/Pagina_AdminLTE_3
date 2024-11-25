<?php
require_once "../../models/Crud.php";


$crud = new Crud();
$usuarios = $crud->getAll("usuarios"); 

echo "<h1>Lista de Usuarios</h1>";
echo "<table border='1'>";
echo "<tr><th>ID</th><th>Nombre</th><th>Email</th><th>Acciones</th></tr>";
foreach ($usuarios as $usuario) {
    echo "<tr>";
    echo "<td>{$usuario['id']}</td>";
    echo "<td>{$usuario['usu_nom']}</td>";
    echo "<td>{$usuario['usu_correo']}</td>";
    echo "<td>
            <a href='editar_usuario.php?id={$usuario['id']}'>Editar</a> | 
            <a href='eliminar_usuario.php?id={$usuario['id']}'>Eliminar</a>
          </td>";
    echo "</tr>";
}
    
echo "</table>";
?>
<button class="btn-regresar" onclick="history.back()">Regresar</button>
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
    text-align: top;
    color: #333;
    margin-bottom: 40px;
}

table {
    width: 80%;
    margin: 20px auto;
    border-collapse: collapse;
    background-color: #ffffff;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

th, td {
    padding: 10px 15px;
    text-align: left;
    border: 1px solid #cccccc;
}

th {
    background-color: #007bff;
    color: white;
    font-size: 16px;
}

tr:nth-child(even) {
    background-color: #f9f9f9;
}

tr:hover {
    background-color: #f1f1f1;
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

a {
    margin: 0 5px;
    padding: 5px 10px;
    border-radius: 5px;
    border: 1px solid #007bff;
    background-color: #ffffff;
    transition: all 0.3s ease;
}

a:hover {
    background-color: #007bff;
    color: white;
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
    width: 90px 
    text-align: center; 
    margin-top: 15px; 
}
</style>
