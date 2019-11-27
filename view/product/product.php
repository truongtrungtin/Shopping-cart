<!-- Content page -->
<section class="bgwhite p-t-55 p-b-65">
  <div class="container">
    <div class="row">
      <div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
        <div class="leftbar p-r-20 p-r-0-sm">
          <!--  -->
          <h4 class="m-text14 p-b-7">
            Categories
          </h4>
          <ul class="p-b-54">
            <li class="p-t-4">
              <a href="?c=product" class="s-text13 active1">
                All
              </a>
            </li>
            <?php $a = Category::GetAllCategory() ?>

            <?php foreach ($a as $category) { ?>
              <form action="?c=product" method="post">
                <li class="p-t-4">
                  <input type="hidden" name="category" value="<?= $category->getId() ?>">
                  <button type=submit>
                    <?= $category->getCategory() ?>
                  </button>
                </li>
              </form>
            <?php } ?>

          </ul>
        </div>
      </div>
      <div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
        <!--  -->
        <div class="flex-sb-m flex-w p-b-35">
          <?php if ((Security::GetLoggedUser())->getRole() == 'ADMIN') { ?>
            <div class="flex-w">
              <div class="of-hidden w-size12 m-t-5 m-b-5 m-r-10">
                <a href="?c=product&a=Create" class="btn btn-success">Create</a>
              </div>
            </div>
          <?php } ?>
          <div>
            <form action="?c=product" method="post">
              <input type="text" name="name">
              <button type="submit" class="btn btn-success">Find</button>
            </form>

          </div>
        </div>
        <!-- Product -->
        <div class="row">
          <?php
          foreach ($MODEL as $product) {
            ?>
            <div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
              <!-- Block2 -->
              <div class="block2">
                <div class="block2-img wrap-pic-w of-hidden pos-relative">
                  <img src="./public/upload/Products/<?php echo $product->getImage() ?>" alt="IMG-PRODUCT">
                  <div class="block2-overlay trans-0-4">

                    <div class="block2-btn-addcart w-size1 trans-0-4">
                      <!-- Button -->
                      <?php if ((Security::GetLoggedUser())->getRole() == 'CLIENT') { ?>
                        <a class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" href="?c=product&a=Buy&id=<?= $product->getId() ?>">
                          Add to Cart
                        </a>
                      <?php } ?>
                    </div>
                  </div>
                </div>
                <div class="block2-txt p-t-20">
                  <a href="?c=product&a=Details&id=<?= $product->getId() ?>" class="block2-name dis-block s-text3 p-b-5">
                    <?= $product->getName() ?>
                  </a>
                  <span class="block2-price m-text6 p-r-5">
                    <?= number_format($product->getPrice()) . " VNĐ" ?>
                  </span>
                </div>
                <?php if ((Security::GetLoggedUser())->getRole() == 'ADMIN') { ?>
                  <a class="fa fa-eye btn btn-info btn-sm" href="?c=product&a=Details&id=<?= $product->getId() ?>"></a>
                  <a class="fa fa-pencil btn btn-warning btn-sm" href="?c=product&a=Edit&id=<?= $product->getId() ?>"></a>
                  <a class="fa fa-trash btn btn-danger btn-sm" href="?c=product&a=Delete&id=<?= $product->getId() ?>"></a>
                <?php } ?>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
</section>