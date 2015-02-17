<?php

namespace Query;
use App\database;

class queryFK
{

  private $dbname;
  private $db;
  public function __construct()
  {
    $this->db = new database();
  }

  public function dbname($dbname)
  {
    return $this->dbname = $dbname;
  }

  public function createFK($tabla, $cell, $tablaFK, $cellFK)
  {

    try
    {
      $fk = $this->db->query(
      "select c.COLUMN_NAME
      from INFORMATION_SCHEMA.TABLE_CONSTRAINTS pk ,
      INFORMATION_SCHEMA.KEY_COLUMN_USAGE c
      where pk.TABLE_NAME = '$tabla'
      and CONSTRAINT_TYPE = 'PRIMARY KEY'
      and c.TABLE_NAME = pk.TABLE_NAME
      and c.CONSTRAINT_NAME = pk.CONSTRAINT_NAME")
      ->fetchAll();

      $columnName = $fk[0]["COLUMN_NAME"];

      $this->db->query("SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0");
      $this->db->query("SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0");
      $this->db->query("SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES'");

      $this->db->query("ALTER TABLE $this->dbname.$tabla
      ADD COLUMN $cell INT(11) NOT NULL AFTER $columnName,
      ADD INDEX $tabla.$tablaFK ($cell ASC)");

      $this->db->query("ALTER TABLE $this->dbname.$tabla
      ADD CONSTRAINT $tabla.$tablaFK
        FOREIGN KEY ($cell)
        REFERENCES $this->dbname.$tablaFK ($cellFK)
        ON DELETE NO ACTION
        ON UPDATE NO ACTION");


        $this->db->query("SET SQL_MODE=@OLD_SQL_MODE");
        $this->db->query("SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS");
        $this->db->query("SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS");
    }
    catch (Exception $e)
    {
      echo $e->getMessage();

    }
  }

  public function __destruct(){}
}

?>
