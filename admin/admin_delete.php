<?php
include('../class/Controller.php');
$obj=new Controller();
$obj->delete_admin($_GET['id']);
?>