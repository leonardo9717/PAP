<?php
		session_start();

        $username = "root";
        $password = "";
        $hostname="localhost";
        
        $conn = mysql_connect('localhost','root','')or die("Error");
        mysql_select_db('pap_leonardo', $conn);
        mysql_set_charset('utf8',$conn);

        
        if(isset($_POST['heliminar']))
        {
            $hidden = $_POST['heliminar'];
            $h_escalao = $_POST['h_escalao'];
            $h_sexo = $_POST['h_sexo'];
            $h_horario = $_POST['h_horario'];
            $h_professor = $_POST['h_professor'];
        }


        if($hidden=='')
        {
        	echo "<script type='text/javascript'>
                	alert('Selecione alguma modalidade para eliminar.'); location= 'gestao.php' 
        	      </script>";
        }
        else
        {
    
	        $query ="DELETE FROM horarios WHERE modalidade='$hidden' AND escalao='$h_escalao' AND sexo='$h_sexo' AND horario='$h_horario' AND professor='$h_professor'";
	        $result = mysql_query($query,$conn);
	        

	        echo "<script type='text/javascript'>
	                	alert('Modalidade ". $_POST['heliminar'] . " eliminada com sucesso!'); location= 'gestao.php' 
	        	  </script>"; 
	        	  
	     	mysql_close($conn);
        }
?>
