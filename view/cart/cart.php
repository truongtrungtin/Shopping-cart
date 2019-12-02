<!-- Cart -->
<?php if ((Security::GetLoggedUser())->getRole() != 'STAFF') { ?>
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
<?php }else{?>
  
<section class="cart bgwhite p-t-70 p-b-100">
  <form action="?c=cart&a=ConfirmCheckout" method="POST">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h2> Cart</h2>
          <!-- Cart item -->
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
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> <a href="?c=cart&a=Empty" class="btn btn-danger"><i class="fa fa-trash"></i> Empty cart</a></td>
                  </tr>
                </tfoot>
              <?php  } ?>
            </table>
          </div>
        </div>
        <div class="col-md-6">
          <div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
            <h5 class="m-text20 p-b-24">
              Customer information:
            </h5>
            <!--  -->
            <div class="flex-w flex-sb bo10 p-t-15 p-b-20">
              <span class="s-text18 w-size19 w-full-sm">
                Name:
              </span>
              <div class="w-size20 w-full-sm">
                <div class="size13 bo4 m-b-12">
                  <input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="comsumername" placeholder="Name">
                </div>
              </div>
              <span class="s-text18 w-size19 w-full-sm">
                Address:
              </span>
              <div class="w-size20 w-full-sm">
                <div class="size13 bo4 m-b-22">
                  <input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="comsumeraddress" placeholder="Address">
                </div>
              </div>
            </div>
            <?php if (empty($MODEL)) { ?>
            <?php } else { ?>
              <h5 class="m-text20 p-b-24">
                Cart Totals
              </h5>
              <!--  -->
              <!--  -->
              <div class="flex-w flex-sb-m p-t-26 p-b-30">
                <span class="m-text22 w-size19 w-full-sm">
                  Total:
                </span>

                <span class="m-text21 w-size20 w-full-sm">
                  <?= number_format(array_sum(array_map(function ($element) {
                      return $element->getPrice();
                    }, $MODEL))) . " VNĐ"; ?>
                </span>
              </div>
              <div class="size15 trans-0-4">
                <!-- Button -->
                <button type="submit" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" name="checkout">
                  Proceed to Checkout
                </button>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
  </form>
</section>

<!-- Cart -->
<div class="container">
  <div class="row">
    <div class="col-12">
      <h2>Product</h2>
      <div class="form-row">
        <div class="col-8">
          <form action="?c=cart&a=Buy" method="POST">
            <select name="id" id="id" class="form-control">
              <?php $products = Product::GetAllProduct(); ?>
              <?php foreach ($products as $product) { ?>
                <option value="<?= $product->getId() ?>" selected="selected"><?= $product->getName() ?></option>
              <?php } ?>
            </select>
        </div>
        <div class="col-2">
          <button type="submit" class="btn btn-primary"><i class="fa fa-cart-plus"></i> Buy</button>
        </div>
      </div>
    </div>
  </div>
</div>

<?php } ?>
