<?php 

//TWIG
    require_once 'vendor/autoload.php';


    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader, [
        
    ]);

    

    //----------------

    $url =  $_SERVER['REQUEST_URI'];
    $page = str_replace("/", "", $url).".php";

    //ADICIONAR PARTE ANTES DO BODY HTML
    include_once 'header.php';

    switch($url){
        case "/cadastramento":
           
           include_once $page;
            
            break;

        case "/monitoramento":
            //obter os dados
           // $dados = file_get_contents('http://localhost:8080/gerenciamento');
            include_once $page;
            break;
        default:
            include_once 'pagenotfound.php';
        
            
            
    }

    include_once 'foot.php';



