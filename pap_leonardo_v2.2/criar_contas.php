<?php
session_start();

if(!isset($_SESSION["nivel"]))
{
	    $erro_login = "Tem de efetuar o login com uma conta de super administrador para aceder a esta página.";
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
<h1>Contas</h1>
<hr>
<p>Aqui pode Criar contas de administrador</p>
<h3>Criar Contas</h3>
<form method="post" action="criar_contas_php.php">
	<div class="row">
    	<div class="large-5 columns">
      		<label>Nome
        		<input type="text" name="nome" id="nome" required/>
      		</label>
      		<label>Username
        		<input type="text" name="login" id="login" required/>
      		</label>
      		<label>Password
        		<input type="text" name="senha" id="senha" required/>
      		</label>
    	<label>Nivel de acesso</label>
	      	<input type="radio" name="nivel" value="1" id="nivel1" required><label>1</label>
	      	<input type="radio" name="nivel" value="0" id="nivel0" required><label>0</label>
	</div>
  </div>
  			<button type="submit" class="button small radius">Crirar</button>
</form> 

<hr>

<script>
		 function editarConta(row)
		     {
		     	var i=row.parentNode.parentNode.rowIndex;	
		     	var x = (document.getElementById("tabela_contas").rows.item(i).cells.item(0).innerHTML);
		     	var y = (document.getElementById("tabela_contas").rows.item(i).cells.item(1).innerHTML);
		     	var z = (document.getElementById("tabela_contas").rows.item(i).cells.item(2).innerHTML);
		     	var y1 = (document.getElementById("tabela_contas").rows.item(i).cells.item(3).innerHTML);

		     	

		     	document.getElementById('nomeEdit').value = x;
		     	document.getElementById('loginEdit').value = y;
		     	document.getElementById('senhaEdit').value = z;
		     	document.getElementById('eliminarHidden').value = y;
		     	var btn = document.getElementById(y1).checked = true;
		     	
		     }
</script>


<h3>Contas existentes</h3>
<table id="tabela_contas" align="center">
  <thead>
    <tr>
      <th width="200">Nome</th>
      <th width="150">Utilizador</th>
      <th width="150">Password</th>
      <th width="50">Nível</th>
      <th width="25">Editar</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $username = "root";
        $password = "";
        $hostname="localhost";
        
        $conn = mysql_connect('localhost','root','')or die("Error");
        mysql_select_db('pap_leonardo', $conn);

        $result = "SELECT * FROM admin ORDER BY nome ASC";
         mysql_set_charset("UTF8");
		$rs = mysql_query($result);


  while($row = mysql_fetch_array($rs))
	{
	   echo  "<tr>";
	   echo   "<td>" . $row['nome'] ."</td>";
	   echo   "<td>" . $row['login'] ."</td>";
	   echo   "<td>" . $row['senha'] ."</td>";
	   echo   "<td>" . $row['nivel'] ."</td>";
	   echo   '<td><button id="botedit" name="botedit" onclick="editarConta(this)" class="button tiny radius" href="#" data-reveal-id="modal_contas">Editar</button></td>';
	   echo "</tr>";
	}
    ?>
  </tbody>
</table>
<div id="modal_contas" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
  <h2 id="modalTitle">Editar contas</h2>
<form id="editarForm" method="post" action="editar_conta.php">
	<div class="row">
    	<div class="large-5 columns">
      		<label>Nome
        		<input type="text" name="nomeEdit" id="nomeEdit" required/>
      		</label>
      		<label>Utilizador
        		<input type="text" name="loginEdit" id="loginEdit" readonly required/>
      		</label>
      		<label>Password
        		<input type="text" name="senhaEdit" id="senhaEdit" required/>
      		</label>
      		<label>Nível de acesso
        		 <input type="radio" name="nivelEdit" value="1" id="1" required><label>1</label>
	      	     <input type="radio" name="nivelEdit" value="0" id="0" required><label>0</label>
      		</label>
      		
       </div> 
    </div>
</form>
    <form id="eliminarForm" method="post" action="eliminar_conta.php">
    	<input type="hidden" name="eliminarHidden" id="eliminarHidden"/>
    </form>

    <div align="center">
   		 <button form="editarForm" type="submit" class="button small radius">Editar</button>
    	<button form="eliminarForm" type="submit" class="button alert small radius" onclick="return confirm('Tem a certeza que deseja eliminar?')">Eliminar</button>
    </div>

</div>
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