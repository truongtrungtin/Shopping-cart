<?php
class Consumer {

  /* Mapped */
  
  private $id;
  public function getId () { return $this->id; }
  private function setId ($id) { $this->id = $id; }


  private $consumername; 
  public function getConsumerName () { return $this->consumername; }
  public function setConsumerName ($consumername) { $this->consumername = $consumername; }


  private $consumeraddress;
  public function getConsumerAddress () { return $this->consumeraddress; }
  public function setConsumerAddress ($consumeraddress) { $this->consumeraddress = $consumeraddress; }


  /**
   * Creates a user with the given parameters
   *
   * @param string $consumername
   * @param string $consumeraddress
   * @param int $id
   */
  public function __construct(
    $consumername ="",
    $consumeraddress = "",
    $id = null
  ) {
    
    $this->consumername = $consumername;
    $this->consumeraddress = $consumeraddress;
    $this->id = $id;
  }


  /**
   * Fetches a user by the given id
   *
   * @param int $id Id of the user to get
   * @return User The user with the corresponding id, otherwise null
   */
  public static function GetConsumerByID ($id) {
    $model = null;
    $db = (new DataBase())->CreateConnection();
    $statement = $db->prepare('SELECT `Consumer_name`, `Consumer_address` , `ID` FROM `consumers` WHERE `ID` = ?');
    $statement->bind_param('i', $id);
    $statement->bind_result($CONSUMERNAME, $CONSUMERADDRESS , $ID);
    if ($statement->execute()) {
      while ($row = $statement->fetch()) {
        $model = new Consumer($CONSUMERNAME, $CONSUMERADDRESS , $ID);
      }
    }
    return $model;
  }

  /**
   * Fetches all the users on the database
   *
   * @return array An array of users
   */
  public static function GetAllConsumer () {
    $models = [];
    $db = (new DataBase())->CreateConnection();
    $statement = $db->prepare('SELECT `Consumer_name`, `Consumer_address` , `ID` FROM `consumers`');
    $statement->bind_result($CONSUMERNAME, $CONSUMERADDRESS , $ID);
    if ($statement->execute()) {
      while ($row = $statement->fetch()) {
        $model = new Consumer($CONSUMERNAME, $CONSUMERADDRESS , $ID);
        array_push($models, $model);
      }
    }
    return $models;
  }

  /**
   * Inserts the current user on the database
   *  
   * @return void
   */
  public function Create () {
    $db = (new DataBase())->CreateConnection();
    $statement = $db->prepare(
      'INSERT INTO `consumers`(`Consumer_name`, `Consumer_address`) 
      VALUES (?, ?)'
    );  
    $statement->bind_param(
      'ss',
      $this->consumername,
      $this->consumeraddress
    );
    $statement->execute();
    Setting::IncrementLastConsumer();
  }
}
