<?php
include('../class/Controller.php');
$obj=new Controller();
$obj->delete_wastage($_GET['id']);
?>