<?php
		session_start();

        $username = "root";
        $password = "";
        $hostname="localhost";
        
        $conn = mysql_connect('localhost','root','')or die("Error");
        mysql_select_db('pap_leonardo', $conn);
        mysql_set_charset('utf8',$conn);

        
			if(isset($_POST['loginEdit']))
	        {
		        $login = $_POST['loginEdit'];
		        $senha = $_POST['senhaEdit'];
	        	$nome = $_POST['nomeEdit'];
	        	$nivel = $_POST['nivelEdit'];

	        }



	        	$query ="UPDATE admin SET senha='$senha',nome='$nome',nivel='$nivel' WHERE login='$login'";
	       	    $result = mysql_query($query,$conn);

	        echo "<script type='text/javascript'>
	                	alert('Conta editada com sucesso!'); location= 'criar_contas.php' 
	        	  </script>"; 

	     	mysql_close($conn);
        
?>
