<?php
class ManageController extends BaseController {
    
    public function __CONSTRUCT (){}
    
    public function Index () {
        parent::RenderPage(
            'Manage', 
            'view/layout/layout.php', 
            'view/manage/manage.php',
        );
    }

    public function CreateSupplier () {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $model = new Supplier(
                $_REQUEST['supp_id'],
                $_REQUEST['supp_name'], 
                $_REQUEST['supp_phone'],
                $_REQUEST['supp_address'],
            );
            $model->Create();
            parent::RedirectToController('articles');
        } else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            parent::RenderPage(
                'Manage', 
                'view/layout/layout.php', 
                'view/manage/supplier.php',
                $model,
            );
        }
    }

    public function CreateCategory () {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $model = new Supplier(
                $_REQUEST['supp_id'],
                $_REQUEST['supp_name'], 
                $_REQUEST['supp_phone'],
                $_REQUEST['supp_address'],
                
            );
            $model->Create();
            parent::RedirectToController('articles');
        } else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            parent::RenderPage(
                'Articles',
                'view/layout/layout.php', 
                'view/articles/create.php',
                $model
            );
        }
    }

}