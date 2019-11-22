<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(./public/images/product-detail-01.jpg);">
  <h2 class="l-text2 t-center">
    TRUNG TIN
  </h2>
</section>
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
              <a href="#" class="s-text13 active1">
                All
              </a>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
        <!--  -->
        <div class="flex-sb-m flex-w p-b-35">
          <?php if ((Security::GetLoggedUser())->getRole() == 'ADMIN') { ?>
            <div class="flex-w">
              <div class="of-hidden w-size12 m-t-5 m-b-5 m-r-10">
                <a href="?c=articles&a=Create" class="btn btn-success">Create</a>
              </div>
            </div>
          <?php } ?>
        </div>
        <!-- Product -->
        <div class="row">
          <?php
          foreach ($MODEL as $article) {
            ?>
            <div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
              <!-- Block2 -->
              <div class="block2">
                <div class="block2-img wrap-pic-w of-hidden pos-relative">
                  <img src="./public/upload/Products/<?php echo $article->getImage() ?>" alt="IMG-PRODUCT">
                  <div class="block2-overlay trans-0-4">

                    <div class="block2-btn-addcart w-size1 trans-0-4">
                      <!-- Button -->
                      <?php if ((Security::GetLoggedUser())->getRole() == 'CLIENT') { ?>
                        <a class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" href="?c=articles&a=Buy&id=<?= $article->getId() ?>">
                          Add to Cart
                        </a>
                      <?php } ?>
                    </div>
                  </div>
                </div>
                <div class="block2-txt p-t-20">
                  <a href="?c=articles&a=Details&id=<?= $article->getId() ?>" class="block2-name dis-block s-text3 p-b-5">
                    <?= $article->getName() ?>
                  </a>
                  <span class="block2-price m-text6 p-r-5">
                    <?= number_format($article->getPrice()) . " VNĐ" ?>
                  </span>
                </div>
                <?php if ((Security::GetLoggedUser())->getRole() == 'ADMIN') { ?>
                  <a class="fa fa-eye btn btn-info btn-sm" href="?c=articles&a=Details&id=<?= $article->getId() ?>"></a>
                  <a class="fa fa-pencil btn btn-warning btn-sm" href="?c=articles&a=Edit&id=<?= $article->getId() ?>"></a>
                  <a class="fa fa-trash btn btn-danger btn-sm" href="?c=articles&a=Delete&id=<?= $article->getId() ?>"></a>
                <?php } ?>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
</section>