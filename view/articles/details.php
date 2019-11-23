<!-- Product Detail -->
<div class="container bgwhite p-t-35 p-b-80">
  <div class="flex-w flex-sb">
    <div class="w-size13 p-t-30 respon5">
      <div class="wrap-slick3 flex-sb flex-w">
        <div class="slick3">
          <div class="wrap-pic-w">
            <img src="./public/upload/Products/<?php echo $MODEL->getImage() ?>" alt="IMG-PRODUCT">
          </div>
        </div>
      </div>
    </div>
    <div class="w-size14 p-t-30 respon5">
      <span class="s-text8 m-r-35">Supplier: <?php echo $MODEL->getSupplier() ?></span>
      <span class="s-text8 m-r-35">Category: <?php echo $MODEL->getCategory() ?></span>
      <h4 class=" m-text5 ">
        <?php echo $MODEL->getName() ?>
      </h4>
      <span class="m-text16">
        <?= number_format($MODEL->getPrice()) . " VNĐ" ?>
      </span>
      <?php if ($MODEL->getQuantity() < 1) { ?>
        <span class="m-text16">
          <div class="alert alert-info">
            The product is out of stock!!!
          </div>
        </span>
      <?php } else { ?>
        <div class="s-text2">
          <?= "Quantity : " . $MODEL->getQuantity() ?>
        </div>
        <!--  -->
        <div class="p-t-33 p-b-60">
          <div class=" flex-w">
            <div class="w-size16 flex-m flex-w">
              <div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
                <!-- Button -->
                <a type="submit" href="?c=articles&a=Buy&id=<?= $MODEL->getId() ?>" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                  Add to Cart
                </a>
              </div>
            </div>
          </div>
        </div>
        
      <?php } ?>
      <p class="s-text6">
          <?php echo $MODEL->getDescription() ?>
        </p>
    </div>
  </div>
</div>

