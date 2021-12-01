<?php require('header.php'); ?>
<!-- Breadcrumb Area Start -->
<section class="game-breadcrumb-area">
   <div class="container">
      <div class="row">
         <div class="col-12">
            <div class="breadcromb-box">
               <h3>Wishlist</h3>
               <ul>
                  <li><i class="fa fa-home"></i></li>
                  <li><a href="<?php echo base_url(); ?>">Home</a></li>
                  <li><i class="fa fa-angle-right"></i></li>
                  <li>Wishlist</li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- Breadcrumb Area End -->
<!-- Cart Page Start -->
<section class="game-cart-page-area section_100">
   <div class="container">
      <div class="row">
         <div class="col-lg-10">
            <div class="cart-table-left">
               <h3>My Wishlist</h3>
               <div class="table-responsive cart_box">
                  <table class="table">
                     <thead>
                        <tr>
                           <th>Preview</th>
                           <th>Product</th>
                           <th>Price</th>
                           <!-- <th>Quantity</th> -->
                           <th>Total</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                       <?php
                       foreach ($wishlist as $key => $value) {
                         ?>
                         <tr class="shop-cart-item">
                            <td class="game-cart-preview">
                               <a href="#">
                               <img src="<?=$value->image?>" alt="cart-1">
                               </a>
                            </td>
                            <td class="game-cart-product">
                               <a href="#">
                                  <p><?=$value->title?></p>
                               </a>
                            </td>
                            <td class="game-cart-price">
                               <p>$<?=$value->price?></p>
                            </td>
                            <td class="game-cart-quantity" style="pointer-events:none;">
                               <div class="num-block skin-2">
                                  <div class="num-in">
                                     <span class="minus dis"></span>
                                     <input type="text" class="in-num" value="1" readonly="">
                                     <span class="plus"></span>
                                  </div>
                               </div>
                            </td>
                            <td class="game-cart-total">
                               <p>$<?=$value->price?></p>
                            </td>
                            <td class="game-cart-close">
                                  <span>
                                    <a data-wishlist-id="<?=$value->id?>" class="remove-from-wishlist" href="#">
                                      <i class="fa fa-times"style="color: white;" ></i>
                                    </a>
                                  </span>
                                  <span>
                                    <a data-wishlist-id="<?=$value->id?>" class="atc-from-wishlist" href="#">
                                      <i class="fa fa-cart-plus" style="color: white;"></i>
                                    </a>
                                  </span>
                            </td>
                         </tr>
                       <?php }
                       ?>

                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
   </div>
</section>
<!-- Cart Page End -->
<?php require('footer.php'); ?>
