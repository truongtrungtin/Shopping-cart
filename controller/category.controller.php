<?php
class CategoryController extends BaseController {
    
    public function __CONSTRUCT (){}

    private function RedirectToHomeIfNotAdmin () {
        if ((Security::GetLoggedUser())->getRole() != 'ADMIN') {
            parent::RedirectToController('home');
        }
    }
    
    public function Index () {
        $this->RedirectToHomeIfNotAdmin();
        $model = Category::GetAllCategory();
        parent::RenderPage(
            'Category', 
            'view/layout/layout.php', 
            'view/category/category.php',
            $model
        );
    }

    public function Create () {
        $this->RedirectToHomeIfNotAdmin();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $model = new Category(
                $_REQUEST['cate_name'], 
            );
            $model->Create();
            parent::RedirectToController('category');
        } else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            parent::RenderPage(
                'Category',
                'view/layout/layout.php', 
                'view/category/create.php',
                $model
            );
        }
    }

    public function Edit () {
        $this->RedirectToHomeIfNotAdmin();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $model = new Category(
                $_REQUEST['cate_name'], 
                $_REQUEST['cate_id'],
            );
            $model->Edit();
            parent::RedirectToController('category');
        } else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = (int)$_REQUEST['id'];
            $model = Category::GetCatebyId($id);
            parent::RenderPage(
                'Category',
                'view/layout/layout.php', 
                'view/category/edit.php',
                $model
            );
        }
    }

}