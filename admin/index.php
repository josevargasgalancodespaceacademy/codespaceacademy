<?php

              require('../assets/php/config.php');
              require('../assets/php/classes/mysql.php');
              $mysql = new Mysql(DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME);
              $company = $mysql->getAllDataWithParameters("company_contacts");
?>
<!DOCTYPE html>
<html style="overflow-y:scroll">
<head>
    <title>Admin Web</title>
      <script src="../assets/javascript/lib/jquery-3.2.1.min.js" type="text/javascript"></script> 
      <script src="../assets/javascript/bootstrap.js"></script>
      <script src="datatables/datatables.js"></script>
      <script src="js/admin.js"></script>
    <link rel="stylesheet" href="../assets/stylesheets/codespace.css">
     <link rel="stylesheet" href="datatables/datatables.css">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <link rel="shortcut icon" href="../assets/favicon.ico">
</head>
<body class="page-nosotros">
     <div class="main-nav">
        <div class="container">
        <a class="codespace-logo"><img src="../assets/images/logos/logo_positivo.svg"></a>
        <a href="#" class="hamburger-icon"><img src="../assets/images/logos/hamburger-icon-positivo.svg"></a>
<nav class="menu">
    <ul>
      <li class="menu-item">
        <a href="company-contacts">Empresas</a>
      </li>
        <li class="menu-item">
        <a href="information-contact">Contacto</a>
      </li>
      <li class="menu-item">
      <a href="information-requests">Más informacion bootcamp</a>
      </li>
      <li class="menu-item">
        <a href="te-llamamos">Te llamamos</a>
      </li>
      <li class="menu-item">
        <a href="curriculums">Currículums</a>
      </li>
       <li class="menu-item">
        <a href="promotion-entries">Sorteo becas</a>
      </li>
      <li class="menu-item">
        <a href="newsletter">Newsletter</a>
      </li>
    </ul>
    </nav>
       <li>
       <input style="list-style: none" type="button" id="exportarexcel" value="Descargar Excel">
      </li>
    </div>
    </div>
    <div id="datos">
  <table class="display" cellspacing="0" width="100%" id="tabla-datos">
    <thead>
  <tr>
        <td class="title">Nombre</td>
        <td class="title">Email</td>
        <td class="title">Telefono</td>
        <td class="title">Nombre de la empresa</td>
        <td class="title">Link</td>
        <td class="title">Petición de formación</td>
        <td class="title">Comentario</td>
        <td class="title">Fecha</td>
    </tr>
  </thead>
  <tbody>
 <?php
                foreach ($company as $key => $company_contacts) {
                  echo "<tr><td>".$company[$key]["name"]."</td><td>".$company[$key]["email"]."</td><td>".$company[$key]["telephone"]."</td><td>".$company[$key]["company_name"]."</td><td>".$company[$key]["company_link"]."</td><td>".$company[$key]["training_request"]."</td><td>".$company[$key]["comment"]."</td><td>".$company[$key]["created_at"]."</td></tr>";
                }
               ?>
  </tbody>             
  </table>   
</div>
    <script>
    $("#exportarexcel").click(function(e) {
        window.open('data:application/vnd.ms-excel,' + encodeURIComponent($('#datos').html()));
        e.preventDefault();
    });
    </script>

</body>
</html>

