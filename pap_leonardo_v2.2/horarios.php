<?php
session_start();
?>
<!DOCTYPE html>

<html class=" js flexbox flexboxlegacy canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths" lang="en" data-useragent="Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/40.0.2214.115 Safari/537.36"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Desporto Escolar</title>

<link rel="stylesheet" href="http://foundation.zurb.com/assets/css/templates/foundation.css">
<script src="./Foundation Template   Orbit Home_files/modernizr.js"></script>
    <link rel="stylesheet" href="css/foundation.css">
<link rel="stylesheet" href="foundation-icons/foundation-icons.css" />
</head>
<body>


												<!-- MENU CIMA -->

<div class="row">
<div class="large-3 columns">
<h1><a href="index.php"><img src="img/logo_escola.png"></a>
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
      <input type="text" id="login" name="login" required>
    </label>
  </div>
<!-- Utilizador -->
  <div class="password-field">
    <label>Password
      <input type="password" id="senha" name="senha" required>
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

													<!-- INICIO DA TABELA -->
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

<div class="row">
<div class="large-12 columns">
<br>
<h1>Horários das modalidades</h1>
<hr>
<table id="tabela" align="center">
  <thead>
    <tr>
      <th width="200">Modalidade</th>
      <th width="150">Escalão</th>
      <th width="150">Sexo</th>
      <th width="200">Horário das atividades</th>
      <th width="200">Professor(a)</th>
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
	   echo "</tr>";
	}
    ?>
  </tbody>
</table>
</div>
</div>
													<!-- FIM DA TABELA -->



													
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