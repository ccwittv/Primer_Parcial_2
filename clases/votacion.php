<?php 
class votacion
 {
   public  $id;
   public  $dni;
   public  $provincia;
   public  $localidad;
   public  $direccion;
   public  $candidato;
   public  $sexo;

   public static function TraerVotos() 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		    $consulta =$objetoAccesoDato->RetornarConsulta("CALL DameLosVotos()");
			$consulta->execute();
			return $consulta->fetchAll(PDO::FETCH_CLASS, "votacion");							
	}

   public static function TraerUnaVotacion($elid) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		    $consulta =$objetoAccesoDato->RetornarConsulta("CALL DameUnaVotacion(:pid)");
			$consulta->bindValue(':pid',$elid,PDO::PARAM_INT);
			$consulta->execute();
			$votacionBuscada= $consulta->fetchObject('votacion');
			return $votacionBuscada;							
	}

	public function GuardarVoto()
	 {
      $votoBuscado = self::TraerUnaVotacion($this->id);
      if (!isset($votoBuscado->id))
       {
            $ultimoIdInsertado = $this->InsertarVoto();
       }
      else
       {
        	$this->ModificacarVoto();
       	    $ultimoIdInsertado = "ModificacionIdExistente";
       }
      return $ultimoIdInsertado;
     }

    public function InsertarVoto()
      {
         $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		 $consulta =$objetoAccesoDato->RetornarConsulta("CALL InsertarVotacion(:pdni,:pprovincia,:pcandidato,:psexo,:plocalidad,:pdireccion)");
		 $consulta->bindValue(':pdni',$this->dni, PDO::PARAM_INT);
		 $consulta->bindValue(':pprovincia', $this->provincia, PDO::PARAM_STR);
		 $consulta->bindValue(':pcandidato', $this->candidato, PDO::PARAM_STR);
		 $consulta->bindValue(':psexo', $this->sexo, PDO::PARAM_STR);
		 $consulta->bindValue(':plocalidad', $this->localidad, PDO::PARAM_STR);
		 $consulta->bindValue(':pdireccion', $this->direccion, PDO::PARAM_STR);
		 $consulta->execute();		
		 return $objetoAccesoDato->RetornarUltimoIdInsertado();
      }

    public function BorrarVoto()
	 {

			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("CALL DeleteVoto(:pid)");	
		    $consulta->bindValue(':pid',$this->id, PDO::PARAM_INT);		
			$consulta->execute();
			return $consulta->rowCount();

	 }

	public function ModificacarVoto()
	 {
	 	$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
	    $consulta =$objetoAccesoDato->RetornarConsulta("CALL UpdateVotox(:pid, :pdni, :pprovincia, :pcandidato, :psexo,:plocalidad,:pdireccion)");
		$consulta->bindValue(':pid',$this->id, PDO::PARAM_INT);
		$consulta->bindValue(':pdni',$this->dni, PDO::PARAM_INT);
		$consulta->bindValue(':pprovincia',$this->provincia, PDO::PARAM_INT);
		$consulta->bindValue(':pcandidato', $this->candidato, PDO::PARAM_STR);
		$consulta->bindValue(':psexo', $this->sexo, PDO::PARAM_STR);
		$consulta->bindValue(':plocalidad', $this->localidad, PDO::PARAM_STR);
		$consulta->bindValue(':pdireccion', $this->direccion, PDO::PARAM_STR);
		return $consulta->execute();
	 }
 }

 

?>