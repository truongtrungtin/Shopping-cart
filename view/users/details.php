
<div class="container">
  <div class="row">
    <div class="col-lg-8">
        <header class="panel-heading">
          <h1>INFORMATION</h1>
        </header>
        <div class="panel-body">
          <table class="table table-striped table-hover dt-datatable">
            <thead>
              <tr>
                <td>Username</td>
                <td>Email</td>
                <td>First name</td>
                <td>Last name</td>
                <td>Phone</td>
                <td>Role</td>
              </tr>
            </thead>
            <tbody>
              <tr class="table-row">
                <td><?= $MODEL->getUsername() ?></td>
                <td><?= $MODEL->getEmail() ?></td>
                <td><?= $MODEL->getName() ?></td>
                <td><?= $MODEL->getLastname() ?></td>
                <td><?= $MODEL->getPhone() ?></td>
                <td><?= $MODEL->getRole() ?></td>
              </tr>
            </tbody>
            <tfoot>
              <tr>
              </tr>
            </tfoot>
          </table>
        </div>
    </div>
  </div>
</div>