<?php
class ProductController extends BaseController {
    
    public function __CONSTRUCT (){}
    
    public function Index () {
        $model = Article::GetAllProduct();
        parent::RenderPage(
            'Product', 
            'view/layout/layout.php', 
            'view/product/product.php',
            $model
        );
    }
    // Product
    public function Edit () {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $model = new Article(
                $_REQUEST['code'], 
                $_REQUEST['supplierid'],
                $_REQUEST['name'],
                $_REQUEST['price'],
                $_REQUEST['quantity'],
                $_REQUEST['image'],
                $_REQUEST['categoryid'],
                $_REQUEST['description'],
                $_REQUEST['id'],
            );
            $model->Edit();
            parent::RedirectToController('product');
        } else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = (int)$_REQUEST['id'];
            $model = Article::GetArticleById($id);
            parent::RenderPage(
                'Product',
                'view/layout/layout.php', 
                'view/product/edit.php',
                $model
            );
        }
    }

    public function Create () {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $model = new Article(
                $_REQUEST['code'], 
                $_REQUEST['supplierid'],
                $_REQUEST['name'],
                $_REQUEST['price'],
                $_REQUEST['quantity'],
                $_REQUEST['image'],
                $_REQUEST['categoryid'],
                $_REQUEST['description'],
            );
            $model->Create();
            parent::RedirectToController('product');
        } else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            parent::RenderPage(
                'Product',
                'view/layout/layout.php', 
                'view/product/create.php',
            );
        }
    }

    public function Delete () {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = (int)$_REQUEST['id'];
            $model = Article::GetArticleById($id);
            $model->Delete();
            parent::RedirectToController('product');
        } else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = (int)$_REQUEST['id'];
            $model = Article::GetArticleById($id);
            parent::RenderPage(
                'Product',
                'view/layout/layout.php', 
                'view/product/delete.php',
                $model
            );
        }
    }
    // Detail product
    
    public function Details () {
        $id = (int)$_REQUEST['id'];
        $model = vwProduct::GetProductById($id);
        parent::RenderPage(
            'Product',
            'view/layout/layout.php', 
            'view/product/details.php',
            $model
        );
    }

    public function Buy () {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = (int)$_REQUEST['id'];
            $product = Article::GetArticleById($id);
            $cart = null;
            if (ShoppingCartSession::ShoppingCartExists()) {
                $cart = ShoppingCartSession::GetShoppingCart();
                array_push($cart->product, $product);
            } else {
                $cart = new ShoppingCart();
                array_push($cart->product, $product);
            }
            ShoppingCartSession::StoreShoppingCartInSession($cart);
            parent::RedirectToController('product');
        } else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = (int)$_REQUEST['id'];
            $model = Article::GetArticleById($id);
            parent::RenderPage(
                'Product',
                'view/layout/layout.php', 
                'view/product/buy.php',
                $model
            );
        }
    }


}

?>