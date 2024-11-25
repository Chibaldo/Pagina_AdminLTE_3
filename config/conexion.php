<?php
class Conectar {
    protected $dbh;


    public function conexion() { 
        try {

            $this->dbh = new PDO("mysql:host=localhost;dbname=pagina", "root", "");

            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->dbh;
        } catch (Exception $e) {

            die("Error BD: " . $e->getMessage());
        }
    }


    public function set_names() {
        if ($this->dbh) {
            return $this->dbh->query("SET NAMES 'utf8'");
        }
    }


    public static function ruta() {

        return "http://localhost/Pagina/";
    }
}
?>
