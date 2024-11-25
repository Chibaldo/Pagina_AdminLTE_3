<?php
class Socialmedia extends Conectar {
    // Método para obtener todas las redes sociales
    public function get_socialmedia() {
        $social = parent::Conexion(); // Conexión a la base de datos
        parent::set_names(); // Configuración de codificación
        $sql = "SELECT * FROM socialmedia";
        $sql = $social->prepare($sql); // Preparar la consulta
        $sql->execute(); // Ejecutar la consulta
        return $sql->fetchAll(PDO::FETCH_ASSOC); // Retornar los resultados
    }

    // Método para obtener una red social por ID
    public function get_socialmediaxid($socmed_id) {
        $social = parent::Conexion();
        parent::set_names();
        $sql = "SELECT * FROM socialmedia WHERE socmed_id = ?";
        $sql = $social->prepare($sql);
        $sql->bindValue(1, $socmed_id); // Asignar el valor del ID
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para insertar una nueva red social
    public function insert_socialmedia($socmed_icono, $socmed_url) {
        $social = parent::Conexion();
        parent::set_names();
        $sql = "INSERT INTO socialmedia (socmed_id, socmed_icono, socmed_url, est)
                VALUES (NULL, ?, ?, 1)";
        $sql = $social->prepare($sql);
        $sql->bindValue(1, $socmed_icono); // Asignar el valor del icono
        $sql->bindValue(2, $socmed_url);   // Asignar el valor de la URL
        $sql->execute();
        return $sql->rowCount(); // Retorna el número de filas afectadas
    }

    // Método para actualizar una red social existente
    public function update_socialmedia($socmed_id, $socmed_icono, $socmed_url) {
        $social = parent::Conexion();
        parent::set_names();
        $sql = "UPDATE socialmedia 
                SET socmed_icono = ?, socmed_url = ?
                WHERE socmed_id = ?";
        $sql = $social->prepare($sql);
        $sql->bindValue(1, $socmed_icono); // Asignar el valor del icono
        $sql->bindValue(2, $socmed_url);   // Asignar el valor de la URL
        $sql->bindValue(3, $socmed_id);    // Asignar el valor del ID
        $sql->execute();
        return $sql->rowCount();
    }

    // Método para eliminar (desactivar) una red social por ID
    public function delete_socialmedia($socmed_id) {
        $social = parent::Conexion();
        parent::set_names();
        $sql = "UPDATE socialmedia 
                SET est = 0
                WHERE socmed_id = ?";
        $sql = $social->prepare($sql);
        $sql->bindValue(1, $socmed_id);
        $sql->execute();
        return $sql->rowCount();
    }
}
?>
