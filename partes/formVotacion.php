<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/ingreso.css" rel="stylesheet">

 
<?php 
session_start();
if(isset($_SESSION['registrado']))
 {  ?>
 	 	<div class="container">

     	    <form class="form-ingreso" onsubmit="GuardarVoto();return false">
    	    	<h2 class="form-ingreso-heading">Voto</h2>
   	 	    	<label for="provincia" class="sr-only">Provincia</label>
     			    <input type="text"  minlength=""  id="provincia" title="Se necesita un nombre de una provincia" 
                     class="form-control" placeholder="Provincia" required="" autofocus="" 
                     value="<?php  if (isset($_COOKIE['ultimaProvincia'])) echo $_COOKIE['ultimaProvincia']; ?>">                     
            <label for="localidad" class="sr-only">Localidad</label>
              <input type="text"  minlength=""  id="localidad" title="Se necesita un nombre de una localidad" 
                     class="form-control" placeholder="Localidad" required="" autofocus="" value="">
             <label for="direccion" class="sr-only">Direccion</label>
              <input type="text"  minlength=""  id="direccion" title="Se necesita una direccion" 
                     class="form-control" placeholder="Direccion" required="" autofocus="" value="">         
        		<label for="candidatos" class="sr-only">Candidatos</label>
        			<select id="candidatos" title="Elegir un presidenciable"  class="form-control" placeholder="" required="" autofocus="">
						    <option value="Scioli">Scioli </option>
						    <option value="Macri">Macri</option>
						    <option value="Massa">Massa</option>	
					    </select>	
        			
        		<label for="sexo" class="sr-only">Año</label>
						  <input type="radio" id="sexom" name="sexo" class="" value="masculino" required="" >Masculino<br>
						  <input type="radio" id="sexof" name="sexo" class="" value="femenino" required="" >Femenino

       			<input readonly   type="hidden"  id="dni" name="dni" class="form-control" value="<?php echo $_SESSION['registrado']; ?>">
            <input readonly   type="hidden"  id="id"  name="id" class="form-control" >
                   
        		<button  class="btn btn-lg btn-success btn-block" type="submit"><span class="glyphicon glyphicon-floppy-save">&nbsp;&nbsp;</span>Guardar </button>
     
      	    </form>

    	</div> <!-- /container -->
<?php  } 
else
{
   echo "<p> PARA VOTAR deber registrarse ingresando su DNI</p>";
}
	 	?>
