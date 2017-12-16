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
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.js"></script><style type="text/css"></style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>




<script type="text/javascript">
$(window).load(function(){
var $rows = $('#tabela tr');
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


<?php 

        $username = "root";
        $password = "";
        $hostname="localhost";
        
        $conn = mysql_connect('localhost','root','')or die("Error");
        mysql_select_db('pap_leonardo', $conn);

        $result = "SELECT nome_aluno,n_processo,escalao,ano,turma,n_turma,modalidade,autorizacao,EE,CCEE,telefone,telemovel,nascimento,telefonee,data_inscricao FROM inscricao_alunos WHERE inscrito=1 ORDER BY modalidade ASC,n_processo ASC";
         mysql_set_charset("UTF8");
		$rs = mysql_query($result);
?>

<div class="row">
<div class="large-12 columns">
<br>

	<input type="text" id="search" placeholder="Pesquisar" />

	<div align="center">
    	<input type="button" class="button tiny radius" value="Imprimir" onclick="PrintElem('#print')" />
    </div>

</div>
</div>


<div id="print" name="print">
<br>
<table id="" align="center">
  <thead>
    <tr>
      <th width="200">Nome</th>
      <th width="120">Data de nascimento</th>
      <th width="120">Escalão</th>
      <th width="120">Nº Processo</th>
      <th width="80">Ano</th>
      <th width="80">Turma</th>
      <th width="80">Número</th>
      <th width="120">Modalidade</th>
      <th width="120">fotografias</th>
      <th width="140">Encarregado de Educação</th>
      <th width="120">CC do Encarregado de educação</th>
      <th width="120">Telefone do EE</th>
      <th width="120">Telemóvel do EE</th>
      <th width="120">Telefone de Emprego</th>
      <th width="120">Data de Inscrição</th>
    </tr>
  </thead>
  </table>
  <table id="tabela" align="center">
  <?php
  while($row = mysql_fetch_array($rs))
	{
	   echo  "<tr>";
	   echo   "<td width='200'>" . $row['nome_aluno'] ."</td>";
	   echo   "<td width='120'>" . $row['nascimento'] ."</td>";
	   echo   "<td width='120'>" . $row['escalao'] ."</td>";
	   echo   "<td width='120'>" . $row['n_processo'] ."</td>";
	   echo   "<td width='80'>" . $row['ano'] ."</td>";
	   echo   "<td width='80'>" . $row['turma'] ."</td>";
	   echo   "<td width='80'>" . $row['n_turma'] ."</td>";
	   echo   "<td width='120'>" . $row['modalidade'] ."</td>";
	   echo   "<td width='120'>" . $row['autorizacao'] ."</td>";
	   echo   "<td width='140'>" . $row['EE'] ."</td>";
	   echo   "<td width='120'>" . $row['CCEE'] ."</td>";
	   echo   "<td width='120'>" . $row['telefone'] ."</td>";
	   echo   "<td width='120'>" . $row['telemovel'] ."</td>";
	   echo   "<td width='120'>" . $row['telefonee'] ."</td>";
	   echo   "<td width='120'>" . $row['data_inscricao'] ."</td>";
	   echo "</tr>";
	}
    ?>
</table>
</div>








 








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