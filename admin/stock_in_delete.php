<?php
include('../class/Controller.php');
$obj=new Controller();
$obj->delete_stock_in($_GET['id']);
?>