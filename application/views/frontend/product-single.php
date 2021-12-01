<?php require('header.php'); ?>
<?php $product_details = (object)$product;?>
<!-- Breadcrumb Area Start -->
<section class="game-breadcrumb-area">
   <div class="container">
      <div class="row">
         <div class="col-12">
            <div class="breadcromb-box">
               <h3><?=$product_details->name; ?></h3>
               <ul>
                  <li><i class="fa fa-home"></i></li>
                  <li><a href="<?=base_url(); ?>">Home</a></li>
                  <li><i class="fa fa-angle-right"></i></li>
                  <li>Product Details</li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- Breadcrumb Area End -->
<!-- Product Details Page Start -->
<section class="game-product-details section_100">
   <div class="container">
      <div class="row">
         <div class="col-lg-6">
            <div class="product-details-image">
               <img src="<?=isset($product->coverImageOriginal) ? $product->coverImageOriginal : base_url()."assets/img/noimage.jpeg"?>" alt="<?=$product_details->name; ?>" />
            </div>
         </div>
         <div class="col-lg-6">
            <div class="product-details-text">
               <h3><?=$product_details->name; ?></h3>
               <div class="tour-rating">
                  <ul>
                     <li><i class="fa fa-star"></i></li>
                     <li><i class="fa fa-star"></i></li>
                     <li><i class="fa fa-star"></i></li>
                     <li><i class="fa fa-star"></i></li>
                     <li><i class="fa fa-star-half-o"></i></li>
                  </ul>
                  <p>(23 rating)</p>
               </div>
               <div class="single-pro-page-para">
                  <p><?=isset($product_details->description) ? $product_details->description : "" ?></p>
               </div>
               <div class="single-shop-price">
                  <p>Price:<span>$<?=$product_details->price; ?></span></p>
                  <p>Available:<span>In Stock</span></p>
               </div>
               <div class="quantity">
                  <p>Quantity: </p>
                  <div class="num-block skin-2">
                     <div class="num-in">
                        <span class="minus dis"></span>
                        <input type="text" id="item-quantity" class="in-num" value="1" readonly="">
                        <span class="plus"></span>
                     </div>
                  </div>
               </div>
               <div class="single-shop-page-btn">
                  <a href="<?=base_url('welcome/checkout').'/'.$product_details->kinguinId; ?>" class="game-btn">
                    Buy Now
                    <span></span>
                  </a>
                  <a href="#"
                    class="game-btn add-to-cart"
                    data-product_id="<?=$product_details->kinguinId?>"
                    data-price="<?=$product_details->price?>"
                    data-title="<?=$product_details->name?>"
                    data-image="<?=isset($product->coverImageOriginal) ? $product->coverImageOriginal : base_url()."assets/img/noimage.jpeg"?>"
                  >Add To Cart<span></span>
                  </a>
                  <a href="#"
                    class="game-btn add-to-wishlist"
                    data-product_id="<?=$product_details->kinguinId?>"
                    data-price="<?=$product_details->price?>"
                    data-title="<?=$product_details->name?>"
                    data-image="<?=isset($product->coverImageOriginal) ? $product->coverImageOriginal : base_url()."assets/img/noimage.jpeg"?>"
                  >Wishlist<span></span>
                </a>
               </div>
            </div>
            &nbsp
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-lg-12">
         <div class="product-panel-list">
            <div class="product-tab">
               <ul class="nav nav-pills product-tab-switch" id="pills-tab" role="tablist">
                  <li class="nav-item">
                     <a class="nav-link active show" id="description-tab" data-toggle="pill" href="#description" role="tab" aria-controls="description" aria-selected="true">description</a>
                  </li>
                  <!--
                     <li class="nav-item">
                        <a class="nav-link" id="pro-reviews-tab" data-toggle="pill" href="#pro-reviews" role="tab" aria-controls="pro-reviews" aria-selected="false">reviews</a>
                     </li>
                     -->
               </ul>
            </div>
            <div class="tab-content" id="pills-tabContent">
               <div class="tab-pane fade active show" id="description" role="tabpanel" aria-labelledby="description-tab">
                  <div class="tab-gamess-details">
                     <div class="row">
                        <div class="col-md-12">
                           <div class="tab-body">
                              <h3>Product Description</h3>
                              <p><?=isset($product_details->description) ? $product_details->description : "" ?></p>
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
</section>
<!-- Product Details Page End -->
<?php require('footer.php'); ?>
