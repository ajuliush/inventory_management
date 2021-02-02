<?php

 require('head_c.php');
 $_SESSION['menu']='product';
 if(isset($_POST['name'])){
$obj->edit_product($_POST);

}
$data=$obj->get_for_update($_GET['id']);

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
        Update product
      </h1>
      <ol class="breadcrumb">

        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="new_product.php">Edit product </a></li>
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
                  <input type="hidden" name="id" value=" <?php echo $data['id']?>">
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text"  name="name" class="form-control" value="<?php echo $data['name']?>" required>
                  </div>
                  <div class="form-group">
                    <label>Price</label>
                    <input type="text"autocomplete="off"  name="price" class="form-control" value="<?php echo $data['price']?>">
                  </div>

                  <div class="form-group">
                    <label>Unit</label>
                    <input type="text" autocomplete="off"  name="unit" class="form-control" value="<?php echo $data['unit']?>">
                  </div>
                  
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Photo</label>
                    <input type="file" name="photo" class="form-control" value="<?php echo $data['photo']?>" required>
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
