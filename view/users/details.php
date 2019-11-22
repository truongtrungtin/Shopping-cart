<section class="container">
  <h1>INFORMATION</h1>

  <div class="panel-body">
    <dl class="dl-horizontal">
      <dt>Username</dt>
      <dd><?= $MODEL->getUsername() ?></dd>
      <dt>Email</dt>
      <dd><?= $MODEL->getEmail() ?></dd>
      <dt>First name</dt>
      <dd><?= $MODEL->getName() ?></dd>
      <dt>Last name</dt>
      <dd><?= $MODEL->getLastname() ?></dd>
      <dt>Phone</dt>
      <dd><?= $MODEL->getPhone() ?></dd>
      <dt>Role</dt>
      <dd><?= $MODEL->getRole() ?></dd>
    </dl>
  </div>
</section>