<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LaraDev: CRUD Imobiliario</title>

    <link rel="stylesheet" href="<?=asset('sass/app.scss'); ?>";
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body>

<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
        <a href="#" class="navbar-brand">Lara<b>Dev</b></a>
    <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a href="<?= url('/imoveis/cadastro'); ?>" class="nav-link">Cadastrar novo imóvel</a></li>
        <li class="nav-item"><a href="<?= url('/imoveis'); ?>" class="nav-link">Listar todos imóveis</a></li>
    </ul>
    </div>
</nav>
@yield('content')
    

<script src="<?=asset('js/app.js'); ?>"></script>
</body>
</html>