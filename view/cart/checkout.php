<div class="container">
  <div class="row">
    <div class="col-lg-6">
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
            <table class="table-shopping-cart">
              <ul>
                <?php foreach ($MODEL as $product) { ?>
                  <li>
                    <b><?= $product->getSupplierid() ?> - <?= $product->getName() ?>: </b><?= number_format($product->getPrice()) . " VNĐ" ?>
                  </li>
                <?php } ?>
              </ul>
              <div>
                <b>Total:</b>
                <?= array_sum(array_map(function ($element) {
                    return $element->getPrice() . " VNĐ";
                  }, $MODEL)); ?>
              </div>

              <div class="m-top15">
                <form action="?c=cart&a=ConfirmCheckout" method="POST">
                  <button type="submit" class="btn btn-block btn-lg btn-success"><i class="fa fa-shield"></i> Make a purchase</button>
                </form>
              </div>
            </table>
          </div>
        <?php } ?>
      </section>
    </div>
  </div>
</div>