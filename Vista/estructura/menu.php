<?php
    function item($ruta, $nombre){
        return '<a class="dropdown-item" href="'.$ruta.'"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>'.$nombre.'</a>';
    }
?>
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse" style="margin-bottom: 30px; background-color: #dae3ed;">
    <div class="sidebar-sticky pt-3">
        <!--<div id="menu" style="margin: 15px;"><h6><p>MENU</p></h6></div>-->
        <div id="opciones_menu" style="margin-top: 20px;">
            <a class="dropdown-item" href="index.php"><h6>Home</h6></a>
            <?= item("nivelcero.php","Nivel Cero") ?>
            <?= item("conplantilla.php","Con Plantilla") ?>
            <?= item("completarFormulario.php","Con Formulario") ?>
            <?= item("verAutos.php","Info Autos") ?>

        </div>

    </div>
</nav>