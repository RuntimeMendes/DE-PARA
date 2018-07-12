
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

<?php

include 'mostra_erros.php';


$doc = new DOMDocument();
$doc->load( 'XMLFromSectionToSection.xml' );

$arrayXmlCampos = $doc->getElementsByTagName( "field" );
$parent = $doc->getElementsByTagName('sectiontosection_configuration')->item(0);

   
   // var_dump($sources, $destinations);


//    $sources      = $_POST["source"];
//    $destinations = $_POST["destination"];


    if (isset($_POST['source'],$_POST['destination']))  {

        $name = 'SECTION';
        $sources      = $_POST["source"];
        $destinations = $_POST["destination"];

       // var_dump( $source , $destination);
    
    }


    //Adiciono os itens na classe filha	   


 

   
 foreach($sources as $key => $source) {  

   /* $doc = new DOMDocument();
    $doc->load( 'XMLFromSectionToSection.xml' );
    
    $arrayXmlCampos = $doc->getElementsByTagName( "field" );
    $parent = $doc->getElementsByTagName('sectiontosection_configuration')->item(0);  

       
    $destination = $destinations[$key];*/

        //escrevendo os valores nos  atributos atributos do xml	
        
        $novo = $doc->createElement('field');
       
    
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




   }

    $doc->save('XMLFromSectionToSection.xml');
    

    // mensgaqem de retorno ao usuário
    var_dump( $_POST);










?>