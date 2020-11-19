  <?php
  include_once("../../Modelo/conector/BaseDatos.php");
  include_once("../../Modelo/Auto.php");
  include_once("../../Modelo/Persona.php");
  include_once("../../Control/AbmAuto.php");
  $objAbmAuto = new AbmAuto();
  $listaAuto = $objAbmAuto->buscar(null);
  ?>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="../app/img/fai.png">
      </div>
      <div id="company">
        <h2 class="name">Brotsky&Galaz S.A.</h2>
        <div>Buenos Aires 1400 (8300) Neuquén Capital, Patagonia Argentina</div>
        <div>+54-299-4490300</div>
        <div><a href="https://www.uncoma.edu.ar/">hola@uncoma.edu.ar</a></div>
      </div>
    </header>
    <main>
      <div id="details" class="clearfix">
        <div id="client">
          <div class="to">DESTINATARIO:</div>
          <h2 class="name">PWD 2020</h2>
          <div class="address">Dr. Luis Federico Leloir 198 (8300) Neuquén Capital, Patagonia Argentina</div>
          <div class="email"><a href="mailto:inesreutemann@fi.uncoma.edu.ar">pwd2020@contacto.com</a></div>
        </div>
        <div id="invoice">
          <h1>Informe de Vehiculos Ingresados</h1>
          <div class="date">Fecha de Emision:<?= date("d-m-Y") ?></div>
        </div>
      </div>
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="no"><h3>Patente</h3></th>
            <th class="qty"><h3>Apellido</h3></th>
            <th class="unit"><h3>Nombre</h3></th>
            <th class="qty"><h3>Dni</h3></th>
            <th class="unit"><h3>Marca</h3></th>
            <th class="qty"><h3>Modelo</h3></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($listaAuto as $auto):?>
            <tr>
              <td class="no"><?= $auto->getPatente()?></td>
              <td class="qty"><?= $auto->getDniDuenio()->getApellido()?></td>
              <td class="unit"><?= $auto->getDniDuenio()->getNombre()?></td>
              <td class="qty"><?= $auto->getDniDuenio()->getNrodoc()?></td>
              <td class="unit"><?= $auto->getMarca()?></td>
              <td class="qty"><?= $auto->getModelo()?></td>
            </tr>
          <?php endforeach;  ?>
        </tbody>
      </table>
    </main>
  </body>
