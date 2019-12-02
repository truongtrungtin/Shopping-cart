<?php
class Order {

  private $invoicenumber;
  public function getInvoicenumber() { return $this->invoicenumber; }
  private function setInvoicenumber ($invoicenumber) { $this->invoicenumber = $invoicenumber; }

  private $userID;
  public function getUserID () { return $this->userID; }
  private function setUserID ($userID) { $this->userID = $userID; }

  private $orderDate;
  public function getOrderDate () { return $this->orderDate; }
  private function setOrderDate ($orderDate) { $this->orderDate = $orderDate; }

  private $consumerid;
  public function getConsumerid () { return $this->consumerid; }
  private function setConsumerid ($consumerid) { $this->consumerid = $consumerid; }

  public function __construct(
    $userID = 0,
    $orderDate = '',
    $consumerid = 0,
    $invoicenumber = null
  ) {
    $this->userID = $userID;
    $this->orderDate = $orderDate;
    $this->consumerid = $consumerid;
    $this->invoicenumber = $invoicenumber;
  }

  public static function GetAllOrder () {
    $models = [];
    $db = (new DataBase())->CreateConnection();
    $statement = $db->prepare('SELECT `USERID` , `ORDERDATE` , `CONSUMERID` , `INVOICENUMBER` FROM `order`');
    $statement->bind_result( $USERID , $ORDERDATE , $CONSUMERID , $INVOICENUMBER);
    if ($statement->execute()) {
      while ($row = $statement->fetch()) {
        $model = new Order(  $USERID , $ORDERDATE , $CONSUMERID , $INVOICENUMBER);
        array_push($models, $model);
      }
    }
    return $models;
  }

  public static function GetAllOrderForUser ($Userid) {
    $models = [];
    $db = (new DataBase())->CreateConnection();
    $statement = $db->prepare('SELECT DISTINCT  `USERID` , `ORDERDATE` , `CONSUMERID` , `INVOICENUMBER` FROM `order` WHERE `USERID` = ? ORDER BY `INVOICENUMBER` ');
    $statement->bind_param('i',$Userid);
    $statement->bind_result( $USERID , $ORDERDATE , $CONSUMERID , $INVOICENUMBER);
    if ($statement->execute()) {
      while ($row = $statement->fetch()) {
        $model = new Order( $USERID , $ORDERDATE , $CONSUMERID , $INVOICENUMBER);
        array_push($models, $model);
      }
    }
    return $models;
  }

  public function Create () {
    $db = (new DataBase())->CreateConnection();
    $sql= "INSERT INTO `order`( `USERID`, `ORDERDATE` , `CONSUMERID`) VALUES (?, ?, ?);";
    $statement = $db->prepare($sql);
    $statement->bind_param(
      'isi',
      $this->userID,
      $this->orderDate,
      $this->consumerid
    );
    $statement->execute();
    Setting::IncrementLastInvoiceNumber();

  }
}
?>