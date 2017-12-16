<?php
session_start();

if(!isset($_SESSION["nome_user"]))
{
	    $erro_login = "Tem de efetuar o login para aceder a esta página.";
        echo "<script type='text/javascript'>alert('$erro_login'); location='index.php'</script>";	
}
?> 

<!DOCTYPE html>

<html class=" js flexbox flexboxlegacy canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths" lang="en" data-useragent="Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/40.0.2214.115 Safari/537.36"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Desporto Escolar</title>

<link rel="stylesheet" href="http://foundation.zurb.com/assets/css/templates/foundation.css">
<link rel="stylesheet" href="foundation-icons/foundation-icons.css" />
    <link rel="stylesheet" href="css/foundation.css">
<script src="./Foundation Template   Orbit Home_files/modernizr.js"></script>
<script src="jquery-1.11.2.min.js"></script>
<link rel="stylesheet" href="foundation-icons/foundation-icons.css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>




<script type="text/javascript">
$(window).load(function(){
var $rows = $('#tabela_inscrito tr');
$('#search').keyup(function() {
    var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
    
    $rows.show().filter(function() {
        var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
        return !~text.indexOf(val);
    }).hide();
});
}); 

</script>
<script type="text/javascript">

    function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data) 
    {
        var mywindow = window.open('', 'my div', "height=" + screen.height/2 + ",width=" + screen.width/2 + ",resizable=yes");
        mywindow.document.write('<html><head><title>Alunos Desporto Escolar</title>');
        /*optional stylesheet*/ //mywindow.document.write('<link rel="stylesheet" href="main.css" type="text/css" />');
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10

        mywindow.print();
        mywindow.close();

        return true;
    }

</script>




</head>
<body>


												<!-- MENU CIMA -->

<div class="row">
<div class="large-3 columns">
<h1><a href="index.php"><img src="img/logo_escola.png"></a>

</h1>
</div>
<div class="large-9 columns">
<ul class="right button-group">
<li><a href="index.php" class="button">Página Inicial</a></li>
<li><a href="inscricoes.php" class="button">Inscrições</a></li>
<li><a href="horarios.php" class="button">Horários</a></li>
<li>
<?php
if( !isset($_SESSION["nome_user"]))
{
	?>
	    <a href="#" data-reveal-id="myModal" class="button">Log in</a>
	<?php
}
else
{
	?>
	   <a href="logout.php" class="button alert">Log out</a></li>
	   <li><button href="#" data-dropdown="drop1" aria-controls="drop1" aria-expanded="false" class="button dropdown">Acesso</button><br>
			<ul id="drop1" data-dropdown-content class="f-dropdown" aria-hidden="true">
	  			<li><a href="gestao.php">Horários e Modalidades</a></li>
	  			<li><a href="alunos.php">Inscrições</a></li>
	  			<li><a href="alunos_inscritos.php">Alunos Inscritos</a></li>
	  			<li><a href="gestao_site.php">Gestão do Site</a></li>
			</ul>	
		</li>
	   
	   
	<?php
}
?>                                                  <!-- Modal aqui -->
<div id="myModal" class="reveal-modal" data-reveal>
  <h2>Log in</h2>
   <p class="lead">Este espaço é exclusivo para administradores</p>
<form data-abide method="post" action="login_php.php" >
<!-- Utilizador -->
 <div>
    <label>Utilizador
      <input type="text" id="login" name="login">
    </label>
  </div>
<!-- Utilizador -->
  <div class="password-field">
    <label>Password
      <input type="password" id="senha" name="senha">
    </label>
  </div>
<!-- BOTÃO SUMMIT -->
  <button type="submit" class="button radius">Entrar</button>
</form>
  </div>
  <a class="close-reveal-modal"></a>
</div>
                                   <!-- ------------------- -->
</ul>
</div>
</div>
 


													<!-- FIM DO MENU -->

<div class="row">
<div class="large-12 columns">
<br>
<h1>Gestão dos Alunos</h1>
<hr>
<p>Neste espaço poderá verificar os alunos inscritos no desporto escolar.</p>

													

												<!--TABELA DOS ISCRITOS-->
<h3>Alunos inscritos.</h3>
<hr>




<input type="text" id="search" placeholder="Pesquisar" />

