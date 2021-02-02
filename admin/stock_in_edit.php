<?php
 require('head_c.php');
 $_SESSION['menu']='product';
 if(isset($_POST['invoice_no'])){
$obj->edit_product_stock_in($_POST);
}
$data=$obj->get_for_update_stock_in($_GET['id']); 
//  echo("<pre>");
// var_dump($data);
// exit();
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
        Update Stock In Product
      </h1>
      <ol class="breadcrumb">

        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="new_product.php">New Product </a></li>
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
                    <label>Invoice No</label>
                    <input type="text" name="invoice_no" class="form-control" value="<?php echo $data['invoice_no']?>" required>
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
                    <label>Quentity</label>
                    <input type="text" name="quentity" autocomplete="off" id="qty" onkeyup="calculate()" class="form-control" value="<?php echo $data['quentity']?>">
                  </div>
                  <input type="hidden" id="price" onkeyup="calculate()" class="form-control" value="<?php echo $p['price']?>">
                    <div class="form-group">
                    <label>Sub Total</label>
                    <input type="text" id="st" name="sub_total" class="form-control" readonly="" value="<?php echo $data['sub_total']?>">
                  </div>
                    <div class="form-group">
                    <label>Discount</label>
                    <input type="text" id="d" autocomplete="off" onkeyup="calculate()" name="discount" class="form-control" value="<?php echo $data['discount']?>">
                  </div>

                   <div class="form-group">
                    <label>Total</label>
                    <input type="text" readonly="" id="t" name="total" class="form-control" value="<?php echo $data['total']?>">
                  </div>

                  <div class="form-group">
                    <label>Date</label>
                    <input type="date" name="date" class="form-control" value="<?php echo $data['date']?>">
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
<script >
    function calculate(id) {
  var price=parseFloat($('#price').val())
  var qty=parseFloat($('#qty').val())
  var sub_total=price*qty
  $('#st').val(sub_total)
  var d=parseFloat($('#d').val())
  var discount=sub_total-(sub_total*d)/100
  $('#t').val(discount)
}

</script>
