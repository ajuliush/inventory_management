<?php

 require('head_c.php');
 $_SESSION['menu']='product';
 if(isset($_POST['productid'])){
$obj->edit_retrun($_POST);

}
$data=$obj->data_retrun ($_GET['id']);
$p=$obj->getdata('products','id='.$data['productid'])->fetch(PDO::FETCH_ASSOC);
// echo("<pre>");
// var_dump($p);
// exit();
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
        Update Return
      </h1>
      <ol class="breadcrumb">

        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="return.php">New Return
 </a></li>
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
                    <label>Productid</label>
                    <input type="text" name="productid" readonly="" class="form-control" value="<?php echo $data['productid']?>" required>
                  </div>
                  <div class="form-group">
                    <label>Quantity</label>
                    <input type="text" id="qyt" autocomplete="off" onkeyup="calculate()" name="quantity" class="form-control" value="<?php echo $data['quantity']?>">
                  </div>
                  
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Total</label>
                    <input type="text" id="t" onkeyup="calculate()" readonly="" name="total" class="form-control"  value="<?php echo $data['total']?>" required>
                  </div>
                  <input type="hidden" id="price" onkeyup="calculate()" readonly="" value="<?php echo $p['price']?>">
                  <div class="col-md-6">
                  <div class="form-group">
                    <label>Date</label>
                    <input type="date" name="date" required="" class="form-control" value="<?php echo $data['date']?>" required>
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
    <script>
      function calculate(){
      var price=$('#price').val()
      var qyt=$('#qyt').val()
      var total=price*qyt
       $('#t').val(total) 
       }
        </script>
