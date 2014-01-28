<?php

class DB {

  private static $_instance = null;
  private $_connection,
          $_query,
          $_results,
          $_error,
          $_count = 0;

  /*
  |--------------------------------------------------------------------------------------
  | Constructor establishes connection with given config
  | Is private, connection instance is acquired with getInstance()
  |--------------------------------------------------------------------------------------
  */

  private function __construct(){
    try {
      $this->_connection = new \PDO(
        'mysql:host=' . Config::get('mysql/host') . 
        ';dbname=' . Config::get('mysql/database') . '',
        Config::get('mysql/username'),
        Config::get('mysql/password'));

      $this->_connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

    } catch (PDOException $e) {
      die($e->getMessage());
    }
  }



   /*
  |--------------------------------------------------------------------------------------
  | Gets an connection instance if one is not found
  |--------------------------------------------------------------------------------------
  */

  public static function getInstance(){
    if (!isset(self::$_instance)) {
      self::$_instance = new DB();
    }
    return self::$_instance;
  }



  /*
  |--------------------------------------------------------------------------------------
  | Execute SQL query with binded values from an array
  |--------------------------------------------------------------------------------------
  */

  public function query($query, $bindings = array()){
    $this->_error = false;

    try {
      $this->_query = $this->_connection->prepare($query);
      $this->_query->execute($bindings);

      $this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
    } catch (PDOException $e) {
      $this->_error = true;
    }

    return $this;
  }



  /*
  |--------------------------------------------------------------------------------------
  | Get all from database table
  |--------------------------------------------------------------------------------------
  */

  public function get($tableName){
    $this->_error = false;

    if ($this->_query = $this->_connection->prepare("SELECT * FROM $tableName")) {

      if ($this->_query->execute()) {
        $this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
        $this->_count = $this->_query->rowCount();
      } else {
        $this->_error = true;
      }
    }

    return $this;  
  }



    /*
  |--------------------------------------------------------------------------------------
  | Get results
  |--------------------------------------------------------------------------------------
  */

  public function results() {
    return $this->_results;
  }



  /*
  |--------------------------------------------------------------------------------------
  | Get count
  |--------------------------------------------------------------------------------------
  */

  public function count(){
    return $this->_count;
  }



  /*
  |--------------------------------------------------------------------------------------
  | Get error
  |--------------------------------------------------------------------------------------
  */

  public function error(){
    return $this->_error;
  }

}
?>