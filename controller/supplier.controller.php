<?php
class SupplierController extends BaseController {
    
    public function __CONSTRUCT (){}
    
    public function Index () {
        $model = Supplier::GetAllSupplier();
        parent::RenderPage(
            'Supplier', 
            'view/layout/layout.php', 
            'view/supplier/supplier.php',
            $model
        );
    }

    public function Create () {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $model = new Supplier(
                $_REQUEST['supp_name'], 
                $_REQUEST['supp_phone'],
                $_REQUEST['supp_address'],
            );
            $model->Create();
            parent::RedirectToController('supplier');
        } else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            parent::RenderPage(
                'Supplier', 
                'view/layout/layout.php', 
                'view/supplier/create.php',
                $model,
            );
        }
    }

    public function Edit () {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $model = new Supplier(
                $_REQUEST['supp_name'], 
                $_REQUEST['supp_phone'],
                $_REQUEST['supp_address'],
                $_REQUEST['supp_id']
            );
            $model->Edit();
            parent::RedirectToController('supplier');
        } else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            parent::RenderPage(
                'Manage', 
                'view/layout/layout.php', 
                'view/manage/supplier.php',
                $model,
            );
        }
    }


}