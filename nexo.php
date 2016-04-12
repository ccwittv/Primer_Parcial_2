<?php 
require_once("clases/AccesoDatos.php");
require_once("clases/votacion.php");

$queHago=$_POST['queHacer'];

switch ($queHago) {
	case 'MostrarDni':
		include("partes/formIngreso.php");
		break;
	case 'MostrarFormAlta':
		include("partes/formVotacion.php");
		break;
	case 'MostrarGrilla':
	      include("partes/formGrilla.php");
		  break;
	case 'VerEnMapa':        
        include("partes/formMapa.php");
		break;	  
	case 'GuardarVoto':
		 $voto = new votacion();
		 $voto->id=$_POST['id'];
		 $voto->dni=$_POST['dni'];
	     $voto->provincia=$_POST['provincia'];
	     $voto->localidad=$_POST['localidad'];
	     $voto->direccion=$_POST['direccion'];
		 $voto->candidato=$_POST['candidato'];
		 $voto->sexo=$_POST['sexo'];
		 $idInsertado = $voto->GuardarVoto();		 
		 echo $idInsertado;
		 setcookie('contadorVoto',$_COOKIE['contadorVoto'] + 1,time()+60*60*24*30,'/');	   		 
		 setcookie('ultimaProvincia',$_POST['provincia'],time()+60*60*24*30,'/');	   		 		 
		 break;	
	case 'BorrarVoto';
	      $voto = new votacion();
		  $voto->id=$_POST['id'];
		  $cantidad = $voto->BorrarVoto();
 		  //echo $cantidad;
 		break;
 	case 'TraerUnVoto':
			$voto = votacion::TraerUnaVotacion($_POST['id']);		
			//var_dump($voto);
			echo json_encode($voto);				
	     break;	 	
	default:
		# code...
		break;
}

 ?>