
    <section class="container">
      <header class="panel-heading">
        <h1>Supplier</h1>
        <a href="?c=supplier&a=Create" class="btn btn-success">Create</a>
      </header>
      <div class="panel-body">
        <table class="table table-striped table-hover dt-datatable">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Phone</th>
              <th>Address</th>
              <th class="no-sort"></th>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach ($MODEL as $supplier) { 
            ?>
              <tr>
                <td><?=$supplier->getId()?></td>
                <td><?=$supplier->getSupplier()?></td>
                <td><?=$supplier->getPhone()?></td>
                <td><?=$supplier->getAddress()?></td>
                <td id="userButtons-cell">
                    <a class="fa fa-eye btn btn-info btn-sm" href="?c=supplier&a=Details&id=<?=$supplier->getId()?>"></a>
                    <a class="fa fa-pencil btn btn-warning btn-sm" href="?c=supplier&a=Edit&id=<?=$supplier->getId()?>"></a>
                    <a class="fa fa-trash btn btn-danger btn-sm" href="?c=supplier&a=Delete&id=<?=$supplier->getId()?>"></a>
                </td>
              </tr>
            <?php 
              }
            ?>
          </tbody>
        </table>
      </div>
    </section>