<div align="center">
    	<input type="button" class="button tiny radius" value="Imprimir" onclick="PrintElem('#print')" />
    </div>


<?php 

        $username = "root";
        $password = "";
        $hostname="localhost";
        
        $conn = mysql_connect('localhost','root','')or die("Error");
        mysql_select_db('pap_leonardo', $conn);

        $result = "SELECT nome_aluno,nascimento,escalao,n_processo,ano,turma,n_turma,modalidade,autorizacao FROM inscricao_alunos WHERE inscrito=1";
         mysql_set_charset("UTF8");
		$rs = mysql_query($result);
?>



<br>
<script>
		 function eliminar(row)
		     {
		     	var i=row.parentNode.parentNode.rowIndex;	
		     	var nome = (document.getElementById("tabela_inscrito").rows.item(i).cells.item(0).innerHTML);
		     	var processo = (document.getElementById("tabela_inscrito").rows.item(i).cells.item(1).innerHTML);
		     	var escalao = (document.getElementById("tabela_inscrito").rows.item(i).cells.item(2).innerHTML);
		     	var ano = (document.getElementById("tabela_inscrito").rows.item(i).cells.item(3).innerHTML);
		     	var turma = (document.getElementById("tabela_inscrito").rows.item(i).cells.item(4).innerHTML);
		     	var numero = (document.getElementById("tabela_inscrito").rows.item(i).cells.item(5).innerHTML);
		     	var modalidade = (document.getElementById("tabela_inscrito").rows.item(i).cells.item(6).innerHTML);


		     	document.getElementById('nprocesso_hidden').value = processo;
		     	document.getElementById('aluno_eliminar').value = nome;
		     	document.getElementById('escalao').value = escalao;
		     	document.getElementById('modalidade_eliminar').value = modalidade;

		     	
		     	document.getElementById('aluno_editar').value = nome;
		     	document.getElementById('nprocesso_editar').value = processo;
		     	document.getElementById('escalao_editar').value = escalao;
		     	document.getElementById('ano_editar').value = ano;
		     	document.getElementById('turma_editar').value = turma;
		     	document.getElementById('numero_editar').value = numero;
		     	document.getElementById('modalidade_editar').value = modalidade;
		     }
</script>

<div id="print" name="print">												
<table id="" align="center">
  <thead>
    <tr>
      <th width="300">Nome</th>
      <th width="100">Nº Processo</th>
      <th width="100">Escalão</th>
      <th width="50">Ano</th>
      <th width="100">Turma</th>
      <th width="50">Número</th>
      <th width="200">Modalidade</th>
      <th width="100"></th>
    </tr>
  </thead>
  </table>
  <table id="tabela_inscrito" align="center">
  <?php
  while($row = mysql_fetch_array($rs))
	{
	   echo  "<tr>";
	   echo   "<td width='300'>" . $row['nome_aluno'] ."</td>";
	   echo   "<td width='100'>" . $row['n_processo'] ."</td>";
	   echo   "<td width='100'>" . $row['escalao'] ."</td>";
	   echo   "<td width='50'>" . $row['ano'] ."</td>";
	   echo   "<td width='100'>" . $row['turma'] ."</td>";
	   echo   "<td width='50'>" . $row['n_turma'] ."</td>";
	   echo   "<td width='200'>" . $row['modalidade'] ."</td>";
	   echo   '<td width="100">
	   <button id="eliminar" name="eliminar" onclick="eliminar(this)" class="button tiny radius" href="#" data-reveal-id="modal_inscritos">Selecionar</button>
	   </td>'; 
	   echo "</tr>";
	}
    ?>
  </tbody>
</table>
</div>

<div id="modal_inscritos" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
<h2 id="modalTitle">Editar/Eliminar Aluno</h2>

	   <form id="eliminarInscritos" method="post" action="eliminar_inscrito.php">
	<div class="row">
    	<div class="large-5 columns">
      		<label>Aluno
        		<input class="read-only" type="text" name="aluno_eliminar" id="aluno_eliminar" readonly required/>
      		</label>
      		<label>Escalão
        		<input type="text" name="escalao" id="escalao" readonly required/>
      		</label>
      		<label>Modalidade
        		<input type="text" name="modalidade_eliminar" id="modalidade_eliminar" readonly required/>
      		</label>
    	</div>
      </div>
      <input type="hidden" name="nprocesso_hidden" id="nprocesso_hidden" readonly/>
      </form>

      														

      <div align="center">
        <button type="submit" class="button small radius" href="#" data-reveal-id="secondModal">Editar</button>
      	<button form="eliminarInscritos" type="submit" class="button alert small radius" onclick="return confirm('Tem a certeza que deseja eliminar?')">Eliminar</button>
      </div>
