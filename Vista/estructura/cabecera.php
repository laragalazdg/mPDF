<!doctype html>
<html lang="es">
<head>

    <link rel="shortcut icon" href="fai.ico">
    <!-- Required meta tags -->
    <!--formato de codificacion de caracteres-->
    <meta charset="utf-8">
    <!--esta etiqueta permite que bootstrap se adapte al dispositivo-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" >

    <!--iconos de fontawasome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">


    <!--estilos-->
    <link rel="stylesheet" type="text/css" href="css/estilos.css">

    <!--editor de texto enriquecido-->
    <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>

    <title><?php $Titulo?></title>

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #050308;">
        <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#" style="margin-left: 50px; color: white;">BROTSKY&GALAZ</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

    </nav>
    <div class="container-fluid">
        <div class="row">
            <!--barra lateral-->
            <?php include_once("menu.php")?>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                    <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                        <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0">
                        </div>
                    </div>
                    <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                        <div style="position:absolute;width:200%;height:200%;left:0; top:0">
                        </div>
                    </div>
                </div>