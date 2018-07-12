<!DOCTYPE html>
<html lang="pt_BR">
    <head>
        <!--<meta charset="utf-8">-->
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

         <?php header('Content-type: text/html; charset=utf-8');
           setlocale(LC_ALL, 'pt_BR.utf-8', 'pt_BR', 'Portuguese_Brazil');     ?>
		

        <title>SJCC-Classificados</title>
        <!--Bootstrap core CSS-->
        <!--<link rel="stylesheet"href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">-->
      <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">	
	  <link rel="stylesheet" type="text/css" href="DataTable/dataTables.css"/>
      <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="http://www.datatables.net/rss.xml">
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">	

        <!-- Custom styles for this template -->
		<script src="DataTable/jQuery-1.12.3/jquery.min.js"></script>
        <script src="DataTable/DataTables-1.10.16/js/formulario.js"></script>
        

        <script src="formulario.js"></script>
         <script src="DataTable/DataTables-1.10.16/js/jquery-1.10.2.js"></script>
      		
            <script src="DataTable/DataTables-1.10.16/js/jquery.dataTables.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.quicksearch/2.3.1/jquery.quicksearch.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script> 
			<script src="vendor/typeahead/typeahead.bundle.js"></script> 
         
         
		
       <!-- <link href="css/full-slider.css" rel="stylesheet">-->			
       

    </head>
    <body>
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="index.php">Classificados JC</a></div>
              <!--  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
					<span class="navbar-toggler-icon"></span>
                </button>-->
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
        <a class="nav-item nav-link active" href="index.php">DE / PARA <span class="sr-only">(current)</span></a>
	    <a class="nav-item nav-link active" href="exibeXml.php" target="_blank"> XML  </span></a>
	  
         </div>		 
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

                <div align="right">            

                    Selecione :
					
                    <label>				   
                        <select class="form-control form-control-sm" id="selectable">
                            <option>Situacao</option>
                            <option value="Existe">Existe</option>
                            <option value="Não Existe">Não Existe</option>

                        </select>

                    </label>
					
                </div>		
				
		<?php
        
include 'mostra_erros.php';
header('Content-type: text/html; charset=utf-8');
setlocale(LC_ALL, 'pt_BR.utf-8', 'pt_BR', 'Portuguese_Brazil');
		   
           $arquivo_sel = $_GET['arquivo'];
	
		   //var_dump($arquivo_sel).exit();
		   

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
       //C:\xamp2\htdocs\testtoclassificados\startbootstrap\log

       //L:/ - producao
	  //34.201.193.241/Log$
         //C:\xamp2\htdocs\testtoclassificados\startbootstrap\log
		
