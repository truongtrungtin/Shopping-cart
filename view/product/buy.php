<div class="container">
  <div class="row">
    <div class="col-lg-8">
      <header class="panel-heading">
        <h1>Buy Product</h1>
      </header>
      <div class="panel-body">
        <form action="?c=product&a=Buy" method="POST">
        <input type="hidden" name="id" id="id" value="<?= $MODEL->getId() ?>"/>
          <table class="table table-striped table-hover dt-datatable">
            <thead>
              <tr>
                <td>Image</td>
                <td>Code</td>
                <td>Name</td>
                <td>Supplier</td>
                <td>Category</td>
                <td>Price</td>
              </tr>
            </thead>
            <tbody>
              <tr class="table-row">
                <td>
                  <div class="cart-img-product">
                    <img src="./public/upload/Products/<?= $MODEL->getImage() ?>" alt="IMG-PRODUCT">
                  </div>
                </td>
                <td><?= $MODEL->getCode() ?></td>
                <td><?= $MODEL->getName() ?></td>
                <td><?= $MODEL->getSupplierid() ?></td>
                <td><?= $MODEL->getCategoryid() ?></td>
                <td><?= number_format($MODEL->getPrice()) . " VNĐ" ?></td>
                <?php if ($MODEL->getQuantity() < 1) { ?>
                  <td>Out of stock</td>
                <?php } else { ?>
              </tr>
            </tbody>
            <tfoot>
              <tr>
                <td> <button class="btn btn-primary btn-sm" type="submit"><i class="fa fa-cart-plus"></i> Add to cart</button></td>
              </tr>
            </tfoot>
          <?php  } ?>
          </table>
        </form>
      </div>
    </div>
  </div>
</div>