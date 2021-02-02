<?php
session_start();
require('Database.php');
class Controller extends Database
{
	public function login($data)
	{
		$result=$this->db->query('select * from admin where email="'.$data['email'].'" and password="'.$data['password'].'"');
		$d= $result->fetch(PDO::FETCH_ASSOC);
		if($d){
			$_SESSION['adminID']=$d['id'];
			$_SESSION['name']=$d['name'];
			header('Location: dashboard.php');
		}else{
			$_SESSION['msg']='Wrong email or password';
			header('Location: index.php');
		}
	}
	public function logout()
	{
		session_destroy();
		header('Location: index.php');
	}
	public function is_logged_in()
	{
		if(!isset($_SESSION['adminID'])){
			header('Location: index.php');
		}
	}
	public function new_product($data)
	{
		$target_dir = "../upload/";
		$target_file = $target_dir . basename($_FILES["photo"]["name"]);
		move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);
		$data['photo']=$_FILES["photo"]["name"];
		$this->insert('products',$data);
		header('Location: product_list.php');
	}
	
public function get_product()
{
	
	$result=$this->getData('products','1 order by id desc');
	return $result;
}	
public function get_for_update($id)
{
	$d=$this->getData('products','id='.$id);
	return $d->fetch(PDO::FETCH_ASSOC);	
}
public function edit_product($data){
	$target_dir = "../upload/";
		$target_file = $target_dir . basename($_FILES["photo"]["name"]);
		move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);
		$data['photo']=$_FILES["photo"]["name"];
	 $this->update('products',$data,'id='.$data['id']);
	header('Location:product_list.php');
}
 public function delete_product($id){
 	$this->delete('products', 'id='.$id);
 	header('Location:product_list.php');
 }
 //stock_in(start)//

	public function get_product_stock_in()
{
	
	$result=$this->getData('stock_in','1 order by id desc');
	return $result;
}
public function get_for_update_stock_in($id)
{
	$d=$this->getData('stock_in','id='.$id);
	return $d->fetch(PDO::FETCH_ASSOC);	
}
public function edit_product_stock_in($data){
	
	 $this->update('stock_in',$data,'id='.$data['id']);
	header('Location:stock_in_list.php');
}
 public function delete_stock_in($id){
 	$this->delete('stock_in', 'id='.$id);
 	header('Location:stock_in_list.php');
 }
 //stock_in(end)//

  //stock_out(start)//

	public function get_product_stock_out()
{
	$result=$this->getData('stock_out','1 order by id desc');
	return $result;
}
public function get_for_update_stock_out($id)
{
	$d=$this->getData('stock_out','id='.$id);
	return $d->fetch(PDO::FETCH_ASSOC);	
}
public function edit_product_stock_out($data){
	
	 $this->update('stock_out',$data,'id='.$data['id']);
	header('Location:stock_out_list.php');
}

public function delete_stock_out($id){
 	$this->delete('stock_out', 'id='.$id);
 	header('Location:stock_out_list.php');
 }
 //stock_out(end)//
 //admin(start)//
public function new_admin($data)
	{
		$this->insert('admin',$data);
		header('Location: admin_list.php');
	}

 public function admin()
{
	$result=$this->getData('admin','1 order by id desc');
	return $result;
}
public function get_for_update_admin($id)
{
	$d=$this->getData('admin','id='.$id);
	return $d->fetch(PDO::FETCH_ASSOC);	
}
public function edit_admin($data){
	 $this->update('admin',$data,'id='.$data['id']);
	header('Location:admin_list.php');
}
 public function delete_admin($id){
 	$this->delete('admin', 'id='.$id);
 	header('Location:admin_list.php');
 }
 //admin(end)//

 //wastage(start)//
 	public function get_wastage()
{
	$result=$this->getData('wastage','1 order by id desc');
	return $result;
}
public function data_wastage($id)
{
	$d=$this->getData('wastage','id='.$id);
	return $d->fetch(PDO::FETCH_ASSOC);	
}
public function edit_wastage($data){
	 $this->update('wastage',$data,'id='.$data['id']);
	header('Location:wastage_list.php');
}
 public function delete_wastage($id){
 	$this->delete('wastage', 'id='.$id);
 	header('Location:wastage_list.php');
 }
 //wastage(end)//

 //retrun(start)//
 	public function get_retrun()
{
	$result=$this->getData('return_table','1 order by id desc');
	return $result;
}
public function data_retrun($id)
{
	$d=$this->getData('return_table','id='.$id);
	return $d->fetch(PDO::FETCH_ASSOC);	
}
public function edit_retrun($data){
	 $this->update('return_table',$data,'id='.$data['id']);
	header('Location:return_list.php');
}
 public function delete_retrun($id){
 	$this->delete('return_table', 'id='.$id);
 	header('Location:return_list.php');
 }

  //retrun(end)//

}