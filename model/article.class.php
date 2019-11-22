<?php
class Article {

  /* Mapped */
  
  private $id;
  public function getId () { return $this->id; }
  private function setId ($id) { $this->id = $id; }

  private $code; 
  public function getCode () { return $this->code; }
  public function setCode ($code) { $this->code = $code; }

  private $supplierid; 
  public function getSupplierid () { return $this->supplierid; }
  public function setSupplierid ($supplierid) { $this->supplierid = $supplierid; }

  private $name; 
  public function getName () { return $this->name; }
  public function setName ($name) { $this->name = $name; }

  private $price; 
  public function getPrice () { return $this->price; }
  public function setPrice ($price) { $this->price = $price; }

  private $quantity; 
  public function getQuantity () { return $this->quantity; }
  public function setQuantity ($quantity) { $this->quantity = $quantity; }

  private $image;
  public function getImage () { return $this->image; }
  public function setImage ($image) { $this->image = $image; }
  
  private $categoryid;
  public function getCategoryid () { return $this->categoryid; }
  public function setCategoryid ($categoryid) { $this->categoryid = $categoryid; }

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
    $id = null
  ) {
    $this->code = $code;
    $this->supplierid = $supplierid;
    $this->name = $name;
    $this->price = $price;
    $this->quantity = $quantity;
    $this->image = $image;
    $this->categoryid = $categoryid;
    $this->id = $id;
    
    $this->cartUniqueId = uniqid('CART_');
  }

  public static function GetArticleById ($id) {
    $model = null;
    $db = (new DataBase())->CreateConnection();
    $statement = $db->prepare('SELECT `CODE`, `SUPPLIERID`, `NAME`, `PRICE`, `QUANTITY`, `IMAGE`, `CATEGORYID` , `ID` FROM `articles` WHERE `ID` = ?');
    $statement->bind_param('i', $id);
    $statement->bind_result($CODE, $SUPPLIERID, $NAME, $PRICE, $QUANTITY, $IMAGE, $CATEGORYID , $ID);
    if ($statement->execute()) {
      while ($row = $statement->fetch()) {
        $model = new Article($CODE, $SUPPLIERID, $NAME, $PRICE, $QUANTITY, $IMAGE, $CATEGORYID , $ID);
      }
    }
    return $model;
  }



  public static function GetAllArticles () {
    $models = [];
    $db = (new DataBase())->CreateConnection();
    $statement = $db->prepare('SELECT `CODE`, `SUPPLIERID`, `NAME`, `PRICE`, `QUANTITY`, `IMAGE` , `CATEGORYID` , `ID` FROM `articles` ');
    $statement->bind_result($CODE, $SUPPLIERID, $NAME, $PRICE, $QUANTITY, $IMAGE, $CATEGORYID , $ID);
    if ($statement->execute()) {
      while ($row = $statement->fetch()) {
        $model = new Article($CODE, $SUPPLIERID, $NAME, $PRICE, $QUANTITY, $IMAGE, $CATEGORYID , $ID);
        array_push($models, $model);
      }
    }
    return $models;
  }

  public function Create () {
    $db = (new DataBase())->CreateConnection();
    $statement = $db->prepare('INSERT INTO `articles`(`CODE`, `SUPPLIERID`, `NAME`, `PRICE`, `QUANTITY`, `IMAGE` , `CATEGORYID` ) VALUES (?, ?, ?, ?, ?, ?, ?)');
    $statement->bind_param(
      'sisdisi',
      $this->code,
      $this->supplierid,
      $this->name,
      $this->price,
      $this->quantity,
      $this->image,
      $this->categoryid,
    );
    $statement->execute();
  }

  public function Edit () {
    $db = (new DataBase())->CreateConnection();
    $statement = $db->prepare(
      'UPDATE `articles` SET 
        `CODE` = ?,
        `SUPPLIERID` = ?,
        `NAME` = ?,
        `PRICE` = ?,
        `QUANTITY` = ?,
        `IMAGE` = ? ,
        `CATEGORYID` =?
      WHERE `ID` = ?'
    );
    $statement->bind_param(
      'sisdisii',
      $this->code,
      $this->supplierid,
      $this->name,
      $this->price,
      $this->quantity,
      $this->image,
      $this->categoryid,
      $this->id
    );
    $statement->execute();
  }

  public function Delete () {
    $db = (new DataBase())->CreateConnection();
    $statement = $db->prepare('DELETE FROM `articles` WHERE `ID` = ?');
    $statement->bind_param('i', $this->id);
    $statement->execute();
  }

  

}
?>