<?php
include('../class/Controller.php');
$obj=new Controller();
$obj->delete_stock_out($_GET['id']);
?>