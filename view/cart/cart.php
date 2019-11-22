<!-- Cart -->
<section class="cart bgwhite p-t-70 p-b-100">
  <div class="container">
    <!-- Cart item -->
    <form action="?c=cart&a=ConfirmCheckout" method="POST">
      <div class="panel-body">
        <table class="table table-striped table-hover dt-datatable">
          <thead>
            <tr>
              <td></td>
              <td>ID</td>
              <td>Product</td>
              <td>Price</td>
              <td>Delete</td>
            </tr>
          </thead>
          <?php if (empty($MODEL)) { ?>
            <tbody>
              <td colspan="5" style="text-align:center;">You have no products added in your Shopping Cart</td>
              <?php } else {
                foreach ($MODEL as $article) {
                  ?>
                <tr class="table-row">
                  <td>
                    <div class="cart-img-product b-rad-4 o-f-hidden">
                      <img src="./public/upload/Products/<?= $article->getImage() ?>" alt="IMG-PRODUCT">
                    </div>
                  </td>
                  <td><?= $article->getCode() ?></td>
                  <td><?= $article->getName() ?></td>
                  <td><?= number_format($article->getPrice()) . " VNĐ" ?></td>
                  <td><a href="?c=cart&a=RemoveArticle&id=<?= $article->getCartUniqueId() ?>" class="btn btn-danger btn-sm fa fa-minus-circle"></a></td>
                </tr>
              <?php  } ?>

            </tbody>
            <tfoot>
              <tr>
                <td> </td>
                <td> <a href="?c=cart&a=Checkout" class="btn btn-success"><i class="fa fa-shopping-cart"> Check Out</i></a></td>
                <td> <a href="?c=cart&a=Empty" class="btn btn-danger"><i class="fa fa-trash"></i> Empty cart</a></td>
                <td> Subtotal:</td>
                <td><?= number_format(array_sum(array_map(function ($element) {
                        return $element->getPrice();
                      }, $MODEL))) . " VNĐ"; ?></td>
              </tr>
            </tfoot>
          <?php  } ?>
        </table>
      </div>
    </form>
  </div>
</section>