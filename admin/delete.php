<?php
include('../class/Controller.php');
$obj=new Controller();
$obj->delete_product($_GET['id']);
?>