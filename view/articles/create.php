<section class="container">
  <h2>Create article</h1>
    <br>
    <form class="text-center" action="?c=articles&a=Create" method="POST" autocomplete="off">
      <div class="form-row mb-4">
        <div class="col-2">
          <input type="text" class="form-control" id="code" name="code" placeholder="ID">
        </div>
        <div class="col-4">
          <input type="number" class="form-control" id="supplierid" name="supplierid" value="" placeholder="Supplierid">
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
      <div class="form-row mb-4">
        <div class="col">
          <input type="text" class="form-control" id="categoryid" name="categoryid" placeholder="Categoryid">
        </div>
        <div class="col">
          <div class="custom-file col ">
            <input type="file" class="custom-file-input" id="customFile" name="image">
            <label class="custom-file-label" for="customFile">Image</label>
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <button type="submit" class="btn btn-primary"><i class="fa fa-cart-plus"></i> Create article</button>
      </div>
    </form>
</section>  