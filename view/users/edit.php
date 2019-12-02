
<section class="container">
  <?php if ((Security::GetLoggedUser())->getRole() == 'ADMIN') { ?>
    <h1>Edit User</h1>
  <?php } else { ?>
    <h1>My account</h1>
  <?php } ?>
  <br>
  <form class="text-center" action="?c=users&a=Edit" method="POST" autocomplete="off">
    <div class="form-row mb-4">
      <div class="col-6">
        <input value="<?= $MODEL->getUsername() ?>" type="text" class="form-control" id="username" name="username" placeholder="User" <?= ((Security::GetLoggedUser())->getRole() == 'CLIENT' || (Security::GetLoggedUser())->getRole() == 'STAFF') ? 'disabled="disabled"' : '' ?>>
      </div>
      <div class="col-6">
        <input value="<?= $MODEL->getPassword() ?>" type="password" class="form-control" id="password" name="password" placeholder="Password">
      </div>
    </div>
    <div class="form-row mb-4">
      <div class="col-6">
        <input value="<?= $MODEL->getName() ?>" type="text" class="form-control" id="name" name="name" placeholder="First name">
      </div>
      <div class="col-6">
        <input value="<?= $MODEL->getLastname() ?>" type="text" class="form-control" id="lastName" name="lastName" placeholder="Last name">
      </div>
    </div>
    <div class=" form-row mb-4 ">
      <div class="col ">
        <input value="<?= $MODEL->getPhone() ?>" type="text" class="form-control" id="phone" name="phone" placeholder="Phone">
      </div>
      <div class="col">
        <input value="<?= $MODEL->getEmail() ?>" type="email" class="form-control" id="email" name="email" placeholder="micorreo@midominio.com">
      </div>
      <div class="col ">
        <select name="role" id="role" class="form-control" <?= ((Security::GetLoggedUser())->getRole() == 'CLIENT' || (Security::GetLoggedUser())->getRole() == 'STAFF') ? 'disabled="disabled"' : '' ?>>
          <option value="CLIENT" <?= $MODEL->getRole() === 'CLIENT' ? 'selected="selected"' : '' ?>>Client</option>
          <option value="ADMIN" <?= $MODEL->getRole() === 'ADMIN' ? 'selected="selected"' : '' ?>>Administration</option>
          <option value="ADMIN" <?= $MODEL->getRole() === 'STAFF' ? 'selected="selected"' : '' ?>>staff</option>
        </select>
      </div>
    </div>
    <div class="col-md-12">
      <input type="hidden" name="id" id="id" value="<?= $MODEL->getId() ?>" />
      <button type="submit" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</button>
    </div>
  </form>
</section>