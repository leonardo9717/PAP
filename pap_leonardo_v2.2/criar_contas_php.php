<?php
		session_start();

        $username = "root";
        $password = "";
        $hostname="localhost";
        
        $conn = mysql_connect('localhost','root','')or die("Error");
        mysql_select_db('pap_leonardo', $conn);
        mysql_set_charset('utf8',$conn);

        
			if(isset($_POST['login']))
	        {
		        $login = $_POST['login'];
		        $senha = $_POST['senha'];
	        	$nome = $_POST['nome'];
	        	$nivel = $_POST['nivel'];
	        }


		    $query ="SELECT * FROM admin WHERE login='$login'";
	        $result = mysql_query($query,$conn);
	        $count = mysql_num_rows($result);

	        if(!$count>=1)
	        {
	        $query ="INSERT INTO admin (login,senha,nome,nivel) VALUES ('$login','$senha','$nome','$nivel')";
	        $result = mysql_query($query,$conn);

	        echo "<script type='text/javascript'>
	                	alert('Conta criada com sucesso!'); location= 'criar_contas.php' 
	        	  </script>"; 
			}
			else
	      	{
	      			        echo "<script type='text/javascript'>
	                	alert('Já existe este utilizador!'); location= 'criar_contas.php' 
	        	  </script>"; 
	      	}
	     	mysql_close($conn);
        
?>
