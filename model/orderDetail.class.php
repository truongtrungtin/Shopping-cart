<?php
class OrderDetail
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

    private $invoicenumber;
    public function getInvoicenumber()
    {
        return $this->invoicenumber;
    }
    private function setInvoicenumber($invoicenumber)
    {
        $this->invoicenumber = $invoicenumber;
    }

    private $productid;
    public function getProductid()
    {
        return $this->productid;
    }
    private function setProductid($productid)
    {
        $this->productid = $productid;
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

    public function __construct(
        $invoicenumber = 0,
        $productid = 0,
        $quantity = 0,
        $id = null
    ) {
        $this->invoicenumber = $invoicenumber;
        $this->productid = $productid;
        $this->quantity = $quantity;
        $this->id = $id;
    }


    public static function GetOrderDetailById($invoicenumber)
    {
        $models = [];
        $db = (new DataBase())->CreateConnection();
        $statement = $db->prepare('SELECT `INVOICENUMBER` , `PRODUCTID` , `QUANTITY`, `ID` FROM `order_detail` WHERE `INVOICENUMBER` = ? ');
        $statement->bind_param('i', $invoicenumber);
        $statement->bind_result($INVOICENUMBER, $PRODUCTID, $QUANTITY,  $ID);
        if ($statement->execute()) {
            while ($row = $statement->fetch()) {
                $model = new OrderDetail($INVOICENUMBER, $PRODUCTID, $QUANTITY,  $ID);
                array_push($models, $model);
            }
        }
        return $models;
    }

    public function Create()
    {
        $db = (new DataBase())->CreateConnection();
        $sql = "INSERT INTO `order_detail`( `INVOICENUMBER` , `PRODUCTID` , `QUANTITY`) VALUES (?,? ,?);";
        $statement = $db->prepare($sql);
        $statement->bind_param(
            'iii',
            $this->invoicenumber,
            $this->productid,
            $this->quantity
        );
        $statement->execute();
    }
}
