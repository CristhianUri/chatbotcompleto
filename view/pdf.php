<?php 
include "../Db/conexion.php";
// ID resivido desde la tabla index para realizar una consulta acorde al id y llenar el documento
$id = $_REQUEST['id'];
$sentencia = $bd->query("SELECT * from servicio as s inner JOIN ingenieros as i 
on s.ID_ingeniero = i.ID_ingeniero WHERE ID_Servicio = $id");
$sentencia -> execute();
$regis = $sentencia ->fetchAll(PDO::FETCH_ASSOC);
?>
<?php 
   ob_start(); 
?>
    <!DOCTYPE html>
    <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="c.css">
    <!-- ///Estos estios solo deben activarse cuando se este 
   //visulizando el pdf debido a que Dompdf  no puede visulizar los ccss de bootstrap
   // lo que hace que sea necesario usar css -->
    <style>
        @page {
            margin-top: 30px;
            margin-rigth: 0px;
            margin-bottom: 30px;

        }
        #columna1 {
            position: absolute;
            top: 0px;
            left: 0px;
            width: 500px;

            margin-left: 20px;

        }

        #columna2 {
            margin-left: 390px;
            margin-right: 20px;


        }

        #horai {
            position: absolute;
            top: 0px;
            left: 0px;
            width: 500px;
            margin-left: 20px;
        }

        #horaf {
            margin-left: 390px;
            margin-right: 20px;
        }

        #firma1 {
            position: absolute;
            top: 0px;
            left: 0px;
            width: 390px;
            margin-left: 20px;

        }

        #firma2 {
        position: absolute;

            margin-left:400px;
        
            width: 390px;

        }

        body {
            border: 3px solid black;
            border-radius: 60px;
            font-size: 12px;
        }

        #user {
            position: absolute;
            top: 0px;
            left: 0px;
            width: 300px;
            margin-left: 20px;
        }

        #dep {
            margin-left: 370px;
            margin-right: 0px;
        }

        #contenido {
            border: 1px solid;
            border-radius: 20px;
            margin-left: 5%;
            width: 600px;
            height: 150px;
        }

        #linea {
            border-top: 1px solid black;
            height: 2px;
            max-width: 200px;
            
            margin: 0px auto 0 auto;
        }
    </style>
