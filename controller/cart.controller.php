<?php
class CartController extends BaseController
{

    public function __CONSTRUCT()
    { }

    public function Index()
    {
        
        $cart = ShoppingCartSession::GetShoppingCart();
        $model = $cart->product;
        parent::RenderPage(
            'Cart',
            'view/layout/layout.php',
            'view/cart/cart.php',
            $model
        );
    }

    public function Empty()
    {
        ShoppingCartSession::RemoveShoppingCartFromSession();
        parent::RedirectToController('cart');
    }

    public function RemoveProduct()
    {
        $id = $_REQUEST['id'];
        $cart = ShoppingCartSession::GetShoppingCart();
        $filteredProduct = array_filter($cart->product, function ($element) use ($id) {
            return $element->getCartUniqueId() != $id;
        });
        if (count($filteredProduct) > 0) {
            $cart->product = $filteredProduct;
            ShoppingCartSession::StoreShoppingCartInSession($cart);
            parent::RedirectToController('cart');
        } else {
            ShoppingCartSession::RemoveShoppingCartFromSession();
            parent::RedirectToController('cart');
        }
    }

    public function Checkout()
    {
        $cart = ShoppingCartSession::GetShoppingCart();
        $model = $cart->product;
        parent::RenderPage(
            'Cart',
            'view/layout/layout.php',
            'view/cart/checkout.php',
            $model
        );
    }

    public function ConfirmCheckout()
    {
        if (ShoppingCartSession::ShoppingCartExists()) {
            $cart = ShoppingCartSession::GetShoppingCart();
            $cart->product;
            $user = Security::GetLoggedUser();
            $order = new Order(
                $user->getId(),
                $orderDate = (new DateTime())->format('Y-m-d'),
            );
            $order->Create();
            $invoicenumber = 1;
            $quantity = 1;
            foreach ($cart->product as $product) {
                $model = new OrderDetail(
                    $invoicenumber,
                    $product->getId(),
                    $quantity,
                );
                $model->Create();
            }
            parent::RedirectToController('cart', 'Empty'); // Succesful, redirect to order history
        } else {
            parent::RedirectToController('product');
        }
    }
}
