function guardarIngreso()
 {
    var varDni = $("#dni").val();

    var funcionAjax = $.ajax({
    						url:"php/guardarIngresoDni.php",
    						type:"post",
    						data:{
                                  registrarDni:varDni
    						     }
    						})
    funcionAjax.done(function(retorno){
        $("#principal").html(retorno);
		$("#botonesABM").html(retorno);
	});
	funcionAjax.fail(function(retorno){
		$("#botonesABM").html(":(");
	});
	funcionAjax.always(function(retorno){
		//alert("siempre "+retorno.statusText);

	});

 }

 function salirSesion()
 {
    var funcionAjax=$.ajax({
        url:"php/logOut.php",
        type:"post"     
    });
    funcionAjax.done(function(retorno){
        window.location.href = "index.php";
    });
    funcionAjax.fail(function(retorno){
        
    });
    funcionAjax.always(function(retorno){
        //alert("siempre "+retorno.statusText);

    });
 }