</div>

      												<!--SECOND MODAL HERE -->
<?php 

        $username = "root";
        $password = "";
        $hostname="localhost";
        
        $conn = mysql_connect('localhost','root','')or die("Error");
        mysql_select_db('pap_leonardo', $conn);

        $result = "SELECT modalidade FROM horarios";
         mysql_set_charset("UTF8");
		$rs = mysql_query($result);
?>

      <div id="secondModal" class="reveal-modal" data-reveal aria-labelledby="secondModalTitle" aria-hidden="true" role="dialog">
		  <h2 id="secondModalTitle">Editar informações básicas do aluno</h2>


		  <form id="editarInscritos" method="post" action="editar_inscrito.php">
				<div class="row">
			    	<div class="large-5 columns">
			      		<label>Aluno
			        		<input type="text" name="aluno_editar" id="aluno_editar" required/>
			      		</label>
			      		<label>Número de Processo
			        		<input type="text" name="nprocesso_editar" id="nprocesso_editar" required/>
			      		</label>
			      		<label>Escalão
				      	    <select name="escalao_editar" id="escalao_editar" required>
				      			<option value=""></option>
				      			<option value="Infantis">Infantis</option>
				      			<option value="Iniciados">Iniciados</option>
				      			<option value="Juvenis">Juvenis</option>
				      			<option value="Júniores">Júniores</option>
				      		</select>
			      		<label>Ano
			        		<input type="text" name="ano_editar" id="ano_editar" required/>
			      		</label>
			      		<label>Turma
			        		<input type="text" name="turma_editar" id="turma_editar" required/>
			      		</label>
			      		<label>Número
			        		<input type="text" name="numero_editar" id="numero_editar" required/>
			      		</label>
			      		<label>Modalidade
				      		<select name="modalidade_editar" id="modalidade_editar" required>
				      		<option value=""></option>
					      		<?php
									  	while($row = mysql_fetch_array($rs))
										{
										   echo   "<option value=". $row['modalidade'] .">". $row['modalidade'] ."</option>";
										}
								?>
							</select> 
      				   </label>
			    	</div>
			      </div>
               </form>
	            <div align="center">
	              <button form="editarInscritos" type="submit" class="button small radius">Editar</button>
				</div>
	       </div>






<script>
		function janela2() 
		{
		    var myWindow = window.open("tabelaCompleta2.php", "", "height=" + screen.height + ",width=" + screen.width + ",resizable=yes");
		}
</script>


				<a onclick="janela2()" class="button expand">Ver Tabela Completa</a>


</div>
</div>
<br>
<br>
<br>














<footer class="row">
<div class="large-12 columns">
<hr>
<div class="row">
<div class="large-6 columns">
<!--<p>© Copyright Leonardo Henriques</p>-->
</div>
<div class="large-6 columns">
<ul class="inline-list right">
<li><i class="fi-mail"> esrbp@esrbp.pt</i></li>
<li><i class="fi-telephone"> (+351) 262 870 070</i></li>
</ul>
</div>
</div>
</div>
</footer>
<script>
  document.write('<script src=js/vendor/' +
  ('__proto__' in {} ? 'zepto' : 'jquery') +
  '.js><\/script>')
  </script><script src="./Foundation Template   Orbit Home_files/zepto.js"></script>
<script src="./Foundation Template   Orbit Home_files/jquery.js"></script>
<script src="./Foundation Template   Orbit Home_files/foundation.min.js"></script>
<script>
    $(document).foundation();
  </script>
<script src="./Foundation Template   Orbit Home_files/jquery(1).js"></script>
<script src="./Foundation Template   Orbit Home_files/foundation.js"></script>
<script>
      $(document).foundation();

      var doc = document.documentElement;
      doc.setAttribute('data-useragent', navigator.userAgent);
    </script>

</body>
</html>