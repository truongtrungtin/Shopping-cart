<?php
class vwSale {

  private $invoicenumber;
  public function getInvoicenumber () { return $this->invoicenumber; }
  private function setInvoicenumber ($invoicenumber) { $this->invoicenumber = $invoicenumber; }

  private $userid;
  public function getUserid () { return $this->userid; }
  public function setUseid ($userid) { $this->userid = $userid; }

  private $username;
  public function getUsername () { return $this->username; }
  public function setUsername ($username) { $this->username = $username; }

  private $code; 
  public function getCode () { return $this->code; }
  public function setCode ($code) { $this->code = $code; }

  private $name; 
  public function getName () { return $this->name; }
  public function setName ($name) { $this->name = $name; }

  private $orderDate;
  public function getOrderDate () { return $this->orderDate; }
  private function setOrderDate ($orderDate) { $this->orderDate = $orderDate; }

  private $quantity; 
  public function getQuantity () { return $this->quantity; }
  public function setQuantity ($quantity) { $this->quantity = $quantity; }

  private $price;
  public function getPrice () { return $this->price; }
  private function setPrice ($price) { $this->price = $price; }


  private $image; 
  public function getImage () { return $this->image; }
  public function setImage($image) { $this->image = $image; }


  private $supplier; 
  public function getSupplier () { return $this->supplier; }
  public function setSupplier ($supplier){ $this->supplier = $supplier; }

  private $category; 
  public function getCategory () { return $this->category; }
  public function setCategory($category) { $this->category = $category; }


  public function __construct(
    $userid = 0,
    $username = '',
    $code = '',
    $name = '',
    $orderDate = '',
    $quantity = 0,
    $price = 0,
    $image = '',
    $supplier= '',
    $category = '',
    $invoicenumber = null
  ) {
    $this->userid= $userid;
    $this->username = $username;
    $this->code = $code;
    $this->name = $name;
    $this->orderDate = $orderDate;
    $this->quantity = $quantity;
    $this->price = $price;
    $this->image = $image;
    $this->supplier = $supplier;
    $this->category = $category;
    $this->invoicenumber = $invoicenumber;
  }

  public static function GetOrderDetailById ($invoicenumber) {
    $models = [];
    $db = (new DataBase())->CreateConnection();
    $statement = $db->prepare('SELECT `u`.`ID` AS `USERID`, `u`.`USERNAME` AS `USERNAME`, `p`.`CODE` AS `CODE`, `p`.`NAME` AS `NAME`, `o`.`ORDERDATE` AS `ORDERDATE`, `od`.`QUANTITY` AS `QUANTITY`, `p`.`PRICE` AS `PRICE`,`p`.`IMAGE` AS `IMAGE`, `su`.`Supp_Name` AS `SUPPLIER` ,`ca`.`Cate_Name` AS `CATEGORY`, `o`.`INVOICENUMBER` AS `INVOICENUMBER` from (((((`cart`.`order` `o` join `cart`.`users` `u` on(`o`.`USERID` = `u`.`ID`)) join `cart`.`order_detail` `od` on(`o`.`INVOICENUMBER` = `od`.`INVOICENUMBER`)) join `cart`.`product` `p` on(`p`.`ID` = `od`.`PRODUCTID`)) join `cart`.`supplier` `su` on(`p`.`SUPPLIERID` = `su`.`Supp_ID`)) join `cart`.`category` `ca` on(`p`.`CATEGORYID` = `ca`.`Cate_ID`)) WHERE `o`.`INVOICENUMBER` = ?');
    $statement->bind_param('i', $invoicenumber);
    $statement->bind_result(  $USERID , $USERNAME, $CODE,  $NAME, $ORDERDATE, $QUANTITY , $PRICE , $IMAGE , $SUPPLIER, $CATEGORY , $INVOICENUMBER);
    if ($statement->execute()) {
      while ($row = $statement->fetch()) {
        $model = new vwSale(  $USERID , $USERNAME, $CODE,  $NAME, $ORDERDATE, $QUANTITY , $PRICE , $IMAGE , $SUPPLIER, $CATEGORY , $INVOICENUMBER);
        array_push($models, $model);
      }
    }
    return $models;
  }



