<?php

 require('head_c.php');
  $_SESSION['menu']='admin';
 if(isset($_POST['name'])){
$obj->new_admin($_POST);

}
  ?>
<div class="wrapper">
  <?php
  require('leftMenu.php');
  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add new Admin
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="new_admin.php">Add new Admin </a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="box">
          <div class="box-body">
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" >
              <div class="col-xs-12 col-md-12">
                <div class="col-md-6">
                  
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" autocomplete="off" name="name" class="form-control" value="" required>
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" autocomplete="off" name="email" class="form-control" value="">
                  </div>
                  
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" autocomplete="off" name="password" class="form-control" value="" required>
                  </div>
                  <div class="form-group">
                    <label>Status</label> <br>
                    Active <input type="radio" name="status" class="form-control" value="active" required>
                    Inactive <input type="radio" name="status" class="form-control" value="inactive" required>
                  </div>
                  <div class="form-group">
                <label></label>
                <input type="submit" class="btn btn-primary btn-block" value="Submit">
              </div>
              </div>
              
              
            </div>
          </form>
        </div>
        </div>
        </div>
        
        </section>
        <!-- /.content -->
      </div>
    </div>
    <!-- ./wrapper -->
    <?php require('footer_c.php');?>
