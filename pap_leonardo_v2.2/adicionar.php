<?php
		session_start();

        $username = "root";
        $password = "";
        $hostname="localhost";
        
        $conn = mysql_connect('localhost','root','')or die("Error");
        mysql_select_db('pap_leonardo', $conn);
        mysql_set_charset('utf8',$conn);

        
			//if(isset($_POST['h']))
	        //{
		        $aluno = $_POST['aluno'];
		        $nprocesso_hidden = $_POST['nprocesso_hidden_editar'];
	        	$modalidade = $_POST['modalidade'];
	       // }

	        if(!$aluno=='')
	        {
	        $query ="UPDATE inscricao_alunos SET inscrito='1' WHERE n_processo='$nprocesso_hidden' AND modalidade='$modalidade'";
	        $result = mysql_query($query,$conn);
	        

	        echo "<script type='text/javascript'>
	                	alert('Aluno Inscrito com sucesso'); location= 'alunos.php' 
	        	  </script>"; 
			}
			else
	      	{
	      			        echo "<script type='text/javascript'>
	                	alert('Selecione um aluno a inscrever'); location= 'alunos.php' 
	        	  </script>"; 
	      	}
	     	mysql_close($conn);
        
?>
