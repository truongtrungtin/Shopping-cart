
<div class="container">
  <div class="row">
    <div class="col-lg-8">
      <section class="panel">
        <header class="panel-heading">
          <?php if ((Security::GetLoggedUser())->getRole() == 'ADMIN') { ?>
            <h1>Order</h1>
          <?php } else { ?>
            <h1>Shopping history</h1>
          <?php } ?>
        </header>
        <div class="panel-body">
          <table class="table table-striped table-bordered table-sm" >
            <thead>
              <tr>
                <?php if ((Security::GetLoggedUser())->getRole() == 'ADMIN') { ?>
                  <th>User</th>
                <?php } ?>
                <th class="th-sm">Invoice number</th>
                <th class="th-sm">Order date</th>
                <th class="th-sm">Consumer</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($MODEL as $order) {
                ?>
                <tr>
                  <?php if ((Security::GetLoggedUser())->getRole() == 'ADMIN') { ?>
                    <td><?= ($user = User::GetUserById($order->getUserid()))->getName() ?></td>
                  <?php } ?>
                  <td><?= $order->getInvoicenumber() ?></td>
                  <td><?= $order->getOrderDate() ?></td>
                  <td><?= ($consumer = Consumer::GetConsumerByID($order->getConsumerid()))->getConsumerName() ?></td>
                  <td> <a class="fa fa-eye btn btn-info btn-sm" href="?c=order&a=Details&id=<?=$order->getInvoicenumber()?>"></a></td>
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