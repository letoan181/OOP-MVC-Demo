<?php
include_once('model/model.php');
session_start();
class controller{
	public $model;
	public function __construct(){
		$this->model= new model;
	}
	public function login(){
//		$admin= $this->model->getAdmin();
		$username=$_POST['username'];
		$password=$_POST['password'];
		$result= mysql_query("select * from admin where username='$username' and password='$password'");
		
		if(mysql_num_rows($result)==1){
			$_SERVER['username']=$username;
			header('Location:NhanvienInfo.php');
		}else{
			require_once('view/login.html');
		}
		
}
	public function deleteNhanvien(){
		$_POST['ten']=$nhanvien;
		$this->model->xoaNhanvien($nhanvien);
		header("location:NhanvienInfo.php");
	}
	public function addNhanvien(){
		$nhanvien= new model($_POST['ten'],$_POST['tuoi'],$_POST['diachi'],$_POST['mucluong']);
		$this->model->addNhanvien($nhanvien);
		header('location:NhanvienInfo.php');
	}
	public function update(){
		$nhanvien= new model($_POST['ten'],$_POST['tuoi'],$_POST['diachi'],$_POST['mucluong']);
		$this->model->update($nhanvien);
		header('location:NhanvienInfo.php');
	}
}