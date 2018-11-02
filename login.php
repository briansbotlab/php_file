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
			
			if (isset($_SESSION["success"])){
                if ($_SESSION["success"] == "yes")
                   header("Location: success.php");
                elseif ($_SESSION["fail"] == "yes") 
                   header("Location: fail.php");
             }elseif (isset($_SESSION["fail"])){
                if ($_SESSION["fail"] == "yes") 
                   header("Location: fail.php");
             }
            
		?>
	
		學生成績查詢系統<p>

		<form name = 'login' method = 'post' action = 'controller.php'>
			學號: <input type = 'text' name = 'student_id'/> <p>
			
			密碼: <input type = 'password' name = 'password'/> <p>
			
			<input type = 'submit' name="go" value = '登入'/>
			<input type = "reset" value = "清除"/>
		</form>
			
	</body>
	
</html>