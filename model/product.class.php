<?php
class Product {

  /* Mapped */
  
  private $id;
  public function getId () { return $this->id; }
  private function setId ($id) { $this->id = $id; }

  private $code; 
  public function getCode () { return $this->code; }
  private function setCode ($code) { $this->code = $code; }

  private $supplierid; 
  public function getSupplierid () { return $this->supplierid; }
  private function setSupplierid ($supplierid) { $this->supplierid = $supplierid; }

  private $name; 
  public function getName () { return $this->name; }
  private function setName ($name) { $this->name = $name; }

  private $price; 
  public function getPrice () { return $this->price; }
  private function setPrice ($price) { $this->price = $price; }

  private $quantity; 
  public function getQuantity () { return $this->quantity; }
  private function setQuantity ($quantity) { $this->quantity = $quantity; }

  private $image;
  public function getImage () { return $this->image; }
  private function setImage ($image) { $this->image = $image; }
  
  private $categoryid;
  public function getCategoryid () { return $this->categoryid; }
  private function setCategoryid ($categoryid) { $this->categoryid = $categoryid; }

  private $description;
  public function getDescription () { return $this->description; }
  private function setDescription ($description) { $this->description = $description; }
  /* No-mapped */

  private $cartUniqueId;
  public function getCartUniqueId () { return $this->cartUniqueId; }
  public function setCartUniqueId ($cartUniqueId) { $this->cartUniqueId = $cartUniqueId; }

  public function __construct(
    $code = '',
    $supplierid = 0,
    $name = '',
    $price = 0,
    $quantity = 0,
    $image = '',
    $categoryid = 0,
    $description = '',
    $id = null
  ) {
    $this->code = $code;
    $this->supplierid = $supplierid;
    $this->name = $name;
    $this->price = $price;
    $this->quantity = $quantity;
    $this->image = $image;
    $this->categoryid = $categoryid;
    $this->description = $description;
    $this->id = $id;
    
    $this->cartUniqueId = uniqid('CART_');
  }

  public static function GetProductById ($id) {
    $model = null;
    $db = (new DataBase())->CreateConnection();
    $statement = $db->prepare('SELECT `CODE`, `SUPPLIERID`, `NAME`, `PRICE`, `QUANTITY`, `IMAGE`, `CATEGORYID` , `DESCRIPTION` , `ID` FROM `product` WHERE `ID` = ?');
    $statement->bind_param('i', $id);
    $statement->bind_result($CODE, $SUPPLIERID, $NAME, $PRICE, $QUANTITY, $IMAGE, $CATEGORYID , $DESCRIPTION , $ID);
    if ($statement->execute()) {
      while ($row = $statement->fetch()) {
        $model = new Product($CODE, $SUPPLIERID, $NAME, $PRICE, $QUANTITY, $IMAGE, $CATEGORYID , $DESCRIPTION , $ID);
      }
    }
    return $model;
  }

  public static function GetAllProduct () {
    $models = [];
    $db = (new DataBase())->CreateConnection();
    $statement = $db->prepare('SELECT `CODE`, `SUPPLIERID`, `NAME`, `PRICE`, `QUANTITY`, `IMAGE` , `CATEGORYID` , `DESCRIPTION` , `ID` FROM `product` LIMIT 9 ');
    $statement->bind_result($CODE, $SUPPLIERID, $NAME, $PRICE, $QUANTITY, $IMAGE, $CATEGORYID , $DESCRIPTION , $ID);
    if ($statement->execute()) {
      while ($row = $statement->fetch()) {
        $model = new Product($CODE, $SUPPLIERID, $NAME, $PRICE, $QUANTITY, $IMAGE, $CATEGORYID , $DESCRIPTION , $ID);
        array_push($models, $model);
      }
    }
    return $models;
  }

  public function Create () {
    $db = (new DataBase())->CreateConnection();
    $statement = $db->prepare('INSERT INTO `product`(`CODE`, `SUPPLIERID`, `NAME`, `PRICE`, `QUANTITY`, `IMAGE` , `CATEGORYID` , `DESCRIPTION`)  VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
    $statement->bind_param(
      'sisdisis',
      $this->code,
      $this->supplierid,
      $this->name,
      $this->price,
      $this->quantity,
      $this->image,
      $this->categoryid,
      $this->description,
    );
    $statement->execute();
  }

  public function Edit () {
    $db = (new DataBase())->CreateConnection();
    $statement = $db->prepare(
      'UPDATE `product` SET 
        `CODE` = ?,
        `SUPPLIERID` = ?,
        `NAME` = ?,
        `PRICE` = ?,
        `QUANTITY` = ?,
        `IMAGE` = ? ,
        `CATEGORYID` =?,
        `DESCRIPTION` =?
      WHERE `ID` = ?'
    );
    $statement->bind_param(
      'sisdissii',
      $this->code,
      $this->supplierid,
      $this->name,
      $this->price,
      $this->quantity,
      $this->image,
      $this->categoryid,
      $this->description,
      $this->id
    );
    $statement->execute();
  }

  public function Delete () {
    $db = (new DataBase())->CreateConnection();
    $statement = $db->prepare('DELETE FROM `product` WHERE `ID` = ?');
    $statement->bind_param('i', $this->id);
    $statement->execute();
    $statement = $db->prepare('ALTER TABLE `product` AUTO_INCREMENT=1');
    $statement->execute();
  }

  

}
?>