<?php
include_once('../config/config.php');
include('../config/database.php');

class proveedor{

    public $conexion;
    function __construct()
    {
        $db = new Database();
        $this->conexion = $db->connectToDatabase();
    }
    function save($params){
        $empresa = $params ['empresa'];
        $asesor = $params ['asesor'];
        $email = $params ['email'];
        $celular = $params ['celular'];
        $marcas = $params ['marcas'];
        $tiempoReunion = $params ['tiempoReunion'];
        $brochure = $params ['brochure'];
        $fecha = $params ['fecha'];

        $insert = "INSERT INTO proveedores VALUES (NULL, '$empresa', '$asesor' , '$email' , $celular , '$marcas' , '$tiempoReunion' , '$brochure' , '$fecha' )";
        return mysqli_query($this-> conexion, $insert);
    }
function getAll(){
    $sql = "SELECT * FROM proveedores ORDER BY fecha ASC";
    return mysqli_query($this->conexion, $sql);
}
function getOne($id){
    $sql = "SELECT * FROM proveedores WHERE id = $id";
    return mysqli_query($this->conexion, $sql);
}
function update($params){
    $empresa = $params['empresa'];
    $asesor = $params["asesor"];
    $email = $params["email"];
    $celular = $params["celular"];
    $marcas = $params["marcas"];
    $tiempoReunion = $params["tiempoReunion"];
    $brochure = $params['brochure'];
    $fecha = $params["fecha"];
    $id = $params["id"];

    $update = "UPDATE proveedores SET empresa='$empresa', asesor= '$asesor' , email= '$email' , celular= $celular , marcas= '$marcas' , tiempoReunion= '$tiempoReunion' , brochure='$brochure' , fecha='$fecha' WHERE id = $id";

    return mysqli_query($this->conexion, $update);
}
function delete($id){
    $delete = "DELETE FROM proveedores WHERE id = $id";
    return mysqli_query($this->conexion, $delete);
}

}

?> 