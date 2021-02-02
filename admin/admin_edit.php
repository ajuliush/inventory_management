<?php
 require('head_c.php');
 $_SESSION['menu']='product';
 if(isset($_POST['name'])){
$obj->edit_admin($_POST);
}
$data=$obj->get_for_update_admin($_GET['id']);
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
        Update Admin
      </h1>
      <ol class="breadcrumb">

        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="new_admin.php">New Admin </a></li>
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
                  <input type="text" name="id" value=" <?php echo $data['id']?>">
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" autocomplete="off" value="<?php echo $data['name']?>" required>
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" autocomplete="off"  value="<?php echo $data['email']?>">
                  </div>

                  <div class="form-group">
                    <label>Password</label>
                    <input type="text" name="password" class="form-control" autocomplete="off"  value="<?php echo $data['password']?>">
                  </div>
                  <div class="form-group"> 
                    <label>Status</label><br>
                    Active <input type="radio" name="status" class="form-control" value="active" required>
                    Inactive <input type="radio" name="status" class="form-control" value="inactive" required>
                  </div>
                  
                </div>
                <div class="col-md-6">
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
