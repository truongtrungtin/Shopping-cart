<section class="container">
  <h2>Edit category</h1>
    <br>
    <form class="" action="?c=category&a=Edit" method="POST" autocomplete="off">
      <div class="form-row mb-4">
        <div class="col-4">
          <label for="cate_name">category</label>
          <input value="<?= $MODEL->getCategory() ?>" type="text" class="form-control" id="cate_name" name="cate_name" placeholder="category">
        </div>
      </div>
      <div class="col-md-12">
        <input type="hidden" name="cate_id" id="id" value="<?= $MODEL->getId() ?>" />
        <button type="submit" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit category</button>
      </div>
    </form>
</section>