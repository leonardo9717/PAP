<?php
		session_start();

        $username = "root";
        $password = "";
        $hostname="localhost";
        
        $conn = mysql_connect('localhost','root','')or die("Error");
        mysql_select_db('pap_leonardo', $conn);
        mysql_set_charset('utf8',$conn);

        
        //if(isset($_POST['EE']) && isset($_POST['CCEE']) && isset($_POST['professor']))
        //{
            $EE = $_POST['EE'];
            $CCEE = $_POST['CCEE'];
            $aluno = $_POST['aluno'];
            $numerop = $_POST['numerop'];
            $numero = $_POST['numero'];
            $turma = $_POST['turma'];
            $ano = $_POST['ano'];
            $modalidade = $_POST['modalidade'];
            $autorizacao = $_POST['autorizacao'];
            $nascimento = $_POST['nascimento'];
            $escalao = $_POST['escalao'];

         if(isset($_POST['tel']) && isset($_POST['telf']) && isset($_POST['telft']))
         {
            $tel = $_POST['tel'];
            $telf = $_POST['telf'];
            $telft = $_POST['telft'];
         }
        //}
    
        $query ="SELECT * FROM inscricao_alunos WHERE n_processo='$numerop' AND modalidade='$modalidade'";
        $result = mysql_query($query,$conn);
        $count = mysql_num_rows($result);
        
        mysql_close();
        
        if($count>=1)
        {
        	$duplicate= "Este aluno já esta inscrito nesta modalidade.";
			echo "<script type='text/javascript'>alert('$duplicate'); location= 'inscricoes.php' </script>"; 
        }
        else 
        {
		        $sql ="INSERT INTO inscricao_alunos (EE,CCEE,nome_aluno,n_processo,n_turma,turma,ano,modalidade,autorizacao,telefone,telemovel,telefonee,inscrito,nascimento,escalao) values ('$EE','$CCEE','$aluno','$numerop','$numero','$turma','$ano','$modalidade','$autorizacao','$tel','$telf','$telft',0,'$nascimento','$escalao')";

		        $retval = mysql_query( $sql, $conn );

				if(! $retval )
				{
				  	die('Não foi possívem fazer inscrição.' . mysql_error());
				}
				else
				{
					$sucesso= "Inscrição bem sucedida.";
					echo "<script type='text/javascript'>alert('$sucesso'); location= 'index.php' </script>"; 
			    }
		}
     mysql_close($conn);
?>