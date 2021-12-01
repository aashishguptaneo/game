<?php require('header.php');?>


      <!-- Breadcrumb Area Start -->
      <section class="game-breadcrumb-area">
         <div class="container">
            <div class="row">
               <div class="col-12">
                  <div class="breadcromb-box">
                     <h3>Cart Page</h3>
                     <ul>
                        <li><i class="fa fa-home"></i></li>
                        <li><a href="<?php echo base_url(); ?>">Home</a></li>
                        <li><i class="fa fa-angle-right"></i></li>
                        <li>Cart Page</li>
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
           <?php
             if(isset($cart) && count($cart) > 0){
           ?>
            <div class="row">
               <div class="col-lg-8">
                  <div class="cart-table-left">
                     <h3>Shopping Cart</h3>
                     <div class="table-responsive cart_box">
                        <table class="table">
                           <thead>
                              <tr>
                                 <th>Preview</th>
                                 <th>Product</th>
                                 <th>Price</th>
                                 <th>Quantity</th>
                                 <th>Total</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody>
                               <?php echo form_open('Cart/update_cart',['id'=>'cart-form','autocomplete'=>'off']);?>
                               <?php
                               $cartTotal = 0;
                               foreach ($cart as $key => $value) {
                                 $value = gettype($value) == 'array' ? (object) $value : $value;
                                 $cartTotal+=$value->price*$value->qty;
                                 // echo "<pre>";
                                 // print_r($value);
                                 // echo "</pre>";
                               ?>

                               <input type="hidden" name="id[]" value="<?=isset($value->id) ? $value->id : $key?>">
                               <tr class="shop-cart-item">
                                  <td class="game-cart-preview">
                                    <a href="<?=base_url('welcome/product_single');?>/<?=isset($value->id) ? $value->id : $value->product_id?>">
                                        <img src="<?=!empty($value->image) ? $value->image : base_url()."assets/img/noimage.jpeg"?>"
                                        alt="<?=$value->title?>">
                                     </a>
                                  </td>
                                  <td class="game-cart-product">
                                    <a href="<?=base_url('welcome/product_single');?>/<?=isset($value->id) ? $value->id : $value->product_id?>">
                                        <p><?=$value->title?></p>
                                     </a>
                                  </td>
                                  <td class="game-cart-price">
                                     <p>$<?=$value->price?></p>
                                  </td>
                                  <td class="game-cart-quantity" >
                                     <div class="num-block skin-2">
                                        <div class="num-in">
                                           <span class="minus dis"></span>
                                           <input name="qty[]" type="text" class="in-num" value="<?=$value->qty?>" readonly="">
                                           <span class="plus"></span>
                                        </div>
                                     </div>
                                  </td>
                                  <td class="game-cart-total">
                                     <p>$<?=$value->price*$value->qty?></p>
                                  </td>
                                  <td class="game-cart-close">
                                     <a  href="<?=base_url()?>cart/remove?id=<?=isset($value->id) ? $value->id : $key?>">
                                       <i class="fa fa-times"></i>
                                     </a>
                                  </td>
                               </tr>
                             <?php }
                             ?>
                             <?php echo form_close();?>

                           </tbody>
                        </table>
                     </div>
                     <div class="cart-clear">
                        <a class="clear-cart" href="<?=base_url()?>cart/clear">clear cart</a>
                        <a class="update-cart" href="#">update cart</a>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4">
                  <div class="order-summury-box">
                     <h3>Order Summury</h3>
                     <div class="summury-inn">
                        <table>
                           <tbody>
                              <tr>
                                 <td>Cart Subtotal</td>
                                 <td>$<?=$cartTotal?></td>
                              </tr>
                              <tr>
                                 <td>Shipping and Handling</td>
                                 <td>Free Shipping</td>
                              </tr>
                              <tr>
                                 <td>Order Total</td>
                                 <td>$<?=$cartTotal?></td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </div>
                  <div class="checkout-action">
                     <a href="<?=base_url()."welcome/checkout"?>" class="game-btn">
                       Proceed to checkout <span></span>
                     </a>
                  </div>
               </div>
            </div>
          <?php }else{ ?>

              <h2>Empty Cart</h2>
          <?php  } ?>
         </div>
      </section>
      <!-- Cart Page End -->


<?php require('footer.php');?>
