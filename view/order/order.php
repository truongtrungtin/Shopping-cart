
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <section class="panel">
        <header class="panel-heading">
          <?php if ((Security::GetLoggedUser())->getRole() == 'ADMIN') { ?>
            <h1>Order</h1>
          <?php } else { ?>
            <h1>Shopping history</h1>
          <?php } ?>
        </header>
        <div class="panel-body">
          <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" style="width:100%">
            <thead>
              <tr>
                <?php if ((Security::GetLoggedUser())->getRole() == 'ADMIN') { ?>
                  <th>User</th>
                <?php } ?>
                <th class="th-sm">Invoice number</th>
                <th class="th-sm">Code Product</th>
                <th class="th-sm">Product</th>
                <th class="th-sm">Supplier</th>
                <th class="th-sm">Category</th>
                <th class="th-sm">Sale date</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($MODEL as $sale) {
                ?>
                <tr>
                  <?php if ((Security::GetLoggedUser())->getRole() == 'ADMIN') { ?>
                    <td><?= $sale->getUsername() ?></td>
                  <?php } ?>
                  <td><?= $sale->getInvoiceNumber() ?></td>
                  <td><?= $sale->getCode() ?></td>
                  <td><?= $sale->getName() ?></td>
                  <td><?= $sale->getSupplier() ?></td>
                  <td><?= $sale->getCategory() ?></td>
                  <td><?= $sale->getSaleDate() ?></td>
                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
        </div>
      </section>
    </div>
  </div>
</div>