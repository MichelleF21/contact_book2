<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('css/misestilos.css') }}" rel="stylesheet" />
    <link href="maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <link href="cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js" rel="stylesheet">
    <link href="//ajax.googleapis.com/ajax/libs/angularjs/1.4.3/angular.min.js" rel="stylesheet">
    
    
</head>
<body>
      <header class="titulo">Agenda de Contactos</header>
      <!--esto para asi llamarlo en el blade correspondiente, es decir para que se entienda que viene contenido-->
@yield('content')