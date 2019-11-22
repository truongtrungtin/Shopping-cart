  <section class="container">
    <h2>Create User</h2>
    <form class="text-center" action="?c=users&a=Create" method="POST" autocomplete="off">
      <div class="form-row mb-4">
        <div class="col">
          <label for="username">User</label>
          <input type="text" class="form-control" id="username" name="username" placeholder="User">
        </div>
        <div class="col">
          <label for="password">Password</label>
          <input type="text" class="form-control" id="password" name="password" placeholder="Password">
        </div>
      </div>
      <div class="form-row mb-4">
        <div class="col">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="micorreo@midominio.com">
        </div>
        <div class="col">
          <label for="name">First name</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="First name">
        </div>
      </div>
      <div class="form-row mb-4">
        <div class="col">
          <label for="lastName">Last name</label>
          <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last name">
        </div>
        <div class="col">
          <label for="phone">Phone</label>
          <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone">
        </div>
        <div class="col">
          <label for="role">Role</label>
          <select name="role" id="role" class="form-control">
            <option value="CLIENT" selected="selected">Client</option>
            <option value="ADMIN">Administration</option>
          </select>
        </div>
      </div>
      <div class="col-md-4">
        <button type="submit" class="btn btn-primary"><i class="fa fa-cart-plus"></i> Create</button>
      </div>
    </form>

  </section>