<?php require('header.php'); ?>
<!-- Slider Area Start -->
<section class="slider-area">
   <div class="game-slide owl-carousel">
      <div class="game-main-slide slide-1">
      </div>
      <div class="game-main-slide slide-2">
      </div>
      <div class="game-main-slide slide-3">
      </div>
   </div>
</section>
<style>
.game-rating ul {
	display: flex;
}
.header-cart.active {
	background: #f68a1e;
	text-align: center;
}
</style>
<!-- Slider Area End -->
<!-- Games Area Strat -->
<section class="game-games-area section_70">
   <div class="top-layer"></div>
   <div class="bottom-layer"></div>
   <div class="container">
      <div class="row">
         <div class="col-12">
            <div class="site-heading">
               <h2 class="heading_animation">our <span>games</span></h2>
               <p>blanditiis praesentium voluptatum deleniti atque corrupti.accusamus et iusto odio corrupti.accusamus et iusto odioiusto odio dignissimos ducimus qui blanditiis</p>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-12">
            <div class="games-masonary">
               <div class="clearfix gamesContainer">
                  <?php //echo count($product); ?>
                  <?php foreach($product as $value) {  ?>
                  <div class="games-item mobile">
                     <div class="games-single-item img-contain-isotope">
                        <div class="games-thumb">
                           <div class="games-thumb-image">
                               <a href="<?=base_url('welcome/product_single').'/'.$value->kinguinId;?>">
                                <img src="<?=isset($value->coverImageOriginal) ? $value->coverImageOriginal : base_url()."assets/img/noimage.jpeg"?>" alt="<?=$value->name?>" />
                              </a>
                           </div>

                        </div>
                        <div class="games-desc">
                           <h3>
                             <a href="<?=base_url('welcome/product_single').'/'.$value->kinguinId;?>">
                               <?=$value->name?>
                             </a>
                             </h3>
                           <?php if(isset($value->genres)){ ?>
                             <p class="game-meta">  <?=implode(" | ",$value->genres); ?></p>
                           <?php } ?>

                           <?php if(isset($value->releaseDate)){?>
                             <p class="game-meta">Release date:<span> <?=$value->releaseDate;  ?></span></p>
                           <?php } ?>
                           <div class="game-rating">
                              <ul>
                                 <li>
                                    <!-- <span class="fa fa-star"> -->
                                       <div class="header-cart">
                                          <a
                                            class="add-to-cart"
                                            href="<?=base_url().'cart'?>"
                                            data-product_id="<?=$value->kinguinId?>"
                                            data-price="<?=$value->price?>"
                                            data-title="<?=$value->name?>"
                                             data-image="<?=isset($value->coverImageOriginal) ? $value->coverImageOriginal : base_url()."assets/img/noimage.jpeg"?>"
                                                >
                                            <img src="<?=base_url(); ?>assets/img/shopping-cart.png" alt="shopping cart" />
                                          </a>
                                       </div>
                                    <!-- </span> -->
                                 </li>
                                 <li>
                                    <!-- <span class="fa fa-star"> -->
                                       <div class="header-cart <?=isset($wishlist) && in_array($value->kinguinId,$wishlist) ? 'active' : "" ?>">
                                          <a href="wishlist"
                                          data-product_id="<?=$value->kinguinId?>"
                                          data-price="<?=$value->price?>"
                                          data-title="<?=$value->name?>"
                                          data-image="<?=isset($value->coverImageOriginal) ? $value->coverImageOriginal : "" ?>"
                                          class="add-to-wishlist">
                                            <img src="<?=base_url(); ?>assets/img/wish.png" alt="wishlist" />
                                          </a>
                                       </div>
                                    <!-- </span> -->
                                 </li>
                              </ul>
                           </div>
                           <div class="game-action">
                              <div class="game-price">
                                 <h4>
                                   <?='$ '.$value->price; ?>
                                 </h4>
                                 <?php $offer = rand(1,20); ?>
                                 <p class="off">
                                   <?=$offer; ?>% OFF
                                 </p>
                              </div>
                              <div class="game-buy">
                                 <a href="<?=base_url('welcome/product_single').'/'.$value->kinguinId;?>" class="game-btn-outline">Buy Now!</a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- end game item -->
                  <?php } ?>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- Games Area End -->
<!-- Blog Area Srart -->
<section class="game-blog-area section_100">
   <div class="bottom-layer"></div>
   <div class="container">
      <div class="row">
         <div class="col-12">
            <div class="site-heading">
               <h2 class="heading_animation">Recommended <span>Games</span></h2>
            </div>
         </div>
      </div>
      <div class="row">
         <?php
         foreach($product as $value) {
            if($value->offersCount === 6 ){
            ?>
         <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-ms-12 col-xs-12">
            <div class="post-large">
               <div class="blog-item">
                  <div class="blog-image">
                     <a href="<?=base_url('welcome/product_single').'/'.$value->kinguinId;?>">
                     <img src="<?=isset($value->coverImageOriginal) ? $value->coverImageOriginal : ""?>" alt="blog" />
                     </a>
                  </div>
                  <div class="blog-text">
                     <?php if(isset($value->genres)){ ?>
                       <p class="blog-cat"><?='<a href="#">'.implode(" | ",$value->genres).'</a>'; ?></p>
                     <?php } ?>
                     <h3><a href="<?=base_url('welcome/product_single').'/'.$value->kinguinId;?>"><?=$value->name;  ?></a></h3>
                     <p><?=$value->description; ?></p>
                  </div>
               </div>
            </div>
         </div>
         <?php
         break;
       }
       } ?>
         <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-ms-12 col-xs-12">
            <div class="post-small">
               <?php
                $i = 0 ; foreach($product as $value) {
                  if($value->offersCount >= 3){
                  ?>
               <div class="blog-item">
                  <div class="blog-image">
                     <a href="<?=base_url('welcome/product_single').'/'.$value->kinguinId;?>">
                     <img src="<?php if(isset($value->coverImageOriginal)){echo $value->coverImageOriginal;} ?>" alt="blog" />
                     </a>
                  </div>
                  <div class="blog-text">
                     <?php if(isset($value->genres)){ ?>
                     <p class="blog-cat"><?='<a href="#">'.implode(" | ",$value->genres).'</a>'; ?></p>
                     <?php } ?>
                     <h3><a href="<?=base_url('welcome/product_single').'/'.$value->kinguinId;?>"><?=$value->name;  ?></a></h3>
                  </div>
               </div>
               <?php
              } $i++;
              if($i == 6){
                break;
              }
            } ?>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-12">
            <div class="load_more text-center">
               <a href="<?=base_url().'products'?>" class="game-btn">Explore all</a>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- Blog Area End -->
<section class="game-sponsor-area section_140">
   <div class="container">
      <div class="row">
         <div class="col-12">
            <div class="site-heading">
               <h2 class="heading_animation extend">Payments &  <span>Partners</span></h2>
               <p>blanditiis praesentium voluptatum deleniti atque corrupti.accusamus et iusto odio corrupti.</p>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="sponsor-box-item">
               <div class="sponsor-box">
                  <ul>
                     <li><a href="#"><img src="<?=base_url(); ?>assets/img/sponsor1.png" alt="sponsor"></a></li>
                     <li><a href="#"><img src="<?=base_url(); ?>assets/img/sponsor2.png" alt="sponsor"></a></li>
                     <li><a href="#"><img src="<?=base_url(); ?>assets/img/sponsor1.png" alt="sponsor"></a></li>
                     <li><a href="#"><img src="<?=base_url(); ?>assets/img/sponsor2.png" alt="sponsor"></a></li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<?php require('footer.php'); ?>
