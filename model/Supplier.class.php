<?php

class Supplier
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

  private $supplier;
  public function getSupplier()
  {
    return $this->supplier;
  }
  private function setSupplier($supplier)
  {
    $this->supplier = $supplier;
  }

  private $phone;
  public function getPhone()
  {
    return $this->phone;
  }
  private function setPhone($phone)
  {
    $this->phone = $phone;
  }

  private $address;
  public function getAddress()
  {
    return $this->address;
  }
  private function setAddress($address)
  {
    $this->address = $address;
  }

  public function __construct(

    $supplier = '',
    $phone = '',
    $address = '',
    $id = null
  ) {
    $this->supplier = $supplier;
    $this->phone = $phone;
    $this->address = $address;
    $this->id = $id;
  }


  public static function GetSupplierbyId($id)
  {
    $model = null;
    $db = (new DataBase())->CreateConnection();
    $statement = $db->prepare('SELECT `Supp_Name` , `Supp_Phone`, `Supp_Address` , `Supp_ID` FROM `supplier` WHERE `Supp_ID` = ?');
    $statement->bind_result( $SUPPLIER, $PHONE, $ADDRESS , $ID);
    $statement->bind_param('i', $id);
    if ($statement->execute()) {
      while ($row = $statement->fetch()) {
        $model = new Supplier( $SUPPLIER, $PHONE, $ADDRESS , $ID);
      }
    }
    return $model;
  }

  public static function GetAllSupplier()
  {
    $models = [];
    $db = (new DataBase())->CreateConnection();
    $statement = $db->prepare('SELECT `Supp_Name` , `Supp_Phone`, `Supp_Address` , `Supp_ID`  FROM `supplier`');
    $statement->bind_result( $SUPPLIER, $PHONE, $ADDRESS , $ID);
    if ($statement->execute()) {
      while ($row = $statement->fetch()) {
        $model = new Supplier( $SUPPLIER, $PHONE, $ADDRESS , $ID);
        array_push($models, $model);
      }
    }
    return $models;
  }
  
  public function Create () {
    $db = (new DataBase())->CreateConnection();
    $statement = $db->prepare('INSERT INTO `supplier`(`Supp_Name`, `Supp_Phone`, `Supp_Address`)  VALUES ( ?, ?, ?)');
    $statement->bind_param(
      'sss',
      $this->supplier,
      $this->phone,
      $this->address,
    );
    $statement->execute();
  }

  public function Edit () {
    $db = (new DataBase())->CreateConnection();
    $statement = $db->prepare(
      'UPDATE `supplier` SET 
        `Supp_Name` = ?,
        `Supp_Phone` = ?,
        `Supp_Address` = ?
      WHERE `Supp_ID` = ?'
    );
    $statement->bind_param(
      'sssi',
      $this->supplier,
      $this->phone,
      $this->address,
      $this->id
    );
    $statement->execute();
  }

  public function Delete () {
    $db = (new DataBase())->CreateConnection();
    $statement = $db->prepare('DELETE FROM `supplier` WHERE `Supp_ID` = ?');
    $statement->bind_param('i', $this->id);
    $statement->execute();
  }
}
