<?php
		session_start();

        $username = "root";
        $password = "";
        $hostname="localhost";
        
        $conn = mysql_connect('localhost','root','')or die("Error");
        mysql_select_db('pap_leonardo', $conn);
        mysql_set_charset('utf8',$conn);

        
			if(isset($_POST['eliminarHidden']))
	        {
		        $login = $_POST['eliminarHidden'];

	        }



	        	$query ="DELETE FROM admin WHERE login='$login'";
	       	    $result = mysql_query($query,$conn);

	        echo "<script type='text/javascript'>
	                	alert('Conta eliminada com sucesso!'); location= 'criar_contas.php' 
	        	  </script>"; 

	     	mysql_close($conn);
        
?>
