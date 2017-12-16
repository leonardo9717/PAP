<?php
		session_start();

        $username = "root";
        $password = "";
        $hostname="localhost";
        
        $conn = mysql_connect('localhost','root','')or die("Error");
        mysql_select_db('pap_leonardo', $conn);
        mysql_set_charset('utf8',$conn);

        
        if(isset($_POST['nprocesso_hidden']))
        {
        	$aluno_eliminar = $_POST['aluno_eliminar'];
            $nprocesso_eliminar = $_POST['nprocesso_hidden'];
            $modalidade_eliminar = $_POST['modalidade_eliminar'];  
        }
        
    	if(!$aluno_eliminar=='')
	    {
	        $query ="DELETE FROM inscricao_alunos WHERE n_processo='$nprocesso_eliminar' AND modalidade='$modalidade_eliminar'";
	        $result = mysql_query($query,$conn);
	        

	        echo "<script type='text/javascript'>
	                	alert('Aluno eliminado com sucesso!'); location= 'alunos_inscritos.php' 
	        	  </script>"; 
	    }
	    else
	    {
	    	echo "<script type='text/javascript'>
	                	alert('Selecione um aluno para eliminar'); location= 'alunos_inscritos.php' 
	        	  </script>";
	    }
	        	  
	     	mysql_close($conn);
        
?>
