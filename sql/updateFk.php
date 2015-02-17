<?php

namespace SQL;

use Query\updateSchema;

class updateFk extends updateSchema
{
  public function _construct(){}

  public function run()
  {
    //$this->updateSchemaToFKey("prospectos",array("tabla"=>"paises", "col" => "id"),"pais_prospecto", "pais_id");
  }
}


?>