</head>
<body>
    <div id="pdf">
        <?php foreach ($regis as $reg) {
      # code...
  ?>

        <section>
            <div class="row justify-content-around col-sm-12 mt-3 mb-4">
                <div class="col-4 col-xs-4" id="columna1">
                    <img id="" class=" "
                        src="https://oficial.tehuacan.gob.mx/wp-content/uploads/elementor/thumbs/logo-pfjhkth8f6hartd0m849dwt8bt41uq1g0b234eui6c.png">
                </div>

                <div class="col-4 text-center col-xs-4 " id="columna2">
                    <font size="15"><strong>
                            <p class=" mt-4 text-dark"> Fecha: <?php echo $reg['Fecha'] ?> </p>
                        </strong></font>
                </div>
            </div>
        </section>

        <section class="text-center">
            <div class="row justify-content-around col-sm-12  ">
                <font size="14"><strong>
                        <p class="  text-dark">DEPARTAMENTO DE INFORMÁTICA Y SISTEMAS H.AYUNTAMIENTO DE TEHUACÁN, PUE.
                        </p>
                    </strong></font>
            </div>
            <div class="row justify-content-around col-sm-12 ">
                <div class="col-4 col-xs-4" id="horai">
                    <font size="14"><strong>
                            <p class=" text-dark ">Hora inicio: <?php echo $reg['Hinicio'] ?> <i class="fa-thin fa-house"></i> </p>
                        </strong></font>
                </div>

                <div class="col-4 text-center col-xs-4 " id="horaf">
                    <font size="14"><strong>
                            <p class=" text-dark">Hora de fin: <?php echo $reg['Hfinal'] ?> </p>
                        </strong></font>
                </div>
            </div>
        </section>
        <section class="text-center">
            <div class="row justify-content-around col-sm-12 ">
                <div class="col-4 col-xs-4" id="horai">
                    <font size="14"><strong>
                            <p class=" text-dark">USUARIO:</p>
                        </strong></font>
                </div>
                <div class="col-4 text-center col-xs-4 " id="horaf">
                    <font size="14"><strong>
                            <p class="text-dark">DEPARTAMENTO: </p>
                        </strong></font>
                </div>
        </section>
        <section>
            <div class="row justify-content-around col-sm-12   text-center">
                <div class="col-4 col-xs-4" id="user">
                    <font size="12"><strong>
                            <p class="border border-dark"><?php echo $reg['Usuario'] ?></p>
                        </strong></font>
                </div>
                <div class="col-4 text-center col-xs-4" id="dep">
                    <font size="12"><strong>
                            <p class="border border-dark "><?php echo $reg['Departamento'] ?>
                            </p>
                        </strong></font>

                </div>
        </section>
        <section>
            <div>
                <font size="14"><strong>
                        <p class="text-dark text-center">Descripcion: </p>
                    </strong></font>
            </div>
            <div id="contenido" class="text-center">
                <font size="12"><strong>
                        <p class=" text-dark">
                            <?php echo $reg['Descripcion'] ?>
                        </p>
                    </strong></font>
            </div>
            <div>
                <font size="14"><strong>
                        <p class="text-dark text-center">OBSERVACIÓN: </p>
                    </strong></font>
            </div>
            <div id="contenido" class="text-center">
                <font size="12"><strong>
                        <p class=" text-dark">
                            <?php echo $reg['Observacion'] ?>
                        </p>
                    </strong></font>
            </div </section>
            <section class="text-center ">
                <div class="row justify-content-around col-sm-12 ">
                    <div class="col-4 col-xs-4 mt-1" id="horai">
                        <font size="14"><strong>
                                <p class=" text-dark ">Servicio: <?php echo $reg['Servicio'] ?> </p>
                            </strong></font>
                    </div>

                    <div class="col-4 text-center col-xs-4 mt-1 " id="horaf">
                        <font size="14"><strong>
                                <p class=" text-dark ">Estatus: <?php echo $reg['Estatus'] ?></p>
                            </strong></font>

                    </div>
                </div>
            </section>

            <section class="text-center ">
                <div class="row justify-content-around col-sm-12 ">
                    <div class="col-4 col-xs-4 mt-4" id="firma1">
                        <img src="<?php echo $reg['Firma']?>" alt="" width="100px" height="80px">
                        <font size="12"><strong>
                                <p class=" text-dark "><?php echo $reg['Usuario'] ?> </p>
                            </strong></font>
                        <div id="linea"></div>
                        <font size="14"><strong>
                                <p class=" text-dark ">USUARIO<br>
                                 (NOMBRE Y FIRMA)
                                </p>
                            </strong></font>
                    </div>


                    <div class="col-4 text-center col-xs-4 mt-4" id="firma2">
                        <img src="<?php echo $reg['Firma2']?>" alt="" width="100px" height="80px">
                        <font size="12"><strong>
                                <p class=" text-dark "><?php echo $reg['Nombre'] ?></p>
                            </strong></font>
                        <div id="linea"></div>
                        <font size="14"><strong>
                               <p class=" text-dark ">   ING. DE SOPORTE 
                                 (NOMBRE Y FIRMA)    
                                </p>
                              
                            </strong></font>
                        
                    </div>
                </div>
            </section>
<?php }?>
    </div>
</body>

</html>
<?php 
$html = ob_get_clean();
 /// libreria Dompdf 2.0.3 necesaria para convertir
 // codigo html a pdf
require_once '../libreria/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$options = $dompdf ->getOptions();
$options -> set(array('isRemoteEnabled'=> true));
$dompdf -> setOptions($options); 
$dompdf ->loadhtml($html);
$dompdf->setPaper('A4','portrait');
//$dompdf ->setPaper('A4','landscape');
// Convierte el HTML en un PDF
$dompdf ->render();
// Mediante esta linea de codigo especificamos si queremos 
//imprimir automaticamente el PDF o no
// Para imprimirlo de forma auntomatica es necesario cambiar 
//el false a true 
$dompdf ->stream("archivo_.pdf",array("Attachment"=> false));
echo $dompdf->output();
?>