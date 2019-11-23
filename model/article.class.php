<?php
class Article {

  /* Mapped */
  
  private $id;
  public function getId () { return $this->id; }
  public function setId ($id) { $this->id = $id; }

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

  private $description;
  public function getDescription () { return $this->description; }
  public function setDescription ($description) { $this->description = $description; }
  /* No-mapped */

  private $cartUniqueId;
  public function getCartUniqueId () { return $this->cartUniqueId; }
  public function setCartUniqueId ($cartUniqueId) { $this->cartUniqueId = $cartUniqueId; }

  public function __construct(
    $code = '',
    $supplierid = '',
    $name = '',
    $price = 0,
    $quantity = 0,
    $image = '',
    $categoryid = '',
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

  public static function GetArticleById ($id) {
    $model = null;
    $db = (new DataBase())->CreateConnection();
    $statement = $db->prepare('SELECT `CODE`, `SUPPLIERID`, `NAME`, `PRICE`, `QUANTITY`, `IMAGE`, `CATEGORYID` , `DESCRIPTION` , `ID` FROM `articles` WHERE `ID` = ?');
    $statement->bind_param('i', $id);
    $statement->bind_result($CODE, $SUPPLIERID, $NAME, $PRICE, $QUANTITY, $IMAGE, $CATEGORYID , $DESCRIPTION , $ID);
    if ($statement->execute()) {
      while ($row = $statement->fetch()) {
        $model = new Article($CODE, $SUPPLIERID, $NAME, $PRICE, $QUANTITY, $IMAGE, $CATEGORYID , $DESCRIPTION , $ID);
      }
    }
    return $model;
  }

  public static function GetAllArticles () {
    $models = [];
    $db = (new DataBase())->CreateConnection();
    $statement = $db->prepare('SELECT `CODE`, `SUPPLIERID`, `NAME`, `PRICE`, `QUANTITY`, `IMAGE` , `CATEGORYID` , `DESCRIPTION` , `ID` FROM `articles` ');
    $statement->bind_result($CODE, $SUPPLIERID, $NAME, $PRICE, $QUANTITY, $IMAGE, $CATEGORYID , $DESCRIPTION , $ID);
    if ($statement->execute()) {
      while ($row = $statement->fetch()) {
        $model = new Article($CODE, $SUPPLIERID, $NAME, $PRICE, $QUANTITY, $IMAGE, $CATEGORYID , $DESCRIPTION , $ID);
        array_push($models, $model);
      }
    }
    return $models;
  }

  public function Create () {
    $db = (new DataBase())->CreateConnection();
    $statement = $db->prepare('INSERT INTO `articles`(`CODE`, `SUPPLIERID`, `NAME`, `PRICE`, `QUANTITY`, `IMAGE` , `CATEGORYID` , `DESCRIPTION`)  VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
    $statement->bind_param(
      'sssdisss',
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
      'UPDATE `articles` SET 
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
      'sssdisssi',
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
    $statement = $db->prepare('DELETE FROM `articles` WHERE `ID` = ?');
    $statement->bind_param('i', $this->id);
    $statement->execute();
    $statement = $db->prepare('ALTER TABLE `articles` AUTO_INCREMENT=1');
    $statement->execute();
  }

  

}
?>