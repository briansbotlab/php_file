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
			
            
            if (!isset($_SESSION["success"]))
                header("Location: login.php");
            elseif ($_SESSION["success"] == "no")
                header("Location: login.php");
		?>
	
		學生成績<p>
		<p/>
		
        學號:<input type = 'text' name = 'student_id' value="<?php echo $_SESSION['student_id']?>"/> 
        登入次數:<input type = 'text' name = 'login_num' value="<?php echo $_COOKIE["login_num"]?>"/><p>
        國文:<input type = 'text' name = 'ch' value="<?php echo $_SESSION['ch']?>"/><p>
        英文:<input type = 'text' name = 'en' value="<?php echo $_SESSION['en']?>"/><p>
        數學:<input type = 'text' name = 'math' value="<?php echo $_SESSION['math']?>"/><p>
        平均:<input type = 'text' name = 'avg' value="<?php echo round(($_SESSION['ch']+$_SESSION['en']+$_SESSION['math'])/3,2)?>"/><p>
			
        <form name="login" method="post" action="controller.php">
		<input type = 'submit' name="go" value = '回登入畫面'/>
		</form>
	</body>
	
</html>