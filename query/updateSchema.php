<?php

namespace Query;
use App\database;



class updateSchema
{
  private $db;

  public function __construct()
  {
    $this->db = new database();
  }

  public function updateSchemaToFKey($tabla_update, $tabla_extraer = false, $col_old, $fk)
    {
      $this->_table[] = array(
        "tabla_actualizar" => $tabla_update,
        "tabla_extraer" => array(
          'tabla' => $tabla_extraer["tabla"],
          'col' => $tabla_extraer["tabla"]
        ),
        'col_old' => $col_old,
        'fk' => $fk
      );

      $consulta = $this->db->query("SELECT * FROM $tabla_update")->fetchAll();

      for($i=0; $i<count($consulta); $i++){

        $id_consulta = (int) $consulta[$i][$col_old];

        if($tabla_extraer !=false){
          $fetch = $this->db->query("SELECT * FROM ".$tabla_extraer['tabla']." WHERE ".$tabla_extraer['col']."='".$consulta[$i][$col_old]."'")->fetch();
          $id_consulta = ($fetch["id"] !=null || $fetch["id"] !="") ? $fetch["id"] = (int) $fetch["id"] : $fetch["id"] = 0;
        }

        if($id_consulta!=0){
          $this->db->query("UPDATE $tabla_update SET $fk='$id_consulta' WHERE $col_old='".$consulta[$i][$col_old]."'");
        }

      }

    }
}



?>
