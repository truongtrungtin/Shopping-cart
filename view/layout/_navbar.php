<div class="wrap_header">
  <!-- Logo -->
  <a href="?c=home" class="logo">
    <img src="./public/images/icons/logo.png" alt="IMG-LOGO">
  </a>
  <div class="wrap_menu">
    <nav class="menu">
      <ul class="main_menu">
        <?php if (Security::UserIsLoggedIn()) { ?>
          <li>
            <a href="?c=home" class="<?= (($PAGE == 'Home') ? 'active' : '') ?>">
              <i class="fa fa-dashboard" aria-hidden="true"></i> &nbsp;Home
            </a>
          </li>
          <li>
            <a href="?c=articles" class="<?= (($PAGE == 'Articles') ? 'active' : '') ?>">
              <i class="fa fa-product-hunt" aria-hidden="true"></i>&nbsp;Shop
            </a>
          </li>
          <?php if ((Security::GetLoggedUser())->getRole() == 'ADMIN') { ?>
            <li>
              <a href="?c=sales" class="<?= (($PAGE == 'Sales') ? 'active' : '') ?>">
                <i class="fa fa-history" aria-hidden="true"></i>&nbsp;Sales
              </a>
            </li>
            <li>
              <a href="?c=manage" class="<?= (($PAGE == 'Manage') ? 'active' : '') ?>">
                <i class="fa fa-product-hunt" aria-hidden="true"></i>&nbsp;Manage
              </a>
            </li>
          <?php } ?>
          <?php if ((Security::GetLoggedUser())->getRole() == 'CLIENT') { ?>
            <li>
              <a href="?c=sales" class="<?= (($PAGE == 'Sales') ? 'active' : '') ?>">
                <i class="fa fa-history" aria-hidden="true"></i>&nbsp;History
              </a>
            </li>
          <?php } ?>
        <?php } ?>
      </ul>
    </nav>
  </div>
  <!-- Header Icon -->
  <div class="header-icons">
    <?php if (Security::GetLoggedUser() != null && ShoppingCartSession::ShoppingCartExists()) {
      $cart = ShoppingCartSession::GetShoppingCart(); ?>
      <a href="?c=cart">
        <div class="header-wrapicon2">
          <img src="./public/images/icons/icon-header-02.png" class="header-icon1" aria-hidden="true" alt="ICON">
          <a class="header-icons-noti"><?= count($cart->articles) ?></a>
        </div>
      </a>
    <?php } ?>
    <span class="linedivide1"></span>
    <a href="<?php if ((Security::GetLoggedUser())->getRole() == 'ADMIN') { ?>?c=users
              <?php } else { ?>?c=users&a=Edit&id=<?= (Security::GetLoggedUser())->getId() ?>   <?php } ?>" class="<?= (($PAGE == 'Users') ? 'active' : '') ?>">
      Hello, <?= (Security::GetLoggedUser() != null ? Security::GetLoggedUser()->getName() : 'Invitado') ?>
    </a>
    <span class="linedivide1"></span>
    <a href="?c=authentication&a=Logout"><i class="fa fa-sign-out" aria-hidden="true">
      </i>&nbsp;Logout
    </a>
  </div>
</div>