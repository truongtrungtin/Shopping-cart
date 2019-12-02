<?php
class CartController extends BaseController
{

    public function __CONSTRUCT()
    { }

    public function Index()
    {

        if (ShoppingCartSession::ShoppingCartExists()) {
            $cart = ShoppingCartSession::GetShoppingCart();
            $model = $cart->product;
            parent::RenderPage(
                'Cart',
                'view/layout/layout.php',
                'view/cart/cart.php',
                $model
            );
        } else {
            parent::RenderPage(
                'Cart',
                'view/layout/layout.php',
                'view/cart/cart.php'
            );
        }
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
        if ((Security::GetLoggedUser())->getRole() != 'STAFF') {
            if (ShoppingCartSession::ShoppingCartExists()) {
                $cart = ShoppingCartSession::GetShoppingCart();
                $consumers = 1;
                $cart->product;
                $user = Security::GetLoggedUser();
                $order = new Order(
                    $user->getId(),
                    $orderDate = (new DateTime())->format('Y-m-d H:i:s'),
                    $consumers
                );
                $order->Create();
                $invoicenumber = Setting::GetLastInvoiceNumber();
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
        } else {
            if (ShoppingCartSession::ShoppingCartExists()) {
                $consumer = new Consumer(
                    $_REQUEST['comsumername'],
                    $_REQUEST['comsumeraddress']
                );
                $consumer->Create();
                $user = Security::GetLoggedUser();
                $consumers = Setting::GetLastConsumer();
                $order = new Order(
                    $user->getId(),
                    $orderDate = (new DateTime())->format('Y-m-d H:i:s'),
                    $consumers
                );
                $order->Create();
                $cart = ShoppingCartSession::GetShoppingCart();
                $cart->product;
                $invoicenumber = Setting::GetLastInvoiceNumber();
                $quantity = 1;
                foreach ($cart->product as $product) {
                    $model = new OrderDetail(
                        $invoicenumber,
                        $product->getId(),
                        $quantity
                    );
                    $model->Create();
                }
                parent::RedirectToController('cart', 'Empty'); // Succesful, redirect to order history
            } else {
                parent::RedirectToController('product');
            }
        }
    }
    public function Buy()
    {
        $id = (int) $_REQUEST['id'];
        $model = Product::GetProductById($id);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $cart = null;
            if (ShoppingCartSession::ShoppingCartExists()) {
                $cart = ShoppingCartSession::GetShoppingCart();
                array_push($cart->product, $model);
            } else {
                $cart = new ShoppingCart();
                array_push($cart->product, $model);
            }
            ShoppingCartSession::StoreShoppingCartInSession($cart);
            parent::RedirectToController('cart');
        } else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            parent::RenderPage(
                'Cart',
                'view/layout/layout.php',
                'view/cart/cart.php',
                $model
            );
        }
    }
}
