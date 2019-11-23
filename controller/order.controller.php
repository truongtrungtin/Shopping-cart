<?php
class OrderController extends BaseController {
    
    public function __CONSTRUCT (){}
    
    public function Index () {
        $model = [];
        if ((Security::GetLoggedUser())->getRole() == 'ADMIN') {
            $model = vwSale::GetAllOrder();
        } else {
            $model = vwSale::GetAllOrderForUser((Security::GetLoggedUser())->getId());
        }
        parent::RenderPage(
            'Order', 
            'view/layout/layout.php', 
            'view/order/order.php',
            $model
        );
    }

}

?>