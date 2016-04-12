function MostrarDni()
{
		//alert(queMostrar);
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{queHacer:"MostrarDni"}
	});
	funcionAjax.done(function(retorno){
		$("#principal").html(retorno);
	});
	funcionAjax.fail(function(retorno){
		$("#botonesABM").html(":(");
	});
	funcionAjax.always(function(retorno){
		//alert("siempre "+retorno.statusText);

	});
} //Fin funcion MostrarDni()

function MostrarDniBotonesABM()
{
		//alert(queMostrar);
	var funcionAjax=$.ajax({
		url:"php/guardarIngresoDni.php",
		});
	funcionAjax.done(function(retorno){
		$("#botonesABM").html(retorno);
	});
	funcionAjax.fail(function(retorno){
		$("#botonesABM").html(":(");
	});
	funcionAjax.always(function(retorno){
		//alert("siempre "+retorno.statusText);

	});
} //Fin funcion MostrarDniBotonesABM()

function Mostrar(queMostrar)
 {
   	//alert(queMostrar);
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{queHacer:queMostrar}
	});
	funcionAjax.done(function(retorno){
		if (retorno.indexOf("PARA VOTAR deber registrarse ingresando su DNI") > -1)
		   MostrarDni();
		else
		  $("#principal").html(retorno);
	});
	funcionAjax.fail(function(retorno){
		$("#principal").html(":(");
	});
	funcionAjax.always(function(retorno){
		//alert("siempre "+retorno.statusText);

	});
 	
 } //Fin funcion Mostrar()