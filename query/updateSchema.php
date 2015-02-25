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

  public function updateSchemaToFKey($tablaUpdate, $tablaFK)
  {
    $query = $this->db->query("SELECT ".$tablaUpdate["id"].",".$tablaUpdate["from"]." FROM ".$tablaUpdate["name"]." ")->fetchAll();

    for($i=0;$i<count($query);$i++){
      $fk = $this->db->query("SELECT * FROM ".$tablaFK["name"]." WHERE ".$tablaFK["from"]."='".$query[$i][$tablaUpdate["from"]]."' ")->fetch();

      $key = ($fk[$tablaFK["fk"]]!=0) ? $fk[$tablaFK["fk"]] : 0;

      $this->db->query("UPDATE ".$tablaUpdate["name"]." SET ".$tablaUpdate["to"]."='$key' WHERE ".$tablaUpdate["id"]."='".$query[$i][$tablaUpdate["id"]]."'");
    }
  }
}



?>
