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
  | Get all from database table
  |--------------------------------------------------------------------------------------
  */

  public function getAll($tableName){
    $this->_error = false;

    try {
      if ($this->_query = $this->_connection->prepare("SELECT * FROM $tableName")) {

        if ($this->_query->execute()) {
          $this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
          $this->_count = $this->_query->rowCount();
        } else {
          $this->_error = true;
        }
      }
    } catch (PDOException $e) {
      $this->_error = true;
    }
    

    return $this;  
  }



  /*
  |--------------------------------------------------------------------------------------
  | General SQL query with bindings
  |--------------------------------------------------------------------------------------
  */

  public function query($sql, $bindings = array()) {
    $this->_error = false;
    if($this->_query = $this->_connection->prepare($sql)) {
      $x = 1;
      if(count($bindings)) {
        foreach($bindings as $bind) {
          $this->_query->bindValue($x, $bind);
          $x++;
        }

      }

      if($this->_query->execute()) {
        //$this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
        $this->_count = $this->_query->rowCount();
      } else {
        $this->_error = true;
      }
    }
    return $this;
  }



  /*
  |--------------------------------------------------------------------------------------
  | Multipurpose SQL action function
  |--------------------------------------------------------------------------------------
  */

  public function action($action, $table, $where = array()) {
    if(count($where) === 3) {
      $operators = array('=', '>', '<', '>=', '<=');

      $field    = $where[0];
      $operator   = $where[1];
      $value    = $where[2];

      if(in_array($operator, $operators)) {
        $sql = "{$action} FROM {$table} WHERE {$field} {$operator} ?";
        if($this->query($sql, array($value))) {
          return $this;
        }
      }
    }
    return false;
  }



  /*
  |--------------------------------------------------------------------------------------
  | Get from table where x = y
  |--------------------------------------------------------------------------------------
  */

  public function get($table, $where){
    return $this->action('SELECT *', $table, $where);
  }



  /*
  |--------------------------------------------------------------------------------------
  | Insert into database table
  |--------------------------------------------------------------------------------------
  */

  public function insert($tableName, $data = array()) {

    $keys = array_keys($data);
    $values = str_repeat("?,", count($data)-1).'?';

    $sql = "INSERT INTO $tableName (`" .implode ('`, `' , $keys ) . "`) VALUES ( $values )" ;
    echo $sql;
    if (!$this->query($sql, $data)->error()) {
      return true;
    }

    return false;

  }



  /*
  |--------------------------------------------------------------------------------------
  | Update item from database table
  |--------------------------------------------------------------------------------------
  */

  public function update($tableName, $id, $data = array()) {

    $set = '';
    $x = 1;

    foreach ($data as $name => $value) {
      $set .= "$name = ?";
      if ($x < count($data)) {
        $set .= ', ';
      }
      $x++;
    }

    $sql = "UPDATE $tableName SET $set WHERE id = $id";

    if (!$this->query($sql, $data)->error()) {
      return true;
    }
    return false;

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
  | Get first result
  |--------------------------------------------------------------------------------------
  */

  public function first() {
    return $this->results()[0];
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