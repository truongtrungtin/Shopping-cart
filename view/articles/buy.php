<div class="row">
  <div class="col-lg-6">
    <section class="panel">
      <header class="panel-heading">
        <h1>Buy article</h1>
        <a href="?c=articles">Back</a>
      </header>
      <div class="panel-body">
        <form action="?c=articles&a=Buy" method="POST">
          <input type="hidden" name="id" id="id" value="<?= $MODEL->getId() ?>" />
          <dl class="dl-horizontal">
            <dt>ID</dt>
            <dd><?= $MODEL->getCode() ?></dd>
            <dt>Supplierid</dt>
            <dd><?= $MODEL->getSupplierid() ?></dd>
            <dt>Name</dt>
            <dd><?= $MODEL->getName() ?></dd>
            <dt>Price</dt>
            <dd><?= number_format($MODEL->getPrice()) . " VNĐ" ?></dd>
            <?php if ($MODEL->getQuantity() < 1) { ?>
              <dt>Quantity</dt>
              <dd>Hết Hàng</dd>
            <?php } else { ?>
              <button class="btn btn-primary btn-sm" type="submit"><i class="fa fa-cart-plus"></i> Add to cart</button>
            <?php } ?>
          </dl>
        </form>
      </div>
    </section>
  </div>
</div>