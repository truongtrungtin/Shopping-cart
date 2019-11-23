<?php
class vwSale {

  private $id;
  public function getId () { return $this->id; }
  private function setId ($id) { $this->id = $id; }

  private $userid;
  public function getUserid () { return $this->userid; }
  public function setUseid ($userid) { $this->userid = $userid; }

  private $username;
  public function getUsername () { return $this->username; }
  public function setUsername ($username) { $this->username = $username; }

  private $code; 
  public function getCode () { return $this->code; }
  public function setCode ($code) { $this->code = $code; }

  private $supplier; 
  public function getSupplier () { return $this->supplier; }
  public function setSupplier ($supplier){ $this->supplier = $supplier; }

  private $category; 
  public function getCategory () { return $this->category; }
  public function setCategory($category) { $this->category = $category; }

  private $name; 
  public function getName () { return $this->name; }
  public function setName ($name) { $this->name = $name; }

  private $invoiceNumber;
  public function getInvoiceNumber () { return $this->invoiceNumber; }
  private function setInvoiceNumber ($invoiceNumber) { $this->invoiceNumber = $invoiceNumber; }

  private $saleDate;
  public function getSaleDate () { return $this->saleDate; }
  private function setSaleDate ($saleDate) { $this->saleDate = $saleDate; }


  public function __construct(
    $userid = 0,
    $username = '',
    $code = '',
    $supplier= '',
    $category = '',
    $name = '',
    $invoiceNumber = 0,
    $saleDate = '',
    $description = '',
    $image = '',
    $quantity = 0,
    $price = 0,
    $supplierid= 0,
    $categoryid = 0,
    $id = null
  ) {
    $this->userid= $userid;
    $this->username = $username;
    $this->code = $code;
    $this->supplier = $supplier;
    $this->category = $category;
    $this->name = $name;
    $this->invoiceNumber = $invoiceNumber;
    $this->saleDate = $saleDate;
    $this->description = $description;
    $this->image = $image;
    $this->quantity = $quantity;
    $this->price = $price;
    $this->supplierid = $supplierid;
    $this->categoryid = $categoryid;
    $this->id = $id;
  }

  public static function GetSaleById ($id) {
    $model = null;
    $db = (new DataBase())->CreateConnection();
    $statement = $db->prepare('SELECT `USERID` , `USERNAME`, `CODE`, `SUPPLIER`, `CATEGORY` , `NAME` , `INVOICENUMBER`, `SALEDATE`, `ID` FROM `carts` WHERE `ID` = ?');
    $statement->bind_param('i', $id);
    $statement->bind_result(  $USERID , $USERNAME, $CODE, $SUPPLIER, $CATEGORY , $NAME, $INVOICENUMBER, $SALEDATE, $ID);
    if ($statement->execute()) {
      while ($row = $statement->fetch()) {
        $model = new vwSale(  $USERID , $USERNAME, $CODE, $SUPPLIER, $CATEGORY , $NAME, $INVOICENUMBER, $SALEDATE, $ID);
      }
    }
    return $model;
  }



  public static function GetAllSales () {
    $models = [];
    $db = (new DataBase())->CreateConnection();
    $statement = $db->prepare('SELECT `USERID` , `USERNAME`,  `CODE`, `SUPPLIER`, `CATEGORY` , `NAME`, `INVOICENUMBER`, `SALEDATE`, `ID` FROM `carts` ORDER BY `INVOICENUMBER` ASC ');
    $statement->bind_result(  $USERID ,$USERNAME, $CODE, $SUPPLIER, $CATEGORY , $NAME, $INVOICENUMBER, $SALEDATE, $ID);
    if ($statement->execute()) {
      while ($row = $statement->fetch()) {
        $model = new vwSale(  $USERID ,$USERNAME, $CODE, $SUPPLIER, $CATEGORY , $NAME, $INVOICENUMBER, $SALEDATE, $ID);
        array_push($models, $model);
      }
    }
    return $models;
  }

  public static function GetAllSalesForUser ($Userid) {
    $models = [];
    $db = (new DataBase())->CreateConnection();
    $statement = $db->prepare('SELECT  `USERID` , `USERNAME`,  `CODE`, `SUPPLIER`, `CATEGORY` , `NAME`, `INVOICENUMBER`, `SALEDATE`, `ID` FROM `carts` WHERE `USERID` = ?');
    $statement->bind_result(  $USERID , $USERNAME, $CODE, $SUPPLIER, $CATEGORY , $NAME, $INVOICENUMBER, $SALEDATE, $ID);
    $statement->bind_param('i', $Userid);
    if ($statement->execute()) {
      while ($row = $statement->fetch()) {
        $model = new vwSale(  $USERID ,$USERNAME, $CODE, $SUPPLIER, $CATEGORY , $NAME, $INVOICENUMBER, $SALEDATE, $ID);
        array_push($models, $model);
      }
    }
    return $models;
  }

  public static function GetSaleByInvoiceNumber ($invoiceNumber) {
    $model = null;
    $db = (new DataBase())->CreateConnection();
    $statement = $db->prepare('SELECT  `USERID` , `USERNAME`,  `CODE`, `SUPPLIER`, `CATEGORY` , `NAME`, `INVOICENUMBER`, `SALEDATE`, `ID` FROM `carts` WHERE `INVOICENUMBER` = ?');
    $statement->bind_param('i', $invoiceNumber);
    $statement->bind_result(  $USERID ,$USERNAME, $CODE, $SUPPLIER, $CATEGORY , $NAME, $INVOICENUMBER, $SALEDATE, $ID);
    if ($statement->execute()) {
      while ($row = $statement->fetch()) {
        $model = new vwSale(  $USERID ,$USERNAME, $CODE, $SUPPLIER, $CATEGORY , $NAME, $INVOICENUMBER, $SALEDATE, $ID);
      }
    }
    return $model;
  }

  public static function FindSalesByInvoiceNumber ($invoiceNumber) {
    $models = [];
    $db = (new DataBase())->CreateConnection();
    $statement = $db->prepare('SELECT  `USERID` , `USERNAME`,  `CODE`, `SUPPLIER`, `CATEGORY` , `NAME`, `INVOICENUMBER`, `SALEDATE`, `ID` FROM `carts` WHERE `INVOICENUMBER` LIKE ?');
    $statement->bind_param('s', $invoiceNumber);
    $statement->bind_result(  $USERID ,$USERNAME, $CODE, $SUPPLIER, $CATEGORY , $NAME, $INVOICENUMBER, $SALEDATE, $ID);
    if ($statement->execute()) {
      while ($row = $statement->fetch()) {
        $model = new vwSale(  $USERID ,$USERNAME, $CODE, $SUPPLIER, $CATEGORY , $NAME, $INVOICENUMBER, $SALEDATE, $ID);
        array_push($models, $model);
      }
    }
    return $models;
  }

}
?>