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
   
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sono:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../estilos/style.css">
    <link rel="stylesheet" href="../estilos/mq.css">
    </head>
    <body>
    <nav>
            <a href="../index.html"> <img src="../imagenes/FLASH NUEVO.png" class="img-logo" alt=""></a>

            <ul>
                <li> <a href="../index.html"> ¿QUIÉNES SOMOS? </a> </li>
                <li> <a href="../aliados.html"> ALIADOS </a> </li>
                <li> <a href="../flash93.html"> UBICACIÓN </a> </li>
                <li> <a href="../equipohumano.html"> EQUIPO </a> </li>
                <li> <a href="add.php"> CONTACTENOS </a> </li>

            </ul>
        </nav>

        <div class="container">
        <?php
                if(isset ($mensaje )){
                    echo $mensaje;     
                }
            ?>
            <h2 class="text-center mb-2"> SOLICITE SU CITA O ASESORIA</h2>
            <h1 class="text-center mb-2">FLASH 93</h1>
            <form method="POST" enctype="multipart/form-data">
            
                <div class="row mb-2">
                    <div class="col">
                        <input type="text" name="empresa" id="empresa" placeholder="Nombre de la Empresa" class="form-control" />
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col">
                        <input type="text" name="asesor" id="asesor" placeholder="Nombre" class="form-control" />
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col">
                        <input type="email" name="email" id="email" placeholder="Email" class="form-control" />
                    </div>
                    <div class="col">
                        <input type="number" name="celular" id="celular" placeholder="Número Celular" class="form-control" />
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col">
                        <textarea name="marcas" id="marcas" placeholder="Descripción" class="form-control"> </textarea>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col">
                        <input type="text" name="tiempoReunion" id="tiempoReunion" placeholder="Duración de la Reunión" class="form-control" />
                    </div>                
                    <div class="col">
                        <input type="file" name="brochure" id="brochure" placeholder="Imagen" class="form-control" required />
                    </div>               
                    <div class="col">
                        <input type="datetime-local" name="fecha" id="fecha" class="form-control" />
                    </div>
                </div>
                <button class="btn btn-success"> Registrar </button>
            </form>
            <br>
            <footer>
            <div class="container">
                <div class="row">
                    
                    <div class="col-md-6 col-sm-12"> 
                        <ul><!-- lista desordenada -->
                            <h5>Zipaquirá</h5>
                            <li>Principal Cr 36 # 7-73</li>
                            <li>+57 3203241462</li>
                            <li>tornimanguerasflash93@hotmail.com</li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-sm-12 d-flex flex-column align-items-center"> 
                        <address class="pieredes">Síganos en nuestras redes</address>
                        <div>
                            <div class="boton a">
                                <img src="../imagenes/face.png" alt=""width="30px">
                                <a href="https://www.facebook.com/profile.php?id=100063855200052"> Facebook </a>
                            </div>
                            <div class="boton a">
                                <img src="../imagenes/instagram.webp" alt=""width="30px">
                                <a href="https://www.instagram.com/flash93col/"> Instagram</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>


        </div>

    </body>
</html>