<div class="container">
  <div class="row">
    <div class="col-lg-8">
      <header class="panel-heading">
        <h1>Delete User</h1>
      </header>
      <div class="panel-body">
        <table class="table table-striped table-hover dt-datatable">
          <form action="?c=users&a=Delete" method="POST">
            <input type="hidden" name="id" id="id" value="<?= $MODEL->getId() ?>" />
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
                <td><button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>Delete</button></td>
              </tr>
            </tfoot>
          </form>
        </table>
      </div>
    </div>
  </div>
</div>