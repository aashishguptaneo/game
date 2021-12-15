<?php require('header.php'); ?>
<!-- Breadcrumb Area Start -->
<section class="game-breadcrumb-area">
   <div class="container">
      <div class="row">
         <div class="col-12">
            <div class="breadcromb-box">
               <h3>Order History</h3>
               <ul>
                  <li><i class="fa fa-home"></i></li>
                  <li><a href="<?=base_url(); ?>">Home</a></li>
                  <li><i class="fa fa-angle-right"></i></li>
                  <li>Order</li>
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
         <div class="col-lg-12">
            <div class="cart-table-left">
               <h3>Order History</h3>
               <div class="table-responsive cart_box">
                  <table class="table">
                     <thead>
                        <tr>
                           <th>Order ID</th>
                           <th>Kinguin Order Id</th>
                           <th>Price</th>
                           <th>Address</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                           foreach($orders as $value){
                             ?>
                        <tr class="shop-cart-item">
                           <td class="game-cart-product">
                              <a href="#">
                                 <p><?=$value['id']; ?></p>
                              </a>
                           </td>
                           <td class="game-cart-price">
                              <a href="#">
                                 <p><?=$value['kinguin_order_id']; ?></p>
                              </a>
                           </td>
                           <td class="game-cart-price">
                              <a href="#">
                                 <p><?=$value['order_total']; ?></p>
                              </a>
                           </td>

                           <td class="game-cart-total">
                              <p><?=$value['address']; ?></p>
                           </td>
                        </tr>
                        <?php  } ?>
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
