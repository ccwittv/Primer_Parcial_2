<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/ingreso.css" rel="stylesheet">

 
<?php 
session_start();
if(!isset($_SESSION['registrado'])){  ?>
    <div id="formIngreso" class="container">
      <form  class="form-ingreso " onsubmit="guardarIngreso();return false;">
        <h2 class="form-ingreso-heading">Ingrese DNI</h2>
        <label for="dni" class="sr-only">DNI</label>
        <input type="number" id="dni" class="form-control" placeholder="DNI" required="" autofocus="" value="" min="1000000" title="Un número entre 1000000 y 99000000"  max="99000000">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>      
      </form>
    </div>
<?php } else { echo "<p> DNI registrado: ".$_SESSION['registrado']."</p>"; ?>
               <script type="text/javascript"> MostrarDniBotonesABM(); </script> 
<?php } ?>
