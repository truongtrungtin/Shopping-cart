<section class="container">
  <h2>Create article</h1>
    <br>
    <form class="text-center" action="?c=articles&a=Create" method="POST" autocomplete="off">
      <div class="form-row mb-4">
        <div class="col-2">
          <input type="text" class="form-control" id="code" name="code" placeholder="ID">
        </div>
        <div class="col-4">
          <select name="supplierid" id="supplierid" class="form-control">
              <option value="" selected="selected">Choose Supplier</option>
              <option value="Logitech">Logitech</option>
              <option value="Apple">Apple</option>
              <option value="SamSung">SamSung</option>
          </select>
        </div>
        <div class="col-6">
          <input type="text" class="form-control" id="name" name="name" placeholder="Name">
        </div>
      </div>
      <div class="form-row mb-4">
        <div class="col">
          <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Quantity">
        </div>
        <div class="col">
          <input type="text" class="form-control" id="price" name="price" placeholder="Price">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-6">
          <div class="form-group">
          <select name="categoryid" id="categoryid" class="form-control">
              <option value="" selected="selected">Choose Category</option>
              <option value="Mouse">Mouse</option>
              <option value="Phone">Phone</option>
              <option value="Watch">Watch</option>
          </select>
          </div>
          <div class="form-group">
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="customFile" name="image">
              <label class="custom-file-label" for="customFile">Choose Image</label>
            </div>
          </div>
        </div>
        <div class="col-6 ">
          <textarea type="text" rows="3" class="form-control" id="description" name="description" placeholder="Description"></textarea>
        </div>
      </div>
      <div class="col-md-12">
        <button type="submit" class="btn btn-primary"><i class="fa fa-cart-plus"></i> Create article</button>
      </div>
    </form>
</section>