<?php

namespace Query;
use App\database;


class queryFK
{
  public function __construct()
  {

    $db = new database();
    $consulta = $db->query("SELECT * FROM prospectos");
    foreach($consulta as $c){
      echo $c["id_u_prospecto"]."<br />";
    }
  }

  public function createFK()
  {
    
  }
}

?>
