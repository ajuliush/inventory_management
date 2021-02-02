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
        Product Report
      </h1>
      <?php 
      $j=$obj->getData('products','id='.$_GET['id'])->fetch(PDO::FETCH_ASSOC);
       ?>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="new_product.php">Product Report <?php echo $j['name']?> </a></li>
      </ol>
      <form class="form-inline"  action="stock_product_out.php" method="post">
        <input type="hidden" name="id" value="<?php echo $_GET['id']?>">
        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
  <div class="form-group">
    <label for="email">Start Date:</label>
    <input type="text" class="form-control" autocomplete="off" id="datepicker" name="d1" size="50">
  </div>
  <div class="form-group">
    <label for="pwd">End Date:</label>
    <input type="text" class="form-control" autocomplete="off" id="datepicker1" name="d2"size="50" >

  </div> 
  
  <br>
  <button type="submit" class="btn btn-block btn-primary">Submit</button>
</form>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="box">
          <div class="box-body">
              <div class="col-xs-12 col-md-12">

             <caption class="text-center text-info text-uppercase">Product Report <?php echo $j['name']?> </caption>
                <table id="example1" class="table table-bordered">
                  <thead>
                    <tr class="bg-red">
              <th>Date</th>
              <th>Opening Stock</th>
              <th>Stock In</th>
              <th>Stock Out</th>
              <th>Wastage</th>
              <th>Return</th>
              <th>Closing Stock</th>
            </tr>
                  </thead>
                  <tbody>
            <?php 
for ($i=17; $i<=date('d');$i++) {
  $d=date('Y-m').'-'.$i;
            $sale=$obj->db->query("select sum(quantity) as sales from stock_out where date <'".$d."' and productid=".$_GET['id'])->fetch(PDO::FETCH_ASSOC);
             $purchase=$obj->db->query("select sum(quentity) as purchase from stock_in where date <'".$d."' and productid=".$_GET['id'])->fetch(PDO::FETCH_ASSOC);
              $waste=$obj->db->query("select sum(quantity) as waste from wastage where date <'".$d."' and productid=".$_GET['id'])->fetch(PDO::FETCH_ASSOC);
              $returns=$obj->db->query("select sum(quantity) as returns from return_table where date <'".$d."' and productid=".$_GET['id'])->fetch(PDO::FETCH_ASSOC);
              $sal=$obj->db->query("select sum(quantity) as sal from stock_out where date ='".$d."' and productid=".$_GET['id'])->fetch(PDO::FETCH_ASSOC);
              $purcha=$obj->db->query("select sum(quentity) as purcha from stock_in where date ='".$d."' and productid=".$_GET['id'])->fetch(PDO::FETCH_ASSOC);
              $wast=$obj->db->query("select sum(quantity) as wast from wastage where date ='".$d."' and productid=".$_GET['id'])->fetch(PDO::FETCH_ASSOC);
              $retur=$obj->db->query("select sum(quantity) as retur from return_table where date ='".$d."' and productid=".$_GET['id'])->fetch(PDO::FETCH_ASSOC);

                    ?>
                    <tr>
  <td> <?php echo date('Y-m').'-'. $i ?></td>
  <td> <?php echo number_format($stk=$purchase['purchase']-($sale['sales']+ $waste['waste'])+$returns['returns'],2);?></td>
  <td> <?php echo number_format($purcha['purcha'],2);  ?></td>
  <td> <?php echo number_format($sal['sal'],2);  ?></td>
  <td> <?php echo number_format($wast['wast'],2);  ?></td>
  <td> <?php echo number_format($retur['retur'],2);   ?></td>
  <td> <?php echo number_format($stk+$purcha['purcha']-($sal['sal']+$retur['retur'])+$retur['retur'],2);  ?></td>

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
  });
  </script>


  