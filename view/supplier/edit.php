<section class="container">
  <h2>Edit Supplier</h1>
    <br>
    <form class="" action="?c=supplier&a=Edit" method="POST" autocomplete="off">
      <div class="form-row mb-4">
        <div class="col-6">
          <label for="supplier">supplier</label>
          <input value="<?= $MODEL->getSupplier() ?>" type="text" class="form-control" id="supplier" name="supp_name" placeholder="supplier">
        </div>
        <div class="col-6">
          <label for="phone">Phone</label>

          <input value="<?= $MODEL->getPhone() ?>" type="text" class="form-control" id="phone" name="supp_phone" placeholder="Phone">
        </div>
      </div>
      <div class="form-row mb-4">
        <div class="col-6">
          <label for="address">Address</label>
          <input value="<?= $MODEL->getAddress() ?>" type="text" class="form-control" id="address" name="supp_address" placeholder="Address">
        </div>
      </div>
      <div class="col-md-12">
        <input type="hidden" name="supp_id" id="supp_id" value="<?= $MODEL->getId() ?>" />
        <button type="submit" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</button>
      </div>
    </form>
</section>