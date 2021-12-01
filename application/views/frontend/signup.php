<?php require('header.php'); ?>
<style>
   body {
   color: #fff;
   background: #000000;
   font-family: 'Roboto', sans-serif;
   }
   .form-control {
   height: 40px;
   box-shadow: none;
   color: #969fa4;
   }
   .form-control:focus {
   border-color: #5cb85c;
   }
   .form-control, .btn {
   border-radius: 3px;
   }
   .signup-form {
   width: 450px;
   margin: 0 auto;
   padding: 30px 0;
   font-size: 15px;
   }
   .signup-form h2 {
   color: #fff;
   margin: 0 0 15px;
   position: relative;
   text-align: center;
   }
   .signup-form h2:before, .signup-form h2:after {
   content: "";
   height: 2px;
   width: 30%;
   background: #d4d4d4;
   position: absolute;
   top: 50%;
   z-index: 2;
   }
   .signup-form h2:before {
   left: 0;
   }
   .signup-form h2:after {
   right: 0;
   }
   .signup-form .hint-text {
   color: #fff;
   margin-bottom: 30px;
   text-align: center;
   }
   .signup-form form {
   color: #999;
   border-radius: 3px;
   margin-bottom: 15px;
   background: #f2f3f7;
   box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
   padding: 30px;
   }
   .signup-form .form-group {
   margin-bottom: 20px;
   }
   .signup-form input[type="checkbox"] {
   margin-top: 3px;
   }
   .signup-form .btn {
   font-size: 16px;
   font-weight: bold;
   min-width: 140px;
   outline: none !important;
   }
   .signup-form .row div:first-child {
   	padding-right: 10px;
   }
   .signup-form .row div:last-child {
   	padding-left: 10px;
   }
   .signup-form a {
	   color: #fff;
	   text-decoration: underline;
   }
   .signup-form a:hover {
   	text-decoration: none;
   }
   .signup-form form a {
	   color: #5cb85c;
	   text-decoration: none;
   }
   .signup-form form a:hover {
   	text-decoration: underline;
   }
   .btn-success {
	   color: #fff;
	   background-color: #ff7a21;
	   border-color: #ff7a21;
   }
</style>
<div class="signup-form">
<h2>Register</h2>
<p class="hint-text">Create your account. It's free and only takes a minute.</p>
<?php echo form_open('Signup',['name'=>'userregistration','autocomplete'=>'off']);?>
<div class="form-group">
   <!--success message -->
   <?php if($this->session->flashdata('success')){?>
   <p style="color:green"><?php  echo $this->session->flashdata('success');?></p>
   <?php } ?>
   <!--error message -->
   <?php if($this->session->flashdata('error')){?>
   <p style="color:red"><?php  echo $this->session->flashdata('error');?></p>
   <?php } ?>
   <div class="form-group">
      <?php echo form_input(['name'=>'firstname','class'=>'form-control','value'=>set_value('firstname'),'placeholder'=>'Enter First Name']);?>
      <?php echo form_error('firstname',"<div style='color:red'>","</div>");?>
   </div>
   <div class="form-group">
      <?php echo form_input(['name'=>'lastname','class'=>'form-control','value'=>set_value('lastname'),'placeholder'=>'Enter Last Name']);?>
      <?php echo form_error('firstname',"<div style='color:red'>","</div>");?>
   </div>
   <div class="form-group">
      <?php echo form_input(['name'=>'emailid','type'=>"email",'class'=>'form-control','value'=>set_value('emailid'),'placeholder'=>'Enter your Email id']);?>
      <?php echo form_error('emailid',"<div style='color:red'>","</div>");?>
   </div>
   <div class="form-group">
      <?php echo form_input(['name'=>'mobile','type'=>"number",'class'=>'form-control','value'=>set_value('mobile'),'placeholder'=>'Enter your Mobile Number']);?>
      <?php echo form_error('mobile',"<div style='color:red'>","</div>");?>
   </div>
   <div class="form-group">
      <?php echo form_input(['name'=>'address','class'=>'form-control','value'=>set_value('address'),'placeholder'=>'Enter your Address']);?>
      <?php echo form_error('address',"<div style='color:red'>","</div>");?>
   </div>
   <div class="form-group">
      <?php echo form_input(['name'=>'city','class'=>'form-control','value'=>set_value('city'),'placeholder'=>'Enter City']);?>
      <?php echo form_error('city',"<div style='color:red'>","</div>");?>
   </div>
   <div class="form-group">
      <?php echo form_input(['name'=>'country','class'=>'form-control','value'=>set_value('county'),'placeholder'=>'Enter Country']);?>
      <?php echo form_error('country',"<div style='color:red'>","</div>");?>
   </div>
   <div class="form-group">
      <?php echo form_password(['name'=>'password','class'=>'form-control','value'=>set_value('password'),'placeholder'=>'Password']);?>
      <?php echo form_error('password',"<div style='color:red'>","</div>");?>
   </div>
   <div class="form-group">
      <?php echo form_password(['name'=>'confirmpassword','class'=>'form-control','value'=>set_value('confirmpassword'),'placeholder'=>'Confirm Password']);?>
      <?php echo form_error('confirmpassword',"<div style='color:red'>","</div>");?>
   </div>
   <div class="form-group">
      <?php echo form_submit(['name'=>'insert','value'=>'Submit','class'=>'btn btn-success btn-lg btn-block']);?>
   </div>
   <?php echo form_close();?>
   <div class="text-center">Already have an account? <a href="<?php echo site_url('Signin');?>">Sign in</a></div>
</div>
</div>


<?php require('footer.php'); ?>
