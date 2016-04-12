<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/ingreso.css" rel="stylesheet">

 
<?php 
require_once("clases/AccesoDatos.php");
require_once("clases/votacion.php");
//session_start();
//if(isset($_SESSION['registrado']))
// {  
    $arraysDeVotos = votacion::TraerVotos();
 	 	   echo " <div class='container'  style='background-color: beige;';>
                <table class='table'>
                        <thead>
                            <tr>
                                <th>Editar</th> <th>Borrar</th> <th>Dni</th> <th>Provincia</th> <th>Localidad</th> <th>Direccion</th> <th>Candidato</th> <th>Sexo</th>
                            </tr>
                        </thead>
                        <tbody>";  
                         foreach ($arraysDeVotos as $voto)
                              { 
                                  $localizar = '"'.$voto->provincia. '"'.',"'.$voto->localidad. '"'.',"'.$voto->direccion. '"'.',"'.$voto->id. '"';
                                  echo "<tr>
                                          <td><a class='btn btn-danger' onclick='EditarVoto($voto->id)'>Editar</a></td> 
                                          <td><a class='btn btn-info' onclick='BorrarVoto($voto->id)'>Borrar</a></td> 
                                          <td> $voto->dni </td> <td> $voto->provincia </td> <td> $voto->localidad </td>  <td> $voto->direccion </td>  <td> $voto->candidato </td> <td> $voto->sexo </td>
                                          <td><a class='btn btn-info' onclick='VerEnMapa($localizar)'>Ver en mapa</a></td> 
                                        </tr>";    
                              }                                    
       echo            "</tbody>
                </table> 
    	        </div>";
// } 
//else
// {
//   echo "<p> PARA VISUALIZAR EL LISTADO deber registrarse ingresando su DNI</p>";
// }
?>
