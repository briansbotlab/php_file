<?php
	session_start();
	
    if(isset($_POST['go'])){
        $go =$_POST['go'];
        if($go == "回登入畫面"){
            $_SESSION["success"] = "no";
            $_SESSION["fail"] = "no";
            header("Location: login.php");
            return 0;
        }
        
    }
    
    
    
	$file  = basename($_SERVER["PHP_SELF"],".php");
	$path  = realpath($file.".php");                    // 取得檔案實際路徑
	$parts = pathinfo($path);                           // 取得路徑資訊
	
	
   
	
	if (isset($_POST['student_id'])  and isset($_POST['password'])) {
		$student_id = $_POST["student_id"];
		$password = $_POST['password'];
	}
	
	
	
	$readfile  = $parts["dirname"] . "\\score.dat";
    $fpin  = fopen($readfile,  "r");
	$line = fscanf($fpin, "%s %s %s %s %s %s");
   
	
	
	while ($line != null) {
		list($sid, $pass, $name, $ch,$en,$math ) = $line;
		if ($student_id ==$sid and $password == $pass) { //登入成功
            if(isset($_COOKIE["login_num"])){ //cookie 存在
                $login_num = $_COOKIE["login_num"];
                setcookie("login_num",$login_num+1,time()+(3600*24*7)); //7天
            }else{ //不存在
                $login_num =1;
                setcookie("login_num",$login_num,time()+(3600*24*7)); //7天
            }
                
			$_SESSION['success'] = 'yes';
			$_SESSION["fail"] = "no";
            
			$_SESSION['student_id'] = $student_id;
			$_SESSION['password'] = $password;
			$_SESSION['name'] = $name;
			$_SESSION['ch'] = $ch;
			$_SESSION['en'] = $en;
			$_SESSION['math'] = $math;
			header('Location: success.php');
			return 0;
		}
		$line = fscanf($fpin, "%s %s %s %s %s %s");
		
	}
	
	
	
	$_SESSION['student_id'] = $student_id;
    $_SESSION['success'] = 'no';
	$_SESSION["fail"] = "yes";
    
	header('Location: fail.php');
	return 0;
?>