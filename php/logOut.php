<?php
  /* CWW Destruir la variable de sesion y salir de la sesion*/
  session_start();
  $_SESSION = null;
  session_destroy();
?>