  public static function GetAllOrder () {
    $models = [];
    $db = (new DataBase())->CreateConnection();
    $statement = $db->prepare(' SELECT `u`.`ID` AS `USERID`, `u`.`USERNAME` AS `USERNAME`, `p`.`CODE` AS `CODE`, `p`.`NAME` AS `NAME`, `o`.`ORDERDATE` AS `ORDERDATE`, `od`.`QUANTITY` AS `QUANTITY`, `p`.`PRICE` AS `PRICE`,`p`.`IMAGE` AS `IMAGE`, `su`.`Supp_Name` AS `SUPPLIER` ,`ca`.`Cate_Name` AS `CATEGORY`, `o`.`INVOICENUMBER` AS `INVOICENUMBER` from (((((`cart`.`order` `o` join `cart`.`users` `u` on(`o`.`USERID` = `u`.`ID`)) join `cart`.`order_detail` `od` on(`o`.`INVOICENUMBER` = `od`.`INVOICENUMBER`)) join `cart`.`product` `p` on(`p`.`ID` = `od`.`PRODUCTID`)) join `cart`.`supplier` `su` on(`p`.`SUPPLIERID` = `su`.`Supp_ID`)) join `cart`.`category` `ca` on(`p`.`CATEGORYID` = `ca`.`Cate_ID`)) order by `o`.`INVOICENUMBER`');
    $statement->bind_result( $USERID , $USERNAME, $CODE,  $NAME, $ORDERDATE, $QUANTITY , $PRICE , $IMAGE , $SUPPLIER, $CATEGORY , $INVOICENUMBER);
    if ($statement->execute()) {
      while ($row = $statement->fetch()) {
        $model = new vwSale( $USERID , $USERNAME, $CODE,  $NAME, $ORDERDATE, $QUANTITY , $PRICE , $IMAGE , $SUPPLIER, $CATEGORY , $INVOICENUMBER);
        array_push($models, $model);
      }
    }
    return $models;
  }

  public static function GetAllOrderForUser ($Userid) {
    $models = [];
    $db = (new DataBase())->CreateConnection();
    $statement = $db->prepare('SELECT `u`.`ID` AS `USERID`, `u`.`USERNAME` AS `USERNAME`, `p`.`CODE` AS `CODE`, `p`.`NAME` AS `NAME`, `o`.`ORDERDATE` AS `ORDERDATE`, `od`.`QUANTITY` AS `QUANTITY`, `p`.`PRICE` AS `PRICE`,`p`.`IMAGE` AS `IMAGE`, `su`.`Supp_Name` AS `SUPPLIER` ,`ca`.`Cate_Name` AS `CATEGORY`, `o`.`INVOICENUMBER` AS `INVOICENUMBER` from (((((`cart`.`order` `o` join `cart`.`users` `u` on(`o`.`USERID` = `u`.`ID`)) join `cart`.`order_detail` `od` on(`o`.`INVOICENUMBER` = `od`.`INVOICENUMBER`)) join `cart`.`product` `p` on(`p`.`ID` = `od`.`PRODUCTID`)) join `cart`.`supplier` `su` on(`p`.`SUPPLIERID` = `su`.`Supp_ID`)) join `cart`.`category` `ca` on(`p`.`CATEGORYID` = `ca`.`Cate_ID`)) WHERE `u`.`ID` = ?');
    $statement->bind_result(   $USERID , $USERNAME, $CODE,  $NAME, $ORDERDATE, $QUANTITY , $PRICE , $IMAGE , $SUPPLIER, $CATEGORY , $INVOICENUMBER);
    $statement->bind_param('i', $Userid);
    if ($statement->execute()) {
      while ($row = $statement->fetch()) {
        $model = new vwSale(   $USERID , $USERNAME, $CODE,  $NAME, $ORDERDATE, $QUANTITY , $PRICE , $IMAGE , $SUPPLIER, $CATEGORY , $INVOICENUMBER);
        array_push($models, $model);
      }
    }
    return $models;
  }

