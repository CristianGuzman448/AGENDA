<?php
include_once('../config/config.php');
include('proveedor.php');

$p = new proveedor();
$data = $p->getAll();
if (isset($_GET['id']) && !empty($_GET['id'])){
   $remove = $p->delete($_GET['id']);
    if ($remove){
        header ('Location:' .ROOT. '/proveedor/index.php');
    }else{
        $mensaje = '<div class="alert alert-danger" role="alert" > Error al eliminar </div>';
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>CITAS PROVEEDORES</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

    </head>
    <body>
    <?php include('../menu.php')?>
        <div class= "container">
            <h2 class= "text-center mb-2 "> AGENDA PROVEEDORES FLASH 93</h2>
            <div class= "row">
                <?php
                while($pt = mysqli_fetch_object($data)){
                    $date  = $pt->fecha;
                    echo "<div class= 'col'>";  
                        echo "<div class='border border-info p-2'>";
                            echo "<h5><img src='".ROOT."/images/$pt->brochure' width='50' height='50'/> $pt->empresa | $pt->asesor  </h5>";
                            echo "<p> <b>Fecha:</b> ". date('D', strtotime($date)) ." ". date('d-M-Y H:i', strtotime($date) ) ."</p>";
                            echo "<div class='text-center'>";
                            echo "<a class='btn btn-success' href='".ROOT."/proveedor/edit.php? id=$pt->id' > Modificar </a> - <a class='btn btn-danger' href='".ROOT."/proveedor/index.php? id=$pt->id' >Eliminar </a>";
                            echo "</div>";
                         echo "</div>";
                    echo "</div>";
                }
                ?>
            </div>
        </div>
    </body>
</html>