<?php require('header.php'); ?>
<div class="container rounded bg-white mt-5 mb-5">
   <div class="panel panel-default">
      <!--success message -->
      <?php if($this->session->flashdata('success')){?>
      <p style="color:red"><?php  echo $this->session->flashdata('success');?></p>
      <?php } ?>
      <!--error message -->
      <?php if($this->session->flashdata('error')){?>
      <p style="color:red"><?php  echo $this->session->flashdata('error');?></p>
      <?php } ?>
      <div class="row">
         <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
              <img class="rounded-circle mt-5" width="150px" src="<?=ImageExists(base_url()."assets/img/profile_images/".$profiledetails['profile_pic'])?>">
              <span class="font-weight-bold"><?=$profiledetails['FirstName']." ".$profiledetails['LastName'];?></span>
              <span class="text-black-50"><?=$profiledetails['Email'];?></span><span> </span>
            </div>
         </div>
         <div class="col-md-5 border-right">

            <?php echo form_open_multipart('Profile/updateprofile', ['name'=>'userprofile']) ?>
            <div class="p-3 py-5">
               <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4 class="text-right">Profile Settings</h4>
               </div>
               <div class="row mt-2">
                  <div class="col-md-12">
                    <label class="labels">First Name</label>
                     <input type="text" class="form-control" required name="fname" id="fname" value="<?=$profiledetails['FirstName'];?>">
                  </div>
                  <div class="col-md-12">
                    <label class="labels">Last Name</label>
                    <input type="text" class="form-control" required name="lname" id="lname" value="<?=$profiledetails['LastName'];?>" >
                  </div>
                  <div class="col-md-12">
                    <label class="labels">Email ID</label>
                    <input type="text" class="form-control" required name="email" id="email" value="<?=$profiledetails['Email'];?>">
                  </div>
                  <div class="col-md-12">
                    <label class="labels">Mobile No</label>
                    <input type="text" class="form-control" required name="mobile"  value="<?=$profiledetails['mobile'];?>">
                  </div>
                  <div class="col-md-12">
                    <label class="labels">Address</label>
                    <input type="text" class="form-control" required name="address"  value="<?=$profiledetails['address'];?>">
                  </div>
                  <div class="col-md-12">
                    <label class="labels">City</label>
                    <input type="text" class="form-control" required name="city"  value="<?=$profiledetails['city'];?>">
                  </div>
                  <div class="col-md-12">
                    <label class="labels">country</label>
                    <input type="text" class="form-control" required name="country"  value="<?=$profiledetails['country'];?>">
                  </div>
                  <div class="col-md-12">
                    <label class="labels">Profile Pic</label>
                    <input type="hidden"  name="old_pic" value="<?=$profiledetails['profile_pic'];?>">
                    <input type='file' accept="image/png, image/gif, image/jpeg" class="form-control" name='profile_pic' />
                  </div>

               </div>
               <div class="mt-5 text-center">
                  <?php echo form_submit(['name'=>'submit','value'=>'Update','class'=>'btn btn-primary']);?>
               </div>
               <?= form_close(); ?>

            </div>
         </div>
         <div class="col-md-4">
            <div class="p-3 py-5">

               <div class="d-flex justify-content-between align-items-center experience">
                 <span>Change Password</span>
               </div>
               <br>
               <?php echo form_open('Profile/changePassword', ['name'=>'passwordForm']) ?>
               <div class="col-md-12">
                 <label class="labels">Old Password</label>
                 <input type="password" name="oldpass" id="oldpass" class="form-control" placeholder="Old Password" />
                  <?php echo form_error('oldpass', '<div class="error">', '</div>')?>
               </div>
               <div class="col-md-12">
                 <label class="labels">New Password</label>
                 <input type="password" name="newpass" id="newpass" class="form-control" placeholder="New Password" />
                  <?php echo form_error('newpass', '<div class="error">', '</div>')?>
               </div>
               <div class="col-md-12">
                 <label class="labels">Confirm Password</label>
                 <input type="password" name="passconf" id="passconf" class="form-control" placeholder="Confirm Password" />
                  <?php echo form_error('passconf', '<div class="error">', '</div>')?>
               </div>
               <div class="mt-5 text-center">
                 <?php echo form_submit(['name'=>'submit','value'=>'Change Password','class'=>'btn btn-success']);?>
               </div>
               <?= form_close(); ?>

            </div>
         </div>
      </div>
   </div>
</div>
</div>
<?php require('footer.php'); ?>
