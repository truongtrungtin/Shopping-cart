<section class="container">
  <h2>Edit product</h1>
    <br>
    <form class="" action="?c=product&a=Edit" method="POST" autocomplete="off">
      <div class="form-row mb-4">
        <div class="col-6">
          <label for="code">Code</label>
          <input value="<?= $MODEL->getCategory() ?>" type="text" class="form-control" id="code" name="code" placeholder="ID">
        </div>
        <div class="col-md-12">
          <input type="hidden" name="id" id="id" value="<?= $MODEL->getId() ?>" />
          <button type="submit" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit product</button>
        </div>
    </form>
</section>