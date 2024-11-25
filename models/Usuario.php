<?php
class Usuario extends Conectar {
    public function login() {
        $conectar = parent::Conexion();
        parent::set_names();

        if (isset($_POST["enviar"]) && $_POST["enviar"] == "ok") {
            $correo = $_POST["email"];
            $password = $_POST["password"];

            if (empty($correo) || empty($password)) {
                header("Location:" . Conectar::ruta() . "views/login.php?m=2");
                exit();
            } else {
                $sql = "SELECT * FROM usuarios WHERE usu_correo=? AND usu_pass=? AND est=0";
                $stmt = $conectar->prepare($sql);
                $stmt->bindValue(1, $correo);
                $stmt->bindValue(2, $password);
                $stmt->execute();
                $resultado = $stmt->fetch();

                if (is_array($resultado) && count($resultado) > 0) {
                    $sql_update = "UPDATE usuarios SET est = 1 WHERE id = ?";
                    $stmt_update = $conectar->prepare($sql_update);
                    $stmt_update->bindValue(1, $resultado["id"]);
                    $stmt_update->execute();

                    session_start();
                    $_SESSION["id"] = $resultado["id"];
                    $_SESSION["usu_nom"] = $resultado["usu_nom"];
                    $_SESSION["usu_apep"] = $resultado["usu_apep"];
                    $_SESSION["usu_correo"] = $resultado["usu_correo"];

                    header("Location:" . Conectar::ruta() . "views/home.php");
                    exit();
                } else {
                    header("Location:" . Conectar::ruta() . "views/login.php?m=1");
                    exit();
                }
            }
        }
    }
    public function actualizarEstado($idUsuario, $nuevoEstado) {
        try {
            $conexion = $this->conexion();
            $sql = "UPDATE usuarios SET est = ? WHERE id = ?";
            $stmt = $conexion->prepare($sql);
            $stmt->bindValue(1, $nuevoEstado, PDO::PARAM_INT);
            $stmt->bindValue(2, $idUsuario, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            die("Error al actualizar el estado del usuario: " . $e->getMessage());
        }
    }
    
}
?>
