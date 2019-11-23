<section class="container">
  <h2>Edit article</h1>
    <br>
    <form class="" action="?c=articles&a=Edit" method="POST" autocomplete="off">
      <div class="form-row mb-4">
        <div class="col-6">
          <label for="code">Code</label>
          <input value="<?= $MODEL->getCode() ?>" type="text" class="form-control" id="code" name="code" placeholder="ID">
        </div>
        <div class="col-6">
          <label for="name">Name Product</label>

          <input value="<?= $MODEL->getName() ?>" type="text" class="form-control" id="name" name="name" placeholder="Name Product">
        </div>
      </div>
      <div class="form-row mb-4">
        <div class="col-6">
          <label for="quantity">Quantity</label>

          <input value="<?= $MODEL->getQuantity() ?>" type="number" class="form-control" id="quantity" name="quantity" placeholder="Quantity">
        </div>
        <div class="col-6">
          <label for="price">Price</label>
          <input value="<?= $MODEL->getPrice() . ' VNĐ' ?> " type="text" class="form-control" id="price" name="price" placeholder="Price">
        </div>
      </div>
      <div class=" form-row mb-4 ">
        <div class="col">
          <label for="categoryid">Category ID</label>
          <input value="<?= $MODEL->getCategoryid() ?>" type="number" class="form-control" id="categoryid" name="categoryid" placeholder="Categoryid">
        </div>
        <div class="col">
          <label for="supplierid">Supplier ID</label>
          <input value="<?= $MODEL->getSupplierid() ?>" type="text" class="form-control" id="supplierid" name="supplierid" placeholder="Supplierid">
        </div>
      </div>
      <div class="form-row mb-4">
        <div class="col">
          <label for="comment">Description</label>
          <textarea type="text" rows="5" class="form-control" id="description" name="description"><?= $MODEL->getDescription() ?></textarea>
        </div>
      </div>
      <div class="form-row mb-4">
        <div class="custom-file col">
          <label class="custom-file-label" for="customFile">Image</label>
          <input value="<?= $MODEL->getImage() ?>" type="file" class="custom-file-input" id="comment" name="image">
        </div>
      </div>
      <div class="col-md-12">
        <input type="hidden" name="id" id="id" value="<?= $MODEL->getId() ?>" />
        <button type="submit" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit article</button>
      </div>
    </form>
</section>