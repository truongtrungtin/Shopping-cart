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

  public function __construct(
    $userID = 0,
    $orderDate = '',
    $invoicenumber = null
  ) {
    $this->userID = $userID;
    $this->orderDate = $orderDate;
    $this->invoicenumber = $invoicenumber;
  }

  public static function GetMaxInvoicenumber () {
    $model = null;
    $db = (new DataBase())->CreateConnection();
    $statement = $db->prepare('SELECT MAX(`INVOICENUMBER`) FROM `order`');
    $statement->bind_result( $INVOICENUMBER);
    if ($statement->execute()) {
      while ($row = $statement->fetch()) {
        $model = new Order($INVOICENUMBER);
      }
    }
    return $model;
  }

  public static function GetAllOrder () {
    $models = [];
    $db = (new DataBase())->CreateConnection();
    $statement = $db->prepare('SELECT `USERID` , `ORDERDATE` , `INVOICENUMBER` FROM `order`');
    $statement->bind_result( $USERID , $ORDERDATE , $INVOICENUMBER);
    if ($statement->execute()) {
      while ($row = $statement->fetch()) {
        $model = new Order(  $USERID , $ORDERDATE , $INVOICENUMBER);
        array_push($models, $model);
      }
    }
    return $models;
  }

  public static function GetAllOrderForUser ($Userid) {
    $models = [];
    $db = (new DataBase())->CreateConnection();
    $statement = $db->prepare('SELECT DISTINCT  `USERID` , `ORDERDATE` , `INVOICENUMBER` FROM `order` WHERE `USERID` = ? ORDER BY `INVOICENUMBER` ');
    $statement->bind_param('i',$Userid);
    $statement->bind_result( $USERID , $ORDERDATE , $INVOICENUMBER);
    if ($statement->execute()) {
      while ($row = $statement->fetch()) {
        $model = new Order( $USERID , $ORDERDATE , $INVOICENUMBER);
        array_push($models, $model);
      }
    }
    return $models;
  }

  public function Create () {
    $db = (new DataBase())->CreateConnection();
    $sql= "INSERT INTO `order`( `USERID`, `ORDERDATE`) VALUES (?, ?);";
    $statement = $db->prepare($sql);
    $statement->bind_param(
      'is',
      $this->userID,
      $this->orderDate
    );
    $statement->execute();
    // Setting::IncrementLastInvoiceNumber();
    // $product = Product::GetProductById($this->productID);
    // $product->setQuantity($product->getQuantity()-1);
    // $product->Edit();

  }

  public function Edit () {
    $db = (new DataBase())->CreateConnection();
    $statement = $db->prepare(
      'UPDATE `order` SET 
        `USERID` = ?,
        `PRODUCTID` = ?,
        `INVOICENUMBER`= ?,
        `ORDERDATE` = ?
      WHERE `ID` = ?
      '
    );
    $statement->bind_param(
      'iissi',
      $this->userID,
      $this->productID,
      $this->invoiceNumber,
      $this->orderDate,
      $this->id
    );
    $statement->execute();
  }

  public function Delete () {
    $db = (new DataBase())->CreateConnection();
    $statement = $db->prepare('DELETE FROM `order` WHERE `ID` = ?');
    $statement->bind_param('i', $this->id);
    $statement->execute();
  }

}
?>