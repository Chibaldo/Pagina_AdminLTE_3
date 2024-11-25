<?php
require_once("../models/Crud.php");

$crud = new Crud();

$usuarios = $crud->getAll("usuarios");
?>

<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      
    <li class="nav-item has-treeview">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-user"></i>
        <p>
          Gestión de Usuarios
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="modulos/lista_usuarios.php" class="nav-link">
            <i class="fas fa-users nav-icon"></i>
            <p>Lista de Usuarios</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="modulos/agregar_usuario.php" class="nav-link">
            <i class="fas fa-user-plus nav-icon"></i>
            <p>Agregar Usuario</p>
          </a>
        </li>
        
        <?php
        require_once(__DIR__ . "/../models/Crud.php");

        $crud = new Crud();

        $usuarios = $crud->getAll("usuarios");

        if ($usuarios) {
            foreach ($usuarios as $usuario) {
                echo "<li class='nav-item'>";
                echo "<a href='modulos/editar_usuario.php?id=" . $usuario['id'] . "' class='nav-link'>";
                echo "<i class='fas fa-user-edit nav-icon'></i>";
                echo "<p>Editar Usuario - " . $usuario['usu_nom'] . "</p>";
                echo "</a>";
                echo "</li>";

                echo "<li class='nav-item'>";
                echo "<a href='modulos/eliminar_usuario.php?id=" . $usuario['id'] . "' class='nav-link'>";
                echo "<i class='fas fa-user-times nav-icon'></i>";
                echo "<p>Eliminar Usuario - " . $usuario['usu_nom'] . "</p>";
                echo "</a>";
                echo "</li>";
            }
        }
        ?>

      </ul>
    </li>
      <li class="nav-item">
        <a href="../views/logout.php" class="nav-link">
          <i class="fas fa-sign-out-alt nav-icon"></i>
          <p>Cerrar Sesión</p>
        </a>
      </li>
      <button class="btn-regresar" onclick="history.back()">Regresar</button>
  </ul>
</nav>
<style>

body{
  font-family: Arial, sans-serif;
    background-color: #f4f4f9;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}
.nav {
  list-style-type: none;
  padding: 0;
  margin: 0;
}

.nav-item {
  margin-bottom: 10px;
}

.nav-link {
  display: flex;
  align-items: center;
  padding: 10px 20px;
  background-color: #ffffff;
  color: #007bff;
  font-size: 30px;
  text-decoration: none;
  border-radius: 5px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  transition: background-color 0.3s ease, color 0.3s ease;
}

.nav-icon {
  margin-right: 10px;
}

.nav-link:hover {
  background-color: #007bff;
  color: #ffffff;
}

.fas {
  font-size: 18px;
}

.nav-link p {
  margin: 0;
}

.nav-link.active {
  background-color: #0056b3;
  color: white;
}

.nav-item a {
  display: block;
  width: 100%;
}

.nav-item:not(:last-child) {
  margin-bottom: 15px;
}

.mt-2 {
  margin-top: 20px;
  padding: 10px;
}

.nav-item a .nav-icon {
  font-size: 18px;
  color: #007bff;
}

.nav-item a:hover .nav-icon {
  color: #ffffff;
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