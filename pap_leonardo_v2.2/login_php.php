<?php
		session_start();

        $username = "root";
        $password = "";
        $hostname="localhost";
        
        $conn = mysql_connect('localhost','root','')or die("Error");
        mysql_select_db('pap_leonardo', $conn);
        mysql_set_charset('utf8',$conn);
        
        if(isset($_POST['login']) && isset($_POST['senha']))
        {
            $mylogin = $_POST['login'];
            $mysenha = $_POST['senha'];
        }
        
        $mylogin = stripcslashes($mylogin);
        $mysenha = stripcslashes($mysenha);
    
        
        $query ="SELECT login,senha,nome,nivel FROM admin WHERE login='$mylogin' AND senha='$mysenha'";
         mysql_set_charset("UTF8");
        $result = mysql_query($query,$conn);
        $count = mysql_num_rows($result);

        
        mysql_close();
        
        if($count==1)
        {
        	$row = mysql_fetch_row($result);

        	$nivel=$row[3];
        	if($nivel==1)
         	{
         		$_SESSION['nivel']=$row[0];
         	}
            $_SESSION['login_user']=$row[0];
            $_SESSION['nome_user']= $row[2];


           $alert_welcome = "Bem-vindo, " . $_SESSION["nome_user"] ."!";
           echo "<script type='text/javascript'>alert('$alert_welcome'); location= 'index.php' </script>"; 

        }
        else 
        {
            session_destroy();
            $alert_error = "Nome ou Palavra-passe incorreto";
            echo "<script type='text/javascript'>alert('$alert_error'); location='index.php'</script>";  

        }
?>
