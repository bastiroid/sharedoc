<?php

class DB {

  private static $_instance = null;
  private $_connection,
          $_query,
          $_results,
          $_count = 0;

  private function __construct(){
    try {
      $this->_connection = new \PDO(
        'mysql:host=' . Config::get('mysql/host') . 
        ';dbname=' . Config::get('mysql/database') . '',
        Config::get('mysql/username'),
        Config::get('mysql/password'));

      $this->_connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

      return $this->_connection;
    } catch (PDOException $e) {
      die($e->getMessage());
    }
  }

  public static function getInstance(){
    if (!isset(self::$_instance)) {
      self::$_instance = new DB();
    }
    return self::$_instance;
  }

  public function query($query, $bindings){
    try{
      $stmt = $this->_connection->prepare($query);
      $stmt->execute($bindings);
      return $stmt;
    } catch (PDOException $e){
      return false;
    }
    
  }

  public function get($tableName){
    try {
      $results = $this->_connection->query("SELECT * FROM $tableName");

      return ($results->rowCount() > 0)
      ? $results
      : false;
    } catch (PDOException $e) {
      return false;
    }

  }

}
?>