<!DOCTYPE html>
<html lang="en-US">
<head>
      
      <!-- Title -->
      <title>Selling Template</title>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="description" content="">
      <meta name="keyword" content="">
      <meta name="author" content="">
         <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url(); ?>assets/img/favicon/favicon-32x32.png">
      <!--Bootstrap css-->
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
      <!--Font Awesome css-->
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">
      <!--Magnific css-->
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/magnific-popup.css">
      <!--Owl-Carousel css-->
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.carousel.min.css">
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.theme.default.min.css">
      <!--NoUiSlider css-->
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/nouislider.min.css">
      <!--Animate css-->
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.min.css">
      <!--Site Main Style css-->
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
      <!--Responsive css-->
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/responsive.css">
   </head>
   <body>
       
       
       
      <!-- Header Area Start -->
      <nav class="game-header navbar navbar-expand-lg">
         <div class="container">
            <a class="navbar-brand" href="index.html">
               <img src="<?php echo base_url(); ?>assets/img/logo.png" alt="site logo" />
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="menu-toggle"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="header_menu  mr-auto">
                  <li class="nav-item active">
                     <a href="<?php echo site_url('welcome');?>" class="nav-link">Home</a>
                  </li>
                  <li><a href="<?php echo site_url('welcome/about');?>">About Us</a></li>
                  <li class="nav-item">
                     <a href="<?php echo site_url('welcome/games');?>" class="nav-link">Games</a>
                  </li>
                  <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">Pages</a>
                     <ul class="dropdown-menu">
                        <li><a href="<?php echo site_url('welcome/games');?>" class="nav-link">Games</a></li>
                        <li><a href="<?php echo site_url('welcome/single_game');?>">Game Single</a></li>
                        <li><a href="<?php echo site_url('welcome/product');?>">Product</a></li>
                        <li><a href="<?php echo site_url('welcome/product_single');?>">Product Single</a></li>
                        <li><a href="<?php echo site_url('welcome/cart');?>">Cart</a></li>
                        <li><a href="<?php echo site_url('welcome/checkout');?>">Checkout</a></li>
                        <li><a href="<?php echo site_url('welcome/notfind');?>">404 Error</a></li>
                        <li><a href="<?php echo site_url('welcome/login');?>">Login</a></li>
                        <li><a href="<?php echo site_url('welcome/register');?>">register</a></li>
                     </ul>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo site_url('welcome/contact');?>" class="nav-link">Contact</a>
                  </li>
               </ul>
               <div class="header-right  my-2 my-lg-0">
                  <div class="header-search">
                     <a href="#" id="search-trigger"><i class="fa fa-search"></i></a>
                  </div>
                  <!-- Search Block -->
                  <div class="search-block">
                     <a href="#" class="search-toggle">
                     <i class="fa fa-times"></i>
                     </a>
                     <form>
                        <input type="text" name="search" placeholder="What're you looking for?">
                        <span class="fa fa-search"></span>
                     </form>
                  </div>
                  <!-- /Search Block -->
                  <div class="header-cart">
                     <a href="#">
                     <img src="<?php echo base_url(); ?>assets/img/shopping-cart.png" alt="shopping cart" />
                     $12.00
                     </a>
                  </div>
                  <div class="header-lang nav-item dropdown">
                     <a class="lang-btn nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false"><img src="<?php echo base_url(); ?>assets/img/uk.png" alt="uk">
                     EN</a>
                     <ul class="lang-menu dropdown-menu">
                        <li><a href="#"><img src="<?php echo base_url(); ?>assets/img/spain.png" alt="spain"><span>SP</span></a></li>
                        <li><a href="#"><img src="<?php echo base_url(); ?>assets/img/china.png" alt="china"><span>CH</span></a></li>
                        <li><a href="#"><img src="<?php echo base_url(); ?>assets/img/russia.png" alt="russia"><span>RU</span></a></li>
                     </ul>
                  </div>
                  <div class="header-auth  nav-item dropdown">
                     <a class="lang-btn nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false"><img src="<?php echo base_url(); ?>assets/img/admin.jpg" alt="admin" />
                     Siman</a>
                     <ul class="user_menu dropdown-menu">
                        <li><a href="#">Profile</a></li>
                        <li><a href="#">Forums</a></li>
                        <li><a href="#">Message</a></li>
                        <li><a href="#">challenges</a></li>
                        <li><a href="#">Settings</a></li>
                        <li><a href="#">Logout</a></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </nav>
      <!-- Header Area End -->
       
       
      <!-- Breadcrumb Area Start -->
      <section class="game-breadcrumb-area">
         <div class="container">
            <div class="row">
               <div class="col-12">
                  <div class="games-details-banner">
                     <div class="row">
                        <div class="col-lg-3 col-sm-4">
                           <div class="details-banner-thumb">
                              <img src="<?php echo base_url(); ?>assets/img/game-4.jpg" alt="games">
                           </div>
                        </div>
                        <div class="col-lg-6 col-sm-8">
                           <div class="details-banner-info">
                              <h3>Hand of Gilgamech <span class="single_rating"><i class="fa fa-star"></i>4.5</span></h3>
                              <div class="single_game_meta">
                                 <p class="details-genre">Action | Desktop</p>
                                 <p class="details-time-left"><i class="fa fa-calendar"></i>Release date: <span> 07.12.2015</span></p>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-3">
                           <div class="game-price single_game_price">
                              <h4>$28.99</h4>
                              <p class="off"><del>$56.99</del><span></span>50% OFF</p>
                           </div>
                           <div class="details-banner-action">
                              <a href="#" class="game-btn">Buy Now</a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Breadcrumb Area End -->
       
       
      <!-- games Details Page Start -->
      <section class="game-games-details-page section_100">
         <div class="container">
            <div class="row">
               <div class="col-lg-9 offset-lg-3">
                  <div class="games-details-page-box">
                     <ul>
                        <li>Biltong corned beef tongue </li>
                        <li>Beef short ribs leberkas cupim Drumstick </li>
                        <li>Fatback bacon picanha leberkas pork </li>
                        <li>Burgdoggen bresaola shankle </li>
                        <li>Beef short ribs leberkas cupim Drumstick </li>
                     </ul>
                     <div class="tv-panel-list">
                        <div class="tv-tab">
                           <ul class="nav nav-pills tv-tab-switch" id="pills-tab" role="tablist">
                              <li class="nav-item">
                                 <a class="nav-link active show" id="pills-brief-tab" data-toggle="pill" href="#pills-brief" role="tab" aria-controls="pills-brief" aria-selected="true">Game Brief</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" id="pills-cast-tab" data-toggle="pill" href="#pills-cast" role="tab" aria-controls="pills-cast" aria-selected="false">Features</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" id="pills-reviews-tab" data-toggle="pill" href="#pills-reviews" role="tab" aria-controls="pills-reviews" aria-selected="false">reviews</a>
                              </li>
                           </ul>
                        </div>
                        <div class="tab-content" id="pills-tabContent">
                           <div class="tab-pane fade active show" id="pills-brief" role="tabpanel" aria-labelledby="pills-brief-tab">
                              <div class="tab-gamess-details">
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="tab-body">
                                          <p>It is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions</p>
                                       </div>
                                    </div>
                                 </div>
                                 <!-- End Row -->
                              </div>
                           </div>
                           <div class="tab-pane fade" id="pills-cast" role="tabpanel" aria-labelledby="pills-cast-tab">
                              <div class="tab-gamess-details">
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="tab-body">
                                          <div class="row">
                                             <div class="col-lg-6 col-sm-6">
                                                <div class="features-game">
                                                   <div class="feature-image">
                                                      <img src="<?php echo base_url(); ?>assets/img/feature-1.png" alt="feature" />
                                                   </div>
                                                   <div class="feature-text">
                                                      <h3>horor & Adventure</h3>
                                                      <p>Lorem ipsum is simply are many variations of pass of majority.</p>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-lg-6 col-sm-6">
                                                <div class="features-game">
                                                   <div class="feature-image">
                                                      <img src="<?php echo base_url(); ?>assets/img/feature-2.png" alt="feature" />
                                                   </div>
                                                   <div class="feature-text">
                                                      <h3>Multi Players</h3>
                                                      <p>Lorem ipsum is simply are many variations of pass of majority.</p>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-lg-6 col-sm-6">
                                                <div class="features-game">
                                                   <div class="feature-image">
                                                      <img src="<?php echo base_url(); ?>assets/img/feature-3.png" alt="feature" />
                                                   </div>
                                                   <div class="feature-text">
                                                      <h3>Real GraphicHeroes</h3>
                                                      <p>Lorem ipsum is simply are many variations of pass of majority.</p>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-lg-6 col-sm-6">
                                                <div class="features-game">
                                                   <div class="feature-image">
                                                      <img src="<?php echo base_url(); ?>assets/img/feature-4.png" alt="feature" />
                                                   </div>
                                                   <div class="feature-text">
                                                      <h3>Smooth Controlling</h3>
                                                      <p>Lorem ipsum is simply are many variations of pass of majority.</p>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <!-- End Row -->
                              </div>
                           </div>
                           <div class="tab-pane fade" id="pills-reviews" role="tabpanel" aria-labelledby="pills-reviews-tab">
                              <div class="tab-gamess-details">
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="tab-body">
                                          <div class="game-comment-list">
                                             <div class="single-comment-item">
                                                <div class="single-comment-box">
                                                   <div class="main-comment">
                                                      <div class="author-image">
                                                         <img src="<?php echo base_url(); ?>assets/img/4.jpg" alt="author">
                                                      </div>
                                                      <div class="comment-text">
                                                         <div class="comment-info">
                                                            <h4>david kamal</h4>
                                                            <ul>
                                                               <li><i class="fa fa-star"></i></li>
                                                               <li><i class="fa fa-star"></i></li>
                                                               <li><i class="fa fa-star"></i></li>
                                                               <li><i class="fa fa-star"></i></li>
                                                               <li><i class="fa fa-star"></i></li>
                                                            </ul>
                                                            <p>4 minitues ago</p>
                                                         </div>
                                                         <div class="comment-text-inner">
                                                            <p>Ne erat velit invidunt his. Eum in dicta veniam interesset, harum lupta definitionem. Vocibus suscipit prodesset vim ei, equidem perpetua eu per.</p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="single-comment-box comment_reply">
                                                   <div class="main-comment">
                                                      <div class="author-image">
                                                         <img src="assets/img/5.jpg" alt="author">
                                                      </div>
                                                      <div class="comment-text">
                                                         <div class="comment-info">
                                                            <h4>Jerix Ablin</h4>
                                                            <ul>
                                                               <li><i class="fa fa-star"></i></li>
                                                               <li><i class="fa fa-star"></i></li>
                                                               <li><i class="fa fa-star"></i></li>
                                                               <li><i class="fa fa-star"></i></li>
                                                               <li><i class="fa fa-star-o"></i></li>
                                                            </ul>
                                                            <p>12 minitues ago</p>
                                                         </div>
                                                         <div class="comment-text-inner">
                                                            <p>orem ipsum dolor sit amet, consectetur adipisicing elit. Velit omnis animi et iure laudantium vitae, praesentium optio, sapiente distinctio illo? </p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="single-comment-box">
                                                   <div class="main-comment">
                                                      <div class="author-image">
                                                         <img src="<?php echo base_url(); ?>assets/img/4.jpg" alt="author">
                                                      </div>
                                                      <div class="comment-text">
                                                         <div class="comment-info">
                                                            <h4>david kamal</h4>
                                                            <ul>
                                                               <li><i class="fa fa-star"></i></li>
                                                               <li><i class="fa fa-star"></i></li>
                                                               <li><i class="fa fa-star"></i></li>
                                                               <li><i class="fa fa-star"></i></li>
                                                               <li><i class="fa fa-star"></i></li>
                                                            </ul>
                                                            <p>4 minitues ago</p>
                                                         </div>
                                                         <div class="comment-text-inner">
                                                            <p>Ne erat velit invidunt his. Eum in dicta veniam interesset, harum lupta definitionem. Vocibus suscipit prodesset vim ei, equidem perpetua eu per.</p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <!-- /end comment list -->
                                          <div class="game-leave-comment">
                                             <form>
                                                <div class="row">
                                                   <div class="col-lg-12">
                                                      <div class="comment-field">
                                                         <textarea class="comment" placeholder="Comment..." name="comment"></textarea>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-lg-12">
                                                      <div class="comment-field">
                                                         <button type="submit" class="game-btn">Add Comment <span></span></button>
                                                      </div>
                                                   </div>
                                                </div>
                                             </form>
                                          </div>
                                          <!-- /end comment form -->
                                       </div>
                                    </div>
                                 </div>
                                 <!-- End Row -->
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- games Details Page End -->
       
       
      <!-- Related Games Start -->
      <section class="game-games-area related_games section_100">
         <div class="container">
            <div class="row">
               <div class="col-12">
                  <div class="site-heading">
                     <h2 class="heading_animation">Related <span>games</span></h2>
                     <p>blanditiis praesentium voluptatum deleniti atque corrupti.accusamus et iusto odio corrupti.accusamus et iusto odioiusto odio dignissimos ducimus qui blanditiis</p>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-lg-3 col-sm-6">
                  <div class="games-single-item img-contain-isotope">
                     <div class="games-thumb">
                        <div class="games-thumb-image">
                           <a href="#">
                           <img src="<?php echo base_url(); ?>assets/img/games-1.jpg" alt="games" />
                           </a>
                        </div>
                        <div class="game-overlay">
                           <a class="popup-youtube" href="https://www.youtube.com/watch?v=3SAuuHCOkyI">
                           <i class="fa fa-play"></i>
                           </a>
                        </div>
                     </div>
                     <div class="games-desc">
                        <h3><a href="#">Desperados III Digital</a></h3>
                        <p class="game-meta">Action | Desktop</p>
                        <p class="game-meta">Release date:<span> 07.12.2015</span></p>
                        <div class="game-rating">
                           <h4>4.5</h4>
                           <ul>
                              <li><span class="fa fa-star"></span></li>
                              <li><span class="fa fa-star"></span></li>
                              <li><span class="fa fa-star"></span></li>
                              <li><span class="fa fa-star"></span></li>
                              <li><span class="fa fa-star-o"></span></li>
                           </ul>
                        </div>
                        <div class="game-action">
                           <div class="game-price">
                              <h4>$28.99</h4>
                              <p class="off">50% OFF</p>
                           </div>
                           <div class="game-buy">
                              <a href="#" class="game-btn-outline">Buy Now!</a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-sm-6">
                  <div class="games-single-item img-contain-isotope">
                     <div class="games-thumb">
                        <div class="games-thumb-image">
                           <a href="#">
                           <img src="<?php echo base_url(); ?>assets/img/game-2.jpg" alt="games" />
                           </a>
                        </div>
                        <div class="game-overlay">
                           <a class="popup-youtube" href="https://www.youtube.com/watch?v=3SAuuHCOkyI">
                           <i class="fa fa-play"></i>
                           </a>
                        </div>
                     </div>
                     <div class="games-desc">
                        <h3><a href="#">Red Dead Redemption 2</a></h3>
                        <p class="game-meta">Action | Desktop</p>
                        <p class="game-meta">Release date:<span> 07.12.2015</span></p>
                        <div class="game-rating">
                           <h4>4.5</h4>
                           <ul>
                              <li><span class="fa fa-star"></span></li>
                              <li><span class="fa fa-star"></span></li>
                              <li><span class="fa fa-star"></span></li>
                              <li><span class="fa fa-star"></span></li>
                              <li><span class="fa fa-star-o"></span></li>
                           </ul>
                        </div>
                        <div class="game-action">
                           <div class="game-price">
                              <h4>$18.99</h4>
                              <p class="off">40% OFF</p>
                           </div>
                           <div class="game-buy">
                              <a href="#" class="game-btn-outline">Buy Now!</a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-sm-6">
                  <div class="games-single-item img-contain-isotope">
                     <div class="games-thumb">
                        <div class="games-thumb-image">
                           <a href="#">
                           <img src="<?php echo base_url(); ?>assets/img/game-3.jpg" alt="games" />
                           </a>
                        </div>
                        <div class="game-overlay">
                           <a class="popup-youtube" href="https://www.youtube.com/watch?v=3SAuuHCOkyI">
                           <i class="fa fa-play"></i>
                           </a>
                        </div>
                     </div>
                     <div class="games-desc">
                        <h3><a href="#">Baldur's Gate II</a></h3>
                        <p class="game-meta">Action | Desktop</p>
                        <p class="game-meta">Release date:<span> 07.12.2015</span></p>
                        <div class="game-rating">
                           <h4>4.2</h4>
                           <ul>
                              <li><span class="fa fa-star"></span></li>
                              <li><span class="fa fa-star"></span></li>
                              <li><span class="fa fa-star"></span></li>
                              <li><span class="fa fa-star"></span></li>
                              <li><span class="fa fa-star-o"></span></li>
                           </ul>
                        </div>
                        <div class="game-action">
                           <div class="game-price">
                              <h4><del>$18.99</del></h4>
                              <p class="free">FREE</p>
                           </div>
                           <div class="game-buy">
                              <a href="#" class="game-btn-outline">Download</a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-sm-6">
                  <div class="games-single-item img-contain-isotope">
                     <div class="games-thumb">
                        <div class="games-thumb-image">
                           <a href="#">
                           <img src="<?php echo base_url(); ?>assets/img/game-8.jpg" alt="games" />
                           </a>
                        </div>
                        <div class="game-overlay">
                           <a class="popup-youtube" href="https://www.youtube.com/watch?v=3SAuuHCOkyI">
                           <i class="fa fa-play"></i>
                           </a>
                        </div>
                     </div>
                     <div class="games-desc">
                        <h3><a href="#">Hand of Gilgamech</a></h3>
                        <p class="game-meta">Action | Desktop</p>
                        <p class="game-meta">Release date:<span> 09.11.2016</span></p>
                        <div class="game-rating">
                           <h4>4.1</h4>
                           <ul>
                              <li><span class="fa fa-star"></span></li>
                              <li><span class="fa fa-star"></span></li>
                              <li><span class="fa fa-star"></span></li>
                              <li><span class="fa fa-star"></span></li>
                              <li><span class="fa fa-star-o"></span></li>
                           </ul>
                        </div>
                        <div class="game-action">
                           <div class="game-price">
                              <h4><del>$17.22</del></h4>
                              <p class="off">30% OFF</p>
                           </div>
                           <div class="game-buy">
                              <a href="#" class="game-btn-outline">Buy Now!</a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Related Games End -->
       
       
      <!-- Footer Area Start -->
      <footer class="game-footer">
         <div class="footer-top-area">
            <div class="container">
               <div class="row">
                  <div class="col-lg-4 col-md-6 col-sm-12">
                     <div class="single-footer">
                        <h3>About us</h3>
                        <p>Etiam consequat sem ullamcorper, euismod metus sit amet, tristique justo. Vestibulum mattis, nisi ut faucibus commodo, risus ex commodo.</p>
                        <p>euismod metus sit amet, tristique justo. Vestibulum mattis Vestibulum mattis, </p>
                     </div>
                  </div>
                  <div class="col-lg-5 col-md-6 col-sm-12">
                     <div class="widget-content">
                        <div class="row clearfix">
                           <div class="col-lg-6 col-md-6 col-sm-12">
                              <div class="single-footer">
                                 <h3>Our Games</h3>
                                 <ul>
                                    <li><a href="#"><span class="fa fa-caret-right"></span>Need For Speed</a></li>
                                    <li><a href="#"><span class="fa fa-caret-right"></span>Call Of Duty</a></li>
                                    <li><a href="#"><span class="fa fa-caret-right"></span>Resident Evil</a></li>
                                    <li><a href="#"><span class="fa fa-caret-right"></span>Dragons Fight</a></li>
                                    <li><a href="#"><span class="fa fa-caret-right"></span>2 Player Champions</a></li>
                                 </ul>
                              </div>
                           </div>
                           <div class=" col-lg-6 col-md-6 col-sm-12">
                              <div class="single-footer">
                                 <h3>Explore</h3>
                                 <ul>
                                    <li><a href="#"><span class="fa fa-caret-right"></span>About</a></li>
                                    <li><a href="#"><span class="fa fa-caret-right"></span>Our Games</a></li>
                                    <li><a href="#"><span class="fa fa-caret-right"></span>Contact Us</a></li>
                                    <li><a href="#"><span class="fa fa-caret-right"></span>Help & Support</a></li>
                                    <li><a href="#"><span class="fa fa-caret-right"></span>Privacy Policy</a></li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class=" col-lg-3 col-md-6 col-sm-12">
                     <div class="single-footer">
                        <h3>Contact Us</h3>
                        <div class="footer-contact">
                           <h4 class="title"><i class="fa fa-map-marker"></i>Address </h4>
                           <p>88 road, broklyn street<br>new york, usa</p>
                        </div>
                        <div class="footer-contact">
                           <h4 class="title"><i class="fa fa-pencil"></i>Email Address</h4>
                           <p>info@example.com</p>
                        </div>
                        <div class="footer-contact">
                           <h4 class="title"><i class="fa fa-phone"></i>Phone </h4>
                           <p>777-1234-567</p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="footer-bottom">
            <div class="container">
               <div class="row">
                  <div class="col-12">
                     <div class="footer-bottom-inn">
                        <div class="footer-logo">
                           <a href="index.html">
                           <img src="assets/img/logo.png" alt="site logo" />
                           </a>
                        </div>
                        <div class="footer-social">
                           <ul>
                              <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                              <li><a href="#"><span class="fa fa-instagram"></span></a></li>
                              <li><a href="#"><span class="fa fa-youtube"></span></a></li>
                              <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                              <li><a href="#"><span class="fa fa-google-plus"></span></a></li>
                           </ul>
                        </div>
                        <div class="copyright">
                           <p>&copy; Copyrights 2020 FAF - All Rights Reserved</p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!-- Footer Area End -->
       
       
      <!--Jquery js-->
          <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
      <!-- Popper JS -->
      <script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
      <!--Bootstrap js-->
      <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
      <!--Owl-Carousel js-->
      <script src="<?php echo base_url(); ?>assets/js/owl.carousel.min.js"></script>
      <!--Magnific js-->
      <script src="<?php echo base_url(); ?>assets/js/jquery.magnific-popup.min.js"></script>
      <!--wNumb js-->
      <script src="<?php echo base_url(); ?>assets/js/wNumb.js"></script>
      <!--NoUiSlider js-->
      <script src="<?php echo base_url(); ?>assets/js/nouislider.min.js"></script>
      <!-- Isotop Js -->
      <script src="<?php echo base_url(); ?>assets/js/isotope.pkgd.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/js/custom-isotop.js"></script>
      <!-- Counter JS -->
      <script src="<?php echo base_url(); ?>assets/js/jquery.counterup.min.js"></script>
      <!-- Way Points JS -->
      <script src="<?php echo base_url(); ?>assets/js/waypoints-min.js"></script>
      <!--Main js-->
      <script src="<?php echo base_url(); ?>assets/js/main.js"></script>
   </body>

</html>

