<!DOCTYPE html>
<html lang="pt_BR">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
	

    <title>Classificados  </title>

    <!-- Bootstrap core CSS -->

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">	
	<link rel="stylesheet" type="text/css" href="DataTable/dataTables.css"/>

    <!-- Custom styles for this template -->
    <link href="css/full-slider.css" rel="stylesheet">
	
	<script src="DataTable/jQuery-1.12.3/jquery.min.js"></script>
    <script src="DataTable/DataTables-1.10.16/js/jquery.dataTables.min.js"></script>
	

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
      <h2> XML</h2>
	   <br>	 
     </div>	
	 
	  <div> 		
		
	   <?php
	   include 'mostra_erros.php';
	   
	     //tira os erros de acentuação na hora de exibir
		 header('Content-type: text/html; charset=utf-8');
	     setlocale( LC_ALL, 'pt_BR.utf-8', 'pt_BR', 'Portuguese_Brazil');
	  
	  
	    $doc = new DOMDocument();
        $doc->load( '//34.201.193.241/Xml$/XMLFromSectionToSection.xml' );
		
		$arrayXmlCampos = $doc->getElementsByTagName( "field" );
		//$parent = $doc->getElementsByTagName('sectiontosection_configuration')->item(0);
		
		
		
		 echo '<table id="example" class="table table-striped table-bordered">	
	   	       <thead>
                <tr>				
				<th style="display:none">name</th> 
                <th>Source</th>
                <th>Destination</th>
                
            </tr>
        </thead><tbody>'; 
		foreach($arrayXmlCampos as $objPropriedades ){
							   
		//exibe os valores dos atributos percorrido
		
       echo '
            <tr>
			    <td scope="row" style ="display:none">'.$objPropriedades->attributes[0]->value.'</td>
                <td scope="row">'.$objPropriedades->attributes[1]->value.'</td>
                <td scope="row">'.$objPropriedades->attributes[2]->value.'</td>
              
                
            </tr>			
			';	
									
		}
		
           echo '</tbody>
                </table>';		
			
           
	
	   ?>
	   	
	   
	 </div>	 
	</section>
			<!-- Footer -->
			<footer class="py-5 bg-dark">
				<div class="container">
					<p class="m-0 text-center text-white">Sistema jornal do Commercio &copy; Website 2018</p>
				</div>
				<!-- /.container -->
			</footer>
			<!-- Bootstrap core JavaScript -->
			<!-- <script src="vendor/jquery/jquery.min.js"></script> -->
			<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		</body>
		
		<script type="text/javascript" charset="utf-8">
		    $(document).ready(function() {
	var table = $('#example').DataTable( {     
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Portuguese-Brasil.json"			
		
		}		
    });
	});
		

</script>

</html>
