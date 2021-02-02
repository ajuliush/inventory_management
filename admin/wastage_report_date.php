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
        <?php 
      $j=$obj->getData('products','id='.$_POST['id'])->fetch(PDO::FETCH_ASSOC);
       ?>
      <h1 class="text-center">
        Product Report <?php echo $j['name']?>
      </h1>
    
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="new_product.php">Product Report  </a></li>
      </ol>
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
              
              <th>Wastage</th>
              
            </tr>
                  </thead>
                  <tbody>
            <?php 
$period=new DatePeriod(
              new DateTime($_POST['d1']),
              new DateInterval('P1D'),
              new DateTime($_POST['d2']));
            foreach ($period as $key => $value) {
  $d= $value->format('y-m-d');
            $sale=$obj->db->query("select sum(quantity) as sales from stock_out where date <'".$d."' and productid=".$_POST['id'])->fetch(PDO::FETCH_ASSOC);
             $purchase=$obj->db->query("select sum(quentity) as purchase from stock_in where date <'".$d."' and productid=".$_POST['id'])->fetch(PDO::FETCH_ASSOC);
              $waste=$obj->db->query("select sum(quantity) as waste from wastage where date <'".$d."' and productid=".$_POST['id'])->fetch(PDO::FETCH_ASSOC);
              $returns=$obj->db->query("select sum(quantity) as returns from return_table where date <'".$d."' and productid=".$_POST['id'])->fetch(PDO::FETCH_ASSOC);
              $sal=$obj->db->query("select sum(quantity) as sal from stock_out where date ='".$d."' and productid=".$_POST['id'])->fetch(PDO::FETCH_ASSOC);
              $purcha=$obj->db->query("select sum(quentity) as purcha from stock_in where date ='".$d."' and productid=".$_POST['id'])->fetch(PDO::FETCH_ASSOC);
              $wast=$obj->db->query("select sum(quantity) as wast from wastage where date ='".$d."' and productid=".$_POST['id'])->fetch(PDO::FETCH_ASSOC);
              $retur=$obj->db->query("select sum(quantity) as retur from return_table where date ='".$d."' and productid=".$_POST['id'])->fetch(PDO::FETCH_ASSOC);

                    ?>
                    <tr>
  <td> <?php echo $d; ?></td>
 
  <td> <?php echo number_format($wast['wast'],2);  ?></td>


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
     <!-- <script>
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
  </script> -->