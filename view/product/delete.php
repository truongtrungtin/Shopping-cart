<div class="container">
  <div class="row">
    <div class="col-lg-8">
      <header class="panel-heading">
        <h1>Delete Product</h1>
      </header>
      <div class="panel-body">
        <table class="table table-striped table-hover dt-datatable">
          <form action="?c=users&a=Delete" method="POST">
            <input type="hidden" name="id" id="id" value="<?= $MODEL->getId() ?>" />
            <thead>
              <tr>
                <td>Code</td>
                <td>Name</td>
                <td>Price</td>
                <td>Quantity</td>
                <td>Supplier</td>
                <td>Category</td>
              </tr>
            </thead>
            <tbody>
              <tr class="table-row">
                <td><?= $MODEL->getCode() ?></td>
                <td><?= $MODEL->getName() ?></td>
                <td><?= $MODEL->getPrice() ?></td>
                <td><?= $MODEL->getQuantity() ?></td>
                <td><?= $MODEL->getSupplierid() ?></td>
                <td><?= $MODEL->getCategoryid() ?></td>
              </tr>
            </tbody>
            <tfoot>
              <tr>
                <td><button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>Delete</button></td>
              </tr>
            </tfoot>
          </form>
        </table>
      </div>
    </div>
  </div>
</div>