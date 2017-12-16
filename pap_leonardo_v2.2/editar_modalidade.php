<?php
		session_start();

        $username = "root";
        $password = "";
        $hostname="localhost";
        
        $conn = mysql_connect('localhost','root','')or die("Error");
        mysql_select_db('pap_leonardo', $conn);
        mysql_set_charset('utf8',$conn);

        
        if(isset($_POST['modalidadeEdit']) && isset($_POST['horarioEdit']) && isset($_POST['professorEdit']))
        {
            $modalidade = $_POST['modalidadeEdit'];
            $escalao = $_POST['escalaoEdit'];
            $sexo = $_POST['sexoEdit'];
            $horario = $_POST['horarioEdit'];
            $professor = $_POST['professorEdit'];
        }

        	//$hidden = $_POST['h'];

        if($modalidade==null)
        {
        	echo "<script type='text/javascript'>
                	alert('Selecione alguma modalidade para editar.'); location= 'gestao.php' 
        	      </script>";
        }
        else
        {
    
	        $query ="UPDATE horarios SET  horario='$horario',professor='$professor',escalao='$escalao',sexo='$sexo' WHERE modalidade='$modalidade'";
	        $result = mysql_query($query,$conn);
	        

	        echo "<script type='text/javascript'>
	                	alert('Editado com sucesso.'); location= 'gestao.php' 
	        	  </script>"; 
	        	  
	     	mysql_close($conn);
        }
?>
