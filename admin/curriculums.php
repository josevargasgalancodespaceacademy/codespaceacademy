<?php

              require('../assets/php/config.php');
              require('../assets/php/classes/mysql.php');
              $mysql = new Mysql(DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME);
              $company = $mysql->getAllDataWithParameters("curriculums");
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
        <a href="company-contacts">Empresas</a>
      </li>
        <li class="menu-item">
        <a href="information-contact">Contacto</a>
      </li>
      <li class="menu-item">
      <a href="">Más informacion bootcamp</a>
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
    </div>
    </div>
  <table class="container admin" border="1px">
  <tr>
        <td class="title">Nombre</td>
        <td class="title">Email</td>
        <td class="title">Teléfono</td>
        <td class="title">Sitio web</td>
        <td class="title">Linkedin</td>
        <td class="title">Fecha</td>
    </tr>
  <tr>
 <?php
                foreach ($company as $key => $company_contacts) {
                  echo "<tr><td>".$company[$key]["name"]."</td><td>".$company[$key]["email"]."</td><td>".$company[$key]["telephone"]."</td><td>".$company[$key]["website"]."</td><td>".$company[$key]["linkedin"]."</td><td>".$company[$key]["created_at"]."</td></tr>";
                }
               ?>
  </tr>             
  </table>             
</body>
</html>