<?php
include_once('../config/config.php');
include('proveedor.php');

if ( isset($_POST) && !empty($_POST)){

    $p = new proveedor();

    if ($_FILES['brochure']['name'] !==''){
        $_POST['brochure'] = saveImage($_FILES);
    }

    $save = $p->save($_POST);
    if ($save){
        $mensaje = '<div class="alert alert-success"> Sesión Registrada </div>';
    }else{
        $mensaje = '<div class="alert alert-danger"> Error al registrar! </div>'; 
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title> Registrar sesión</title>
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
            <h2 class="text-center mb-2"> CITA PROVEEDOR FLASH 93 </h2>
            <form method="POST" enctype="multipart/form-data">
            
                <div class="row mb-2">
                    <div class="col">
                        <input type="text" name="empresa" id="empresa" placeholder="Nombre de la Empresa" class="form-control" />
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col">
                        <input type="text" name="asesor" id="asesor" placeholder="Nombre Asesor" class="form-control" />
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col">
                        <input type="email" name="email" id="email" placeholder="Email Asesor" class="form-control" />
                    </div>
                    <div class="col">
                        <input type="number" name="celular" id="celular" placeholder="Celular del asesor" class="form-control" />
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col">
                        <textarea name="marcas" id="marcas" placeholder="Marca que distribuye" class="form-control"> </textarea>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col">
                        <input type="text" name="tiempoReunion" id="tiempoReunion" placeholder="Duración de la Reunión" class="form-control" />
                    </div>                
                    <div class="col">
                        <input type="file" name="brochure" id="brochure" placeholder="Brochure de la empresa" class="form-control" />
                    </div>               
                    <div class="col">
                        <input type="datetime-local" name="fecha" id="fecha" class="form-control" />
                    </div>
                </div>
                <button class="btn btn-success"> Registrar </button>
            </form>
        </div>
    </body>
</html>