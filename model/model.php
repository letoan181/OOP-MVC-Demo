<?php
require_once('model/config.php');
class model{
	public $ten;
	public $tuoi;
	public $dia_chi;
	public $muc_luong;

	public function __construct($ten,$tuoi,$dia_chi,$muc_luong){
		$this->ten = $ten;
		$this->tuoi = $tuoi;
		$this->diachi = $dia_chi;
		$this->mucluong = $muc_luong;
	}

	

	public function getNhanvien(){
		$nhanvien= array();
		$result=mysql_query("select * from Nhanvien");
		$Stt=0;
		while($row=mysql_fetch_array($result)){
			require_once('NhanvienInfo.php');
		}
	}
	public function xoaNhanvien($ten){
		$nhanvien=array();
		$result=mysql_query("DELETE FROM Nhanvien WHERE ten='$ten'");
		if($result){
			echo "DELETE Suscessful";
		}else{
			header("Location:NhanvienInfo.php");
		}
	}
	
	public function addNhanvien($nhanvien){
		$result = mysql_query("INSERT INTO Nhanvien(ten,tuoi,dia_chi,muc_luong) VALUES ("."'".$nhanvien->ten."','".$nhanvien->tuoi."','".$nhanvien->diachi."','".$nhanvien->mucluong."')");
		if($result){
			echo "Add Suscessful";
		} else{
		   header("location:updateNhanvien.php");
		}
	}

	public function update($nhanvien){
		$result =mysql_query( "UPDATE Nhanvien SET Nhanvien.ten='".$nhanvien->ten."', Nhanvien.tuoi='".$employee->tuoi."' ,Nhanvien.dia_chi='".$nhanvien->diachi."' ,Nhanvien.muc_luong='".$nhanvien->mucluong." where Nhanvien.ten='".$nhanvien->ten."'");
		
		if($result){
			echo "cap nhat thanh cong";
		} else{
			echo "cap nhat khong thanh cong";
		}
	}
}
?>