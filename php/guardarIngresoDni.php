<?php 
  session_start();
  if (!isset($_SESSION['registrado'])) 
  {
   $_SESSION['registrado'] = $_POST['registrarDni'];
  } 
  //var_dump($_SESSION);
  echo "<p> DNI registrado: ".$_SESSION['registrado']."</p>";
?>