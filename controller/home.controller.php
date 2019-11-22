<?php
class HomeController extends BaseController {
    
    public function __CONSTRUCT (){}
    
    public function Index () {
        $model = Article::GetAllArticles();
        parent::RenderPage(
            'Home', 
            'view/layout/layout.php', 
            'view/home/home.php',
            $model
        );
    }
    
}

?>