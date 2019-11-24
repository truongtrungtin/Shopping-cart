<div class="container">
  <div class="row">
    <div class="col-lg-6">
    <a href="?c=order" class="btn btn-success">Back</a>

      <header class="panel-heading">
        <h2>Order : <?php echo $_REQUEST['id']?></h2>
      </header>
      <div class="panel-body">
        <table class="table table-striped table-bordered table-sm" >
          <thead>
            <tr>
              <th class="th-sm">Product</th>
              <th class="th-sm">Quantity</th>
              <th class="th-sm">Unit Price</th>
              <th class="th-sm">Total Price</th>
            </tr>
          </thead>
            <tbody>
            <?php foreach ($MODEL as $product) {?>
              <tr>
                <td><?=$product->getName() ?></td>
                <td><?=$product->getQuantity() ?></td>
                <td><?=  number_format($product->getPrice()) ."VNĐ" ?></td>
                <td><?= number_format($product->getQuantity() * $product->getPrice()) ."VNĐ" ?></td>
              </tr>
            <?php }?>
            </tbody>
            <tfoot>
              <tr>
                <td></td>
                <td></td>
                <td class="th-sm">TOTAL: </td>
                <td class="th-sm"><?= number_format(array_sum(array_map(function ($element) {
                        return $element->getPrice() * $element->getQuantity() ;
                      }, $MODEL))) . " VNĐ"; ?></td>
              </tr>
            </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>
