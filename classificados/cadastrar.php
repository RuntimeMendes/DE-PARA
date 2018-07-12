<!DOCTYPE html>
<html lang="pt_BR">
    <head>
        <!--<meta charset="utf-8">-->
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>SJCC-Classificados</title>
        <!--Bootstrap core CSS-->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">	
        <link rel="stylesheet" type="text/css" href="DataTable/dataTables.css"/>
        <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="http://www.datatables.net/rss.xml">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">	
        
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>

        <!-- Custom styles for this template -->
        <!-- <script src="DataTable/jQuery-1.12.3/jquery.min.js"></script>         -->
        <!-- <script src="DataTable/DataTables-1.10.16/js/formulario.js"></script> -->
        <!-- <script src="DataTable/DataTables-1.10.16/js/jquery-1.10.2.js"></script>         -->
        <script src="DataTable/DataTables-1.10.16/js/jquery.dataTables.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.quicksearch/2.3.1/jquery.quicksearch.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script> 

        <script src="js/cadastrar.js"></script>
        <script src="js/mensagem.js"></script>
        <!-- <script src="formulario.js"></script> -->
        <script src="vendor/typeahead/typeahead.bundle.js"></script> 
        <script type="text/javascript">
         
       </script>

    </head>
    <body>
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="index.php">  ioooClassificados JC</a>
            </div>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="index.php">DE / PARA <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link active" href="exibeXml.php" target="_blank"> XML  </span></a>    
            </div>
        </nav>

        <!-- Page Content -->
        <section class="py-5">
            <br> 	                  
            <div class=text-center>
                <h3>Erros de De-Para</h3></p>
                <h4>Aqui é possivel consultar as linhas que não consta no XML para integração.</h4>
                </div>					              
            <br>
            <ul>                
		<?php
        
        include 'mostra_erros.php';
        $arquivo_sel = $_GET['arquivo'];
	
        function unique_multidim_array($array, $key) { 
				$temp_array = array(); 
				$i = 0; 
				$key_array = array(); 
				
				foreach($array as $val) { 
					if (!in_array($val[$key], $key_array)) { 
						$key_array[$i] = $val[$key]; 
						$temp_array[$i] = $val; 
					} 
					$i++; 
				} 
				return $temp_array; 
		} 
		class LinhaLog {
			   
            public $de = ''; 
            public $para = ''; 				
    	 }

        $ArrLog = Array();
		
    foreach (new DirectoryIterator('C:/xampp/htdocs/depara.sjcc.com.br/classificados/log') as $fileInfo) {
        //Se for . ou .. pular para a próxima interação do laço.	
	    $arquivo_dir = $fileInfo->getFilename();	 
        if(strcasecmp($arquivo_sel,md5($arquivo_dir)) == 0) {
		    $arquivo_path = $fileInfo->getPathname();//aqui onde pega o arquivo selecionado				
                  //var_dump($arquivo_path);
                  
		}
	}   
    $conteudo = file_get_contents($arquivo_path);
    $nomes = explode("\n", $conteudo);
 ?>

       
    <form id="formCadastrar" action="xt_cadastrar.php">
        <div class="modal-footer"></div>
        <div id="form-messages">

	    <table id="example" class="table table-striped table-bordered">
            <thead>
                <tr>						  
                    <th>DE</th>
                    <th>PARA</th> 									  
                    <th>Situação</th>				
                </tr>
            </thead>
				
<?php
					
 //X:\ producao
 //X:\XMLFromSectionToSection.xml
 //34.201.193.241/Log$'
 //34.201.193.241/Xml$/XMLFromSectionToSection.xml
   
    $doc = simplexml_load_file('XMLFromSectionToSection.xml') or die("Arquivo não encontrado");

      

    foreach ($nomes as $nome) {

        if (strpos($nome,'Seção:') !== false) {

            $linha = explode(",", $nome);
            $data = substr($nome, 0, 20);  // ler ate os primeiros caracteres ate data								 

        $de = substr($linha[0], 10);
            //var_dump($de);
            $para = substr($linha[0], 39);
            $aux = explode('"', $para);
        //var_dump($aux);
            $para = $aux[2];
            $para = substr($para, 1, 50);
            //var_dump($para);
            $de = $aux[0];

            $anuncio = substr($linha[1], 13);
            $situacao = $linha[2];

            $ArrLog[] = array("de" => $de, "status" => "");
        }
    }

    $ArrLog = unique_multidim_array($ArrLog, 'de');

    foreach ($ArrLog as $linha):	 
        for ($x = 0; $x < count($doc); $x++) {
            $condicaoSection = $doc->field[$x]["source"];
            $linha["status"] ="Não Encontrado !";

            if ($condicaoSection == $linha["de"]) {
                $x = count($doc) + 1;
                $linha["status"] = "existe";
            }
        }

        if ($linha["status"] == "existe") continue;
