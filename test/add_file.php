<?php
$Upload_Dir = "d:"; //กำหนดว่าจะให้ copy ไฟล์ที่มาจากเครื่องผู้ใช้ไปที่ใด ระบุที่นี่ได้ครับ
$Max_File_Size = 100000; //กำหนดขนาดไฟล์ที่ ใหญ่ที่สุดที่อนุญาตให้ upload มาที่ Server มีหน่วยเป็น byte
$File_Type_Allow = array("image/bmp" /* .bmp, .ico*/,
		"image/gif" /* .gif*/,
		"image/pjpeg" /*.jpg, .jpeg*/,
		"image/jpeg" /* .jpg, .jpeg*/); //กำหนดประเภทของไฟล์ว่าไฟล์ประเภทใดบ้างที่อนุญาตให้ upload มาที่ Server

function validate_form($file_input,$file_size,$file_type) { //เป็น function ที่เอาไว้ตรวจสอบว่าไฟล์ที่ผู้ใช้ upload ตรงตามเงื่อนไขหรือเปล่า
	global $Max_File_Size,$File_Type_Allow;
	if ($file_input == "none") {
		$error = "ไม่มี file ให้ Upload";
	} elseif ($file_size > $Max_File_Size) {
		$error = "ขนาดไฟล์ใหญ่กว่า $Max_File_Size ไบต์";
	} elseif (!check_type($file_type,$File_Type_Allow)) {
		$error = "ไฟล์ประเภทนี้ ไม่อนุญาตให้ Upload";
	} else {
		$error = false;
	}

	return $error;
}

function check_type($type_check) { //เป็น ฟังก์ชัน ที่ตรวจสอบว่า ไฟล์ที่ upload อยู่ในประเภทที่อนุญาตหรือเปล่า
	global $File_Type_Allow;
	for ($i=0;$i<count($File_Type_Allow);$i++) {
		if ($File_Type_Allow[$i] == $type_check) {
			return true;
		}
	}
	return false;
}

if($_FILES['userfile']){
	$error_msg = validate_form($_FILES['userfile'],$_FILES['userfile']["size"],$_FILES['userfile']["type"]); // ตรวจดูว่า ไฟล์ที่ upload ตรงตามเงื่อนไขหรือเปล่า
	if ($error_msg) {
		echo $error_msg;
	} else {
		if (copy($_FILES['userfile']['tmp_name'],$Upload_Dir."/".$_FILES['userfile']['name'])) { //ทำการ copy ไฟล์มาที่ Server
			echo "ไฟล์ Upload เรียบร้อย";
		} else {
			echo "ไฟล์ Upload มีปัญหา";
		}
	}
}
?>