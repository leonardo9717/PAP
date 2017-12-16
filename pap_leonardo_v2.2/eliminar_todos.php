<?php
		session_start();

        $username = "root";
        $password = "";
        $hostname="localhost";
        
        $conn = mysql_connect('localhost','root','')or die("Error");
        mysql_select_db('pap_leonardo', $conn);
        mysql_set_charset('utf8',$conn);

        



       echo '<script type="text/javascript">';
        echo    'var x;';
   		  echo	'if (confirm("Tem a certeza que deseja apagar todos os alunos inscritos do sistema?") == true)';
			echo		    '{';
							    	$query ="DELETE FROM inscricao_alunos WHERE inscrito=1";
			       					$result = mysql_query($query,$conn);

								    mysql_close($conn);
			echo			 		'alert("Todos os alunos foram apagados"); location= "alunos.php"'; 
			echo		    '}';
			echo		    'else';
			echo	    	'{';
			echo        		'location= "alunos.php"';
			echo       	    '}';   			
        	echo   '</script>';
?>
