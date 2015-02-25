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
     * prospectos
     */

    $this->dbname("sisfc");
    $this->createFK('prospectos', 'pais_id', 'paises', 'id');
    $this->createFK("prospectos", "estatus_ventas_id", "estatus_ventas", 'id');
    $this->createFK("prospectos", "empresa_id", "empresas", 'id_empresa');
    $this->createFK("prospectos", "campana_id", "campanas", 'id');
    $this->createFK("prospectos", "segmento_id", "segmentos", 'id_segmento');

    /**
     * calificacion_prospectos
     */

    $this->createFK('calificacion_prospecto', 'prospecto_id', 'prospectos', 'id_prospecto');

    /**
     * contacto_lead
     */

    $this->createFK('contacto_lead', 'prospecto_id', 'prospectos', 'id_prospecto');


  }

}


?>
