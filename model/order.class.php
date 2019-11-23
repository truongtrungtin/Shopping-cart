<?php
class Sale {

  private $id;
  public function getId () { return $this->id; }
  private function setId ($id) { $this->id = $id; }

  private $userID;
  public function getUserID () { return $this->userID; }
  private function setUserID ($userID) { $this->userID = $userID; }

  private $productID;
  public function getArticleID () { return $this->productID; }
  private function setArticleID ($productID) { $this->productID = $productID; }

  private $invoiceNumber;
  public function getInvoiceNumber () { return $this->invoiceNumber; }
  private function setInvoiceNumber ($invoiceNumber) { $this->invoiceNumber = $invoiceNumber; }

  private $saleDate;
  public function getSaleDate () { return $this->saleDate; }
  private function setSaleDate ($saleDate) { $this->saleDate = $saleDate; }

  public function __construct(
    $userID,
    $productID,
    $invoiceNumber = '',
    $saleDate = '',
    $id = null
  ) {
    $this->userID = $userID;
    $this->productID = $productID;
    $this->invoiceNumber = $invoiceNumber;
    $this->saleDate = $saleDate;
    $this->id = $id;
  }

  public function Create () {
    $db = (new DataBase())->CreateConnection();
    $statement = $db->prepare('INSERT INTO `order`(`USERID`, `PRODUCTID`, `INVOICENUMBER`, `SALEDATE`) VALUES (?, ?, ?, ?)');
    $statement->bind_param(
      'iiss',
      $this->userID,
      $this->productID,
      $this->invoiceNumber,
      $this->saleDate
    );
    $statement->execute();

    Setting::IncrementLastInvoiceNumber();

    $product = Article::GetArticleById($this->productID);
    $product->setQuantity($product->getQuantity()-1);
    $product->Edit();

  }

  public function Edit () {
    $db = (new DataBase())->CreateConnection();
    $statement = $db->prepare(
      'UPDATE `order` SET 
        `USERID` = ?,
        `PRODUCTID` = ?,
        `INVOICENUMBER`= ?,
        `SALEDATE` = ?
      WHERE `ID` = ?
      '
    );
    $statement->bind_param(
      'iissi',
      $this->userID,
      $this->productID,
      $this->invoiceNumber,
      $this->saleDate,
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