	 
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
        <!--<link rel="stylesheet"href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">-->
      <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">	
			<link rel="stylesheet" type="text/css" href="DataTable/dataTables.css"/>	



	 <!-- Custom styles for this template -->
		<script src="DataTable/jQuery-1.12.3/jquery.min.js"></script>			
            <script src="DataTable/DataTables-1.10.16/js/jquery.dataTables.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.quicksearch/2.3.1/jquery.quicksearch.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script> 
			<script src="vendor/typeahead/typeahead.bundle.js"></script>
		<!--	<script src="formulario.js"></script>-->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
		
       <!-- <link href="css/full-slider.css" rel="stylesheet">-->			
       

    </head>
	 <body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container">
	<a class="navbar-brand" href="index.php">Classificados JC </a>
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
	  <span class="navbar-toggler-icon"></span>
	  
  </button>

	
	
<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
  <div class="navbar-nav">
  <a class="nav-item nav-link active" href="index.php">DE / PARA <span class="sr-only">(current)</span></a>
  <a class="nav-item nav-link active" href="exibeXml.php">XML</a>
  
</div>	
	
</nav>
<!-- Page Content -->
<section class="py-5">
 <br>
 <br>
   <h2>  </h2>
   <br>
   
   
   <ul>
<div>   
	 
	 
	 
	 
	 
	 
	 
	 <?php
	 
	   //include('leitor.php');
	   include 'mostra_erros.php';
       header('Content-type: text/html; charset=utf-8');
				   setlocale( LC_ALL, 'pt_BR.utf-8', 'pt_BR', 'Portuguese_Brazil');
		
			
       //o index do antigo 
   
		//classe onde carrega o documento xml e insere nos atributos os dados.
		$doc = new DOMDocument();
        $doc->load( 'XMLFromSectionToSection.xml' );
		
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

		//print_r($_POST);
				
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
				 
			 echo '<div id =enviado class="alert alert-success" role="alert">';
		           echo 'Gravado no XML';
		          echo '</div>';
				  
				  
			}
				  
				

			
		 
	 	?>	
		
      <br>
	  <br>
	  <br>
	  <br>
	  <br>
	  <br>	
	  	
   </section>
	


<!-- Footer -->
<footer class="py-5 bg-dark">
  <div class="container">
	<p class="m-0 text-center text-white">Sistema Jornal do Commercio&copy; Website 2018</p>
  </div>
  <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>		
<!--<script type="text/javascript" charset="utf-8">
		$(document).ready(function() {
    var table = $('#example').DataTable( {     
	"language": {
		"url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Portuguese-Brasil.json"			
	
	}		
    });
});



setTimeout(function(){

      var a = document.getElementById("enviado");

           a.style="display:none"


        },3000);		
		
		
setTimeout(function(){

    var b = document.getElementById("reset");

           b.style="display:none"

        },3000);


	


	</script>
	 


</html>		-->
		
		  