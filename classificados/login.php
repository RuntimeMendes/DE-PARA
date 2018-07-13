<?php include("conecta.php");
include("banco-usuario.php");


$usuario = buscaUsuario($conexao,$_POST["email"],$_POST["senha"]);

if($usuario == null){
    header("Location:index.php?Login=0");


}else{
    header("Location:index.php?Login=1");

}
















?>