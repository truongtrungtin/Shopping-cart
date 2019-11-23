<?php
class CartController extends BaseController {
    
    public function __CONSTRUCT (){}
    
    public function Index () {
        $cart = ShoppingCartSession::GetShoppingCart();
        $model = $cart->product;
        parent::RenderPage(
            'Cart', 
            'view/layout/layout.php', 
            'view/cart/cart.php',
            $model
        );
    }

    public function Empty () {
        ShoppingCartSession::RemoveShoppingCartFromSession();
        parent::RedirectToController('cart');
    }

    public function RemoveArticle () {
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
    
    public function Checkout () {
        $cart = ShoppingCartSession::GetShoppingCart();
        $model = $cart->product;
        parent::RenderPage(
            'Cart', 
            'view/layout/layout.php', 
            'view/cart/checkout.php',
            $model
        );
    }

    public function ConfirmCheckout () {
        if (ShoppingCartSession::ShoppingCartExists()) {
            $cart = ShoppingCartSession::GetShoppingCart();
            $cart->product;
            foreach ($cart->product as $product) {
                $user = Security::GetLoggedUser();
                $sale = new Sale(
                    $user->getId(),
                    $product->getId(),
                    $invoiceNumber = (Setting::GetLastInvoiceNumber() + 1),
                    $saleDate = (new DateTime())->format('Y-m-d H:i:s')
                );
                $sale->Create();
            }
            parent::RedirectToController('cart', 'Empty'); // Succesful, redirect to sale history
        } else {
            parent::RedirectToController('product');
        }
    }

}

?>