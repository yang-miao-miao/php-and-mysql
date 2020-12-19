<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php 
$fp=fopen("count.txt","r");
$num=fgets($fp,12);
if($num==""){
	$num=0;}
$num++;
fclose($fp);
$fp=fopen("count.txt","w");
fwrite($fp,$num);
fclose($fp);
echo "您是第".$num."位光临的客人"."<br>";
$DOCUMENT_ROOT=$_SERVER['DOCUMENT_ROOT'];
$date=date("H:i:s Y:m:d");
echo $date."<br>";
$name=$_POST['name'];
$gender=$_POST['gender'];
$age=$_POST['age'];
$hobby=$_POST['hobby'];
$elsehobby=$_POST['elsehobby'];
$phonenumber=$_POST['phonenumber'];
$address=$_POST['address'];
if($gender=='man'){
	$custom="先生";
}else{
	$custom="女士";
}
$string_to_be_added=$date."\t".$name."\t".$custom."\t".$age."岁"."\t"."兴趣为".$hobby."\t"."其他兴趣为:".$elsehobby.",联系电话:".$phonenumber."\n";
$fp=fopen("$DOCUMENT_ROOT/booked.txt","ab");
fwrite($fp,$string_to_be_added);
fclose($fp);
echo $name.$custom."，您的信息已提交"."<br>";
echo "您的年龄为".$age."<br>";
echo "您的兴趣爱好为".$hobby."<br>";
echo "您的其他兴趣为".$elsehobby."<br>";
echo "您的联系电话为".$phonenumber."<br>";
echo "您的地址为".$address."<br>";
$db=mysqli_connect("localhost","root","","1");
$q="insert into database0(name,gender,age,hobby,elsehobby,phonenumber,address) values('$name','$gender','$age','$hobby','$elsehobby',$phonenumber,'$address')";#不支持中文，所以参数不要带汉字
mysqli_query($db,"set names 'utf8'");#这个时候才可以用汉字
if(!mysqli_query($db,$q)){
	echo "no new database";
}else{
	echo "new data has been submitted";
}
mysqli_close($db);
?>
</body>
</html>
