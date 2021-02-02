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
        Sales Report
      </h1>
      <?php 
      
       ?>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="sales_report.php">Sales Report  </a></li>
      </ol>
      <form class="form-inline"  action="" method="post">
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
             <caption class="text-center text-info text-uppercase">Product Report  </caption>
                <table id="example1" class="table table-bordered">
                  <thead>
                    <tr class="bg-red">
              <th>Date</th>
              <th>Sales</th>
            </tr>
                  </thead>
                  <tbody>
            <?php 
            if(isset($_POST['d1'])){
              $period=new DatePeriod(
                new DateTime($_POST['d1']),
                new DateInterval('P1D'),
                new DateTime($_POST['d2'])

              );
            foreach ($period as $key => $value) {
              $d=$value->format('Y-m-d');

              $sale=$obj->db->query("select sum(total) as s from stock_out where date='".$d."'")->fetch(PDO::FETCH_ASSOC);
             ?>
                    <tr>
  <td><?php echo $d ?> </td>
  <td><?php echo $sale['s']?> </td>
  
            </tr>
                    <?php } }?>
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


  