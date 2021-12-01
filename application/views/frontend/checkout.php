<?php require('header.php'); ?>
<!-- Breadcrumb Area Start -->
<section class="game-breadcrumb-area">
   <div class="container">
      <div class="row">
         <div class="col-12">
            <div class="breadcromb-box">
               <h3>Checkout Page</h3>
               <ul>
                  <li><i class="fa fa-home"></i></li>
                  <li><a href="<?=base_url(); ?>">Home</a></li>
                  <li><i class="fa fa-angle-right"></i></li>
                  <li>Checkout Page</li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="checkout-page-area section_100">
   <div class="container">
      <div class="row">
         <div class="col-lg-8">
            <div class="checkout-left-box">
               <?php if(!$this->session->userdata('uid')){ ?>
               <!-- login singup buttns -->
               <?php }else{   ?>
               <h3>Billing Details</h3>

               <?=form_open(base_url().'welcome/checkout_submit',array('class' => 'form-horizontal')); ?>
               <div class="row checkout-form">
                  <div class="col-md-6">
                     <input value="<?=isset($user) ? $user->FirstName: ""?>" placeholder="Your First Name" type="text" name="first_name" value="" id="name23">
                  </div>
                  <div class="col-md-6">
                     <input value="<?=isset($user) ? $user->LastName: ""?>" placeholder="Your Last Name" type="text" name="last_name" value="" id="name22">
                  </div>
               </div>
               <!-- user_table data fetching -->
               <div class="row checkout-form">
                  <div class="col-md-12">
                     <input placeholder="Country" value="<?=isset($user) ? $user->country: ""?>" type="text" name="country" id="cntr2">
                  </div>
               </div>
               <div class="row checkout-form">
                  <div class="col-md-12">
                     <input placeholder="Your Address" value="<?=isset($user) ? $user->address: ""?>" type="text" name="address" id="addr2">
                  </div>
               </div>
               <div class="row checkout-form">
                  <div class="col-md-12">
                     <input placeholder="Town / City" value="<?=isset($user) ? $user->city: ""?>"  type="text" name="city" id="Town2">
                  </div>
               </div>
               <div class="row checkout-form">
                  <div class="col-md-6">
                     <input value="<?=isset($user) ? $user->Email : ""?>" placeholder="Your Email Address" type="email" name="email" id="info2">
                  </div>
                  <div class="col-md-6">
                     <input placeholder="Your Mobile Number" value="<?=isset($user) ? $user->mobile: ""?>"  type="text" name="mobile" id="info12">
                  </div>
               </div>
               <div class="row checkout-form">
                  <div class="col-md-12">
                     <textarea placeholder="Write Order Note Here..." name="note"></textarea>
                  </div>
               </div>
               <?php
                  $amount = 0;
                  foreach($products as $value) {
                      $value = gettype($value) == 'array' ? (object) $value : $value;
                      $value->kinguinId = isset($value->kinguinId) ? $value->kinguinId : $value->product_id;
                      $value->name = isset($value->name) ? $value->name : $value->title;
                      $value->image = isset($value->coverImageOriginal) ? $value->coverImageOriginal : $value->image;
                      $amount+= $value->price*$value->qty;
                      ?>
                         <input type="hidden" name="kinguinId[]" value="<?=$value->kinguinId;?>">
                         <input type="hidden" name="name[]" value="<?=$value->name;?>">
                         <input type="hidden" name="image[]" value="<?=$value->image;?>">
                         <input type="hidden" name="price[]" value="<?=$value->price;?>">
                         <input type="hidden" name="qty[]" value="<?=$value->qty?>">
                       <?php
                  }
                  ?>
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
                           <td> <?=$amount;?></td>
                        </tr>
                        <tr>
                           <td>Order Total</td>
                           <td><?=$amount;?></td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
            <div class="booking-right">
               <div class="game-payment clearfix">
                  <div class="payment">
                     <input type="radio" id="t-option" name="selector" checked>
                     <label for="t-option">Paypal</label>
                     <div class="check">
                        <div class="inside"></div>
                     </div>
                     <img src="<?=base_url(); ?>assets/img/paypal.jpg" alt="credit card">
                  </div>
               </div>
               <div class="action-btn">
                  <button type="submit" class="game-btn" name="form1">place order <span></span></button>
               </div>
            </div>
            <?=form_close(); ?>
            <?php } ?>
         </div>
      </div>
   </div>
</section>
<!-- Checkout Page Area End -->
<?php require('footer.php'); ?>
