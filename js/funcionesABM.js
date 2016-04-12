
function GuardarVoto()
 {
    var id=$("#id").val();
    var dni=$("#dni").val();
    var provincia=$("#provincia").val();
    var localidad=$("#localidad").val();
    var direccion=$("#direccion").val();
    var candidato=$("#candidatos").val();
    var sexo;
    if ($("#sexom").is(":checked"))
     {
    	sexo = $("#sexom").val();
     }
    else if ($("#sexof").is(":checked"))
     {
     	sexo = $("#sexof").val();
     }

		var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"GuardarVoto",
			id:id,
      dni:dni,
			provincia:provincia,
      localidad:localidad,
      direccion:direccion,
			candidato:candidato,
			sexo:sexo,
			
		}
	});
	funcionAjax.done(function(retorno){
      //alert(retorno);
	    salirSesion();
	});
	funcionAjax.fail(function(retorno){	
		//alert(retorno);
	});	

 } //FIN FUNCION GuardarVoto

 function BorrarVoto(id)
           { 
            var funcionAjax = $.ajax({
                                      url:"nexo.php",
                                      type:"post",
                                      data:{
                                              id:id,
                                              queHacer:'BorrarVoto',
                                            }

                                    });
            funcionAjax.done(function(retorno){ 
                                                Mostrar("MostrarGrilla");
                                              });
            funcionAjax.fail(function(retorno){ 
                                               alert(retorno);
                                              });                                                                        
           } //FIN FUNCION BorrarVoto

function EditarVoto(id)
           { 
            Mostrar("MostrarFormAlta");
            var funcionAjax = $.ajax({
                                      url:"nexo.php",
                                      type:"post",
                                      data:{
                                              id:id,
                                              queHacer:'TraerUnVoto',
                                            }

                                    });
            funcionAjax.done(function(retorno){ 
                        //alert(retorno);
                        var voto =JSON.parse(retorno);	
                        $("#id").val(voto.id);
												$("#dni").val(voto.dni);
												$("#provincia").val(voto.provincia);
                        $("#localidad").val(voto.localidad);
                        $("#direccion").val(voto.direccion);
												$("#candidatos").val(voto.candidato);
												if (voto.sexo == "masculino")
												 {
												  $("#sexom").prop("checked", true)
												 }
												else if (voto.sexo == "femenino")
												 {
												   $("#sexof").prop("checked", true)
												 } 
                                                
                                              });
            funcionAjax.fail(function(retorno){ 
                                               alert(retorno);
                                              });
            //Mostrar("MostrarFormAlta");                                                                                                         
           } //FIN FUNCION EditarVoto