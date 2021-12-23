<?php
	session_start();
	if (isset($_SESSION["login"]) == FALSE) {
		$_SESSION["login"] = 0;
		
	}
?>
<html>
	<head>
		<meta charset="utf-8">
		<title>My Class</title>
	</head>
	<body>
		<?php
			if ($_SESSION["login"] == 1) {
				echo "<a href=\"update_profile_form.php\">Cập nhật thông tin cá nhân</a> | <a href=\"logout.php\">Thoát</a>";
				echo "<br>" . $_SESSION["login"] . "<br>";
			} else {
				echo "<a href=\"login.html\">Đăng nhập</a> | <a href=\"signup.html\">Đăng ký</a>";
			}
			echo "<br>";
			// Tạo kết nối với cơ sở dữ liệu
			$conn = new mysqli("localhost", "root", "", "myclass");
			// Lấy mật khẩu của username từ cơ sở dữ liệu
			$sql = "SELECT UserID, Username, Birthday FROM Users";
			$result = $conn -> query($sql);
			if ($result->num_rows > 0) {
				echo "<table>";
				echo "<tr>";
				echo "<td><b>UserID</b></td>";
				echo "<td><b>Username</b></td>";
				echo "<td><b>Birthday</b></td>";
				echo "<tr>";
				// xuất dữ liệu của từng hàng
				while($row = $result->fetch_assoc()) {
					echo "<tr>";
					echo "<td>" . $row["UserID"]. "</td><td>" . $row["Username"] . "</td><td>" . $row["Birthday"] . "</td>";
					echo "</tr>";
				}
				echo "</table>";
			}
		?>
	</body>
</html>