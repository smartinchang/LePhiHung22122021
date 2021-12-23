<?php
	session_start();
	// Đọc dữ liệu từ biểu mẫu
	$firstname = $_POST["firstname"];
	$lastname = $_POST["lastname"];
	$birthday = $_POST["birthday"];
	$gender = $_POST["gender"];
	$address = $_POST["address"];
	$nationality = $_POST["nationality"];
	// Tạo kết nối với cơ sở dữ liệu
	$conn = new mysqli("localhost", "root", "", "myclass");
	$sql = "UPDATE users SET Lastname=\"".$lastname."\",Firstname=\"".$firstname."\",Birthday=\"".$birthday."\",Gender=\"".$gender."\",Address=\"".$address."\",Nationality=\"".$nationality."\" WHERE UserID=".$_SESSION["login"];
	$result = $conn -> query($sql);
	header("location: index.php");
?>