foreach (new DirectoryIterator('C:/xamp2/htdocs/depara.sjcc.com.br/classificados/log') as $fileInfo) {
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
  <!-- echo'<! Modal antigo modal -->    

<!--<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
       <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Escrever no XML</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
        </button>
            </div>
      <div class="modal-body">-->

   
<form action="leitor3.php" method="POST">  
      <div class="col-sm-10" >
        <h5>DE:</h5>	  
          <input type="text" id="inputDE"  class="form-control" required="required" placeholder="Sobreescrever" name=source ></input><br>
    </div>
<div class="col-sm-10" id ="the-basics">      
	   <h5>PARA:</h5>
 
	  <input id="typeahead" class="typeahead" type ="text"  required="required" size="75" placeholder = "Sobreescrever"   name=destination>
	  <br>
	
	  
</div>
</div>
    <div class="modal-footer"></div>
        
          <!-- <button type="submit" id="success-btn" class="btn btn-default" >Enviar</button>
		   <button type="reset" class="btn btn-secondary"  value="Limpar">Limpar</button>-->
		   <!--<button type="button" class="" data-dismiss="modal">Fechar</button>-->

		  
          </div>
         </div>
        </div>
    <div id="form-messages">
</div>

   

  <?php

$doc = new DOMDocument();
$doc->load('XMLFromSectionToSection.xml');

$arrayXmlCampos = $doc->getElementsByTagName( "field" );

$parent = $doc->getElementsByTagName('sectiontosection_configuration')->item(0);

/*
foreach($arrayXmlCampos as $objPropriedades )
{
    //echo $book->attributes[0]->name . " = " . $book->attributes[0]->value;
    //echo $objPropriedades->attributes[1]->name . " = " . $objPropriedades->attributes[1]->value;
    //echo $objPropriedades->attributes[2]->name . " = " . $objPropriedades->attributes[2]->value;
    
}			
*/
     //Adiciono os itens na classe filha

     $novo = $doc->createElement('field');						
        
    //if(($source!= null) && ($destination !=null)){
        
//if(isset($_POST['source']) && isset($_POST['destination'])){
            //$name = 'SECTION';
         // $source = $_POST["source"]; 			 
        //  $destination = $_POST["destination"];			

     if (isset($_POST['source'],$_POST['destination']))  {

        // print_r($_POST);

        
      //echo json_encode( array( "source" => $email, "destination" => $nome ) );



        
         $name = 'SECTION';
          $source = $_POST["source"]; 	//DE		 
         $destination = $_POST["destination"];//	PARA				
     
     
     //escrevendo os valores nos  atributos atributos do xml			 
     
     $nameAtt = $doc->createAttribute('name');
     $nameAtt->appendChild($doc->createTextNode($name));
     $sourceAtt = $doc->createAttribute('source');
     $sourceAtt->appendChild($doc->createTextNode($source));
      
      $destinationAtt= $doc->createAttribute('destination');
      $destinationAtt->appendChild($doc->createTextNode($destination));
     
       //Adiciono os dados aos atributos
       $novo->appendChild($nameAtt);
       $novo->appendChild($sourceAtt);
       $novo->appendChild($destinationAtt);
       
       //$novo->appendChild();		   
       
        $parent->appendChild($novo);			
        $parent->appendChild($doc->createTextNode("\n"));
        
        
       //Fecho o XML
       // $pai->appendChild($novo);
    

         //Salvo o XML
         //if($dom->save('.xml')){
             //salva os nos atributos do xml 
    
          
         // echo '<div id =enviado class="alert alert-success" role="alert">';
         //  echo 'Gravado no XML';
          //echo '</div>';		  
          
    $doc->save('XMLFromSectionToSection.xml');	

         }

  ?>

       



	<table id="example" class="table table-striped table-bordered">

				 <thead>
					    <tr>						  
						   <th>DE</th>
						   <th>PARA</th> 									  
						   <th>Situação</th>				
					    </tr>
				</thead>

    
<!---<button id="btn12" class="btn btn-secondary">Gravar Dados !!</button>  -->

				
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

            //"para" => $para, 
            
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
?>

    <tr>  
        <td name="source" > <?php echo $linha["de"];?> </td>
        <td style="text-align:center;"> 
            <?php if ($linha["status"] != "existe"): ?>
                <input id="typeahead" class = "typeahead" type ="text"  required="required" size="75" placeholder = "Sobreescrever" name=destination> 
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
    </tbody></table></div>
    

     <div align="center"> 
        
        <button type="submit" onclick="executar()"  id="btnEnviarDados"  class="btn btn-secondary" >Enviar</button>
        <button type="reset" class="btn btn-default"  value="Limpar">Limpar</button>
 
        </div>


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
'Imóveis;Apartamentos Alugam-se;Água Fria',
'Imóveis;Apartamentos Alugam-se;Aldeia',
'Imóveis;Apartamentos Alugam-se;Amparo',
'Imóveis;Apartamentos Alugam-se;Apipucos',
'Imóveis;Apartamentos Alugam-se;Areias',
'Imóveis;Apartamentos Alugam-se;Arruda',
'Imóveis;Apartamentos Alugam-se;Bairro Novo',
'Imóveis;Apartamentos Alugam-se;Barra de Jangada',
'Imóveis;Apartamentos Alugam-se;Barro',
'Imóveis;Apartamentos Alugam-se;Beberibe',
'Imóveis;Apartamentos Alugam-se;Benfica',
'Imóveis;Apartamentos Alugam-se;Boa Viagem 1 ou 2 quartos',
'Imóveis;Apartamentos Alugam-se;Boa Viagem 3 quartos',
'Imóveis;Apartamentos Alugam-se;Boa Viagem 4 ou mais quartos',
'Imóveis;Apartamentos Alugam-se;Boa Vista',
'Imóveis;Apartamentos Alugam-se;Bongi',
'Imóveis;Apartamentos Alugam-se;Bultrins',
'Imóveis;Apartamentos Alugam-se;Cabanga',
'Imóveis;Apartamentos Alugam-se;Cabo',
'Imóveis;Apartamentos Alugam-se;Cajueiro',
'Imóveis;Apartamentos Alugam-se;Camaragibe',
'Imóveis;Apartamentos Alugam-se;Campo Grande',
'Imóveis;Apartamentos Alugam-se;Candeias',
'Imóveis;Apartamentos Alugam-se;Capunga',
'Imóveis;Apartamentos Alugam-se;Caruaru',
'Imóveis;Apartamentos Alugam-se;Casa Amarela',
'Imóveis;Apartamentos Alugam-se;Casa Caiada',
'Imóveis;Apartamentos Alugam-se;Casa Forte',
'Imóveis;Apartamentos Alugam-se;Cavaleiro',
'Imóveis;Apartamentos Alugam-se;Caxangá',
'Imóveis;Apartamentos Alugam-se;Cidade Tabajara',
'Imóveis;Apartamentos Alugam-se;Cidade Universitária',
'Imóveis;Apartamentos Alugam-se;Coelhos',
'Imóveis;Apartamentos Alugam-se;Conceição',
'Imóveis;Apartamentos Alugam-se;Coqueiral',
'Imóveis;Apartamentos Alugam-se;Cordeiro',
'Imóveis;Apartamentos Alugam-se;Curado',
'Imóveis;Apartamentos Alugam-se;Derby',
'Imóveis;Apartamentos Alugam-se;Dois Irmãos',
'Imóveis;Apartamentos Alugam-se;Dois Unidos',
'Imóveis;Apartamentos Alugam-se;Encruzilhada',
'Imóveis;Apartamentos Alugam-se;Engenho do Meio',
'Imóveis;Apartamentos Alugam-se;Espinheiro',
'Imóveis;Apartamentos Alugam-se;Estância',
'Imóveis;Apartamentos Alugam-se;Fundão',
'Imóveis;Apartamentos Alugam-se;Graças',
'Imóveis;Apartamentos Alugam-se;Gravatá',
'Imóveis;Apartamentos Alugam-se;Hipódromo',
'Imóveis;Apartamentos Alugam-se;Ibura',
'Imóveis;Apartamentos Alugam-se;Igarassu',
'Imóveis;Apartamentos Alugam-se;Ilha do Leite',
'Imóveis;Apartamentos Alugam-se;Ilha do Retiro',
'Imóveis;Apartamentos Alugam-se;Imbiribeira',
'Imóveis;Apartamentos Alugam-se;Ipsep',
'Imóveis;Apartamentos Alugam-se;Iputinga',
'Imóveis;Apartamentos Alugam-se;Itapissuma',
'Imóveis;Apartamentos Alugam-se;Jaboatão dos Guararapes',
'Imóveis;Apartamentos Alugam-se;Janga',
'Imóveis;Apartamentos Alugam-se;Jaqueira',
'Imóveis;Apartamentos Alugam-se;Jardim Atlântico',
'Imóveis;Apartamentos Alugam-se;Jardim Brasil',
'Imóveis;Apartamentos Alugam-se;Jardim Fragoso',
'Imóveis;Apartamentos Alugam-se;Jardim São Paulo',
'Imóveis;Apartamentos Alugam-se;Jiquiá',
'Imóveis;Apartamentos Alugam-se;Jordão',
'Imóveis;Apartamentos Alugam-se;Macaxeira',
'Imóveis;Apartamentos Alugam-se;Madalena',
'Imóveis;Apartamentos Alugam-se;Mangabeira',
'Imóveis;Apartamentos Alugam-se;Mangueira',
'Imóveis;Apartamentos Alugam-se;Maranguape',
'Imóveis;Apartamentos Alugam-se;Maria Farinha',
'Imóveis;Apartamentos Alugam-se;Muribeca',
'Imóveis;Apartamentos Alugam-se;Mustardinha',
'Imóveis;Apartamentos Alugam-se;Nova Descoberta',
'Imóveis;Apartamentos Alugam-se;Olinda',
'Imóveis;Apartamentos Alugam-se;Ouro Preto',
'Imóveis;Apartamentos Alugam-se;Outras Localidades',
'Imóveis;Apartamentos Alugam-se;Paissandu',
'Imóveis;Apartamentos Alugam-se;Parnamirim',
'Imóveis;Apartamentos Alugam-se;Pau Amarelo',
'Imóveis;Apartamentos Alugam-se;Paulista',
'Imóveis;Apartamentos Alugam-se;Peixinhos',
'Imóveis;Apartamentos Alugam-se;Piedade',
'Imóveis;Apartamentos Alugam-se;Pina',
'Imóveis;Apartamentos Alugam-se;Poço da Panela',
'Imóveis;Apartamentos Alugam-se;Ponto de Parada',
'Imóveis;Apartamentos Alugam-se;Porta Larga',
'Imóveis;Apartamentos Alugam-se;Porto da Madeira',
'Imóveis;Apartamentos Alugam-se;Prado',
'Imóveis;Apartamentos Alugam-se;Prazeres',
'Imóveis;Apartamentos Alugam-se;Privês',
'Imóveis;Apartamentos Alugam-se;Rio Doce',
'Imóveis;Apartamentos Alugam-se;Rosarinho',
'Imóveis;Apartamentos Alugam-se;San Martin',
'Imóveis;Apartamentos Alugam-se;Santo Amaro',
'Imóveis;Apartamentos Alugam-se;Santo Antônio',
'Imóveis;Apartamentos Alugam-se;São José',
'Imóveis;Apartamentos Alugam-se;São Lourenço da Mata',
'Imóveis;Apartamentos Alugam-se;Setúbal',
'Imóveis;Apartamentos Alugam-se;Socorro',
'Imóveis;Apartamentos Alugam-se;Sucupira',
'Imóveis;Apartamentos Alugam-se;Tamarineira',
'Imóveis;Apartamentos Alugam-se;Tejipió',
'Imóveis;Apartamentos Alugam-se;Torre',
'Imóveis;Apartamentos Alugam-se;Torreão',
'Imóveis;Apartamentos Alugam-se;Torrões',
'Imóveis;Apartamentos Alugam-se;Totó',
'Imóveis;Apartamentos Alugam-se;Várzea',
'Imóveis;Apartamentos Alugam-se;Vasco da Gama',
'Imóveis;Apartamentos Alugam-se;Zumbi',
'Imóveis;Apartamentos Vendem-se',
'Imóveis;Apartamentos Vendem-se;Abreu e Lima',
'Imóveis;Apartamentos Vendem-se;Aflitos',
'Imóveis;Apartamentos Vendem-se;Afogados',
'Imóveis;Apartamentos Vendem-se;Água Fria',
'Imóveis;Apartamentos Vendem-se;Aldeia',
'Imóveis;Apartamentos Vendem-se;Amparo',
'Imóveis;Apartamentos Vendem-se;Apipucos',
'Imóveis;Apartamentos Vendem-se;Areias',
'Imóveis;Apartamentos Vendem-se;Arruda',
'Imóveis;Apartamentos Vendem-se;Bairro Novo',
'Imóveis;Apartamentos Vendem-se;Barra de Jangada',
'Imóveis;Apartamentos Vendem-se;Barro',
'Imóveis;Apartamentos Vendem-se;Beberibe',
'Imóveis;Apartamentos Vendem-se;Benfica',
'Imóveis;Apartamentos Vendem-se;Boa Viagem 1 ou 2 quartos',
'Imóveis;Apartamentos Vendem-se;Boa Viagem 3 quartos',
'Imóveis;Apartamentos Vendem-se;Boa Viagem 4 ou mais quartos',
'Imóveis;Apartamentos Vendem-se;Boa Vista',
'Imóveis;Apartamentos Vendem-se;Bongi',
'Imóveis;Apartamentos Vendem-se;Bultrins',
'Imóveis;Apartamentos Vendem-se;Cabanga',
'Imóveis;Apartamentos Vendem-se;Cabo',
'Imóveis;Apartamentos Vendem-se;Cajueiro',
'Imóveis;Apartamentos Vendem-se;Camaragibe',
'Imóveis;Apartamentos Vendem-se;Campo Grande',
'Imóveis;Apartamentos Vendem-se;Candeias',
'Imóveis;Apartamentos Vendem-se;Capunga',
'Imóveis;Apartamentos Vendem-se;Caruaru',
'Imóveis;Apartamentos Vendem-se;Casa Amarela',
'Imóveis;Apartamentos Vendem-se;Casa Caiada',
'Imóveis;Apartamentos Vendem-se;Casa Forte',
'Imóveis;Apartamentos Vendem-se;Cavaleiro',
'Imóveis;Apartamentos Vendem-se;Caxangá',
'Imóveis;Apartamentos Vendem-se;Cidade Tabajara',
'Imóveis;Apartamentos Vendem-se;Cidade Universitária',
'Imóveis;Apartamentos Vendem-se;Coelhos',
'Imóveis;Apartamentos Vendem-se;Conceição',
'Imóveis;Apartamentos Vendem-se;Coqueiral',
'Imóveis;Apartamentos Vendem-se;Cordeiro',
'Imóveis;Apartamentos Vendem-se;Curado',
'Imóveis;Apartamentos Vendem-se;Derby',
'Imóveis;Apartamentos Vendem-se;Dois Irmãos',
'Imóveis;Apartamentos Vendem-se;Dois Unidos',
'Imóveis;Apartamentos Vendem-se;Encruzilhada',
'Imóveis;Apartamentos Vendem-se;Engenho do Meio',
'Imóveis;Apartamentos Vendem-se;Espinheiro',
'Imóveis;Apartamentos Vendem-se;Estância',
'Imóveis;Apartamentos Vendem-se;Fundão',
'Imóveis;Apartamentos Vendem-se;Graças',
'Imóveis;Apartamentos Vendem-se;Gravatá',
'Imóveis;Apartamentos Vendem-se;Hipódromo',
'Imóveis;Apartamentos Vendem-se;Ibura',
'Imóveis;Apartamentos Vendem-se;Igarassu',
'Imóveis;Apartamentos Vendem-se;Ilha do Leite',
'Imóveis;Apartamentos Vendem-se;Ilha do Retiro',
'Imóveis;Apartamentos Vendem-se;Imbiribeira',
'Imóveis;Apartamentos Vendem-se;Ipsep',
'Imóveis;Apartamentos Vendem-se;Iputinga',
'Imóveis;Apartamentos Vendem-se;Itapissuma',
'Imóveis;Apartamentos Vendem-se;Jaboatão dos Guararapes',
'Imóveis;Apartamentos Vendem-se;Janga',
'Imóveis;Apartamentos Vendem-se;Jaqueira',
'Imóveis;Apartamentos Vendem-se;Jardim Atlântico',
'Imóveis;Apartamentos Vendem-se;Jardim Brasil',
'Imóveis;Apartamentos Vendem-se;Jardim Fragoso',
'Imóveis;Apartamentos Vendem-se;Jardim São Paulo',
'Imóveis;Apartamentos Vendem-se;Jiquiá',
'Imóveis;Apartamentos Vendem-se;Jordão',
'Imóveis;Apartamentos Vendem-se;Macaxeira',
'Imóveis;Apartamentos Vendem-se;Madalena',
'Imóveis;Apartamentos Vendem-se;Mangabeira',
'Imóveis;Apartamentos Vendem-se;Mangueira',
'Imóveis;Apartamentos Vendem-se;Maranguape',
'Imóveis;Apartamentos Vendem-se;Maria Farinha',
'Imóveis;Apartamentos Vendem-se;Muribeca',
'Imóveis;Apartamentos Vendem-se;Mustardinha',
'Imóveis;Apartamentos Vendem-se;Nova Descoberta',
'Imóveis;Apartamentos Vendem-se;Olinda',
'Imóveis;Apartamentos Vendem-se;Ouro Preto',
'Imóveis;Apartamentos Vendem-se;Outras Localidades',
'Imóveis;Apartamentos Vendem-se;Paissandu',
'Imóveis;Apartamentos Vendem-se;Parnamirim',
'Imóveis;Apartamentos Vendem-se;Pau Amarelo',
'Imóveis;Apartamentos Vendem-se;Paulista',
'Imóveis;Apartamentos Vendem-se;Peixinhos',
'Imóveis;Apartamentos Vendem-se;Piedade',
'Imóveis;Apartamentos Vendem-se;Pina',
'Imóveis;Apartamentos Vendem-se;Poço da Panela',
'Imóveis;Apartamentos Vendem-se;Ponto de Parada',
'Imóveis;Apartamentos Vendem-se;Porta Larga',
'Imóveis;Apartamentos Vendem-se;Porto da Madeira',
'Imóveis;Apartamentos Vendem-se;Prado',
'Imóveis;Apartamentos Vendem-se;Prazeres',
'Imóveis;Apartamentos Vendem-se;Privês',
'Imóveis;Apartamentos Vendem-se;Rio Doce',
'Imóveis;Apartamentos Vendem-se;Rosarinho',
'Imóveis;Apartamentos Vendem-se;San Martin',
'Imóveis;Apartamentos Vendem-se;Santo Amaro',
'Imóveis;Apartamentos Vendem-se;Santo Antônio',
'Imóveis;Apartamentos Vendem-se;São José',
'Imóveis;Apartamentos Vendem-se;São Lourenço da Mata',
'Imóveis;Apartamentos Vendem-se;Setúbal',
'Imóveis;Apartamentos Vendem-se;Socorro',
'Imóveis;Apartamentos Vendem-se;Sucupira',
'Imóveis;Apartamentos Vendem-se;Tamarineira',
'Imóveis;Apartamentos Vendem-se;Tejipió',
'Imóveis;Apartamentos Vendem-se;Torre',
'Imóveis;Apartamentos Vendem-se;Torreão',
'Imóveis;Apartamentos Vendem-se;Torrões',
'Imóveis;Apartamentos Vendem-se;Totó',
'Imóveis;Apartamentos Vendem-se;Várzea',
'Imóveis;Apartamentos Vendem-se;Vasco da Gama',
'Imóveis;Apartamentos Vendem-se;Zumbi',
'Imóveis;Casas Alugam-se',
'Imóveis;Casas Alugam-se;Abreu e Lima',
'Imóveis;Casas Alugam-se;Aflitos',
'Imóveis;Casas Alugam-se;Afogados',
'Imóveis;Casas Alugam-se;Água Fria',
'Imóveis;Casas Alugam-se;Aldeia',
'Imóveis;Casas Alugam-se;Amparo',
'Imóveis;Casas Alugam-se;Apipucos',
'Imóveis;Casas Alugam-se;Areias',
'Imóveis;Casas Alugam-se;Arruda',
'Imóveis;Casas Alugam-se;Bairro Novo',
'Imóveis;Casas Alugam-se;Barra de Jangada',
'Imóveis;Casas Alugam-se;Barro',
'Imóveis;Casas Alugam-se;Beberibe',
'Imóveis;Casas Alugam-se;Benfica',
'Imóveis;Casas Alugam-se;Boa Viagem 1 ou 2 quartos',
'Imóveis;Casas Alugam-se;Boa Viagem 3 quartos',
'Imóveis;Casas Alugam-se;Boa Viagem 4 ou mais quartos',
'Imóveis;Casas Alugam-se;Boa Vista',
'Imóveis;Casas Alugam-se;Bongi',
'Imóveis;Casas Alugam-se;Bultrins',
'Imóveis;Casas Alugam-se;Cabanga',
'Imóveis;Casas Alugam-se;Cabo',
'Imóveis;Casas Alugam-se;Cajueiro',
'Imóveis;Casas Alugam-se;Camaragibe',
'Imóveis;Casas Alugam-se;Campo Grande',
'Imóveis;Casas Alugam-se;Candeias',
'Imóveis;Casas Alugam-se;Capunga',
'Imóveis;Casas Alugam-se;Caruaru',
'Imóveis;Casas Alugam-se;Casa Amarela',
'Imóveis;Casas Alugam-se;Casa Caiada',
'Imóveis;Casas Alugam-se;Casa Forte',
'Imóveis;Casas Alugam-se;Cavaleiro',
'Imóveis;Casas Alugam-se;Caxangá',
'Imóveis;Casas Alugam-se;Cidade Tabajara',
'Imóveis;Casas Alugam-se;Cidade Universitária',
'Imóveis;Casas Alugam-se;Coelhos',
'Imóveis;Casas Alugam-se;Conceição',
'Imóveis;Casas Alugam-se;Coqueiral',
'Imóveis;Casas Alugam-se;Cordeiro',
'Imóveis;Casas Alugam-se;Curado',
'Imóveis;Casas Alugam-se;Derby',
'Imóveis;Casas Alugam-se;Dois Irmãos',
'Imóveis;Casas Alugam-se;Dois Unidos',
'Imóveis;Casas Alugam-se;Encruzilhada',
'Imóveis;Casas Alugam-se;Engenho do Meio',
'Imóveis;Casas Alugam-se;Espinheiro',
'Imóveis;Casas Alugam-se;Estância',
'Imóveis;Casas Alugam-se;Fundão',
'Imóveis;Casas Alugam-se;Graças',
'Imóveis;Casas Alugam-se;Gravatá',
'Imóveis;Casas Alugam-se;Hipódromo',
'Imóveis;Casas Alugam-se;Ibura',
'Imóveis;Casas Alugam-se;Igarassu',
'Imóveis;Casas Alugam-se;Ilha do Leite',
'Imóveis;Casas Alugam-se;Ilha do Retiro',
'Imóveis;Casas Alugam-se;Imbiribeira',
'Imóveis;Casas Alugam-se;Ipsep',
'Imóveis;Casas Alugam-se;Iputinga',
'Imóveis;Casas Alugam-se;Itapissuma',
'Imóveis;Casas Alugam-se;Jaboatão dos Guararapes',
'Imóveis;Casas Alugam-se;Janga',
'Imóveis;Casas Alugam-se;Jaqueira',
'Imóveis;Casas Alugam-se;Jardim Atlântico',
'Imóveis;Casas Alugam-se;Jardim Brasil',
'Imóveis;Casas Alugam-se;Jardim Fragoso',
'Imóveis;Casas Alugam-se;Jardim São Paulo',
'Imóveis;Casas Alugam-se;Jiquiá',
'Imóveis;Casas Alugam-se;Jordão',
'Imóveis;Casas Alugam-se;Macaxeira',
'Imóveis;Casas Alugam-se;Madalena',
'Imóveis;Casas Alugam-se;Mangabeira',
'Imóveis;Casas Alugam-se;Mangueira',
'Imóveis;Casas Alugam-se;Maranguape',
'Imóveis;Casas Alugam-se;Maria Farinha',
'Imóveis;Casas Alugam-se;Muribeca',
'Imóveis;Casas Alugam-se;Mustardinha',
'Imóveis;Casas Alugam-se;Nova Descoberta',
'Imóveis;Casas Alugam-se;Olinda',
'Imóveis;Casas Alugam-se;Ouro Preto',
'Imóveis;Casas Alugam-se;Outras Localidades',
'Imóveis;Casas Alugam-se;Paissandu',
'Imóveis;Casas Alugam-se;Parnamirim',
'Imóveis;Casas Alugam-se;Pau Amarelo',
'Imóveis;Casas Alugam-se;Paulista',
'Imóveis;Casas Alugam-se;Peixinhos',
'Imóveis;Casas Alugam-se;Piedade',
'Imóveis;Casas Alugam-se;Pina',
'Imóveis;Casas Alugam-se;Poço da Panela',
'Imóveis;Casas Alugam-se;Ponto de Parada',
'Imóveis;Casas Alugam-se;Porta Larga',
'Imóveis;Casas Alugam-se;Porto da Madeira',
'Imóveis;Casas Alugam-se;Prado',
'Imóveis;Casas Alugam-se;Prazeres',
'Imóveis;Casas Alugam-se;Privês',
'Imóveis;Casas Alugam-se;Rio Doce',
'Imóveis;Casas Alugam-se;Rosarinho',
'Imóveis;Casas Alugam-se;San Martin',
'Imóveis;Casas Alugam-se;Santo Amaro',
'Imóveis;Casas Alugam-se;Santo Antônio',
'Imóveis;Casas Alugam-se;São José',
'Imóveis;Casas Alugam-se;São Lourenço da Mata',
'Imóveis;Casas Alugam-se;Setúbal',
'Imóveis;Casas Alugam-se;Socorro',
'Imóveis;Casas Alugam-se;Sucupira',
'Imóveis;Casas Alugam-se;Tamarineira',
'Imóveis;Casas Alugam-se;Tejipió',
'Imóveis;Casas Alugam-se;Torre',
'Imóveis;Casas Alugam-se;Torreão',
'Imóveis;Casas Alugam-se;Torrões',
'Imóveis;Casas Alugam-se;Totó',
'Imóveis;Casas Alugam-se;Várzea',
'Imóveis;Casas Alugam-se;Vasco da Gama',
'Imóveis;Casas Alugam-se;Zumbi',
'Imóveis;Casas Vendem-se',
'Imóveis;Casas Vendem-se;Abreu e Lima',
'Imóveis;Casas Vendem-se;Aflitos',
'Imóveis;Casas Vendem-se;Afogados',
'Imóveis;Casas Vendem-se;Água Fria',
'Imóveis;Casas Vendem-se;Aldeia',
'Imóveis;Casas Vendem-se;Amparo',
'Imóveis;Casas Vendem-se;Apipucos',
'Imóveis;Casas Vendem-se;Areias',
'Imóveis;Casas Vendem-se;Arruda',
'Imóveis;Casas Vendem-se;Bairro Novo',
'Imóveis;Casas Vendem-se;Barra de Jangada',
'Imóveis;Casas Vendem-se;Barro',
'Imóveis;Casas Vendem-se;Beberibe',
'Imóveis;Casas Vendem-se;Benfica',
'Imóveis;Casas Vendem-se;Boa Viagem 1 ou 2 quartos',
'Imóveis;Casas Vendem-se;Boa Viagem 3 quartos',
'Imóveis;Casas Vendem-se;Boa Viagem 4 ou mais quartos',
'Imóveis;Casas Vendem-se;Boa Vista',
'Imóveis;Casas Vendem-se;Bongi',
'Imóveis;Casas Vendem-se;Bultrins',
'Imóveis;Casas Vendem-se;Cabanga',
'Imóveis;Casas Vendem-se;Cabo',
'Imóveis;Casas Vendem-se;Cajueiro',
'Imóveis;Casas Vendem-se;Camaragibe',
'Imóveis;Casas Vendem-se;Campo Grande',
'Imóveis;Casas Vendem-se;Candeias',
'Imóveis;Casas Vendem-se;Capunga',
'Imóveis;Casas Vendem-se;Caruaru',
'Imóveis;Casas Vendem-se;Casa Amarela',
'Imóveis;Casas Vendem-se;Casa Caiada',
'Imóveis;Casas Vendem-se;Casa Forte',
'Imóveis;Casas Vendem-se;Cavaleiro',
'Imóveis;Casas Vendem-se;Caxangá',
'Imóveis;Casas Vendem-se;Cidade Tabajara',
'Imóveis;Casas Vendem-se;Cidade Universitária',
'Imóveis;Casas Vendem-se;Coelhos',
'Imóveis;Casas Vendem-se;Conceição',
'Imóveis;Casas Vendem-se;Coqueiral',
'Imóveis;Casas Vendem-se;Cordeiro',
'Imóveis;Casas Vendem-se;Curado',
'Imóveis;Casas Vendem-se;Derby',
'Imóveis;Casas Vendem-se;Dois Irmãos',
'Imóveis;Casas Vendem-se;Dois Unidos',
'Imóveis;Casas Vendem-se;Encruzilhada',
'Imóveis;Casas Vendem-se;Engenho do Meio',
'Imóveis;Casas Vendem-se;Espinheiro',
'Imóveis;Casas Vendem-se;Estância',
'Imóveis;Casas Vendem-se;Fundão',
'Imóveis;Casas Vendem-se;Graças',
'Imóveis;Casas Vendem-se;Gravatá',
'Imóveis;Casas Vendem-se;Hipódromo',
'Imóveis;Casas Vendem-se;Ibura',
'Imóveis;Casas Vendem-se;Igarassu',
'Imóveis;Casas Vendem-se;Ilha do Leite',
'Imóveis;Casas Vendem-se;Ilha do Retiro',
'Imóveis;Casas Vendem-se;Imbiribeira',
'Imóveis;Casas Vendem-se;Ipsep',
'Imóveis;Casas Vendem-se;Iputinga',
'Imóveis;Casas Vendem-se;Itapissuma',
'Imóveis;Casas Vendem-se;Jaboatão dos Guararapes',
'Imóveis;Casas Vendem-se;Janga',
'Imóveis;Casas Vendem-se;Jaqueira',
'Imóveis;Casas Vendem-se;Jardim Atlântico',
'Imóveis;Casas Vendem-se;Jardim Brasil',
'Imóveis;Casas Vendem-se;Jardim Fragoso',
'Imóveis;Casas Vendem-se;Jardim São Paulo',
'Imóveis;Casas Vendem-se;Jiquiá',
'Imóveis;Casas Vendem-se;Jordão',
'Imóveis;Casas Vendem-se;Macaxeira',
'Imóveis;Casas Vendem-se;Madalena',
'Imóveis;Casas Vendem-se;Mangabeira',
'Imóveis;Casas Vendem-se;Mangueira',
'Imóveis;Casas Vendem-se;Maranguape',
'Imóveis;Casas Vendem-se;Maria Farinha',
'Imóveis;Casas Vendem-se;Muribeca',
'Imóveis;Casas Vendem-se;Mustardinha',
'Imóveis;Casas Vendem-se;Nova Descoberta',
'Imóveis;Casas Vendem-se;Olinda',
'Imóveis;Casas Vendem-se;Ouro Preto',
'Imóveis;Casas Vendem-se;Outras Localidades',
'Imóveis;Casas Vendem-se;Paissandu',
'Imóveis;Casas Vendem-se;Parnamirim',
'Imóveis;Casas Vendem-se;Pau Amarelo',
'Imóveis;Casas Vendem-se;Paulista',
'Imóveis;Casas Vendem-se;Peixinhos',
'Imóveis;Casas Vendem-se;Piedade',
'Imóveis;Casas Vendem-se;Pina',
'Imóveis;Casas Vendem-se;Poço da Panela',
'Imóveis;Casas Vendem-se;Ponto de Parada',
'Imóveis;Casas Vendem-se;Porta Larga',
'Imóveis;Casas Vendem-se;Porto da Madeira',
'Imóveis;Casas Vendem-se;Prado',
'Imóveis;Casas Vendem-se;Prazeres',
'Imóveis;Casas Vendem-se;Privês',
'Imóveis;Casas Vendem-se;Rio Doce',
'Imóveis;Casas Vendem-se;Rosarinho',
'Imóveis;Casas Vendem-se;San Martin',
'Imóveis;Casas Vendem-se;Santo Amaro',
'Imóveis;Casas Vendem-se;Santo Antônio',
'Imóveis;Casas Vendem-se;São José',
'Imóveis;Casas Vendem-se;São Lourenço da Mata',
'Imóveis;Casas Vendem-se;Setúbal',
'Imóveis;Casas Vendem-se;Socorro',
'Imóveis;Casas Vendem-se;Sucupira',
'Imóveis;Casas Vendem-se;Tamarineira',
'Imóveis;Casas Vendem-se;Tejipió',
'Imóveis;Casas Vendem-se;Torre',
'Imóveis;Casas Vendem-se;Torreão',
'Imóveis;Casas Vendem-se;Torrões',
'Imóveis;Casas Vendem-se;Totó',
'Imóveis;Casas Vendem-se;Várzea',
'Imóveis;Casas Vendem-se;Vasco da Gama',
'Imóveis;Casas Vendem-se;Zumbi',
'Imóveis;Consórcio de Imóveis',
'Imóveis;Estac. e Garagens Alugam-se',
'Imóveis;Estac. e Garagens Vendem-se',
'Imóveis;Flats Alugam-se',
'Imóveis;Flats Vendem-se',
'Imóveis;Galpões Alugam-se',
'Imóveis;Galpões Vendem-se',
'Imóveis;Granj./Chac./Fazen./Sítios',
'Imóveis;Lojas Alugam-se',
'Imóveis;Lojas Vendem-se',
'Imóveis;Pontos Alugam-se',
'Imóveis;Pontos Vendem-se',
'Imóveis;Praias',
'Imóveis;Praias;Carne de Vaca',
'Imóveis;Praias;Catuama',
'Imóveis;Praias;Enseada dos Corais',
'Imóveis;Praias;Gaibú',
'Imóveis;Praias;Itamaracá',
'Imóveis;Praias;Maragogi',
'Imóveis;Praias;Outras Localidades',
'Imóveis;Praias;Pontas de Pedra',
'Imóveis;Praias;Porto de Galinhas',
'Imóveis;Praias;São José da Coroa Grande',
'Imóveis;Praias;Serrambi',
'Imóveis;Praias;Sirinhaém',
'Imóveis;Praias;Tamandaré',
'Imóveis;Praias;Terrenos em Praias',
'Imóveis;Praias;Toquinho',
'Imóveis;Prédios Alugam-se',
'Imóveis;Prédios Vendem-se',
'Imóveis;Quartos e Vagas',
'Imóveis;Salas Alugam-se',
'Imóveis;Salas Vendem-se',
'Imóveis;Terrenos'];




 

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
	
	$("#example")//identificador DE/link	
	        .click(function pega(y) {
				
	     	procura = y.target.text;  
			 
		    $('#inputDE').val(procura);
    		$("#exampleModal").modal("show");
		   //console.log('Clicou DE', procura);
         
		 
		  });


  $('.typeahead').bind('typeahead:select', function(ev, suggestion) {
   //console.log('Selection: ' + suggestion);

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
