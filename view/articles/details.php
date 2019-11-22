<!-- Product Detail -->
<div class="container bgwhite p-t-35 p-b-80">
  <div class="flex-w flex-sb">
    <div class="w-size13 p-t-30 respon5">
      <div class="wrap-slick3 flex-sb flex-w">
        <div class="wrap-slick3-dots"></div>

        <div class="wrap-pic-w">
          <img src="./public/upload/Products/<?php echo $MODEL->getImage()?>" alt="IMG-PRODUCT">
        </div>
      </div>
    </div>
    <div class="w-size14 p-t-30 respon5">
      <h4 class="product-detail-name m-text16 p-b-13">
        <?= $MODEL->getName() ?>
      </h4>

      <span class="m-text17">
        <?= number_format($MODEL->getPrice()) . " VNĐ" ?>
      </span>

      <p class="s-text8 p-t-10">
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eum, eaque reprehenderit. Vel officia repellat unde iste aliquid totam aut dignissimos maxime maiores. In maiores maxime aspernatur quos libero, expedita eum.
      </p>
      <!--  -->
      <div class="p-t-33 p-b-60">
        <div class="flex-r-m flex-w">
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
    </div>
  </div>