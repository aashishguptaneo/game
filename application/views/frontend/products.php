<?php require('header.php'); ?>
<!-- Breadcrumb Area Start -->
<section class="game-breadcrumb-area">
   <div class="container">
      <div class="row">
         <div class="col-12">
            <div class="breadcromb-box">
               <h3>Product</h3>
               <ul>
                  <li><i class="fa fa-home"></i></li>
                  <li><a href="<?=base_url(); ?>">Home</a></li>
                  <li><i class="fa fa-angle-right"></i></li>
                  <li>Product</li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- Breadcrumb Area End -->
<!-- Game Page Start -->
<section class="game-product-page section_100">
   <div class="container">
      <div class="row">
         <div class="col-lg-2">
            <div class="sidebar-widget">
            </div>
         </div>
      </div>
      <?php //var_dump($product);?>
      <div class="col-lg-11">
         <div class="products-grid">
            <div class="row">
               <?php foreach($products as $product) {  ?>
               <div class="col-lg-3 col-sm-6">
                  <div class="games-single-item">
                     <div class="games-thumb">
                        <div class="games-thumb-image">
                            <a href="<?=base_url('welcome/product_single');?>/<?=$product->kinguinId?>">
                             <img src="<?=isset($product->coverImageOriginal) ? $product->coverImageOriginal : base_url()."assets/img/noimage.jpeg"?>" alt="<?=$product->name?>" />
                           </a>
                        </div>
                     </div>
                     <div class="games-desc">
                        <h3>
                          <a href="<?=base_url('welcome/product_single');?>/<?=$product->kinguinId?>">
                          <?=$product->name?>
                        </a>
                      </h3>
                        <div class="game-rating">
                           <ul>
                              <li><span class="fa fa-star"></span></li>
                              <li><span class="fa fa-star"></span></li>
                              <li><span class="fa fa-star"></span></li>
                              <li><span class="fa fa-star"></span></li>
                              <li><span class="fa fa-star-o"></span></li>
                           </ul>
                        </div>
                        <a href="wishlist"
                          data-product_id="<?=$product->kinguinId?>"
                          data-price="<?=$product->price?>"
                          data-title="<?=$product->name?>"
                          data-image="<?=isset($product->coverImageOriginal) ? $product->coverImageOriginal : base_url()."assets/img/noimage.jpeg"?>"
                          class="add-to-wishlist">
                          <img src="<?=base_url(); ?>assets/img/wish.png" alt="wishlist" />
                        </a>
                        <a
                          class="add-to-cart"
                          href="<?=base_url().'cart'?>"
                          data-product_id="<?=$product->kinguinId?>"
                          data-price="<?=$product->price?>"
                          data-title="<?=$product->name?>"
                          data-image="<?=isset($product->coverImageOriginal) ? $product->coverImageOriginal : base_url()."assets/img/noimage.jpeg"?>"
                              >
                          <img src="<?=base_url(); ?>assets/img/shopping-cart.png" alt="shopping cart" />
                        </a>

                        <div class="game-action">
                           <div class="game-price">
                              <h4><?='$ '.$product->price; ?></h4>
                           </div>
                           <div class="game-buy">
                              <a href="<?=base_url('welcome/checkout').'/'.$product->kinguinId; ?>" class="game-btn-outline">Buy Now!</a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <?php } ?>
            </div>
         </div>
         <div class="pagination-box-row">
            <p>Page 1 of <?=$pages?></p>
            <ul class="pagination">
              <?php
              for($i = 1 ;$i <$pages ;$i++){ ?>
                  <li class="<?=($i == $page) ? 'active' : ""?>">
                    <a href="<?=isset($search) ? base_url()."search?page=".$i."&seacrh=".$search : base_url()."products?page=".$i?>">
                      <?=$i?>
                    </a>
                  </li>
              <?php }
              ?>
               <li>
                 <a href="<?=base_url()."/welcome/prodcuts?page=".$pages?>">
                   <i class="fa fa-angle-double-right"></i>
                </a>
              </li>
            </ul>
         </div>
      </div>
   </div>
   </div>
</section>
<!-- Game Page End -->
<?php require('footer.php'); ?>
