<?php
		session_start();

        $username = "root";
        $password = "";
        $hostname="localhost";
        
        $conn = mysql_connect('localhost','root','')or die("Error");
        mysql_select_db('pap_leonardo', $conn);
        mysql_set_charset('utf8',$conn);

        
        if(isset($_POST['modalidade']) && isset($_POST['horario']) && isset($_POST['professor']))
        {
            $modalidade = $_POST['modalidade'];
            $escalao = $_POST['escalao'];
            $sexo = $_POST['sexo'];
            $horario = $_POST['horario'];
            $professor = $_POST['professor'];
        }
    
		        $sql ="INSERT INTO horarios (modalidade, escalao, sexo, horario, professor) values ('$modalidade','$escalao','$sexo','$horario','$professor')";

		        $retval = mysql_query( $sql, $conn );

				if(! $retval )
				{
				  	die('Não foi possívem inserir os dados ' . mysql_error());
				}
				else
				{
					$sucesso= "Dados inseridos com sucesso.";
					echo "<script type='text/javascript'>alert('$sucesso'); location= 'gestao.php' </script>"; 
			    }
		
     mysql_close($conn);
?>