  public static function GetSaleByInvoiceNumber ($invoiceNumber) {
    $model = null;
    $db = (new DataBase())->CreateConnection();
    $statement = $db->prepare('SELECT `u`.`ID` AS `USERID`, `u`.`USERNAME` AS `USERNAME`, `p`.`CODE` AS `CODE`, `p`.`NAME` AS `NAME`, `o`.`ORDERDATE` AS `ORDERDATE`, `od`.`QUANTITY` AS `QUANTITY`, `p`.`PRICE` AS `PRICE`,`p`.`IMAGE` AS `IMAGE`, `su`.`Supp_Name` AS `SUPPLIER` ,`ca`.`Cate_Name` AS `CATEGORY`, `o`.`INVOICENUMBER` AS `INVOICENUMBER` from (((((`cart`.`order` `o` join `cart`.`users` `u` on(`o`.`USERID` = `u`.`ID`)) join `cart`.`order_detail` `od` on(`o`.`INVOICENUMBER` = `od`.`INVOICENUMBER`)) join `cart`.`product` `p` on(`p`.`ID` = `od`.`PRODUCTID`)) join `cart`.`supplier` `su` on(`p`.`SUPPLIERID` = `su`.`Supp_ID`)) join `cart`.`category` `ca` on(`p`.`CATEGORYID` = `ca`.`Cate_ID`)) WHERE `o`.`INVOICENUMBER` = ?');
    $statement->bind_param('i', $invoiceNumber);
    $statement->bind_result(  $USERID , $USERNAME, $CODE,  $NAME, $ORDERDATE, $QUANTITY , $PRICE , $IMAGE , $SUPPLIER, $CATEGORY , $INVOICENUMBER);
    if ($statement->execute()) {
      while ($row = $statement->fetch()) {
        $model = new vwSale(  $USERID , $USERNAME, $CODE,  $NAME, $ORDERDATE, $QUANTITY , $PRICE , $IMAGE , $SUPPLIER, $CATEGORY , $INVOICENUMBER);
      }
    }
    return $model;
  }

  public static function FindOrderByInvoiceNumber ($invoiceNumber) {
    $models = [];
    $db = (new DataBase())->CreateConnection();
    $statement = $db->prepare('SELECT `u`.`ID` AS `USERID`, `u`.`USERNAME` AS `USERNAME`, `p`.`CODE` AS `CODE`, `p`.`NAME` AS `NAME`, `o`.`ORDERDATE` AS `ORDERDATE`, `od`.`QUANTITY` AS `QUANTITY`, `p`.`PRICE` AS `PRICE`,`p`.`IMAGE` AS `IMAGE`, `su`.`Supp_Name` AS `SUPPLIER` ,`ca`.`Cate_Name` AS `CATEGORY`, `o`.`INVOICENUMBER` AS `INVOICENUMBER` from (((((`cart`.`order` `o` join `cart`.`users` `u` on(`o`.`USERID` = `u`.`ID`)) join `cart`.`order_detail` `od` on(`o`.`INVOICENUMBER` = `od`.`INVOICENUMBER`)) join `cart`.`product` `p` on(`p`.`ID` = `od`.`PRODUCTID`)) join `cart`.`supplier` `su` on(`p`.`SUPPLIERID` = `su`.`Supp_ID`)) join `cart`.`category` `ca` on(`p`.`CATEGORYID` = `ca`.`Cate_ID`)) WHERE `o`.`INVOICENUMBER`  LIKE ?');
    $statement->bind_param('i', $invoiceNumber);
    $statement->bind_result( $USERID , $USERNAME, $CODE,  $NAME, $ORDERDATE, $QUANTITY , $PRICE , $IMAGE , $SUPPLIER, $CATEGORY , $INVOICENUMBER);
    if ($statement->execute()) {
      while ($row = $statement->fetch()) {
        $model = new vwSale( $USERID , $USERNAME, $CODE,  $NAME, $ORDERDATE, $QUANTITY , $PRICE , $IMAGE , $SUPPLIER, $CATEGORY , $INVOICENUMBER);
        array_push($models, $model);
      }
    }
    return $models;
  }

}
?>