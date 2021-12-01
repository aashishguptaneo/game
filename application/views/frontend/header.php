<!DOCTYPE html>
<html lang="en-US">
   <head>
      <!-- Title -->
      <title>Game App</title>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="description" content="">
      <meta name="keyword" content="">
      <meta name="author" content="">
      <!-- Favicon -->
      <link rel="icon" type="image/png" sizes="32x32" href="<?=base_url(); ?>assets/img/favicon/favicon-32x32.png">
      <!--Bootstrap css-->
      <link rel="stylesheet" href="<?=base_url(); ?>assets/css/bootstrap.css">
      <!--Font Awesome css-->
      <link rel="stylesheet" href="<?=base_url(); ?>assets/css/font-awesome.min.css">
      <!--Magnific css-->
      <link rel="stylesheet" href="<?=base_url(); ?>assets/css/magnific-popup.css">
      <!--Owl-Carousel css-->
      <link rel="stylesheet" href="<?=base_url(); ?>assets/css/owl.carousel.min.css">
      <link rel="stylesheet" href="<?=base_url(); ?>assets/css/owl.theme.default.min.css">
      <!--NoUiSlider css-->
      <link rel="stylesheet" href="<?=base_url(); ?>assets/css/nouislider.min.css">
      <!--Animate css-->
      <link rel="stylesheet" href="<?=base_url(); ?>assets/css/animate.min.css">
      <!--Site Main Style css-->
      <link rel="stylesheet" href="<?=base_url(); ?>assets/css/style.css">
      <!--Responsive css-->
      <link rel="stylesheet" href="<?=base_url(); ?>assets/css/responsive.css">
      <script src="<?=base_url(); ?>assets/js/jquery.min.js"></script>
      <script>
       var base_url = '<?=base_url();?>';
        window.isLogin = false;
        <?php if($this->session->userdata('uid')){ ?>
        window.isLogin = true;
        <?php } ?>
      </script>
      <style>
      .search-button {
        color: white;
        position: relative;
        padding: 2%;
        background: no-repeat;
        border: none;
      }
      </style>
   </head>
   <body>
      <!-- Header Area Start -->
      <nav class="game-header navbar navbar-expand-lg">
         <div class="container">
            <a class="navbar-brand" href="<?=site_url('welcome');?>">
              <img src="<?=base_url(); ?>assets/img/logo.png" alt="site logo" />
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="menu-toggle"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="header_menu  mr-auto">
                  <li class="nav-item active">
                     <a href="<?=site_url('welcome');?>" class="nav-link">Home</a>
                  </li>
                  <li><a href="<?=site_url('welcome/about');?>">About Us</a></li>
                  <!--       <li class="nav-item">
                     <a href="<?=site_url('welcome/games');?>" class="nav-link">Games</a>
                     </li> -->
                  <li class="nav-item">
                     <a href="<?=base_url()."products";?>" class="nav-link">Products</a>
                  </li>
                  <!--
                     <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">Pages</a>
                        <ul class="dropdown-menu">
                           <li><a href="<?=site_url('welcome/games');?>" class="nav-link">Games</a></li>
                           <li><a href="<?=site_url('welcome/single_game');?>">Game Single</a></li>
                           <li><a href="<?=site_url('welcome/product');?>">Product</a></li>
                           <li><a href="<?=site_url('welcome/product_single');?>">Product Single</a></li>
                           <li><a href="<?=site_url('welcome/cart');?>">Cart</a></li>
                           <li><a href="<?=site_url('welcome/checkout');?>">Checkout</a></li>
                           <li><a href="<?=site_url('welcome/notfind');?>">404 Error</a></li>
                           <li><a href="<?=site_url('signin');?>">Login</a></li>
                           <li><a href="<?=site_url('signup');?>">register</a></li>
                        </ul>
                     </li>
                     -->
                  <li class="nav-item">
                     <a href="<?=site_url('welcome/contact');?>" class="nav-link">Contact</a>
                  </li>
               </ul>
               <!-- <div class="translator-wrap">
                  <div id="ytWidget"></div>
                  <script   src="https://translate.yandex.net/website-widget/v1/widget.js?widgetId=ytWidget&pageLang=en&widgetTheme=light&autoMode=false" type="text/javascript" style="width:20%"></script>
               </div> -->

            </div>

            <div class="header-right ml-5 my-2 my-lg-0">
               <div class="header-search">
                  <a href="#" id="search-trigger"><i class="fa fa-search"></i></a>
               </div>
               <!-- Search Block -->
               <div class="search-block">
                  <a href="#" class="search-toggle">
                    <i class="fa fa-times"></i>
                  </a>
                  <form action="<?=base_url()."search"?>" method="get">
                     <input type="text" minlength="3" name="search" placeholder="What're you looking for?">
                     <button class="search-button" type="submit">
                       <span class="fa fa-search"></span>
                     </button>
                  </form>
               </div>
               <!-- /Search Block -->
               <div class="header-cart">
                  <a href="<?=base_url()."cart"?>">
                  <img src="<?=base_url(); ?>assets/img/shopping-cart.png" alt="shopping cart" />
                    <?=CartTotal();?>
                  </a>
               </div>
               <!--	  <div class="header-lang nav-item dropdown">
                  <select id="set-currency" name="currency" class="form-control">
                  <option value="USD" <?= set_select('currency', ($this->session->userdata('currency_code') == 'USD') ? 'USD' : null, TRUE); ?>>$ USD</option>
                  <option value="EUR" <?= set_select('currency', ($this->session->userdata('currency_code') == 'EUR') ? 'EUR' : null); ?>>€ EUR</option>
                  <option value="GBP" <?= set_select('currency', ($this->session->userdata('currency_code') == 'GBP') ? 'GBP' : null); ?>>£ GBP</option>
                  </select>
                          </div> -->
               <div class="header-cart">
                  <a href="wishlist">
                  <img src="<?=base_url(); ?>assets/img/wish.png" alt="shopping cart" />
                  </a>
               </div>
               <?php if(!$this->session->userdata('uid')){ ?>
                   <a class="lang-btn nav-link " href="<?=site_url('signin');?>" > Sign In </a>
                    <span> | </span>
                   <a class="lang-btn nav-link " href="<?=site_url('signup');?>" > Sign Up </a>
               <?php }else{ ?>
               <div class="header-auth  nav-item dropdown">
                  <a class="lang-btn nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?=ImageExists(base_url()."assets/img/profile_images/".$this->session->userdata('profile_pic'))?>" alt="admin" />
                  <?=$this->session->userdata('fname'); ?></a>
                  <ul class="user_menu dropdown-menu">
                     <li><a href="<?=base_url()?>welcome/profile">Profile</a></li>
                     <li><a href="<?=base_url()?>order">Orders</a></li>
                     <li><a href="<?=base_url()?>wishlist">Wishlist</a></li>
                     <li><a href="<?=base_url()?>cart">cart</a></li>
                     <li><a href="<?=base_url()?>purchases">Purchases</a></li>
                     <!-- <li><a href="#">Settings</a></li> -->
                     <li><a href="<?=site_url('Logout');?>">Logout</a></li>
                  </ul>
                  <?php } ?>
               </div>
            </div>
         </div>
      </nav>
      <!-- Header Area End -->
      <script type="text/javascript">
         $('#set-currency').on('change', function(){
             var selected = $(this).val();
             $.post('<?=site_url( $this->uri->segment(1) . '/setcurrency'); ?>', {currency: selected}, function() {
                 location.reload();
             });
         });
      </script>
