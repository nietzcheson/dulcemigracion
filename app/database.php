<?php

namespace App;

class database extends \PDO
{
  private $engine;
  private $host;
  private $database;
  private $user;
  private $pass;

  public function __construct(){
    $this->engine = 'mysql';
    $this->host = 'localhost';
    $this->database = '5is3C';
    $this->user = '5is3C';
    $this->pass = '5is3C';
    $dns = $this->engine.':dbname='.$this->database.";host=".$this->host;
    parent::__construct( $dns, $this->user, $this->pass );
  }

  public function dbase()
  {
    return "Database";
  }

}


?>
