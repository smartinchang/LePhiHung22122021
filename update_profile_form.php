<?php
	session_start();
	// Tạo kết nối với cơ sở dữ liệu
	$conn = new mysqli("localhost", "root", "", "myclass");
	// Lấy mật khẩu của username từ cơ sở dữ liệu
	$sql = "SELECT * FROM Users WHERE UserID = \"" . $_SESSION["login"] . "\"";
	$result = $conn -> query($sql);
	$row = $result->fetch_assoc();
?>
<html>
	<head>
		<meta charset="utf-8">
		<title>Cập nhật thông tin thành viên</title>
	</head>
	<body>
		<form name="update_form" action="update_profile.php" method="POST">
			<table>
				<tr><td>Họ</td><td><input type="text" name="lastname" value="<?php echo $row["Lastname"]; ?>"></td></tr>
				<tr><td>Tên</td><td><input type="text" name ="firstname" value="<?php echo $row["Firstname"]; ?>"></td></tr>
				<tr><td>Ngày sinh</td><td><input type="date" name ="birthday" value="<?php echo substr($row["Birthday"], 0, 10); ?>"></td></td></tr>
				<tr>
					<td>Giới tính</td>
					<td>
						<select name="gender">
							<option value="0" <?php if ($row["Gender"] == 0) echo "selected"; ?>>Nam</option>
							<option value="1" <?php if ($row["Gender"] == 1) echo "selected"; ?>>Nữ</option>
						</select>
					</td>
				</tr>
				<tr><td>Địa chỉ</td><td><input type="text" name ="address" value="<?php echo $row["Address"]; ?>"></td></tr>
				<tr><td>Quốc tịch</td><td><input type="text" name ="nationality" value="<?php echo $row["Nationality"]; ?>"></td></tr>
				<tr><td colspan="2" align="center"><button type="submit" value="Submit">Cập nhật</button></td></tr>
			</table>
		</form>
	</body>
</html>