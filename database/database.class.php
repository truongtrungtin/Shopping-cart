<?php
class DataBase {
  
  private $hostname;
  private $database;
  private $username;
  private $password;

  public function __construct(
    $hostname= 'localhost',
    $database= 'cart',
    $username= 'root',
    $password= ''
  ) {
    $this->hostname = $hostname;
    $this->database= $database;
    $this->username= $username;
    $this->password= $password;
  }

  public function CreateConnection() {
    $db = new mysqli($this->hostname, $this->username, $this->password, $this->database);
    if($db->connect_error){
      throw new Exception('Connection failed ('.$db->connect_errno.')');
    }
    return $db;
  }

}
?>