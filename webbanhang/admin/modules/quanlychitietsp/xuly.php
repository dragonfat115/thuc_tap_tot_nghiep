<?php
	include('../connect.php');
	$id=$_GET['id'];
	$tensp=$_POST['tensp'];
	$mota=$_POST['motasp'];
	$gia=$_POST['gia'];
	$loaisp=$_POST['loaisp'];
	$thutu=$_POST['thutusp'];
	$hinhanh=$_FILES['hinhanh']['name'];
	$hinhanh_tmp=$_FILES['hinhanh']['tmp_name'];
	move_uploaded_file ($hinhanh_tmp,'uploads/'.$hinhanh);
	if(isset($_POST['them'])){
		$sql="insert into chitietsp (tensp,thutusp,mota,gia,id_loaisp,hinhanh) value('$tensp','$thutu','$mota','$gia','$loaisp','$hinhanh')";
		$thucthi=mysqli_query($conn,$sql);
		header('location:../../index.php?quanly=quanlychitietsp&ac=them');
		}
		elseif(isset($_POST['sua'])){
			if($hinhanh!=''){
			$sql="update chitietsp set tensp='$tensp',thutusp='$thutu',mota='$mota',gia='$gia',id_loaisp='$loaisp',hinhanh='$hinhanh' where id_sp='$id'";
			}else{$sql="update chitietsp set tensp='$tensp',thutusp='$thutu',mota='$mota',gia='$gia',id_loaisp='$loaisp' where id_sp='$id'";
				}
			$thucthi2=mysqli_query($conn,$sql);
			header('location:../../index.php?quanly=quanlychitietsp&ac=sua&id='.$id);
			}else{
				$sql="delete from chitietsp where id_sp=$id";
				$thucthi3=mysqli_query($conn,$sql);
				header('location:../../index.php?quanly=quanlychitietsp&ac=them');
				}
		
?>