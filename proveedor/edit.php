<?php 
include_once('../config/config.php');
include('proveedor.php');

$p = new proveedor();
$dp = mysqli_fetch_object($p->getOne($_GET['id'])); 

$date = new DateTime($dp->fecha);

if (isset($_POST) && !empty($_POST)){
    $_POST['brochure'] = $dp->brochure;
    if ( $_FILES['brochure']['name'] !== '' ){ 
        $_POST['brochure'] = saveImage($_FILES);
    }
    $update = $p->update($_POST);
    if ($update){
        $mensaje = '<div class="alert alert-success" role="alert"> Sesión modificada con exito. </div>'  ;
    }else{
        $mensaje = '<div class="alert alert-danger" role="alert"> Error! </div>'  ;
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title> Modificar sesión</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    </head>
    <body>
    <?php include('../menu.php')?>
        <div class="container">
            <?php
                if(isset ($mensaje )){
                    echo $mensaje;
                }
            ?>
            <h2 class="text-center mb-2"> MODIFICAR CITA PROVEEDOR FLASH 93 </h2>
            <form method="POST" enctype="multipart/form-data">
                <div class="row mb-2">
                    <div class="col">
                        <input type="text" name="empresa" id="empresa" placeholder="Nombre de la Empresa" class="form-control" value="<?= $dp->empresa?>" />
                        <input type="hidden" name="id" value="<?= $dp->id?>"/>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col">
                        <input type="text" name="asesor" id="asesor" placeholder="Nombre Asesor" class="form-control" value="<?= $dp->asesor?>" />
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col">
                        <input type="email" name="email" id="email" placeholder="Email Asesor" class="form-control" value="<?= $dp->email?>" />
                    </div>
                    <div class="col">
                        <input type="number" name="celular" id="celular" placeholder="Celular del asesor" class="form-control" value="<?= $dp->celular?>"/>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col">
                        <textarea name="marcas" id="marcas" placeholder="Marca que distribuye" class="form-control"> <?= $dp->marcas?>"</textarea>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col">
                        <input type="text" name="tiempoReunion" id="tiempoReunion" placeholder="Duración de la Reunión" class="form-control" value="<?= $dp->tiempoReunion?>"/>
                    </div>                
                    <div class="col">
                        <input type="file" name="brochure" id="brochure" placeholder="Brochure de la empresa" class="form-control" value="<?= $dp->brochure?>"/>
                    </div>               
                    <div class="col">
                        <input type="datetime-local" name="fecha" id="fecha" class="form-control" value="<?= $date->format('Y-m-d\TH:i')?>"/>
                    </div>
                </div>
                <button class="btn btn-success"> Modificar </button>
            </form>
        </div>
    </body>
</html>