<!-- Slide1 -->
<section class="slide1">
  <div class="wrap-slick1">
    <div class="slick1">
      <div class="item-slick1 item2-slick1" style="background-image: url(./public/images/master-slide-02.png);">
        <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
          <span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="fadeInDown">
          WELCOME TO            
        </span>

          <h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="fadeInUp">
           TRUNGTIN
          </h2>

          <div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="zoomIn">
            <!-- Button -->
            <a href="?c=product" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
              Shop Now
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="newproduct bgwhite p-t-45 p-b-105">
  <div class="container">
    <div class="sec-title p-b-60">
      <h3 class="m-text5 t-center">
        FEATURED PRODUCTS
      </h3>
    </div>
    <div class="wrap-slick2">
      <div class="slick2">
        <?php
        foreach ($MODEL as $product) {
          ?>
          <div class="item-slick2 p-l-15 p-r-15">
            <!-- Block2 -->
            <div class="block2">
              <div class="block2-img wrap-pic-w of-hidden pos-relative">
                <form action="#" method="POST">
                  <input type="hidden" name="id" id="id" value="<?= $product->getId() ?>" />
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
                  <h4><?= $product->getName() ?></h4>
                </a>
                <span class="block2-price m-text6 p-r-5">
                  <?= number_format($product->getPrice()) . "VNĐ" ?>
                </span>
                <?php if ((Security::GetLoggedUser())->getRole() == 'ADMIN') { ?>
                  <a class="fa fa-eye btn btn-info btn-sm" href="?c=product&a=Details&id=<?= $product->getId() ?>"></a>
                  <a class="fa fa-pencil btn btn-warning btn-sm" href="?c=product&a=Edit&id=<?= $product->getId() ?>"></a>
                  <a class="fa fa-trash btn btn-danger btn-sm" href="?c=product&a=Delete&id=<?= $product->getId() ?>"></a>
                <?php } ?>
                </form>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</section>
