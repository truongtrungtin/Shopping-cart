<?php

class vwProduct
{

  private $id;
  public function getId()
  {
    return $this->id;
  }
  public function setId($id)
  {
    $this->id = $id;
  }

  private $code;
  public function getCode()
  {
    return $this->code;
  }
  public function setCode($code)
  {
    $this->code = $code;
  }

  private $supplier;
  public function getSupplier()
  {
    return $this->supplier;
  }
  public function setSupplier($supplier)
  {
    $this->supplier = $supplier;
  }

  private $category;
  public function getCategory()
  {
    return $this->category;
  }
  public function setCategory($category)
  {
    $this->category = $category;
  }

  private $name;
  public function getName()
  {
    return $this->name;
  }
  public function setName($name)
  {
    $this->name = $name;
  }

  private $description;
  public function getDescription()
  {
    return $this->description;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }

  private $image;
  public function getImage()
  {
    return $this->image;
  }
  private function setImage($image)
  {
    $this->image = $image;
  }

  private $quantity;
  public function getQuantity()
  {
    return $this->quantity;
  }
  private function setQuantity($quantity)
  {
    $this->quantity = $quantity;
  }

  private $price;
  public function getPrice()
  {
    return $this->price;
  }
  private function setPrice($price)
  {
    $this->price = $price;
  }

  private $supplierid;
  public function getSupplierid()
  {
    return $this->supplierid;
  }
  private function setSupplierid($supplierid)
  {
    $this->supplierid = $supplierid;
  }

  private $categoryid;
  public function getCategoryid()
  {
    return $this->categoryid;
  }
  private function setCategoryid($categoryid)
  {
    $this->categoryid = $categoryid;
  }


  public function __construct(
    $code = '',
    $supplier = '',
    $category = '',
    $name = '',
    $description = '',
    $image = '',
    $quantity = 0,
    $price = 0,
    $supplierid = 0,
    $categoryid = 0,
    $id = null
  ) {
    $this->code = $code;
    $this->supplier = $supplier;
    $this->category = $category;
    $this->name = $name;
    $this->description = $description;
    $this->image = $image;
    $this->quantity = $quantity;
    $this->price = $price;
    $this->supplierid = $supplierid;
    $this->categoryid = $categoryid;
    $this->id = $id;
  }


  public static function GetProductById($id)
  {
    $model = null;
    $db = (new DataBase())->CreateConnection();
    $statement = $db->prepare('SELECT `CODE` , `SUPPLIER` , `CATEGORY` , `NAME` , `DESCRIPTION`, `IMAGE`, `QUANTITY` , `PRICE` , `SUPPLIERID`, `CATEGORYID`, `ID` FROM `products` WHERE `ID` = ?');
    $statement->bind_result($CODE, $SUPPLIER, $CATEGORY, $NAME, $DESCRIPTION, $IMAGE, $QUANTITY, $PRICE, $SUPPLIERID, $CATEGORYID, $ID);
    $statement->bind_param('i', $id);
    if ($statement->execute()) {
      while ($row = $statement->fetch()) {
        $model = new vwProduct($CODE, $SUPPLIER, $CATEGORY, $NAME, $DESCRIPTION, $IMAGE, $QUANTITY, $PRICE, $SUPPLIERID, $CATEGORYID, $ID);
      }
    }
    return $model;
  }
}
