<?php
class DataBase {
  
  private $hostname;
  private $database;
  private $username;
  private $password;

  public function __construct(
    $hostname= 'us-cdbr-iron-east-05.cleardb.net',
    $database= 'heroku_d9b83df241f5abb',
    $username= 'b7818a642ba7bd',
    $password= '87f2cf60'
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
