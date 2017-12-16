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

<div class="row">
<div class="large-12 columns">
<br>
<h1>Inscrições</h1>
<hr>
<p>Neste espaço podes fazer a tua inscrição para o desporto escolar, basta preencher o formulário.</p>
<form method="post" action="inscrever.php">
	<div class="row">
    	<div class="large-5 columns">
      		<label>Encarregado de educação
        		<input type="text" name="EE" id="EE" required/>
      		</label>
    	</div> 
    </div>   
    <div class="row">
      <div class="name-field">
    	<div class="large-5 columns">
      		<label>Cartão de Cidadão do encarregado de educação
        		<input type="text" name="CCEE" id="CCEE" required/>
      		</label>
    	</div>
      </div>
    </div>
    <div class="row">
    	<div class="large-5 columns">
      		<label>Nome do aluno
        		<input type="text" name="aluno" id="aluno" required/>
      		</label>
    	</div>
    </div>
     <div class="row">
    	<div class="large-5 columns">
      		<label>Ano de Nascimento
      		<input type="number" min="1990" max="2050" name="nascimento" id="nascimento" onblur="verificarEscalao()" required/>	
      		Escalão
      		<input type="text" name="escalao" id="escalao" readonly required/>	
      		</label>
    	</div>
    </div>
    <div class="row">
    	<div class="large-5 columns">
      		<label>Número de processo
        		<input type="text" name="numerop" id="numerop" required/>
      		</label>
    	</div>
    </div>
    <div class="row">
    	<div class="large-5 columns">
      		<label>Número de turma
        		<input type="number" name="numero" id="numero" min="1" required/>
      		</label>
    	</div>
    </div>
    <div class="row">
    	<div class="large-5 columns">
      		<label>Turma
        		<input type="text" name="turma" id="turma" required/>
      		</label>
    	</div>
    </div>
    <div class="row">
    	<div class="large-5 columns">
      		<label>Ano
        		<input type="text" name="ano" id="ano" required/>
      		</label>
    	</div>
    </div>
    <div class="row">
    	<div class="large-5 columns">
      		<label>Modalidade
      		<select name="modalidade" id="modalidade" required>
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
<br>
    <div class="row">
	    <div class="large-6 columns">
	      	<input type="radio" name="autorizacao" value="autorizo" id="autorizo" required><label>Autorizo</label>
	      	<input type="radio" name="autorizacao" value="nao autorizo" id="naoautorizo"required><label>Não autorizo</label>
	    </div>
	    <div class="large-12 columns">
	    	<p>Autorizo/não autorizo a divulgação de imagens e fotografias
	     	(no sítio, site da Escola, vitrines/placares ou outros locais),
	     	que sejam eventaulmente recolhidas durante as atividades do Desporto Escolar, conforme documento
	     	já entregue ao Diretor de Turma.</p>
	     	<p>Mais declaro que tomei conhecimento do hórario e das informações relativas ao desenrolar
	     	das atividades, referidas no site na página dos horários.</p>
	     	<p>Caso seja necessário, autorizo a ser contactado através dos telefones:</p>
	     </div>
     </div>
     <div class="row">
    	<div class="large-5 columns">
      		<label>Número de telefone
        		<input type="text" name="tel" id="tel"/>
      		</label>
    	</div>
    </div>
    <div class="row">
    	<div class="large-5 columns">
      		<label>Número de telemóvel
        		<input type="text" name="telf" id="telf"/>
      		</label>
    	</div>
    </div>
    <div class="row">
    	<div class="large-5 columns">
      		<label>Número de telefone do emprego
        		<input type="text" name="telft" id="telft"/>
      		</label>
    	</div>
    </div>
    		<p><b>Também afirmo que o meu educando entrega ao professor respetivo uma confirmação com a
    		minha assinatura como tomei conhecimento da inscrição.</b></p>
    		<br>

  <button type="submit" class="button small radius">Inscrever</button>

  		<br>
  		<hr>
  <p><b>Informações complementares:</b></p>
  <p>Todos os alunos inscritos em grupos-equipa deverão comprovar a aptidão para a prática da respetiva modalidade, 
  por via de atestado médico.<br>Em funçãoda idade dos alunos, da distribuição geográfica dos médicos assistentes e 
  dos centros de medicina desportiva, competirá às respetivas famílias decidir qual o procedimento mais adequado 
  para a obtenção do atestado médico referido.<br>A não entrega do atestado médico será da responsabilidade do Encarregado 
  de Educação.</p>

  <script>
   		function verificarEscalao()
   		{	
	   		var d1 = new Date().getFullYear(); //"now"
	   		var nasc = document.getElementById("nascimento").value;
			//var d2 = new Date(nasc.replace(/-/g,'/'));
			var idade = (d1-nasc);
			//var seconds = miliseconds/1000;
			//var numyears = Math.floor(seconds / 31536000);
			//var cenas new Date().getFullYear();

			if(idade>=17)
			{
				document.getElementById('escalao').value = ("Júniores");
			}
			else if(idade==15 || idade==16)
			{
				document.getElementById('escalao').value = ("Juvenis");
			}
			else if(idade==13 || idade==14)
			{
				document.getElementById('escalao').value = ("Iniciados");
			}
			else if(idade==11 || idade==12)
			{
				document.getElementById('escalao').value = ("Infantis");
			}
			
		}
  		
  </script>

</div>
</div>
</form>







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