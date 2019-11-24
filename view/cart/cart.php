<!-- Cart -->
<?php if (isset($_POST['checkout'])) {
  header('Location: ?c=cart&a=Checkout');
  exit;
} ?>
<section class="cart bgwhite p-t-70 p-b-100">
  <div class="container">
    <!-- Cart item -->
    <form action="?c=cart" method="POST">
      <div class="panel-body">
        <table class="table table-striped table-hover dt-datatable">
          <thead>
            <tr>
              <td></td>
              <td>Code</td>
              <td>Product</td>
              <td>Price</td>
              <td>Delete</td>
            </tr>
          </thead>
          <?php if (empty($MODEL)) { ?>
            <tbody>
              <td colspan="5" style="text-align:center;">You have no products added in your Shopping Cart</td>
              <?php } else {
                foreach ($MODEL as $product) {
                  ?>
                <tr class="table-row">
                  <td>
                    <div class="cart-img-product b-rad-4 o-f-hidden">
                      <img src="./public/upload/Products/<?= $product->getImage() ?>" alt="IMG-PRODUCT">
                      <input type="hidden" name="id" id="id" value="<?= $product->getId() ?>" />
                    </div>
                  </td>
                  <td><?= $product->getCode() ?></td>
                  <td><?= $product->getName() ?></td>
                  <td><?= number_format($product->getPrice()) . " VNĐ" ?></td>
                  <td><a href="?c=cart&a=RemoveProduct&id=<?= $product->getCartUniqueId() ?>" class="btn btn-danger btn-sm fa fa-minus-circle"></a></td>
                </tr>
              <?php  } ?>
            </tbody>
            <tfoot>
              <tr>
                <td> <button type='submit' name='checkout' class="btn btn-success"><i class="fa fa-shopping-cart"> Check Out</i></a></td>
                <td> <a href="?c=cart&a=Empty" class="btn btn-danger"><i class="fa fa-trash"></i> Empty cart</a></td>
                <td> </td>
                <td> <b>TOTAL:</b> <?= number_format(array_sum(array_map(function ($element) {
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