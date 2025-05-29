<?php 
    require_once"./CORE/Rotas.php";

    $base = "/pet-shop/APP";
    $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $url = str_replace($base, "", $url);
    $url = $url === '' ? '/' : $url;

    echo $url;

    $rotas = new Rotas($url);
    $rotas->navegar();
?>