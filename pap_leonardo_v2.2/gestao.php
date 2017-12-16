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
<h1>Horários e Modalidades</h1>
<hr>
<p>Neste espaço poderá inserir, alterar e eliminar as modalidades do desporto escolar.</p>
<h3>Inserir</h3>

													<!-- FORM COMEÇA -->
<form method="post" action="inserir_modalidade.php">
	<div class="row">
    	<div class="large-5 columns">
      		<label>Modalidade
        		<input type="text" name="modalidade" id="modalidade" required/>
      		</label>
        </div> 
    </div>   
	<div class="row">
    	<div class="large-5 columns">
      		<label>Escalão
      			<select name="escalao" id="escalao" required>
      			<option value=""></option>
      			<option value="Todos">Todos</option>
      			<option value="Infantis">Infantis</option>
      			<option value="Iniciados">Iniciados</option>
      			<option value="Juvenis">Juvenis</option>
      			<option value="Júniores">Júniores</option>
      		</select>
      	</div>
     </div>
     <div class="row">
    	<div class="large-5 columns">
      		<label>Sexo
      			<select name="sexo" id="sexo" required>
      			<option value=""></option>
      			<option value="Masculino">Masculino</option>
      			<option value="Feminino">Feminino</option>
      			<option value="Misto">Misto</option>
      		</select>
      	</div>
     </div>
    <div class="row">
      <div class="name-field">
    	<div class="large-5 columns">
      		<label>Horário
        		<input type="text" name="horario" id="horario" required/>
      		</label>
    	</div>
      </div>
    </div>
    <div class="row">
    	<div class="large-5 columns">
      		<label>Professor(a)
        		<input type="text" name="professor" id="professor" required/>
      		</label>
    	</div>
    </div>
  <button type="submit" class="button small radius">Inserir</button>
</form>
													<!-- FIM DO PRIMEIRO FORM -->
													<!-- Inicio Da Tabela -->
<hr>
<?php 

        $username = "root";
        $password = "";
        $hostname="localhost";
        
        $conn = mysql_connect('localhost','root','')or die("Error");
        mysql_select_db('pap_leonardo', $conn);

        $result = "SELECT * FROM horarios";
         mysql_set_charset("UTF8");
		$rs = mysql_query($result);
?>

<script>
		 function seleccionar(row)
		     {
		     	var i=row.parentNode.parentNode.rowIndex;	
		     	var x = (document.getElementById("tabela").rows.item(i).cells.item(0).innerHTML);
		     	var y = (document.getElementById("tabela").rows.item(i).cells.item(1).innerHTML);
		     	var z = (document.getElementById("tabela").rows.item(i).cells.item(2).innerHTML);
		     	var y1 = (document.getElementById("tabela").rows.item(i).cells.item(3).innerHTML);
		     	var z1 = (document.getElementById("tabela").rows.item(i).cells.item(4).innerHTML);

		     	document.getElementById('modalidadeEdit').value = x;
		     	document.getElementById('escalaoEdit').value = y;
		     	document.getElementById('sexoEdit').value = z;	
		     	document.getElementById('horarioEdit').value = y1;
		     	document.getElementById('professorEdit').value = z1;

		     	document.getElementById('h').value = x;
		     	document.getElementById('heliminar').value = x;
		     	document.getElementById('h_escalao').value = y;
		     	document.getElementById('h_sexo').value = z;	
		     	document.getElementById('h_horario').value = y1;
		     	document.getElementById('h_professor').value = z1;
		     }
</script>

<br>
<h3>Alterar e Eliminar</h3>
<table id="tabela" align="center">
  <thead>
    <tr>
      <th width="200">Modalidade</th>
      <th width="150">Escalão</th>
      <th width="150">Sexo</th>
      <th width="200">Horário das atividades</th>
      <th width="200">Professor(a)</th>
      <th width="25">Editar</th>
    </tr>
  </thead>
  <tbody>
  <?php
  while($row = mysql_fetch_array($rs))
	{
	   echo  "<tr>";
	   echo   "<td>" . $row['modalidade'] ."</td>";
	   echo   "<td>" . $row['escalao'] ."</td>";
	   echo   "<td>" . $row['sexo'] ."</td>";
	   echo   "<td>" . $row['horario'] ."</td>";
	   echo   "<td>" . $row['professor'] ."</td>";
	   echo   '<td><button id="botedit" name="botedit" onclick="seleccionar(this)" class="button tiny radius" href="#" data-reveal-id="modal_modalidades">Editar</button></td>';
	   
	   echo "</tr>";
	}
    ?>
  </tbody>
</table>
<div id="modal_modalidades" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
<h2 id="modalTitle">Editar modalidades</h2>
<form id="editarModalidade" method="post" action="editar_modalidade.php">
	<div class="row">
    	<div class="large-5 columns">
      		<label>Modalidade
        		<input type="text" name="modalidadeEdit" id="modalidadeEdit" readonly="readonly" required/>
      		</label>
       </div> 
    </div>
    	<div class="row">
    	<div class="large-5 columns">
      		<label>Escalão
      			<select name="escalaoEdit" id="escalaoEdit" required>
      			<option value=""></option>
      			<option value="Todos">Todos</option>
      			<option value="Infantis">Infantis</option>
      			<option value="Iniciados">Iniciados</option>
      			<option value="Juvenis">Juvenis</option>
      			<option value="Júniores">Júniores</option>
      		</select>
      	</div>
     </div>
     <div class="row">
    	<div class="large-5 columns">
      		<label>Modalidade
      			<select name="sexoEdit" id="sexoEdit" required>
      			<option value=""></option>
      			<option value="Masculino">Masculino</option>
      			<option value="Feminino">Feminino</option>
      			<option value="Misto">Misto</option>
      		</select>
      	</div>
     </div>   
    <div class="row">
      <div class="name-field">
    	<div class="large-5 columns">
      		<label>Horário
        		<input type="text" name="horarioEdit" id="horarioEdit" required/>
      		</label>
    	</div>
      </div>
    </div>
    <div class="row">
    	<div class="large-5 columns">
      		<label>Professor(a)
        		<input type="text" name="professorEdit" id="professorEdit" required/>
      		</label>
    	</div>
    </div>
  
  <input type="hidden" name="h" id="h"/>
</form>


<form id="eliminarModalidade" method="post" action="eliminar_modalidade.php">
	<input type="hidden" name="heliminar" id="heliminar" required/>
	<input type="hidden" name="h_escalao" id="h_escalao" required/>
	<input type="hidden" name="h_sexo" id="h_sexo" required/>
	<input type="hidden" name="h_horario" id="h_horario" required/>
	<input type="hidden" name="h_professor" id="h_professor" required/>
	
</form>
	<div align="center">
		<button form="editarModalidade" type="submit" class="button small radius" onclick="" >Editar</button>
		<button form="eliminarModalidade" type="submit" class="button alert small radius" onclick="return confirm('Tem a certeza que deseja eliminar?')">Eliminar</button>
	</div>
</div>
</div>
</div>
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