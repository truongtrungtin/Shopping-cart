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
              <td>Quantiy</td>
              <td>Price</td>
              <td>Total</td>
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
                  <td><?= $_POST["num-quantity-".$product->getCode()] ?></td>
                  <td><?= $product->getCode() ?></td>
                  <td><?= $product->getName() ?></td>
                  <td>
                    <input class="size8 m-text18 t-center num-product" type="number" name="num-quantity-<?= $product->getCode() ?>" value="<?php echo $_POST["num-quantity-".$product->getCode()]?>" min="1" required>
                  </td>
                  <td><?= number_format($product->getPrice()) . " VNĐ" ?></td>
                  <td><?= number_format($_REQUEST["num-quantity-".$product->getCode()] * $product->getPrice()) . " VNĐ" ?></td>
                  <td><a href="?c=cart&a=RemoveProduct&id=<?= $product->getCartUniqueId() ?>" class="btn btn-danger btn-sm fa fa-minus-circle"></a></td>
                </tr>
              <?php  } ?>
            </tbody>
            <tfoot>
              <tr>
                <td> </td>
                <td> <button type='submit' name='checkout' class="btn btn-success"><i class="fa fa-shopping-cart"> Check Out</i></a></td>
                <td> <a href="?c=cart&a=Empty" class="btn btn-danger"><i class="fa fa-trash"></i> Empty cart</a></td>
                <td> <button type='submit' class="btn btn-warning"> Update</a>
                <td></td>
                <td> Subtotal:</td>
                <td><?= number_format(array_sum(array_map(function ($element) {
                        return $element->getPrice() * $_REQUEST["num-quantity-" . $element->getCode()];
                      }, $MODEL))) . " VNĐ"; ?></td>
              </tr>
            </tfoot>
          <?php  } ?>
        </table>
      </div>
    </form>
  </div>
</section>