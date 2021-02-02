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

      <form class="form-inline"  action="stock_report_out.php" method="post">
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


                <table id="example1" class="table table-bordered">
                  <thead>
                    <tr class="bg-red">
              <th>Name</th>
              <th>Wastage</th>
            </tr>
                  </thead>
                  <tbody>
                    <?php 
                   $products=$obj->getData('products','1');
          while ($d=$products->fetch(PDO::FETCH_ASSOC)) {
            $sale=$obj->db->query("select sum(quantity) as sales from stock_out where date <='".date('Y-m-d')."' and productid=".$d['id'])->fetch(PDO::FETCH_ASSOC);
             $purchase=$obj->db->query("select sum(quentity) as purchase from stock_in where date <='".date('Y-m-d')."' and productid=".$d['id'])->fetch(PDO::FETCH_ASSOC);
              $waste=$obj->db->query("select sum(quantity) as waste from stock_out where date <='".date('Y-m-d')."' and productid=".$d['id'])->fetch(PDO::FETCH_ASSOC);
              $wast=$obj->db->query("select sum(quantity) as wast from wastage where date ='".date('Y-m-d')."' and productid=".$d['id'])->fetch(PDO::FETCH_ASSOC);
                      ?> 
                    <tr>
  <td> <a href="wastage_report.php?id=<?php echo $d['id']?>"><?php echo $d['name']?></a> </td>
 
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

