<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>TRUNGTIN - STORE</title>
  <link rel="stylesheet" type="text/css" href="./public/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="./public/fonts/themify/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="./public/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
  <link rel="stylesheet" type="text/css" href="./public/fonts/elegant-font/html-css/style.css">
  <link rel="stylesheet" type="text/css" href="./public/vendor/css-hamburgers/hamburgers.min.css">
  <link rel="stylesheet" type="text/css" href="./public/vendor/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" type="text/css" href="./public/vendor/slick/slick.css">
  <link rel="stylesheet" type="text/css" href="./public/vendor/lightbox2/css/lightbox.min.css">
  <link rel="stylesheet" type="text/css" href="./public/css/util.css">
  <link rel="stylesheet" type="text/css" href="./public/css/main.css">
  <!--  -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

</head>

<body>
  <header class="header1">
    <div class="container-menu-header">
      <?php include('_navbar.php'); ?>
    </div>
  </header>
  <?= $MASTER_CONTENT ?>




  </div>

  <!-- text/javascript -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

  </script>
  <script type="text/javascript" src="./public/vendor/slick/slick.min.js"></script>
  <script type="text/javascript" src="./public/js/slick-custom.js"></script>
  <script type="text/javascript" src="./public/vendor/countdowntime/countdowntime.js"></script>
  <script type="text/javascript" src="./public/vendor/lightbox2/js/lightbox.min.js"></script>
  <script type="text/javascript" src="./public/vendor/sweetalert/sweetalert.min.js"></script>
  <!-- product -->
  <script type="text/javascript" src="./public/vendor/daterangepicker/moment.min.js"></script>
  <script type="text/javascript" src="./public/vendor/daterangepicker/daterangepicker.js"></script>
  <script src="./public/js/main.js"></script>
  <!-- end text/javascrip -->
</body>

</html>