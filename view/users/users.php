
    <section class="container">
      <header class="panel-heading">
        <h1>Users</h1>
        <a href="?c=users&a=Create" class="btn btn-success">Create</a>
      </header>
      <div class="panel-body">
        <table class="table table-striped table-hover dt-datatable">
          <thead>
            <tr>
              <th>Username</th>
              <th>First name</th>
              <th>Last name</th>
              <th>Phone</th>
              <th>Email</th>
              <th class="no-sort"></th>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach ($MODEL as $user) { 
            ?>
              <tr>
                <td><?=$user->getUsername()?></td>
                <td><?=$user->getName()?></td>
                <td><?=$user->getLastname()?></td>
                <td><?=$user->getPhone()?></td>
                <td><?=$user->getEmail()?></td>
                <td id="userButtons-cell">
                    <a class="fa fa-eye btn btn-info btn-sm" href="?c=users&a=Details&id=<?=$user->getId()?>"></a>
                    <a class="fa fa-pencil btn btn-warning btn-sm" href="?c=users&a=Edit&id=<?=$user->getId()?>"></a>
                    <a class="fa fa-trash btn btn-danger btn-sm" href="?c=users&a=Delete&id=<?=$user->getId()?>"></a>
                </td>
              </tr>
            <?php 
              }
            ?>
          </tbody>
        </table>
      </div>
    </section>
