<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <section class="panel">
        <header class="panel-heading">
          <h1>Confirmation Required</h1>
        </header>
        <?php if (empty($MODEL)) { ?>
          <div class="panel-body">
            <div class="alert alert-info">
              You have no products added in your Shopping Cart:
            </div>
          <?php } else { ?>
            <div class="alert alert-info">
              By continuing you agree to purchase the following items:
            </div>
            <form action="?c=cart&a=ConfirmCheckout" method="POST">
              <table class="table table-striped table-hover dt-datatable">
                <thead>
                  <tr>
                    <td>Code</td>
                    <td>Name</td>
                    <td>Quantity</td>
                    <td>Price</td>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($MODEL as $product) { ?>
                    <tr class="table-row">
                      </td>
                      <td><?= $product->getCode() ?></td>
                      <td><?= $product->getName() ?></td>
                      <td>1 </td>
                      <td><?= number_format($product->getPrice()) . " VNĐ" ?></td>
                    </tr>
                  <?php } ?>
                </tbody>
                <tfoot>
                  <tr>
                    <td>
                      <button type="submit" class="btn btn-block btn-lg btn-success"><i class="fa fa-shield"></i> Make a purchase</button>
                    </td>
                    <td></td>
                    <td></td>
                    <td>
                      <div>
                        <b>Total:</b>
                        <?= number_format(array_sum(array_map(function ($element) {
                            return $element->getPrice();
                          }, $MODEL))) ." VNĐ"; ?>
                      </div>
                    </td>
                  </tr>
                </tfoot>
            </form>
            </table>
          </div>
        <?php } ?>
      </section>
    </div>
  </div>
</div>