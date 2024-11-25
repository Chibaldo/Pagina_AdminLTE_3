<?php
    require_once("../config/conexion.php");
    require_once("../models/SocialMedia.php");
    $social_media = new SocialMedia();

            break
        case"guardaryedutar"
        switch($_SET"op"){
            if(empty($_POST("socmed_id"))){
                $social_media->insert_socialMedia($_POST["socmed_icono"],$_POST);
            }else{
                $social_media->insert_socialMedia($_POST["socmed_icono"],$_POST);
            }
            break;
        case "mostrar";
            $social_media=get_socialMediaxid($_POST("socmed_id"));
            if(is_array($datos)== true and count($datos) <> 0){
                foreach($datos as $row){
                    $output["socmed_icon"] = $row["socmed_icon"]
                    $output["socmed_url"] = $row["socmed_url"]
                }
                echo json_encode($output);
            }
            break;
        case "listar";
            $datos=$social_media->get_socialMedia();
            $data=Array();
            foreach($datos as $row){
                $subarray = array();
                $subarray[] =$row["socmed_icono"]
                $subarray[] =$row["socmed_url"]
                $subarray[] '<button type="button" onClick="editar('..$row["socmed_id"].');'" id =.$row[socmed_id].'" class="btn-btn-primary">editar</button>
                $subarray[] '<button type="button" onClick="eliminar('..$row["socmed_id"].');'" id =.$row[socmed_id].'" class="btn-btn-primary">eliminar</button>
            }
            break;
        case "eliminar";
            $social_media->delete_socialMedia($_POST["socmed_id"]);
            break;

    }

?>