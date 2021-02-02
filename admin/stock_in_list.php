<?php
 require('head_c.php');
  $_SESSION['menu']='product';
$data=$obj->get_product_stock_in();
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
        Stock In List
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
                    <tr>
                      <th>invoice_no</th>
                      <th>adminid</th>
                      <th>productid</th>
                      <th>quentity</th>
                      <th>sub_total</th>
                      <th>discount</th>
                      <th>total</th>
                      <th>date</th>
                      <th>action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php while ($d=$data->fetch(PDO::FETCH_ASSOC)) {
                        // echo("<pre>");
                        // var_dump($d);
                        // exit();

                      ?>
                    <tr>
                      <td><?php echo $d['invoice_no'] ?></td>
                      <td><?php echo $d['adminid'] ?></td>
                      <td><?php echo $d['productid'] ?></td>
                      <td><?php echo $d['quentity'] ?></td>
                      <td><?php echo $d['sub_total'] ?></td>
                      <td><?php echo $d['discount'] ?></td>
                      <td><?php echo $d['total'] ?></td>
                      <td><?php echo $d['date'] ?></td>
                      
                      <td>
                        <a href="stock_in_edit.php?id=<?php echo $d['id']?>" class="btn btn-primary">Edit</a>
                        <a href="stock_in_delete.php?id=<?php echo $d['id']?>" class="btn btn-danger">Delete</a>
                      </td>
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
