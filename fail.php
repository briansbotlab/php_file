<!DOCTYPE html>

<html>

	<head>
		<meta charset = 'utf-8'>
		
		<title>
			學生成績查詢系統
		</title>
	</head>
	
	<body>
	
		<?php
			session_start();   // 啟用交談期
			
			if (!isset($_SESSION["fail"]))
                header("Location: login.php");
            elseif ($_SESSION["fail"] == "no")
                header("Location: login.php");
		?>
	
		學生成績查詢系統<p>
		<p/>
		學號:<input type = 'text' name = 'student_id' value="<?php echo $_SESSION['student_id']?>"/><p>
		<?php

			print '!登入失敗!' . "<p>";
			
			
		?>
        
		<form name="login" method="post" action="controller.php">
		<input type = 'submit' name="go" value = '回登入畫面'/>
		</form>
	</body>
	
</html>