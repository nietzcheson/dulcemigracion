<?php

namespace SQL;

use Query\queryFK;



class createFk extends queryFK
{

  public function _construct(){}

  public function run()
  {
    /*
      - nombre base de datos @dbname

      - nombre tabla @tabla
      - nueva foreing key
      - nombre tabla foreanea @tablaFK
    */

    /**
    * @var prospectos
    */
    $this->dbname("sisfc");
    $this->createFK('prospectos', 'pais_id', 'paises', 'id');
    $this->createFK("prospectos", "estatus_ventas_id", "estatus_ventas", 'id');
    $this->createFK("prospectos", "empresa_id", "empresas", 'id_empresa');
  }

}


?>
