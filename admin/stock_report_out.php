<?php
 require('head_c.php');
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
        Product List
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="new_product.php">Product List </a></li>
      </ol>

    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="box">
          <div class="box-body">
              <div class="col-xs-12 col-md-12">


                <table id="example1" class="table table-bordered">
                  <thead>
                    <tr class="bg-red">
              <th>Name</th>
              <th>Stock</th>
              <th>Price</th>
              <th>Stock Value</th>
            </tr>
                  </thead>
                  <tbody>
                    <?php 
                   $products=$obj->getData('products','1');
          while ($d=$products->fetch(PDO::FETCH_ASSOC)) {
            $sale=$obj->db->query("select sum(quantity) as sales from stock_out where date between '".$_POST['d1']."' and 
              '".$_POST['d2']."' and productid=".$d['id'])->fetch(PDO::FETCH_ASSOC);
             $purchase=$obj->db->query("select sum(quentity) as purchase from stock_in where date between '".$_POST['d1']."' and 
              '".$_POST['d2']."' and productid=".$d['id'])->fetch(PDO::FETCH_ASSOC);
              $waste=$obj->db->query("select sum(quantity) as waste from stock_out where date between '".$_POST['d1']."' and 
                '".$_POST['d2']."' and productid=".$d['id'])->fetch(PDO::FETCH_ASSOC);

                      ?>
                    <tr>
  <td><?php echo $d['name']  ?></td>
  <td><?php echo $stk=$purchase['purchase']-($sale['sales']+$waste['waste'])  ?></td>
  <td><?php echo number_format($d['price'],2)   ?></td>
  <td><?php echo number_format($stk*$d['price'],2)   ?></td>

            </tr>
                    <?php } ?>
                  </tbody>
                </table>
              
              
            </div>
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
  $( function() {
    $( "#datepicker" ).datepicker({
      dateFormate:'yy-mm-dd',
      changeMonth:true,
      changeYear:true

    });
  } );
   $( function() {
    $( "#datepicker1" ).datepicker({
      dateFormate:'yy-mm-dd',
      changeMonth:true,
      changeYear:true

    });
  } );
  </script>

