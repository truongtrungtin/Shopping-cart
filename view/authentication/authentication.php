<div class="container">
  <div class="row">
    <div class="col-sm-6 col-sm-offset-6 col-md-4 col-md-offset-4">
      <div class="account-wall">
        <img class="profile-img" src="#" alt="User needs login">
        <form class="form-signin" action="?c=authentication&a=Login" method="POST" >
          <input type="text" class="form-control" placeholder="Username" name="username" required autofocus />
          <input type="password" class="form-control" placeholder="Password" name="password" required />
          <button class="btn btn-lg btn-primary btn-block" type="submit">Log in</button>
          <?php if ($MODEL != null) { ?>
            <?=$MODEL->getMessage()?>
          <?php } ?>
          <!-- <a href="#" class="pull-right need-help">He olvidado mi Password </a><span class="clearfix"></span> -->
        </form>
      </div>
    </div>
  </div>
</div>