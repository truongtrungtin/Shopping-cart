<?php
class HomeController extends BaseController {
    
    public function __CONSTRUCT (){}
    
    public function Index () {
        $model = Article::GetAllProduct();
        parent::RenderPage(
            'Home', 
            'view/layout/layout.php', 
            'view/home/home.php',
            $model
        );
    }
    
}

?>