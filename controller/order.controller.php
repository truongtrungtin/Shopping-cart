<?php
class OrderController extends BaseController {
    
    public function __CONSTRUCT (){}
    
    public function Index () {
        $model = [];
        if ((Security::GetLoggedUser())->getRole() == 'ADMIN') {
            $model = Order::GetAllOrder();
        } else {
            $model = Order::GetAllOrderForUser((Security::GetLoggedUser())->getId());
        }
        parent::RenderPage(
            'Order', 
            'view/layout/layout.php', 
            'view/order/order.php',
            $model
        );
    }

    public function Details () {
        $id = (int)$_REQUEST['id'];
        $model = vwSale::GetOrderDetailById($id);
        parent::RenderPage(
            'Order', 
            'view/layout/layout.php', 
            'view/order/details.php',
            $model
        );
    }



}

?>