<?php
require_once(__DIR__ . "/../config/conexion.php");

class Crud extends Conectar {
    public function getAll($table) {
        try {
            $conexion = $this->conexion();
            $sql = "SELECT * FROM $table WHERE est = 1";
            $stmt = $conexion->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function getById($table, $idField, $id) {
        try {
            $conexion = $this->conexion();
            $sql = "SELECT * FROM $table WHERE $idField = ? AND est = 1";
            $stmt = $conexion->prepare($sql);
            $stmt->bindValue(1, $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function insert($table, $fields, $values) {
        try {
            $conexion = $this->conexion();
            $fieldList = implode(", ", $fields);
            $placeholders = implode(", ", array_fill(0, count($values), "?"));
            $sql = "INSERT INTO $table ($fieldList) VALUES ($placeholders)";
            $stmt = $conexion->prepare($sql);
            foreach ($values as $index => $value) {
                $stmt->bindValue($index + 1, $value);
            }
            $stmt->execute();
            return $conexion->lastInsertId();
        } catch (Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function update($table, $fields, $values, $idField, $id) {
        try {
            $conexion = $this->conexion();
            $fieldList = implode(" = ?, ", $fields) . " = ?";
            $sql = "UPDATE $table SET $fieldList WHERE $idField = ?";
            $stmt = $conexion->prepare($sql);
            foreach ($values as $index => $value) {
                $stmt->bindValue($index + 1, $value);
            }
            $stmt->bindValue(count($values) + 1, $id, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function delete($tabla, $campo, $valor) {
        try {
            $conexion = $this->conexion();
            $sql = "UPDATE $tabla SET est = 0 WHERE $campo = ?";
            $stmt = $conexion->prepare($sql);
            $stmt->bindValue(1, $valor, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }
}
?>
