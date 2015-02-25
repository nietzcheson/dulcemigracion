<?php

namespace SQL;

use Query\updateSchema;

class updateFk extends updateSchema
{
  public function _construct(){}

  public function run()
  {

    /**
    * Clase para actulizar datos de claves foráneas de una celda a otra en una misma tabla
    *
    * Lo que hace el script es extraer dos datos importantes: el id de la fila y el dato que se quiere reemplazar.
    * Con el dato a reemplezar se verifica en la 'tabla foránea' y se pide el valor que necesitamos, en este caso el id de esta tabla.
    * Dato que en adelante será nuestra clave foránea.
    *
    * Por último actualizamos la tabla.
    *
    * Los datos son los siguiente, divididos en dos arrays
    *
    * - array('name'=>'Nombre de la tabla', 'from' => 'El dato a cambiar', 'to' => 'la celda a actualizar');
    * - array('name'=>'Tabla de donde se sacará el fk', 'from' => 'Qué dato', 'fk' => 'El FK');
    *
    * @$this->updateSchemaToFKey("tablaUpdate" => array('name'=>'prospectos', 'from' => 'pais_prospecto', 'to' => 'pais_id'), 'tablaFK' => array("name"=>"paises", "from" => "id"));
    **/

    $this->updateSchemaToFKey(
      array('name'=>'prospectos', 'id'=>'id_prospecto', 'from' => 'pais_prospecto', 'to' => 'pais_id'),
      array("name"=>"paises", "from" => "id", "fk" => "id")
    );

    $this->updateSchemaToFKey(
      array('name'=>'prospectos', 'id'=>'id_prospecto', 'from' => 'id_estatus', 'to' => 'estatus_ventas_id'),
      array("name"=>"estatus_ventas", "from" => "id", "fk" => "id")
    );

    $this->updateSchemaToFKey(
      array('name'=>'prospectos', 'id'=>'id_prospecto', 'from' => 'campana_prospecto', 'to' => 'campana_id'),
      array("name"=>"campanas", "from" => "id", "fk" => "id")
    );

    $this->updateSchemaToFKey(
      array('name'=>'calificacion_prospecto', 'id'=>'id_u_calificacion', 'from' => 'id_u_prospecto', 'to' => 'prospecto_id'),
      array("name"=>"prospectos", "from" => "id_u_prospecto", "fk" => "id_prospecto")
    );



    // $this->updateSchemaToFKey("marcas_clientes",array("tabla"=>"marcas", "col" => "id_marca"),"id_u_marca", "marca_id");
    // $this->updateSchemaToFKey("marcas_clientes",array("tabla"=>"prospectos", "col" => "id_prospecto"),"id_u_cliente", "prospecto_id");
  }
}


?>
