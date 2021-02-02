<?php

 require('head_c.php');
 $_SESSION['menu']='product';
 if(isset($_POST['invoice_no'])){
$obj->edit_product_stock_out($_POST);

}
$data=$obj->get_for_update_stock_out($_GET['id']);
$p=$obj->getData('products','id='.$data['productid'])->fetch(PDO::FETCH_ASSOC);
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
        Stock Out Product Update
      </h1>
      <ol class="breadcrumb">

        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="new_product.php">New product </a></li>
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
                    <input type="text" name="id" value="<?php echo $data['id']?>">
                    <label>Name</label>
                    <input type="text" readonly="" name="invoice_no" class="form-control" value="<?php echo $data['invoice_no']?>" required>
                  </div>
                  <div class="form-group">
                    <label>Admin Id</label>
                    <input type="text" readonly="" name="adminid" class="form-control" value="<?php echo $data['adminid']?>">
                  </div>

                  <div class="form-group">
                    <label>Product Id</label>
                    <input type="text" readonly="" name="productid" class="form-control" value="<?php echo $data['productid']?>">
                  </div>
                    <div class="form-group">
                    <label>Quantity</label>
                    <input type="text" autocomplete="off" id="qyt" onkeyup="calculate()" name="quantity" class="form-control" value="<?php echo $data['quantity']?>">
                  </div>
                  <input type="hidden" id="price" onkeyup="calculate()" value="<?php echo $p['price']?>">
                    <div class="form-group">
                    <label>Sub Total</label>
                    <input type="text" readonly="" id="st" name="sub_total" class="form-control" value="<?php echo $data['sub_total']?>">
                  </div>
                    <div class="form-group">
                    <label>Discount</label>
                    <input type="text" autocomplete="off" required="" id="d" onkeyup="calculate()" name="discount" class="form-control" value="<?php echo $data['discount']?>">
                  </div>
                   <div class="form-group">
                    <label>Total</label>
                    <input type="text" readonly="" id="t" name="total" class="form-control" value="<?php echo $data['total']?>">
                  </div>

                  <div class="form-group">
                    <label>Customer Info</label>
                    <input type="text" autocomplete="off" required="" name="customer_info" class="form-control" value="<?php echo $data['customer_info']?>">
                  </div>

                  <div class="form-group">
                    <label>Date</label>
                    <input type="date" required="" name="date" class="form-control" value="<?php echo $data['date']?>">
                  </div>
                  
                </div>
                
                  <div class="form-group">
                <label></label>
                <input type="submit" class="btn btn-primary btn-block" value="Submit">
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
  function calculate(id){
var price=parseFloat($('#price').val())
var qyt=parseFloat($('#qyt').val())
sub_total=price*qyt
$('#st').val(sub_total)
var d=parseFloat($('#d').val())
var dis=sub_total-(sub_total*d)/100
$('#t').val(dis)
  }
</script>