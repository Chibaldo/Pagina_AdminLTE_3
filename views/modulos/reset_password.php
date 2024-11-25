<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once("../config/conexion.php");
    $token = $_POST["token"];
    $new_password = password_hash($_POST["new_password"], PASSWORD_BCRYPT);

    // Conectar a la base de datos
    $conectar = new Conectar();
    $conexion = $conectar->conexion();

    // Verificar token y expiración
    $sql = "SELECT * FROM usuarios WHERE reset_token = ? AND token_expiration > NOW()";
    $stmt = $conexion->prepare($sql);
    $stmt->bindValue(1, $token, PDO::PARAM_STR);
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario) {
        // Actualizar contraseña y eliminar el token
        $sql_update = "UPDATE usuarios SET usu_pass = ?, reset_token = NULL, token_expiration = NULL WHERE usu_id = ?";
        $stmt_update = $conexion->prepare($sql_update);
        $stmt_update->execute([$new_password, $usuario["usu_id"]]);

        echo "Contraseña restablecida con éxito.";
    } else {
        echo "El token no es válido o ha expirado.";
    }
} elseif (isset($_GET["token"])) {
    $token = $_GET["token"];
?>
<form method="POST" action="">
    <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">
    <label for="new_password">Nueva Contraseña:</label>
    <input type="password" name="new_password" required>
    <button type="submit">Restablecer Contraseña</button>
</form>
<?php
} else {
    echo "Token inválido.";
}
?>
