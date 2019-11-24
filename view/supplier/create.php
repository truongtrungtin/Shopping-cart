<section class="container">
  <h2>Create Supplier</h2>
  <form class="text-center" action="?c=supplier&a=Create" method="POST" autocomplete="off">
    <div class="form-group">
      <div class="col-4">
        <label for="supp_name">Supplier</label>
        <input type="text" class="form-control" id="supp_name" name="supp_name" placeholder="supplier">
      </div>
    </div>
    <div class="form-group">
      <div class="col-4">
        <label for="supp_phone">Phone</label>
        <input type="text" class="form-control" id="supp_phone" name="supp_phone" placeholder="Phone">
      </div>
    </div>
    <div class="form-group mb-4">
      <div class="col-4">
        <label for="supp_address">Address</label>
        <input type="text" class="form-control" id="supp_address" name="supp_address" placeholder="Address">
      </div>
    </div>
    <div class="col-md-4">
      <button type="submit" class="btn btn-primary"><i class="fa fa-cart-plus"></i> Create</button>
    </div>
  </form>
</section>