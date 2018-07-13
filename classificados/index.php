<!DOCTYPE html>


<html lang="pt_BR">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
   
    <title>Classificados  JC </title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/full-slider.css" rel="stylesheet">







  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php">Classificados JC </a>
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
		  
      </button>

		
        </div>   
    </nav>
    <!-- Page Content -->
    <section class="py-5">

    <?php
if(isset($_GET["login"]) && $_GET["login"]==true) {
?>
<p class="alert-success">Logado com sucesso!</p>
<?php
}
?>
<?php
if(isset($_GET["login"]) && $_GET["login"]==false) {
?>
<p class="alert-danger">Usuário ou senha inválida!</p>
<?php
}
?>
	 <br>
	 <br>
       <h2> Bem Vindos !  </h2>
	   <br>
 
	   
	<form action="login.php" method="post">
	  <table  align='center'>
         <tr>
          <td>Email</td>
           <td><input class="form-control" type="email" name="email"></td>

         </tr>  
         <tr>
           <td>Senha</td>
           <td><input class="form-control" type="password" name="senha"></td>


         </tr> 
        
         <tr>
         
             <td><button class="btn btn-primary">Login</button></td>


         </tr>
        
       
   

	  </table>
      </form>

    

















	
	   <?php

     
	   
	   include 'mostra_erros.php';
	   
    //trecho em php onde lista os ultimos log no diretorio txt
   //transforma o diretorio em array atraves do scandir  

 //$fileInfo = scandir('C:\xampp\htdocs\testtoclassificados\startbootstrap-full-slider-gh-pages\log',-3,3);
 
  //D:\WindowsServices\InventorySynchronizationImporter\Log
  //dir = C:\xamp2\htdocs\classificados\startbootstrap\log
 // $dir    = 'L:/';
 ////34.201.193.241/Log$
 
 $dir  = 'C:/xampp/htdocs/depara.sjcc.com.br/classificados/log';
 //var_dump($dir).exit(); // exibe o L:/
 
 
 $fileInfo = scandir($dir,-1);
 // var_dump($fileInfo).exit();//aqui retorna false
 $fileInfo =  array_slice($fileInfo, 1,3);
  
 
 /*
 var_dump($fileInfo).exit();
 */
  //recebe o objeto e percorre  
foreach($fileInfo as $percorre){               

//exibir o conteudo dos txt
//"http://depara.sjcc.com.br/leitor.php?arquivo=".md5($percorre); 
$urlLeitor = "http://localhost:8080/depara.sjcc.com.br/classificados/cadastrar.php?arquivo=".md5($percorre); 
//$urlLeitor = "http://localhost:8080/depara.sjcc.com.br/classificados/leitor.php?arquivo=".md5($percorre); 

echo '<table class="table"> 

<th scope ="row"><li><a href='.$urlLeitor.' target=_blank>'.$percorre."</a><br/></li>";


 
echo'</th>';  

echo '</table>' ;


}

  
?> 


  
 

	 
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