?>

    <tr>  
        <td name="source"> 
            <input id="typeahead" name=source[] class="typeahead" type="hidden" value="<?php echo $linha["de"];?>"> 
        <?php echo $linha["de"];?> 
        </td>
        <td style="text-align:center;"> 
            <?php if ($linha["status"] != "existe"): ?>
                <input id="typeahead" name=destination[] class="typeahead" type="text" size="75"  placeholder="Sobreescrever"> 
            <?php else: ?>
                -
            <?php endif;?>
            </td>
            <td>       
                <?php if ($linha["status"] == "existe"): ?>
                    <span class="badge badge-success">Existe</span>
                <?php else: ?>    
                    <span class="badge badge-danger">Não Existe</span>
            </td>
        <?php endif; ?>
    </tr>
    <?php endforeach; ?>

    <div align="center"> 
        <!--  onclick="return validar_form_cadastro()" -->
        <button id="btnCadastrar" type="submit" class="class=btn btn-success"  onClick="mensagem()">Enviar</button>
        <!-- <button id="btnCadastrar" type="submit" onclick="executar()"  id="btnEnviarDados"  class="btn btn-secondary" >Enviar</button> -->
        <button type="reset" class="btn btn-default"  value="Limpar">Limpar</button>
 
        </div>

    </tbody></table></div>
    

    

  </form>  

  </div>
	
<script type="text/javascript" charset="utf-8">

$(document).ready(function() {

var substringMatcher = function(strs) {
     return function findMatches(q,cb) {
        var matches, substringRegex;

    // an array that will be populated with substring matches
    matches = [];

    // regex used to determine if a string contains the substring `q`
    substrRegex = new RegExp(q,'i');

    // iterate through the pool of strings and for any string that
    // contains the substring `q`, add it to the `matches` array
    $.each(strs, function(i, str) {
      if (substrRegex.test(str)) {
        matches.push(str);
      }
    });
    cb(matches);

  };
};
     
 var states = ['Imóveis',
'Imóveis;Apartamentos Alugam-se',
'Imóveis;Apartamentos Alugam-se;Abreu e Lima',
'Imóveis;Apartamentos Alugam-se;Aflitos',
'Imóveis;Apartamentos Alugam-se;Afogados',
'Imóveis;Apartamentos Alugam-se;Bultrins',
'Imóveis;Apartamentos Alugam-se;Cabanga','Imóveis;Terrenos'];




 

$('.typeahead').typeahead({
  hint: true,
  highlight: true,
  minLength: 1
},
{
  name:'states',
  source: substringMatcher(states)
});

var procura = "";
	var table = $('#example').DataTable( { 

		"language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Portuguese-Brasil.json"			
		
		}		
    });
	
	$("#example")//identificador tabela
	        .click(function pega(y) {
				
	     	procura = y.target.text;  
			 
		    $('#inputDE').val(procura);
    		$("#exampleModal").modal("show");
		   console.log('Clicou DE', procura);
         
		 
		  });


         


     
	$("#selectable")//identificador do select	
	.click(function(e) {
		var procura = e.target.value;
		  console.log('Clicou', e.target.value);
        $.fn.dataTable.ext.search.push(
            function( settings, data, dataIndex ) {
            return (procura == "Situacao") || (data[2]==procura);//array - 0 - 1 - 2->situacao
                
            }     
        );
    table.draw();
      $.fn.dataTable.ext.search.pop();
   });

  
 
   
   
});

	


			
  
</script>
			   
	</section>
			<!-- Footer -->
			<footer class="py-5 bg-dark">
				<div class="container">
					<p class="m-0 text-center text-white">Sistema Jornal do Commercio &copy; Website 2018</p>
				</div>
				<!-- /.container -->
			</footer>
			<!-- Bootstrap core JavaScript -->
		<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>	
			
		</body>
	</html>
