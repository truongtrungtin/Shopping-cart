<?php

class Category
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

    private $category;
    public function getCategory()
    {
        return $this->category;
    }
    private function setCategoryr($category)
    {
        $this->category = $category;
    }


    public function __construct(
        $category = '',
        $id = null
    ) {
        $this->category = $category;
        $this->id = $id;
    }


    public static function GetCatebyId($id)
    {
        $model = null;
        $db = (new DataBase())->CreateConnection();
        $statement = $db->prepare('SELECT `Cate_Name` , `Cate_ID` FROM `category` WHERE `Cate_ID` = ?');
        $statement->bind_result($CATEGORY, $ID);
        $statement->bind_param('i', $id);
        if ($statement->execute()) {
            while ($row = $statement->fetch()) {
                $model = new Category($CATEGORY, $ID);
            }
        }
        return $model;
    }

    public static function GetAllCategory()
    {
        $models = [];
        $db = (new DataBase())->CreateConnection();
        $statement = $db->prepare('SELECT  `Cate_Name` , `Cate_ID` FROM `category`');
        $statement->bind_result($CATEGORY, $ID);
        if ($statement->execute()) {
            while ($row = $statement->fetch()) {
                $model = new Category($CATEGORY, $ID);
                array_push($models, $model);
            }
        }
        return $models;
    }

    public function Create()
    {
        $db = (new DataBase())->CreateConnection();
        $statement = $db->prepare('INSERT INTO `category`(`Cate_Name` )  VALUES ( ?)');
        $statement->bind_param(
            's',
            $this->category
        );
        $statement->execute();
    }

    public function Edit()
    {
        $db = (new DataBase())->CreateConnection();
        $statement = $db->prepare(
            'UPDATE `category` SET 
        `Cate_Name` = ?
      WHERE `Cate_ID` = ?'
        );
        $statement->bind_param(
            'si',
            $this->category,
            $this->id
        );
        $statement->execute();
    }

    public function Delete()
    {
        $db = (new DataBase())->CreateConnection();
        $statement = $db->prepare('DELETE FROM `category` WHERE `Cate_ID` = ?');
        $statement->bind_param('i', $this->id);
        $statement->execute();
    }
}
