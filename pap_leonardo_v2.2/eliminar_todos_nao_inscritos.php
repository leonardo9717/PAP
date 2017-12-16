<?php
		session_start();

        $username = "root";
        $password = "";
        $hostname="localhost";
        
        $conn = mysql_connect('localhost','root','')or die("Error");
        mysql_select_db('pap_leonardo', $conn);
        mysql_set_charset('utf8',$conn);

		        $query ="DELETE FROM inscricao_alunos WHERE inscrito=0";

		        $result = mysql_query($query,$conn);

		        echo "<script type='text/javascript'>
		                	alert('Alunos eliminados com sucesso!'); location= 'gestao_site.php' 
		        	  </script>"; 

	     	mysql_close($conn);
        
?>
