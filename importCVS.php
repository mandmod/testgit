<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<META HTTP-EQUIV='Refresh' CONTENT='30; URL=importCVS.php'> 

<title>Untitled Document</title>
</head>

<body>
<?php
//http://www.firedub.com/php-%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B9%80%E0%B8%82%E0%B8%B5%E0%B8%A2%E0%B8%99%E0%B9%82%E0%B8%9B%E0%B8%A3%E0%B9%81%E0%B8%81%E0%B8%A3%E0%B8%A1-csv-to-mysql
	//$objScan = scandir("D:\ProductionCNT\Production_CNT.csv");
	//$file = fopen("C:\ProductionCNT\ProductionCNT.csv", "r"); //ชื่อไฟล์ และ โหมด r เพื่ออ่านข้อมูลจากไฟล์อย่างเดียว
$file = fopen("./csv/ProductionCNT.csv", "r"); //ชื่อไฟล์ และ โหมด r เพื่ออ่านข้อมูลจากไฟล์อย่างเดียว
	//$data = fgetcsv($file, 1024); //จะเก็บข้อความไว้ใน Array data แบ่งตามคอลัมน์
?>
<center>
<table width="300" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <th width="25%"> <div align="center">ID_Machine</div></th>
    <th width="50%"> <div align="center">Machine_Name </div></th>
    <th width="30%"> <div align="center">Pcs.</div></th>
  </tr>
<?php 
while (($objArr = fgetcsv($file, 1000, ",")) !== FALSE) {
$pcs=hexdec($objArr[2])

?>
    <tr>
    <td><div align="center"><?= $objArr[0]; ?></div></td>
    <td><?= $objArr[1]; ?></td>
    <td><?= $pcs; ?></td>
  </tr>



<?php
	}

?>
</table>
</center>
</body>
</html>