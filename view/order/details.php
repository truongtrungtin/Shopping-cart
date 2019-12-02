<div class="container">
  <div class="row">
    <div class="col-lg-8">
      <a href="?c=order" class="btn btn-success">Back</a>
      <header class="panel-heading">
        <h2>Invoice: <?php echo $_REQUEST['id'] ?></h2>
      </header>
        <table class="table table-striped table-hover dt-datatable">
          <thead>
            <tr>
              <th>Image</th>
              <th>Code</th>
              <th>Product</th>
              <th>Category</th>
              <th>Supplier</th>
              <th>Price</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($MODEL as $product) { ?>
              <tr>
                <td>
                  <div class="cart-img-product b-rad-4 o-f-hidden">
                    <img src="./public/upload/Products/<?= $product->getImage() ?>" alt="Image">
                  </div>
                </td>
                <td><?= $product->getCode() ?></td>
                <td><?= $product->getName() ?></td>
                <td><?= $product->getCategory() ?></td>
                <td><?= $product->getSupplier() ?></td>
                <td><?= number_format($product->getPrice()) . " VNĐ" ?></td>
              </tr>
            <?php } ?>
          </tbody>
          <tfoot>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td >TOTAL: </td>
              <td ><?= number_format(array_sum(array_map(function ($element) {
                                  return $element->getPrice() * $element->getQuantity();
                                }, $MODEL))) . " VNĐ"; ?></td>
            </tr>
          </tfoot>
        </table>
    </div>
  </div>
</div>