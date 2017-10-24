<?php

              require('../assets/php/config.php');
              require('../assets/php/classes/mysql.php');
              $mysql = new Mysql(DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME);
              $company = $mysql->getAllDataWithParameters("company_contacts");
?>
<!DOCTYPE html>
<html>
<head>
  <style type="text/css"> 
  .title 
  {
    font-size: 20px;
    font-weight: bold;
    text-decoration: underline;
    padding-bottom: 20px
  }
  td
  {
    text-align: center;
  }
</style>
    <title>Admin Web</title>
      <script src="../assets/javascript/lib/jquery-3.2.1.min.js" type="text/javascript"></script> 
      <script src="../assets/javascript/bootstrap.js"></script>
    <link rel="stylesheet" href="../assets/stylesheets/codespace.css">
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
        <a href="company_contacts">Empresas</a>
      </li>
        <li class="menu-item">
        <a href="contacto">Contacto</a>
      </li>
      <li class="menu-item">
      <a href="">Más informacion bootcamp</a>
      </li>
      <li class="menu-item">
        <a href="../es/becas-programacion-malaga">Currículums</a>
      </li>
       <li class="menu-item">
        <a href="../es/asesoramiento-laboral-malaga">Sorteo becas</a>
      </li>
      <li class="menu-item">
        <a href="../es/talento-codespace">Newsletter</a>
      </li>
    </ul>
    </nav>
    </div>
    </div>
  <table class="container admin" border="1px">
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
  <tr>
 <?php
                foreach ($company as $key => $company_contacts) {
                  echo "<tr><td>".$company[$key]["name"]."</td><td>".$company[$key]["email"]."</td><td>".$company[$key]["telephone"]."</td><td>".$company[$key]["company_name"]."</td><td>".$company[$key]["company_link"]."</td><td>".$company[$key]["training_request"]."</td><td>".$company[$key]["comment"]."</td><td>".$company[$key]["created_at"]."</td></tr>";
                }
               ?>
  </tr>             
  </table>             
</body>
</html>

