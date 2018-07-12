function executar(){      
    //alert('teste');
    
    //ajax
    
     let log = XMLHttpRequest();
    
     //resposta
    log.onreadystatechange =  function(){  
      //verificar o stage resposta
    
    
       if(this.readyState ==4 && this.status == 200){
    
    
          //tratamento dos dados
          let dados = this.responseXML;
          let name = dados.getElementsByTagName("field");
    
    
           alert(name.length);
    
    
          }
    
        }
    
      //pedido
    log.open("GET","XMLFromSectionToSection.xml",true);
    log.send();


}

